<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Manajemen Order',
);
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="app-ticket app-ticket-list">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Daftar Order</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <?= CHtml::link('<span class="fa fa-plus"></span> Tambah Data', array('/admin/order/create'), array('class' => 'btn sbold green')); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover order-column" id="tabelku">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Kode Order - Nama Pasien </th>
                                <th> Tanggal Order </th>
                                <th> Jumlah Item </th>
                                <th> Total Harga </th>
                                <th> Pilihan </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $this->widget('zii.widgets.CListView', array(
                                'dataProvider'=>$dataProvider,
                                'itemView'=>'_view',
                                'summaryText'=>'',
                                'emptyText'=>'',
                            )); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>