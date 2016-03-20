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
            $criteria->condition = "RESEP = :resep AND ID_LAYANAN != '5'";
            $criteria->params = array(':resep' => Order::RESEP_DOKTER);
            $order = Order::model()->findAll($criteria);

            if($order != null) {
                $filename = 'REKAP TRANSAKSI_'.strtoupper(MyFormatter::formatBulan($model->BULAN)).'_'.$model->TAHUN;
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

    public function actionBpjs()
    {
        $model = new FormRekap;

        if(isset($_POST['FormRekap'])) {
            $model->attributes = $_POST['FormRekap'];
            $datestart = date('Y-m-d', strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));
            $dateend = date('Y-m-t',strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));

            $criteria = new CDbCriteria;
            $criteria->addBetweenCondition('TANGGAL_ORDER', $datestart, $dateend);
            $criteria->condition = 'ID_LAYANAN=5';
            $order = Order::model()->findAll($criteria);
            // var_dump($order); die();
            if($order != null) {
                $filename = 'REKAP BPJS_'.strtoupper(MyFormatter::formatBulan($model->BULAN)).'_'.$model->TAHUN;
                header("Cache-Control: no-cache, no-store, must-revalidate");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=" . $filename . ".xls");

                $this->renderPartial('bpjs/_rekap_bpjs',array(
                    'order' => $order,
                    'model' => $model
                ));

                exit();
            }

            else {
                Yii::app()->user->setFlash('info', MyFormatter::alertError('Rekap belum tersedia untuk bulan tersebut.'));
            }
        }
        
        $this->render('bpjs/index', array(
            'model' => $model,
        ));
    }

    public function actionStokHarian()
    {
        //$barang = Barang::getBarang();
        $criteria = new CDbCriteria;
        //$criteria->addBetweenCondition('TGL_ORDER', date('Y-m-01',strtotime('this month')), date('Y-m-t',strtotime('this month')));
        $criteria->condition = 'date(TANGGAL_ORDER) = date(NOW())';
        $order = Order::model()->findAll($criteria);
        $total = 0;
        foreach ($order as $k) { $total += $k->TOTAL; }

        $filename = 'REKAP STOK HARIAN - '.MyFormatter::formatTanggal(date('Y-m-d'));
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename . ".xls");

        $this->renderPartial('_rekap_harian',array(
            'order' => $order,
        ));

        exit();
    }

    public function actionLensa()
    {
        $model = new FormRekap;

        if(isset($_POST['FormRekap'])) {
            $model->attributes = $_POST['FormRekap'];
            $datestart = date('Y-m-d', strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));
            $dateend = date('Y-m-t',strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));

            $criteria = new CDbCriteria;
            $criteria->addBetweenCondition('TANGGAL_ORDER', $datestart, $dateend);
            $criteria->condition = 'ID_KATEGORI='.Item::KATEGORI_LENSA;
            $item = Item::model()->findAll($criteria);
            //var_dump($model->BULAN); die();
            if($item != null) {
                $filename = 'REKAP_'.$model->BULAN.'-'.$model->TAHUN;
                header("Cache-Control: no-cache, no-store, must-revalidate");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=" . $filename . ".xls");

                $this->renderPartial('lensa/_rekap_lensa_bulanan',array(
                    'item'=>$item,
                    'bulan'=>$model->BULAN,
                ));

                exit();
            }

            else {
                Yii::app()->user->setFlash('info', MyFormatter::alertError('Rekap belum tersedia untuk bulan tersebut.'));
            }
        }
        
        $this->render('lensa/index', array(
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

        $this->renderPartial('lensa/_rekap_lensa',array(
            'item' => $item,
        ));

        exit();
	}

    public function actionObat()
    {
        $model = new FormRekap;

        if(isset($_POST['FormRekap'])) {
            $model->attributes = $_POST['FormRekap'];
            $datestart = date('Y-m-d', strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));
            $dateend = date('Y-m-t',strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));

            $criteria = new CDbCriteria;
            $criteria->addBetweenCondition('TANGGAL_ORDER', $datestart, $dateend);
            $criteria->condition = 'ID_KATEGORI='.Item::KATEGORI_OBAT;
            $order = Item::model()->findAll($criteria);
            // var_dump($order); die();
            if($order != null) {
                $filename = 'REKAP_'.$model->BULAN.'-'.$model->TAHUN;
                header("Cache-Control: no-cache, no-store, must-revalidate");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=" . $filename . ".xls");

                $this->renderPartial('obat/_rekap_obat',array(
                    'order' => $order,
                    'model' => $model
                ));

                exit();
            }

            else {
                Yii::app()->user->setFlash('info', MyFormatter::alertError('Rekap belum tersedia untuk bulan tersebut.'));
            }
        }
        
        $this->render('obat/index', array(
            'model' => $model,
        ));
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

        $this->renderPartial('obat/_rekap_obat',array(
            'item' => $item,
        ));

        exit();
	}

    public function actionGagang()
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
        
        $this->render('gagang/index', array(
            'model' => $model,
        ));
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

        $this->renderPartial('gagang/_rekap_gagang',array(
            'item' => $item,
        ));

        exit();
    }
}