<?php
/* @var $this SupplierController */
/* @var $data Supplier */
?>

<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link(CHtml::encode($data->NAMA_SUPPLIER), array('view','id'=>$data->ID_SUPPLIER), array('title'=>'Detil')); ?></td>
    <td><?php echo CHtml::encode($data->ALAMAT_SUPPLIER); ?></td>
    <td><?php echo CHtml::encode($data->NO_TELP_SUPPLIER); ?></td>
    <td width="12%">
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i> Hapus',array('delete','id'=>$data->ID_SUPPLIER),array('class'=>'btn btn-sm red filter-cancel','submit'=>array('delete','id'=>$data->ID_SUPPLIER),'confirm'=>'Apakah Anda yakin akan menghapus '.$data->NAMA_SUPPLIER.'?')); ?>
    </td>
</tr>