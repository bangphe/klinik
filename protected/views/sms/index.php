<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle = 'Manajemen SMS';
$this->breadcrumbs = array(
    'Manajemen SMS'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pelanggan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-envelope"></i>Data SMS
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'sms-grid',
                    'dataProvider' => $model->search(),
                    //styling pagination
                    'pager' => array(
                        'header' => '',
                        'selectedPageCssClass' => 'paginate_button active',
                        'hiddenPageCssClass' => 'paginate_button disabled',
                        'htmlOptions' => array('class' => 'pagination'),
                    ),
                    'pagerCssClass' => 'pagination',
                    'summaryText' => 'Menampilkan {start} - {end} dari {count} data SMS',
                    'emptyText' => '<div class="alert alert-error">Tidak ada data SMS ditampilkan</div>',
                    'showTableOnEmpty' => false,
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content',
                    'columns' => array(
                        array(
                            'header' => 'Nomor',
                            'type' => 'raw',
                            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)'
                        ),
                        array(
                        	'header' => 'Tanggal',
                        	'value' => 'MyFormatter::formatTanggalWaktu($data->TANGGAL_KIRIM)',
                        ),
                        array(
                        	'header' => 'Pelanggan',
                        	'type' => 'raw',
                        	'value' => 'Pelanggan::model()->siapaAku($data->ID_PELANGGAN)',
                        ),
                        'TUJUAN',
                        'PESAN',
                        array(
                        	'header' => 'Status',
                        	'type' => 'raw',
                        	'value' => 'MyFormatter::formatStatusBerhasil($data->STATUS)',
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>
