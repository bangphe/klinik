<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	'Create',
);
?>

<!-- <h1>Create Pasien</h1> -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-users font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">Tambah Data Pasien</span>
            <!-- <span class="caption-helper">form actions on top...</span> -->
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-cloud-upload"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-wrench"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-trash"></i>
            </a>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        <!-- END FORM-->
    </div>
</div>