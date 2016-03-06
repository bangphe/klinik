<?php

class ItemController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

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
					'updatestok',
					'hapus',
					'delete',
					'getitem',
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

	public function actionGetItem()
	{
		$ret = Item::listAll();
		//$ret = $this->model->getData('wilayah');
		//$i=0;
		// foreach ($ret as $row) {
		// 	$datajson[$i]['ID_ITEM'] = $row['ID_ITEM'];
		// 	$datajson[$i]['NAMA_ITEM'] = $row['NAMA_ITEM'];
		// 	$i++;
		// }
		echo json_encode($ret);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$detil_item = DetilItem::getDetilItem($id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'detil_item'=>$detil_item,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$item=new Item;
		$detil_item=new DetilItem;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Item'], $_POST['DetilItem']))
		{
			$item->attributes=$_POST['Item'];	
			$detil_item->attributes=$_POST['DetilItem'];
			if ($item->validate() & $detil_item->validate()) {
				$connection = Yii::app()->db;
                $transaction = $connection->beginTransaction();
                try {
	                if($item->save()) {
						$detil_item->setAttribute('ID_ITEM',$item->ID_ITEM);
						$detil_item->setAttribute('TANGGAL_INPUT',date('Y-m-d H:i:s'));
						if($detil_item->save()){
							$transaction->commit();
							Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
							$this->redirect(array('view','id'=>$item->ID_ITEM));
						}
					}
                } catch (Exception $e) {
                	$transaction->rollback();
                	Yii::app()->user->setFlash('info', MyFormatter::alertDanger('<strong>Error!</strong> Data gagal untuk disimpan.'.$e->getMessage()));
                }
			}
		}

		$this->render('create',array(
			'item'=>$item,
			'detil_item'=>$detil_item,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$item=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Item']))
		{
			$item->attributes=$_POST['Item'];
			if($item->save()) {
				Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Perubahan data telah berhasil disimpan.'));
				$this->redirect(array('view','id'=>$item->ID_ITEM));
			}
		}

		$this->render('update',array(
			'item'=>$item,
		));
	}

	public function actionUpdateStok($id)
	{
		$item=$this->loadModel($id);

		$detil_item=new DetilItem;

		if(isset($_POST['DetilItem']))
		{
			$detil_item->attributes=$_POST['DetilItem'];
			$detil_item->setAttribute('ID_ITEM',$item->ID_ITEM);
			$detil_item->setAttribute('TANGGAL_INPUT',date('Y-m-d H:i:s'));
			if ($detil_item->validate()) {
				if($detil_item->save()) {
					Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Stok barang telah berhasil ditambahkan.'));
					$this->redirect(array('view','id'=>$item->ID_ITEM));
				}
			}
		}

		$this->render('stok/create',array(
			'item'=>$item,
			'detil_item'=>$detil_item,
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

	public function actionHapus($id)
    {
        Item::model()->updateByPk($id, array('STATUS'=>2));
                
        Yii::app()->user->setFlash('info',  MyFormatter::alertError('<strong>Sukses!</strong> Data telah berhasil dihapus.'));
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'STATUS=:status';
		$criteria->params = array(':status'=>Item::STATUS_AKTIF);
		$model = Item::model()->findAll($criteria);

		$dataProvider=new CActiveDataProvider('Item',array(
			'pagination'=>false
		));
		$this->render('index',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Item('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Item']))
			$model->attributes=$_GET['Item'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Item the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Item::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Item $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
