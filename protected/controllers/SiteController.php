<?php

class SiteController extends Controller
{
	public $layout = '//layouts/kasir';
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('login', 'error', 'logout'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index','getitem','getpasien','indexs','getobat','getlayanan','getstokitem'),
                'users' => array('@'),
                //'roles' => array(WebUser::ROLE_KASIR)
                'expression'=> '!Yii::app()->user->isGuest && Yii::app()->user->role == 2',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionGetObat()
	{
		$ret = Item::ListBarangByKategori(Item::KATEGORI_OBAT);
		//$ret = $this->model->getData('wilayah');
		$i=0;
		foreach ($ret as $row) {
			$datajson[$i]['ID_ITEM'] = $row['ID_ITEM'];
			$datajson[$i]['NAMA_ITEM'] = $row['NAMA_ITEM'];
			$datajson[$i]['HARGA_JUAL'] = $row['HARGA_JUAL'];
			$i++;
		}
		echo json_encode($datajson);
	}

	public function actionGetItem()
	{
		$ret = Item::listAll();
		//$ret = $this->model->getData('wilayah');
		$i=0;
		foreach ($ret as $row) {
			$datajson[$i]['ID_ITEM'] = $row['ID_ITEM'];
			$datajson[$i]['NAMA_ITEM'] = $row['NAMA_ITEM'];
			$datajson[$i]['HARGA_JUAL'] = $row['HARGA_JUAL'];
			$i++;
		}
		echo json_encode($datajson);
	}

	public function actionGetLayanan($id)
	{
		$model=Layanan::model()->findByPk($id);
		//$ret = Item::listAll();
		//$ret = $this->model->getData('wilayah');
		// $i=0;
		// foreach ($model as $row) {
		// 	$datajson[$i]['BIAYA_REGISTRASI'] = $row['BIAYA_REGISTRASI'];
		// 	$i++;
		// }
		echo $model->BIAYA;
	}

	public function actionGetPasien()
	{
		$kdpasien = $_GET['id'];
		$model=Pasien::model()->findByPk($kdpasien);

		echo $model->NAMA_PASIEN;
	}

	public function actionGetStokItem($id)
	{
		echo Item::getStokItem($id);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndexs()
	{
		if(!WebUser::isGuest() && WebUser::isAdmin())
			$this->render('index');
		elseif(!WebUser::isGuest() && WebUser::isKasir()) {
			//inisialisasi model Order
			$order = new Order('search');
	        $order->unsetAttributes();  // clear any default values
	        if (isset($_GET['Order']))
	            $order->attributes = $_GET['Order'];

	        $orderbaru = new Order('baru');
	        $orderbaru->RESEP = 1;
	        $orderbaru->orderdetail = new OrderDetail('baru');
			//inisialisasi model OrderDetail
			$order_detail=new OrderDetail;

			//inisialisasi model Pelanggan
			$pelanggan = new Pasien('search');
	        $pelanggan->unsetAttributes();  // clear any default values
	        if (isset($_GET['Pasien']))
	            $pelanggan->attributes = $_GET['Pasien'];

			$newpl = new Pasien('baru');
			$newpl->ID_LAYANAN = 1;
	        if (isset($_POST['Pasien'])) {
	            $newpl->attributes = $_POST['Pasien'];
	            $newpl->BIAYA_REGISTRASI = 5000;
	            $newpl->TANGGAL_REGISTRASI = date('Y-m-d H:i:s');
	            if ($newpl->save()) {
	            	Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
	                $this->redirect(array('/site'));
	            }
	        }

	        if (isset($_POST['Order'])) {
	            $orderbaru->attributes = $_POST['Order'];
	            $orderbaru->TANGGAL_ORDER = date('Y-m-d H:i:s');
            	$orderbaru->USER_PEMBUAT = Yii::app()->user->nama;
	            if ($orderbaru->validate()) {
	                $transaction = Yii::app()->db->beginTransaction();
	                try {
	                    if (!$orderbaru->save())
	                        throw new Exception;

	                    $subtotal = 0;
	                    foreach ($_POST['OrderDetail'] as $kd => $detail) {
	                        if (!empty($detail['JUMLAH'])) {
	                            $od = new OrderDetail('baru');
		                        $od->ID_ITEM = $kd;
		                        $od->KODE_ORDER = $orderbaru->KODE_ORDER;
		                        //proses harga by resep
		                        $od->HARGA = Item::getHargaByResep($kd, $orderbaru->RESEP);
		                        $od->JUMLAH = $detail['JUMLAH'];
		                        $od->DISKON = $detail['DISKON'];
		                        //$od->DISKON = Barang::getDiskonById($kd);
		                        //update stok barang
		                        Item::updateStokItem($kd, $detail['JUMLAH']);
		                        $subtotal += $od->JUMLAH * $od->HARGA;
	                            if (!$od->save())
	                                throw new Exception;
	                        }
	                    }
	                    
	                    $transaction->commit();
	                    Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
	                    $this->redirect(array('/order/view', 'id' => $orderbaru->KODE_ORDER));
	                } catch (Exception $ex) {
	                    $transaction->rollback();
	                    echo $ex->getMessage(); exit();
	                }
	            }
	        }

			$dataProvider=new CActiveDataProvider('Pasien',array(
				'pagination'=>false,
			));

			$pasien_today = Pasien::listRegisterToday();
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'order'=>$order,
				'order_detail'=>$order_detail,
				'pelanggan'=>$pelanggan,
				'pelanggan_baru'=>$newpl,
				'orderbaru' => $orderbaru,
				'pasien_today' => $pasien_today,
			));
		}
			
		else
			$this->redirect(array('login'));
	}

	public function actionIndex()
	{
		if(!WebUser::isGuest() && WebUser::isAdmin())
			$this->render('index');
		elseif(!WebUser::isGuest() && WebUser::isKasir()) {
			//inisialisasi model Order
			$order = new Order('search');
	        $order->unsetAttributes();  // clear any default values
	        if (isset($_GET['Order']))
	            $order->attributes = $_GET['Order'];

	        $orderbaru = new Order('baru');
	        $orderbaru->RESEP = 1;
	        $orderbaru->orderdetail = new OrderDetail('baru');
			//inisialisasi model OrderDetail
			$order_detail=new OrderDetail;

			//inisialisasi model Pelanggan
			$pelanggan = new Pasien('search');
	        $pelanggan->unsetAttributes();  // clear any default values
	        if (isset($_GET['Pasien']))
	            $pelanggan->attributes = $_GET['Pasien'];

			$newpl = new Pasien('baru');
			// $newpl->ID_LAYANAN = 1;
	        if (isset($_POST['Pasien'])) {
	            $newpl->attributes = $_POST['Pasien'];
	            //$newpl->BIAYA_REGISTRASI = 5000;
	            $newpl->TANGGAL_REGISTRASI = date('Y-m-d H:i:s');
	            if ($newpl->save()) {
	            	Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
	                $this->redirect(array('/site'));
	            }
	        }

	        if (isset($_POST['Order'])) {
	        	// var_dump($_POST['Order']);
	        	// die();
	            $orderbaru->attributes = $_POST['Order'];
	            $orderbaru->TANGGAL_ORDER = date('Y-m-d H:i:s');
            	$orderbaru->USER_PEMBUAT = Yii::app()->user->nama;
            	if ($orderbaru->save()) {
            		$subtotal = 0;
            		foreach ($_POST['OrderDetail'] as $detail) {
            // 			var_dump($_POST['OrderDetail']);
	        			// die();
            			$od = new OrderDetail('baru');
                        $od->ID_ITEM = $detail['ID_ITEM'];
                        $od->KODE_ORDER = $orderbaru->KODE_ORDER;
                        //proses harga by resep
                        $od->HARGA = Item::getHargaByResep($detail['ID_ITEM'], $orderbaru->RESEP);
                        $od->JUMLAH = $detail['JUMLAH'];
                        $od->DISKON = $detail['DISKON'];

                        Item::updateStokItem($detail['ID_ITEM'], $detail['JUMLAH']);
		           		$subtotal += $od->JUMLAH * $od->HARGA;

		           		$od->save();
            		}
            		Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
	            	$this->redirect(array('/order/view', 'id' => $orderbaru->KODE_ORDER));
            	}
	            // if ($orderbaru->validate()) {
	            //     $transaction = Yii::app()->db->beginTransaction();
	            //     try {
	            //         if (!$orderbaru->save())
	            //             throw new Exception;

	            //         $subtotal = 0;
	            //         foreach ($_POST['OrderDetail'] as $kd => $detail) {
	            //             if (!empty($detail['JUMLAH'])) {
	                        	
	            //                 $od = new OrderDetail('baru');
		           //              $od->ID_ITEM = $kd;
		           //              $od->KODE_ORDER = $orderbaru->KODE_ORDER;
		           //              //proses harga by resep
		           //              $od->HARGA = Item::getHargaByResep($kd, $orderbaru->RESEP);
		           //              $od->JUMLAH = $detail['JUMLAH'];
		           //              //$od->DISKON = $detail['DISKON'];
		           //              //$od->DISKON = Barang::getDiskonById($kd);
		           //              //var_dump($_POST['OrderDetail']);
	        				// 	//die();
		           //              //update stok barang
		           //              Item::updateStokItem($kd, $detail['JUMLAH']);
		           //              $subtotal += $od->JUMLAH * $od->HARGA;
	            //                 if (!$od->save())
	            //                     throw new Exception;
	            //             }
	            //         }
	                    
	            //         $transaction->commit();
	            //         Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
	            //         $this->redirect(array('/order/view', 'id' => $orderbaru->KODE_ORDER));
	            //     } catch (Exception $ex) {
	            //         $transaction->rollback();
	            //         echo $ex->getMessage(); exit();
	            //     }
	            // }
	        }

	        $criteria = new CDbCriteria;
			$criteria->order = 'TANGGAL_REGISTRASI DESC';
			$dataProvider=new CActiveDataProvider('Pasien',array(
				'criteria'=>$criteria,
				'pagination'=>false,
			));

			$pasien_today = Pasien::listRegisterToday();
			$this->render('index3',array(
				'dataProvider'=>$dataProvider,
				'order'=>$order,
				'order_detail'=>$order_detail,
				'pelanggan'=>$pelanggan,
				'pelanggan_baru'=>$newpl,
				'orderbaru' => $orderbaru,
				'pasien_today' => $pasien_today,
			));
		}
			
		else
			$this->redirect(array('login'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = '//layouts/blank';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = '//layout/blankLayout';

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				//$this->redirect(Yii::app()->user->returnUrl);
				if (Yii::app()->user->isLogin) {
					$userid = Yii::app()->user->idUser;
                    $timestamp = date('Y-m-d H:i:s');
                    User::model()->updateByPk($userid, array('TERAKHIR_LOGIN'=>$timestamp));

                    if (WebUser::isAdmin())
	                    $this->redirect(array('/admin'));
	                else
	                    $this->redirect(array('/site'));
				}
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}