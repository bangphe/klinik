<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	$model->ID_PASIEN,
);
?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-tags"></i>Detail Pasien #<?php echo $model->NAMA_PASIEN ?>
                </div>
                <div class="actions">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah', array('create'),array('class' => 'btn btn-primary')) ?>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i> Edit', array('update', 'id' => $model->ID_PASIEN), array('class' => 'btn btn-danger')) ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
					<?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'htmlOptions' => array(
                            'class' => 'table table-bordered table-striped',
                        ),
						'attributes'=>array(
							'ID_PASIEN',
							'ID_LAYANAN',
							'NAMA_PASIEN',
							'ALAMAT',
							'NO_TELP',
							'JENIS_KELAMIN',
							'KETERANGAN',
							'BIAYA_REGISTRASI',
							'TANGGAL_REGISTRASI',
						),
					)); ?>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>