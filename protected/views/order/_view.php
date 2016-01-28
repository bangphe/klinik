<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link(CHtml::encode('Invoice #'.$data->KODE_ORDER.' - '.$data->pasien->NAMA_PASIEN), array('view','id'=>$data->KODE_ORDER), array('title'=>'Detil Order')); ?></td>
    <td><?php echo MyFormatter::formatTanggalWaktu($data->TANGGAL_ORDER);?></td>
    <td><?php echo OrderDetail::getJumlahItem($data->KODE_ORDER); ?></td>
    <td><?php echo MyFormatter::formatUang($data->getSubtotal()); ?></td>
    <td width="8%">
        <?php //echo CHtml::link('<i class="fa fa-pencil"></i> Ubah',array('/order/update/','id'=>$data->KODE_ORDER),array('class'=>'btn btn-sm default btn-editable')); ?>
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i> Hapus',array('/order/hapus/','id'=>$data->KODE_ORDER),array('class'=>'btn btn-sm red filter-cancel','submit'=>array('hapus','id'=>$data->KODE_ORDER),'confirm'=>'Apakah Anda yakin akan menghapus Invoice #'.$data->KODE_ORDER.'?')); ?>
    </td>
</tr>