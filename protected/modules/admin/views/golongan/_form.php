<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'golongan-form',
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
            <?php echo $form->labelEx($model,'NAMA_GOLONGAN',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model,'NAMA_GOLONGAN',array('maxlength'=>100,'class'=>'form-control','placeholder'=>'Nama Golongan Obat')); ?>
				<?php echo $form->error($model,'NAMA_GOLONGAN'); ?>
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