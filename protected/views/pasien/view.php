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
							'NAMA_PASIEN',
							'ALAMAT',
							'NO_TELP',
							array(
                                'name'=>'Jenis Kelamin',
                                'type'=>'jk',
                                'value'=>$model->JENIS_KELAMIN,
                            ),
							'KETERANGAN',
                            array(
                                'name'=>'TANGGAL_REGISTRASI',
                                'type'=>'tanggalWaktu',
                                'value'=>$model->TANGGAL_REGISTRASI,
                            ),
						),
					)); ?>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
