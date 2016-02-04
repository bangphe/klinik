<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
        $criteria->addBetweenCondition('TANGGAL_ORDER', date('Y-m-01',strtotime('this month')), date('Y-m-t',strtotime('this month')));
        $kredit = Order::model()->findAll($criteria);
        $total = 0;
        foreach ($kredit as $k) { $total += $k->TOTAL; }
        
        $order_c = Order::model()->count();
        
        $pelanggan_c = Pasien::model()->count();
        
        $criteria2 = new CDbCriteria;
        $criteria2->condition = 'date(TANGGAL_ORDER) = date(NOW())';
        $hariini = Order::model()->count($criteria2);

        $expired = Item::getExpired();
		$this->render('index', array(
			'total' => $total,
            'order' => $order_c,
            'pelanggan' => $pelanggan_c,
            'hariini' => $hariini,
            'expired' => $expired,
		));
	}
}