<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_ITEM'); ?>
		<?php echo $form->textField($model,'ID_ITEM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_KATEGORI'); ?>
		<?php echo $form->textField($model,'ID_KATEGORI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_ITEM'); ?>
		<?php echo $form->textField($model,'NAMA_ITEM',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UKURAN'); ?>
		<?php echo $form->textField($model,'UKURAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SATUAN'); ?>
		<?php echo $form->textField($model,'SATUAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HARGA_JUAL'); ?>
		<?php echo $form->textField($model,'HARGA_JUAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_EXPIRED'); ?>
		<?php echo $form->textField($model,'TANGGAL_EXPIRED'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->