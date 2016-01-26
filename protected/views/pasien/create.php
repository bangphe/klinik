<?php
/* @var $this PasienController */
/* @var $model Pasien */
$this->pageTitle = "Tambah Pelanggan";
$this->breadcrumbs = array(
    'Manajemen Pasien' => array('index'),
    '#' . $model->NAMA_PASIEN,
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
      
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        <!-- END FORM-->
    </div>
</div>