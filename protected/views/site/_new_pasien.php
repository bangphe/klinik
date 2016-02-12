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
    <div class="form-group">
        <?php echo $form->labelEx($pelanggan_baru,'ID_LAYANAN',array('class'=>'control-label col-md-3')); ?>
        <div class="col-md-8">
            <?php echo $form->dropDownList($pelanggan_baru,'ID_LAYANAN', Layanan::listLayanan(),
                array(
                'class'=>'form-control',
                'prompt'=>'- Pilih Layanan -'
            )); ?>
            <?php echo $form->error($pelanggan_baru,'ID_LAYANAN'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($pelanggan_baru,'NAMA_PASIEN',array('class'=>'control-label col-md-3')); ?>
        <div class="col-md-8">
            <?php echo $form->textField($pelanggan_baru,'NAMA_PASIEN',array('size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>'Nama Pasien', 'data-required'=>'1')); ?>
            <?php echo $form->error($pelanggan_baru,'NAMA_PASIEN'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($pelanggan_baru,'ALAMAT',array('class'=>'control-label col-md-3')); ?>
        <div class="col-md-8">
            <?php echo $form->textField($pelanggan_baru,'ALAMAT',array('size'=>60,'maxlength'=>200,'class'=>'form-control','placeholder'=>'Alamat')); ?>
            <?php echo $form->error($pelanggan_baru,'ALAMAT'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($pelanggan_baru,'NO_TELP',array('class'=>'control-label col-md-3')); ?>
        <div class="col-md-8">
            <?php echo $form->textField($pelanggan_baru,'NO_TELP',array('size'=>15,'maxlength'=>15,'class'=>'form-control','placeholder'=>'Nomor Telpon')); ?>
            <?php echo $form->error($pelanggan_baru,'NO_TELP'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($pelanggan_baru, 'JENIS_KELAMIN', array('class' => 'control-label col-md-3')); ?>
        <div class="col-md-8">
            <div class="radio-list">
                <?php
                echo $form->radioButtonList($pelanggan_baru, 'JENIS_KELAMIN', array('L'=>'Pria', 'P'=>'Wanita'), array(
                    'class'=>'form-control input-large',
                    'labelOptions'=>array('style'=>'display:inline'),
                    'template'=>'{input} {label}',
                ));
                ?>
            </div>
            <?php echo $form->error($pelanggan_baru, 'JENIS_KELAMIN'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($pelanggan_baru,'KETERANGAN',array('class'=>'control-label col-md-3')); ?>
        <div class="col-md-8">
            <?php echo $form->textArea($pelanggan_baru,'KETERANGAN',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Keterangan Tambahan')); ?>
            <?php echo $form->error($pelanggan_baru,'KETERANGAN'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($pelanggan_baru,'BIAYA_REGISTRASI',array('class'=>'control-label col-md-3')); ?>
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <?php echo $form->textField($pelanggan_baru,'BIAYA_REGISTRASI',array('size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>'Biaya Registrasi','value'=>'5000','disabled'=>TRUE)); ?>
                <?php echo $form->error($pelanggan_baru,'BIAYA_REGISTRASI'); ?>
            </div>
        </div>
    </div>
</div>

<div class="form-actions fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <?php echo CHtml::submitButton('Simpan', array('class' => 'btn blue')); ?>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>