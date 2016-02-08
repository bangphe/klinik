<?php
$form = $this->beginWidget('CActiveForm', array(
        'id' => 'pasien-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'class'=>'form-horizontal',
        ),
    ));
?>

<div class="form-body">
    <h3 class="form-section">Tambah Pasien</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($pelanggan_baru, 'NAMA_PASIEN', array('class' => 'control-label col-md-3')); ?>
                <div class="col-md-9">
                    <?php echo $form->textField($pelanggan_baru, 'NAMA_PASIEN', array('class' => 'form-control')); ?>
                    <?php echo $form->error($pelanggan_baru,'NAMA_PASIEN'); ?>
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">Pelayanan</label>
                <div class="col-md-9">
                    <?php echo $form->dropDownList($pelanggan_baru,'ID_LAYANAN', Layanan::listLayanan(),
                        array(
                        'class'=>'form-control',
                        'prompt'=>'- Pilih Layanan -'
                    )); ?>
                    <?php echo $form->error($pelanggan_baru,'ID_LAYANAN'); ?>
                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($pelanggan_baru, 'NO_TELP', array('class' => 'control-label col-md-3')); ?>
                <div class="col-md-9">
                    <?php echo $form->textField($pelanggan_baru, 'NO_TELP', array('class' => 'form-control')); ?>
                    <?php echo $form->error($pelanggan_baru,'NO_TELP'); ?>
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($pelanggan_baru, 'ALAMAT', array('class' => 'control-label col-md-3')); ?>
                <div class="col-md-9">
                    <?php echo $form->textArea($pelanggan_baru, 'ALAMAT', array('class' => 'form-control')); ?>
                    <?php echo $form->error($pelanggan_baru,'ALAMAT'); ?>
                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($pelanggan_baru, 'JENIS_KELAMIN', array('class' => 'control-label col-md-3')); ?>
                <div class="col-md-9">
                    <div class="radio-list">
                        <?php
                        echo $form->radioButtonList($pelanggan_baru, 'JENIS_KELAMIN', array('L'=>'Laki-laki', 'P'=>'Perempuan'), array(
                            'class'=>'form-control input-large',
                            'labelOptions'=>array('style'=>'display:inline'),
                            'template'=>'{input} {label}',
                        ));
                        ?>
                        <?php echo $form->error($pelanggan_baru,'JENIS_KELAMIN'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($pelanggan_baru, 'BIAYA_REGISTRASI', array('class' => 'control-label col-md-3')); ?>
                <div class="col-md-9">
                    <?php echo $form->textField($pelanggan_baru, 'BIAYA_REGISTRASI', array('class' => 'form-control', 'value'=>5000, 'readonly'=>TRUE)); ?>
                </div>
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