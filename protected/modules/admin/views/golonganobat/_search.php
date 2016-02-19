<?php
/* @var $this GolonganObatController */
/* @var $model GolonganObat */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_GOLONGAN_OBAT'); ?>
		<?php echo $form->textField($model,'ID_GOLONGAN_OBAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_GOLONGAN'); ?>
		<?php echo $form->textField($model,'NAMA_GOLONGAN',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->