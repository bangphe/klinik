<?php
/* @var $this PasienController */
/* @var $data Pasien */
?>

<div class="col-md-12 col-sm-12">
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Data Pasien </div>
            <div class="actions">
                <a href="pasien/create" class="btn btn-default btn-sm">
                    <i class="fa fa-plus"></i> Tambah Pasien </a>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_3">
                <thead>
                    <tr>
                        <th> Id Pasien </th>
                        <th> Id Layanan </th>
                        <th> Nama Pasien </th>
                        <th> Alamat </th>
                        <th> No Telp </th>
                        <th> Jenis Kelamin </th>
                        <th> Keterangan </th>
                        <th> Tanggal Registrasi </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td>
                        	<?php echo CHtml::link(CHtml::encode($data->ID_PASIEN), array('view', 'id'=>$data->ID_PASIEN)); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->ID_LAYANAN); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->NAMA_PASIEN); ?> 
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->ALAMAT); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->NO_TELP); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->JENIS_KELAMIN); ?> 
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->KETERANGAN); ?> 
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->TANGGAL_REGISTRASI); ?> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('BIAYA_REGISTRASI')); ?>:</b>
	<?php echo CHtml::encode($data->BIAYA_REGISTRASI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_REGISTRASI')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_REGISTRASI); ?>
	<br />

	*/ ?>

