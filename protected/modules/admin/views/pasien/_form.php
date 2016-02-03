<?php
/* @var $this SupplierController */
/* @var $model Supplier */
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

	<p class="note note-warning">Isian dengan tanda <span class="required">*</span> harus diisi.</p>

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
                <?php echo $form->textField($model,'NAMA_PASIEN',array('maxlength'=>100,'class'=>'form-control','placeholder'=>'Nama Pasien')); ?>
				<?php echo $form->error($model,'NAMA_PASIEN'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'JENIS_KELAMIN', array('class' => 'col-md-3 control-label')); ?>
            <div class="col-md-9">
                <div class="radio-list">
                    <?php
                    echo $form->radioButtonList($model, 'JENIS_KELAMIN', array('1'=>'Pria', '2'=>'Wanita'), array(
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
            <?php echo $form->labelEx($model,'ALAMAT',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model,'ALAMAT',array('maxlength'=>100,'class'=>'form-control','placeholder'=>'Alamat')); ?>
				<?php echo $form->error($model,'ALAMAT'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'NO_TELP',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model,'NO_TELP',array('maxlength'=>100,'class'=>'form-control','placeholder'=>'Nomor Telpon')); ?>
				<?php echo $form->error($model,'NO_TELP'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'KETERANGAN',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textArea($model,'KETERANGAN',array('maxlength'=>100,'class'=>'form-control','placeholder'=>'Keterangan')); ?>
				<?php echo $form->error($model,'KETERANGAN'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'BIAYA_REGISTRASI',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model,'BIAYA_REGISTRASI',array('maxlength'=>100,'class'=>'form-control','placeholder'=>'5000')); ?>
				<?php echo $form->error($model,'BIAYA_REGISTRASI'); ?>
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