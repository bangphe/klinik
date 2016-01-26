<?php
/* @var $this OrderController */
/* @var $data Order */
?>
<div class="col-md-12 col-sm-12">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Data Order </div>
            <div class="actions">
                <a href="order/create" class="btn btn-default btn-sm">
                    <i class="fa fa-plus"></i> Tambah Order </a>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_3">
                <thead>
                    <tr>
                        <th> Kode Order </th>
                        <th> Id Pasien </th>
                        <th> Tanggal Order </th>
                        <th> User Pembuat </th>
                        <th> Pembayaran </th>
                        <th> Kembalian </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td>
                        	<?php echo CHtml::link(CHtml::encode($data->KODE_ORDER), array('view', 'id'=>$data->KODE_ORDER)); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->ID_PASIEN); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->TANGGAL_ORDER); ?> 
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->USER_PEMBUAT); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->PEMBAYARAN); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->KEMBALIAN); ?> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>