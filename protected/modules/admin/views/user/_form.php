<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-jungle">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Form User
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'user-form',
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
                                <?php echo $form->labelEx($model, 'USERNAME', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'USERNAME', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'USERNAME'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'Role', array('class' => 'control-label')); ?>
                                <?php echo $form->dropDownList($model, 'ID_ROLE', array('1' => 'Admin', '2' => 'Kasir'), array('class' => 'form-control', 'prompt' => '-- Pilih Role --')); ?>
                                <?php echo $form->error($model,'ID_ROLE'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'NAMA', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'NAMA', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'NAMA'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'PASSWORD', array('class' => 'control-label')); ?>
                                <?php echo $form->passwordField($model, 'PASSWORD', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'PASSWORD'); ?>
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

                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>