<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pelanggan-form',
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
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->labelEx($pelanggan_baru, 'NAMA_PASIEN', array('class' => 'control-label')); ?>
                <?php echo $form->textField($pelanggan_baru, 'NAMA_PASIEN', array('class' => 'form-control')); ?>
                <?php echo $form->error($pelanggan_baru, 'NAMA_PASIEN'); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->labelEx($pelanggan_baru, 'NO_TELP', array('class' => 'control-label')); ?>
                <?php echo $form->textField($pelanggan_baru, 'NO_TELP', array('class' => 'form-control')); ?>
                <?php echo $form->error($pelanggan_baru, 'NO_TELP'); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->labelEx($pelanggan_baru, 'ALAMAT', array('class' => 'control-label')); ?>
                <?php echo $form->textArea($pelanggan_baru, 'ALAMAT', array('class' => 'form-control')); ?>
                <?php echo $form->error($pelanggan_baru, 'ALAMAT'); ?>
            </div>
        </div>
    </div>
    <!--/row-->
    <small><span class="required">*</span>) wajib diisi</small>
</div>
<div class="form-actions center">
    <?php echo CHtml::submitButton('Simpan', array('class' => 'btn blue')); ?>
</div>

<?php $this->endWidget(); ?>