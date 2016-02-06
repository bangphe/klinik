<?php

class RekapController extends Controller
{
	public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index'),
                'users'=>array('@'),
                'expression'=> '!Yii::app()->user->isGuest && Yii::app()->user->role == 1',
                ),
            array('deny', // deny all users
                'users' => array('*'),
                ),
            );
    }

	public function actionIndex()
	{
		$model = new FormRekap;

        if(isset($_POST['FormRekap'])) {
            $model->attributes = $_POST['FormRekap'];
            $datestart = date('Y-m-d', strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));
            $dateend = date('Y-m-t',strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));

            $criteria = new CDbCriteria;
            $criteria->addBetweenCondition('TANGGAL_ORDER', $datestart, $dateend);
            $order = Order::model()->findAll($criteria);

            if($order != null) {
                $filename = 'REKAP_'.$model->BULAN.'-'.$model->TAHUN;
                header("Cache-Control: no-cache, no-store, must-revalidate");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=" . $filename . ".xls");

                $this->renderPartial('_rekap_bulanan',array(
                    'order' => $order,
                    'model' => $model
                ));

                exit();
            }

            else {
                Yii::app()->user->setFlash('info', MyFormatter::alertError('Rekap belum tersedia untuk bulan tersebut.'));
            }
        }
        
        $this->render('index', array(
            'model' => $model,
        ));
	}

	public function actionPenjualanLensa()
	{
		$item = Item::getPenjualanItem(Item::KATEGORI_LENSA);
		// var_dump($item);
		// die();
        $filename = 'REKAP PENJUALAN LENSA';
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename . ".xls");

        $this->renderPartial('_rekap_lensa',array(
            'item' => $item,
        ));

        exit();
	}

	public function actionPenjualanObat()
	{
		$item = Item::getPenjualanItem(Item::KATEGORI_OBAT);
		// var_dump($item);
		// die();
        $filename = 'REKAP PENJUALAN OBAT';
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename . ".xls");

        $this->renderPartial('_rekap_obat',array(
            'item' => $item,
        ));

        exit();
	}

    public function actionPenjualanGagang()
    {
        $item = Item::getPenjualanItem(Item::KATEGORI_GAGANG);
        // var_dump($item);
        // die();
        $filename = 'REKAP PENJUALAN GAGANG';
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename . ".xls");

        $this->renderPartial('_rekap_gagang',array(
            'item' => $item,
        ));

        exit();
    }
}