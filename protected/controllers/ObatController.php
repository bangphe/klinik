<?php

class ObatController extends Controller
{
	public $layout = '//layouts/kasir';

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Item',array(
			'criteria'=>array(
                'condition'=>'ID_KATEGORI=:kategori',
                'params'=>array(':kategori'=>Item::KATEGORI_OBAT)
            ),
			'pagination'=>false,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}