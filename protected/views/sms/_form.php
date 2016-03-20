<div class="row">
    <div class="col-md-8">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-envelope"></i>Form Kirim SMS Manual
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'sms-logs-form',
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

                echo @Yii::app()->user->getFlash('info');
                ?>

                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'TUJUAN', array('class' => 'control-label')); ?>
                                <?php echo $form->textArea($model, 'TUJUAN', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'TUJUAN'); ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <?php 
                                if($model->PESAN == SmsLog::NAMAPERUSAHAAN || $model->PESAN == "") {
                                    $model->PESAN = SmsLog::NAMAPERUSAHAAN." \n";
                                }
                                ?>
                                <?php echo $form->labelEx($model, 'PESAN', array('class' => 'control-label')); ?>
                                <?php echo $form->textArea($model, 'PESAN', array('class' => 'form-control', 'maxlength' => '160')); ?>
                                <?php echo $form->error($model,'PESAN'); ?>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                    <small><span class="required">*</span>) wajib diisi</small><br>
                    <small><span class="required">*</span>) Penulisan Nomor Tujuan lebih dari satu dikasih tanda Koma ( <strong>,</strong> )</small><br>
                    <small><span class="required">*</span>) Jumlah karakter Pesan adalah 160</small>
                </div>
                <div class="form-actions center">
                    <?php echo CHtml::submitButton('Kirim SMS', array('class' => 'btn red')); ?>
                </div>

                <?php $this->endWidget(); ?>

                <!-- END FORM-->
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-info"></i>Informasi
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <table class="table table-bordered table-striped">
                	<tbody>
                		<tr class="even">
                			<th>SMS Sukses</th>
                			<td><?=$smsBerhasil;?></td>
                		</tr>
                		<tr class="even">
                			<th>SMS Gagal</th>
                			<td><?=$smsGagal;?></td>
                		</tr>
                		<tr class="odd">
                			<th>Total SMS Terkirim</th>
                			<td><?=$smsTotal;?></td>
                		</tr>
                		<tr class="even">
                			<th>Sisa Kuota SMS</th>
                			<td><?=$smsKuota;?></td>
                		</tr>
                	</tbody>
                </table>
            </div>
        </div>
    </div>
</div>