<?php

class ProfilController extends Controller
{
	public function actionIndex()
	{
		$id = Yii::app()->user->idUser;
		$model=User::model()->findByPk($id);

		// if(isset($_POST['User']))
		// {
		// 	$model->attributes=$_POST['User'];
		// 	// $new_password = $_POST['User']['NEW_PASSWORD'];
		// 	// $repeat_password = $_POST['User']['REPEAT_PASSWORD'];
		// 	if ($model->validate()) {
		// 		// if ($model->cekPassword($new_password,$repeat_password)) {
		// 			// $model->setAttribute('PASSWORD',$_POST['User']['NEW_PASSWORD']);
		// 			if ($model->save()) {
	 //                    Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Perubahan data telah berhasil disimpan.'));
		// 				$this->redirect(array('index'));
	 //                }
	 //                // else
	 //                    // Yii::app()->user->setFlash('info', MyFormatter::alertError('<strong>Error!</strong> Password gagal diubah.'));
		// 		}
		// 		// else {
  //                   // Yii::app()->user->setFlash('info', MyFormatter::alertError('<strong>Error!</strong> Password tidak cocok.'));
  //               // }
		// 	// }
		// 	// if($model->save()) {
		// 	// 	Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Perubahan data telah berhasil disimpan.'));
		// 	// 	$this->redirect(array('index','id'=>$model->ID_USER));
		// 	// }
		// }

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			//$model->STATUS = 1;
			if($model->save()) {
				Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Perubahan data telah berhasil disimpan.'));
				$this->redirect(array('index'));
			}
		}
		
		$this->render('index',array('model'=>$model));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}