<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
	),
	'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnChange' => false,
        'validateOnSubmit' => true
    ),
)); ?>

	<p class="note note-warning">Isian dengan tanda <span class="required">*</span> harus diisi.</p>

	<h4 class="form-section"><i class="fa fa-download"></i> Detil Barang</h4>
	<div class="form-group">
		<?php echo $form->labelEx($item,'NAMA_ITEM',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->textArea($item,'NAMA_ITEM',array('maxlength'=>100,'class'=>'form-control input-large')); ?>
			<?php echo $form->error($item,'NAMA_ITEM'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($item,'ID_KATEGORI',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->dropDownList($item,'ID_KATEGORI', Kategori::listAll(),
				array(
				'class'=>'bs-select form-control input-large',
				'prompt'=>'- Pilih Kategori -'
			)); ?>
			<?php echo $form->error($item,'ID_KATEGORI'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($item,'HARGA_JUAL',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
            <div class="input-inline input-large">
				<div class="input-group">
					<span class="input-group-addon">Rp</span>
					<?php echo $form->textField($item, 'HARGA_JUAL', array('class'=>'form-control', 'placeholder'=>'Harga jual barang contoh: 10000')); ?>
				</div>
			</div>
			<?php echo $form->error($item,'HARGA_JUAL'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($item,'TANGGAL_EXPIRED',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
            <div class="input-inline input-large">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<?php echo $form->textField($item, 'TANGGAL_EXPIRED', array('class'=>'form-control date-picker', 'data-date-format'=>'yyyy-mm-dd', 'placeholder'=>'Tanggal Expired')); ?>
				</div>
			</div>
			<?php echo $form->error($item,'TANGGAL_EXPIRED'); ?>
		</div>
	</div>

	<div class="form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button type="submit" class="btn green">
				<i class="fa fa-check"></i> <?php echo $item->isNewRecord ? 'Simpan' : 'Simpan Perubahan'; ?>
			</button>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->