<?php
/* @var $this ObatController */

$this->breadcrumbs=array(
	'Obat',
);
?>

<div class="app-ticket app-ticket-list">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="fa fa-eyedropper font-blue-madison"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Daftar Obat</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                    </div>
                    <table class="table table-striped table-bordered table-hover order-column" id="tabelku">
                        <thead>
                            <tr>
                                <th> ID # </th>
                                <th> Nama Obat </th>
                                <th> Satuan </th>
                                <th> Golongan </th>
                                <th> Harga Beli </th>
                                <th> Stok </th>
                                <th> Tanggal Expired </th>
                                <!-- <th> Status </th> -->
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