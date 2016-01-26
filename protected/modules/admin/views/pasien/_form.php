<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>
<div class="portlet box red col-md-6">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-user"></i> Tambah Pasien </div>
    </div>
    <div class="portlet-body form">
        <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'pasien-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnChange' => false,
                    'validateOnSubmit' => true
                )
            ));
            ?>

            <div class="form-body">
            	<div class="form-group">
                    <label class="col-md-3 control-label">Default Input</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Default Input"> </div>
                </div>
                <div class="form-group">
                	<?php echo $form->labelEx($model, 'ID_LAYANAN', array('class' => 'control-labe col-md-3')); ?>
                    <?php echo $form->textField($model, 'ID_LAYANAN', array('class' => 'form-control ')); ?>
                    <?php echo $form->error($model,'ID_LAYANAN'); ?>
                </div>
            </div>
            <div class="form-actions right1">
                <button type="button" class="btn default">Cancel</button>
                <button type="submit" class="btn green">Submit</button>
            </div>
        </form>
    </div>
</div>
<div class="form">


	<div class="row">
		<?php echo $form->labelEx($model,'ID_LAYANAN'); ?>
		<?php echo $form->textField($model,'ID_LAYANAN'); ?>
		<?php echo $form->error($model,'ID_LAYANAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA_PASIEN'); ?>
		<?php echo $form->textField($model,'NAMA_PASIEN',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NAMA_PASIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ALAMAT'); ?>
		<?php echo $form->textField($model,'ALAMAT',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'ALAMAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NO_TELP'); ?>
		<?php echo $form->textField($model,'NO_TELP',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'NO_TELP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JENIS_KELAMIN'); ?>
		<?php echo $form->textField($model,'JENIS_KELAMIN'); ?>
		<?php echo $form->error($model,'JENIS_KELAMIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KETERANGAN'); ?>
		<?php echo $form->textField($model,'KETERANGAN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'KETERANGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIAYA_REGISTRASI'); ?>
		<?php echo $form->textField($model,'BIAYA_REGISTRASI'); ?>
		<?php echo $form->error($model,'BIAYA_REGISTRASI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_REGISTRASI'); ?>
		<?php echo $form->textField($model,'TANGGAL_REGISTRASI'); ?>
		<?php echo $form->error($model,'TANGGAL_REGISTRASI'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->