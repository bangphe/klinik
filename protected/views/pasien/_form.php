<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pasien-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->
	<p class="note note-warning">Isian dengan tanda <span class="required">*</span> harus diisi.</p>
	<?php //echo $form->errorSummary($model); ?>

	<div class="form-body">
		<div class="form-group">
			<?php echo $form->labelEx($model,'ID_LAYANAN',array('class'=>'col-md-3 control-label')); ?>
			<div class="col-md-4">
				<?php echo $form->dropDownList($model,'ID_LAYANAN', Layanan::listLayanan(),
					array(
					'class'=>'form-control',
					'prompt'=>'- Pilih Layanan -'
				)); ?>
				<?php echo $form->error($model,'ID_LAYANAN'); ?>
			</div>
		</div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'NAMA_PASIEN',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model,'NAMA_PASIEN',array('size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>'Nama Pasien')); ?>
				<?php echo $form->error($model,'NAMA_PASIEN'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'ALAMAT',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model,'ALAMAT',array('size'=>60,'maxlength'=>200,'class'=>'form-control','placeholder'=>'Alamat')); ?>
				<?php echo $form->error($model,'ALAMAT'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'NO_TELP',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model,'NO_TELP',array('size'=>15,'maxlength'=>15,'class'=>'form-control','placeholder'=>'Nomor Telpon')); ?>
				<?php echo $form->error($model,'NO_TELP'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'JENIS_KELAMIN', array('class' => 'col-md-3 control-label')); ?>
            <div class="col-md-9">
                <div class="radio-list">
                    <?php
                    echo $form->radioButtonList($model, 'JENIS_KELAMIN', array('L'=>'Pria', 'P'=>'Wanita'), array(
                        'class'=>'form-control input-large',
                        'labelOptions'=>array('style'=>'display:inline'),
                        'template'=>'{input} {label}',
                    ));
                    ?>
                </div>
                <?php echo $form->error($model, 'JENIS_KELAMIN'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'KETERANGAN',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textArea($model,'KETERANGAN',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Keterangan Tambahan')); ?>
				<?php echo $form->error($model,'KETERANGAN'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'BIAYA_REGISTRASI',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    <?php echo $form->textField($model,'BIAYA_REGISTRASI',array('size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>'Biaya Registrasi','value'=>'5000','disabled'=>TRUE)); ?>
					<?php echo $form->error($model,'BIAYA_REGISTRASI'); ?>
				</div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-4">
                <button type="submit" class="btn green"><?php echo $model->isNewRecord ? 'Simpan' : 'Simpan Perubahan'; ?></button>
                <button type="button" class="btn default">Batal</button>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->