<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link(CHtml::encode('Invoice #'.$data->KODE_ORDER.' - '.$data->pasien->NAMA_PASIEN), array('view','id'=>$data->KODE_ORDER), array('title'=>'Detil Order')); ?></td>
    <td><?php echo MyFormatter::formatTanggalWaktu($data->TANGGAL_ORDER);?></td>
    <td><?php echo '<span class="label label-sm label-info">'.OrderDetail::getJumlahItem($data->KODE_ORDER).'</span>';?></td>
    <td><?php echo MyFormatter::formatUang($data->getSubtotal()); ?></td>
</tr>