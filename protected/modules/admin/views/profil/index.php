<?php
/* @var $this ProfilController */

$this->breadcrumbs=array(
	'Profil',
);
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?= Yii::app()->theme->baseUrl?>/assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> <?= $model->NAMA; ?> </div>
                    <div class="profile-usertitle-job"> <?= $model->role->ROLE; ?> </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Akun Profil</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Data Akun</a>
                                </li>
                                <!-- <li>
                                    <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'user-form',
										'enableAjaxValidation'=>false,
										'htmlOptions'=>array('class'=>'form-horizontal'),
									)); ?>
                                        <div class="form-group">
                                        	<?php echo $form->labelEx($model,'NAMA',array('class'=>'control-label')); ?>
                                            <?php echo $form->textField($model,'NAMA',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
											<?php echo $form->error($model,'NAMA'); ?>
                                        </div>
                                        <div class="form-group">
                                        	<?php echo $form->labelEx($model,'USERNAME',array('class'=>'control-label')); ?>
                                            <?php echo $form->textField($model,'USERNAME',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
											<?php echo $form->error($model,'USERNAME'); ?>
                                        </div>
                                        <div class="form-group">
                                        	<?php echo $form->labelEx($model,'PASSWORD',array('class'=>'control-label')); ?>
                                            <?php echo $form->passwordField($model,'PASSWORD',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
											<?php echo $form->error($model,'PASSWORD'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'Role', array('class' => 'control-label')); ?>
			                                <?php echo $form->dropDownList($model, 'ID_ROLE', array('1' => 'Admin', '2' => 'Kasir'), array('class' => 'form-control', 'prompt' => '-- Pilih Role --')); ?>
			                                <?php echo $form->error($model,'ID_ROLE'); ?>
                                        </div>
                                        <div class="margiv-top-10">
                                            <button type="submit" class="btn green"><?php echo $model->isNewRecord ? 'Simpan' : 'Simpan Perubahan'; ?></button>
                                        </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <!-- <div class="tab-pane" id="tab_1_2">
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. </p>
                                    <form action="#" role="form">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="..."> </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                <span class="label label-danger">NOTE! </span>
                                                <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn green"><?php echo $model->isNewRecord ? 'Simpan' : 'Simpan Perubahan'; ?></button>
                                        </div>
                                    </form>
                                </div> -->
                                <!-- END CHANGE AVATAR TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>