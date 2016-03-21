<?php
$this->pageTitle = 'Rekap Penjualan';
$this->breadcrumbs = array(
    'Laporan'=>array('#'),
    'Rekap Penjualan'
);
?>

<div class="row ">
    <div class="col-md-12">
        <?php echo Yii::app()->user->getFlash('info') ?>
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bg-inverse">
            <div class="portlet-title">
                <div class="caption font-green-sharp">
                    <i class="icon-share font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Rekap Laporan</span>
                </div>
                <div class="actions">
                    <?php echo CHtml::link('<i class="fa fa-print"></i> Rekap Stok Harian', array('/admin/rekap/stokharian'),array('class' => 'btn blue-hoki')) ?>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'rekap-form',
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'BULAN', array('class' => 'control-label')); ?>
                                <?php echo $form->dropDownList($model, 'BULAN', $model->listBulan(), array('class' => 'form-control', 'prompt' => '- Pilih Bulan -')); ?>
                                <?php echo $form->error($model,'BULAN'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'TAHUN', array('class' => 'control-label')); ?>
                                <?php echo $form->dropDownList($model, 'TAHUN', $model->listTahun(), array('class' => 'form-control', 'prompt' => '- Pilih Tahun -')); ?>
                                <?php echo $form->error($model,'TAHUN'); ?>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                    <small><span class="required">*</span>) wajib diisi</small>
                </div>
                <div class="form-actions" style="text-align:center;">
                    <button type="submit" class="btn green" title="Unduh laporan"><i class="fa fa-search"></i> Unduh Laporan</button>
                </div>

                <?php $this->endWidget(); ?>

                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>