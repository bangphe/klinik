<?php
/* @var $this BarangController */
/* @var $model Barang */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('edit', "
$('.edit-barang').click(function(){
	$('.edit-form').toggle();
	return false;
});
");

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stok-form',
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
		'enctype' => 'multipart/form-data',
	),
	'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnChange' => false,
        'validateOnSubmit' => true
    ),
)); ?>

	<p class="note note-warning">Isian dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($detil_item);?>

	<div class="form-group">
		<?php echo $form->labelEx($item,'NAMA_ITEM',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->textArea($item,'NAMA_ITEM',array('maxlength'=>100,'class'=>'form-control input-large','disabled'=>true)); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($detil_item,'ID_SUPPLIER',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->dropDownList($detil_item,'ID_SUPPLIER', Supplier::optionSupplier(),
				array(
				'class'=>'form-control input-large',
				'prompt'=>'- Pilih Supplier -'
			)); ?>
			<?php echo $form->error($detil_item,'ID_SUPPLIER'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($detil_item,'STOK',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->numberField($detil_item,'STOK',array(
                'class' => 'form-control input-large',
                'min' => 0,
                'placeholder' => 'Stok barang contoh: 10',
            ));?>
			<?php echo $form->error($detil_item,'STOK'); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($detil_item,'HARGA_BELI',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
            <div class="input-inline input-large">
				<div class="input-group">
					<span class="input-group-addon">Rp</span>
					<?php echo $form->textField($detil_item, 'HARGA_BELI', array('class'=>'form-control', 'placeholder'=>'Harga beli barang contoh: 10000')); ?>
				</div>
			</div>
			<?php echo $form->error($detil_item,'HARGA_BELI'); ?>
		</div>
	</div>

	<div class="form-actions fluid">
		<div class="col-md-offset-3 col-md-9">
			<button type="submit" class="btn green">
				<i class="fa fa-check"></i> Simpan
			</button>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->