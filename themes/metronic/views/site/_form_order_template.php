<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survei-form-template',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

    <div id="newoptions_template">
        <div id="options_template_template">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama</label>
                        <div class="col-md-9">
                            <?php echo $form->dropDownList($orderbaru->orderdetail, '[0]ID_ITEM', Item::listItemPerKategori(Item::KATEGORI_OBAT), array('class' => 'form-control form-select', 'prompt' => '-- Pilih Item --')); ?>
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