<?php

class OrderController extends Controller
{
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
					'view',
					'update',
					'delete',
				),
				'users'=>array('@'),
				//'roles'=>array(WebUser::ROLE_ADMIN),
				'expression'=> '!Yii::app()->user->isGuest && Yii::app()->user->role == 1',
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

			// $dataProvider=new CActiveDataProvider('Pasien',array(
			// 	'pagination'=>false,
			// ));
			$this->render('create',array(
				//'dataProvider'=>$dataProvider,
				'order'=>$order,
				'order_detail'=>$order_detail,
				'pelanggan'=>$pelanggan,
				'pelanggan_baru'=>$newpl,
				'orderbaru' => $orderbaru,
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

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->KODE_ORDER));
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
		$criteria = new CDbCriteria;
		$criteria->order = 'TANGGAL_ORDER DESC';

		$dataProvider=new CActiveDataProvider('Order',array(
			'pagination'=>false,
			'criteria'=>$criteria,
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
