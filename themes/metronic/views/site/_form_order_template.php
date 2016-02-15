<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survei-form-template',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

	<div id="form-order-template">
        <div class="well">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3">Nama</label>
                    <div class="col-md-9">
                        <?php //echo $form->textField($orderbaru->orderdetail,'[0]ITEM',array('maxlength'=>100,'class'=>'form-control nama','placeholder'=>'Cari disini..')); ?>
                        <?php //echo $form->hiddenField($orderbaru->orderdetail,'[0]ID_ITEM',array('type'=>'hidden','value'=>'')); ?>
                        <?php echo $form->dropDownList($orderbaru->orderdetail, '[0]ID_ITEM', array(''), array('class' => 'form-control asd', 'prompt' => '-- Pilih Item --')); ?>
                        <span class="help-block"> Ketikkan nama item </span>
                    </div>
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($orderbaru->orderdetail,'[0]JUMLAH',array('class'=>'control-label col-md-3')); ?>
                    <div class="col-md-9">
                        <?php echo $form->numberField($orderbaru->orderdetail,'[0]JUMLAH',array(
                            'class' => 'form-control input-xsmall',
                            'min' => 0,
                            //'max' => Item::getTotalStok($item->ID_ITEM),
                            'placeholder' => '0',
                        ));?>
                    </div>
                </div>
            </div>
            <!--/span-->
        </div>
        </div>
        
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->