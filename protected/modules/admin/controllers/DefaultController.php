<?php

class DefaultController extends Controller
{
    public function filters() {
        return array(
            'accessControl',
            'postOnly + delete',
            );
    }
    
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index'),
                'users'=>array('@'),
                //'roles'=>array(WebUser::ROLE_ADMIN),
                'expression'=> '!Yii::app()->user->isGuest && Yii::app()->user->role == 1',
                ),
            array('deny', // deny all users
                'users' => array('*'),
                ),
            );
    }

	public function actionIndex()
	{
        // total semua pemasukan
		$criteria = new CDbCriteria;
        $criteria->addBetweenCondition('TANGGAL_ORDER', date('Y-m-01',strtotime('this month')), date('Y-m-t',strtotime('this month')));
        $kredit = Order::model()->findAll($criteria);
        $total = 0;
        foreach ($kredit as $k) { $total += $k->TOTAL; }
        
        // menghitung total order
        $order_c = Order::model()->count();
        
        // menghitung total pasien
        $pelanggan_c = Pasien::model()->count();
        
        // get data order hari ini
        $criteria2 = new CDbCriteria;
        $criteria2->condition = 'date(TANGGAL_ORDER) = date(NOW())';
        $hariini = Order::model()->count($criteria2);

        // get barang yang tanggal expired
        $expired = Item::getExpired();

        // data obat habis
        $criteria = new CDbCriteria;
        $criteria->order = 'TANGGAL_ORDER DESC';
        $criteria->limit = '5';
        $dataProvider=new CActiveDataProvider('Pasien',array(
            'pagination' => false,
            'criteria' => $criteria,
        ));

		$this->render('index', array(
			'total' => $total,
            'order' => $order_c,
            'pelanggan' => $pelanggan_c,
            'hariini' => $hariini,
            'expired' => $expired,
		));
	}
}