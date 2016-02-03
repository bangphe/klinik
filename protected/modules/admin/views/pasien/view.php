<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Data Pasien'=>array('index'),
	$model->NAMA_PASIEN,
);
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-desktop"></i>Data Pasien #<?php echo $model->NAMA_PASIEN; ?>
		</div>
		<div class="actions">
            <?php echo CHtml::link('<i class="fa fa-pencil"></i> Ubah', array('/admin/pasien/update', 'id' => $model->ID_PASIEN), array('class'=>'btn btn-default btn-sm')) ?>
        </div>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
		 	<?php $this->widget('zii.widgets.CDetailView', array(
		 		'data' => $model,
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
		 		)); 
		 	?>
        </div>
	</div>
</div>


