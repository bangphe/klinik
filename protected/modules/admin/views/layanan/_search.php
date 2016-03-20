<?php
/* @var $this LayananController */
/* @var $model Layanan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_LAYANAN'); ?>
		<?php echo $form->textField($model,'ID_LAYANAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LAYANAN'); ?>
		<?php echo $form->textField($model,'LAYANAN',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIAYA'); ?>
		<?php echo $form->textField($model,'BIAYA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->