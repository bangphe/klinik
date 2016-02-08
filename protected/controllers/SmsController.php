<?php

class SmsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/kasir';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(
					'index',
					'create',
					'createMultiple',
					'view',
					'update',
					'delete',
				),
				'users'=>array('@'),
				//'roles'=>array(WebUser::ROLE_ADMIN),
				'expression'=> '!Yii::app()->user->isGuest && Yii::app()->user->role == 2',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SmsLog;
		$smsBerhasil = count(SmsLog::model()->findALlByAttributes(array('STATUS'=>1)));
		$smsGagal = count(SmsLog::model()->findALlByAttributes(array('STATUS'=>0)));
		$smsTotal = ($smsBerhasil + $smsGagal);
		$smsKuota = Sms::model()->findByPk(1);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SmsLog']))
		{
			Yii::import('ext.nasrulsms.SMSreguler');
			
			if ($_POST['SmsLog']['TUJUAN'] != "" && $_POST['SmsLog']['PESAN'] != "")
			{

				ob_start();

				$smsusername = "laundry_viele";
				$smspassword = "TU6iPG";
				$apikey      = "4b15b9bb700fef70f11e143d09a3f3c9";
				$banyak		 = 0;
				$berhasil	 = 0;
				$gagal		 = 0;

				// cek curl aktif atau tidak 
				if(!function_exists('curl_version'))
				{
				  	Yii::app()->user->setFlash('info', "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'></button>Curl tidak aktif! aktifkan dulu mas bero! -_-</div>");
					$this->redirect(array('create'));
				}

				// inisialisasi
				$nohp  = $_POST['SmsLog']['TUJUAN'];
				$pesan = $_POST['SmsLog']['PESAN'];

				// filter karakter
				$replace = str_replace(" ", "", $nohp);
				$replace = str_replace("-", "", $replace);
				$replace = str_replace("(", "", $replace);
				$replace = str_replace(")", "", $replace);
				$replace = str_replace("+62", "0", $replace);

				// looping sesuai jumlah nomor yg diinput
				$pisahkoma = explode(",", $replace);
				if(count($pisahkoma) < $smsKuota->SISA_KUOTA)
				{
					if($smsKuota->STATUS != 0 && $smsKuota->MASA_BERLAKU > date("Y-m-d H:i:s"))
					{
						foreach ($pisahkoma as $value) {

							if(is_numeric($value)){

								// kirim sms
								$sms = new SMSreguler();
								$sms->setUsername($smsusername);
								$sms->setPassword($smspassword);
								$sms->setApi($apikey);
								$sms->setTo($value);
								$sms->setText($pesan);
								$sts=$sms->smssend();

								$idreport=explode('|',$sts);
								if (substr($sts,0,1)=='0') {
									$status = 1;
									$berhasil += 1;
								}else{
									$status = 0;
									$gagal += 1;
								}

								// simpan sms ke db
								$smsLog=new SmsLog;
								$smsLog->ID_USER = Yii::app()->user->getState('nama');
								$smsLog->ID_PASIEN = 0;
								$smsLog->PESAN = $pesan;
								$smsLog->TUJUAN = $value;
								$smsLog->TANGGAL_KIRIM = date("Y-m-d H:i:s");
								$smsLog->STATUS = $status;
								$smsLog->save();

								// catat record
						 		$banyak += 1;
						 	}
						}

						$error = false;

					}else{
						Yii::app()->user->setFlash('info', "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'></button><strong>GAGAL!</strong> Status SMS Broadcast Tidak Aktif, silahkan hubungi <strong>Admin Website</strong>.</div>");

						// reset STATUS
						$smsMaster = Sms::model()->findByPk(1);
						$smsMaster->STATUS = 0;
						$smsMaster->save();
						
						$this->redirect(array('create'));
					}
				}else{
					$model->addError('TUJUAN', 'Jumlah Nomor Tujuan SMS melebihi sisa kuota.');
					$model->TUJUAN = $nohp;
					$model->PESAN = $pesan;
					$error = true;
				}

				$smsMaster = Sms::model()->findByPk(1);
				$smsMaster->SISA_KUOTA = ($smsMaster->SISA_KUOTA-$banyak);
				$smsMaster->save();

				if(!$error)
				{
					$notifikasi = "Total SMS Terkirim adalah <strong>".$banyak." SMS</strong>, terdiri dari <strong>".$berhasil." Berhasil</strong> dan <strong>".$gagal." Gagal</strong>.";

					Yii::app()->user->setFlash('info', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'></button>".$notifikasi."</div>");

					$this->redirect(array('create'));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'smsBerhasil'=>$smsBerhasil,
			'smsGagal'=>$smsGagal,
			'smsTotal'=>$smsTotal,
			'smsKuota'=>$smsKuota->SISA_KUOTA,
		));
	}

	public function actionCreateMultiple()
	{
		$model=new SmsLog;
		$smsBerhasil = count(SmsLog::model()->findALlByAttributes(array('STATUS'=>1)));
		$smsGagal = count(SmsLog::model()->findALlByAttributes(array('STATUS'=>0)));
		$smsTotal = ($smsBerhasil + $smsGagal);
		$smsKuota = Sms::model()->findByPk(1);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SmsLog']))
		{
			Yii::import('ext.nasrulsms.SMSreguler');
			
			if ($_POST['SmsLog']['TUJUAN'] != "" && $_POST['SmsLog']['PESAN'] != "")
			{

				ob_start();

				$smsusername = "laundry_viele";
				$smspassword = "TU6iPG";
				$apikey      = "4b15b9bb700fef70f11e143d09a3f3c9";
				$banyak		 = 0;
				$berhasil	 = 0;
				$gagal		 = 0;

				// cek curl aktif atau tidak 
				if(!function_exists('curl_version'))
				{
				  	Yii::app()->user->setFlash('info', "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'></button>Curl tidak aktif! aktifkan dulu mas bero! -_-</div>");
					$this->redirect(array('createMultiple'));
				}

				// inisialisasi
				$nohp  = $_POST['SmsLog']['TUJUAN'];
				$pesan = $_POST['SmsLog']['PESAN'];

				// filter karakter
				$replace = str_replace(" ", "", $nohp);
				$replace = str_replace("-", "", $replace);
				$replace = str_replace("(", "", $replace);
				$replace = str_replace(")", "", $replace);
				$replace = str_replace("+62", "0", $replace);

				// looping sesuai jumlah nomor yg diinput
				$pisahkoma = count($nohp);
				if(count($pisahkoma) < $smsKuota->SISA_KUOTA)
				{
					if($smsKuota->STATUS != 0 && $smsKuota->MASA_BERLAKU > date("Y-m-d H:i:s"))
					{
						foreach ($nohp as $value) 
						{
							$pelanggan = Pasien::model()->findByPk($value);
							if(count($pelanggan) > 0){

								// kirim sms
								$sms = new SMSreguler();
								$sms->setUsername($smsusername);
								$sms->setPassword($smspassword);
								$sms->setApi($apikey);
								$sms->setTo($pelanggan->NO_TELP);
								$sms->setText($pesan);
								$sts=$sms->smssend();

								$idreport=explode('|',$sts);
								if (substr($sts,0,1)=='0') {
									$status = 1;
									$berhasil += 1;
								}else{
									$status = 0;
									$gagal += 1;
								}

								// simpan sms ke db
								$smsLog=new SmsLog;
								$smsLog->ID_USER = Yii::app()->user->getState('nama');
								$smsLog->ID_PASIEN = $pelanggan->ID_PASIEN;
								$smsLog->PESAN = $pesan;
								$smsLog->TUJUAN = $pelanggan->NO_TELP;
								$smsLog->TANGGAL_KIRIM = date("Y-m-d H:i:s");
								$smsLog->STATUS = $status;
								$smsLog->save();

								// catat record
						 		$banyak += 1;
						 	}
						}

						$error = false;

					}else{
						Yii::app()->user->setFlash('info', "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'></button><strong>GAGAL!</strong> Status SMS Broadcast Tidak Aktif, silahkan hubungi <strong>Admin Website</strong>.</div>");

						// reset STATUS
						$smsMaster = Sms::model()->findByPk(1);
						$smsMaster->STATUS = 0;
						$smsMaster->save();

						$this->redirect(array('createMultiple'));
					}
				}else{
					$model->addError('TUJUAN', 'Jumlah Nomor Tujuan SMS melebihi sisa kuota.');
					$model->PESAN = $pesan;
					$error = true;
				}

				$smsMaster = Sms::model()->findByPk(1);
				$smsMaster->SISA_KUOTA = ($smsMaster->SISA_KUOTA-$banyak);
				$smsMaster->save();

				if(!$error)
				{
					$notifikasi = "Total SMS Terkirim adalah <strong>".$banyak." SMS</strong>, terdiri dari <strong>".$berhasil." Berhasil</strong> dan <strong>".$gagal." Gagal</strong>.";

					Yii::app()->user->setFlash('info', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'></button>".$notifikasi."</div>");

					$this->redirect(array('createMultiple'));
				}
			}
		}

		$this->render('create_multiple',array(
			'model'=>$model,
			'smsBerhasil'=>$smsBerhasil,
			'smsGagal'=>$smsGagal,
			'smsTotal'=>$smsTotal,
			'smsKuota'=>$smsKuota->SISA_KUOTA,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sms']))
		{
			$model->attributes=$_POST['Sms'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_SMS));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new SmsLog('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SmsLog']))
            $model->attributes = $_GET['SmsLog'];

        $this->render('index', array(
            'model' => $model,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sms('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sms']))
			$model->attributes=$_GET['Sms'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sms the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sms::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sms $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sms-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
