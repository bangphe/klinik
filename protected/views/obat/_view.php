<?php $jumlah_stok = Item::getTotalStok($data->ID_ITEM); ?>

<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::encode($data->NAMA_ITEM); ?></td>
    <td><?php echo CHtml::encode($data->SATUAN); ?></td>
    <td><?php echo CHtml::encode($data->golongan->NAMA_GOLONGAN); ?></td>
    <td><?php echo CHtml::encode(MyFormatter::formatUang($data->HARGA_JUAL)); ?></td>
    <td><?php echo $jumlah_stok==NULL || $jumlah_stok=='' || $jumlah_stok==0 ? '<span class="label label-info"> <b>HABIS</b></span>' : MyFormatter::stokBarang($jumlah_stok); ?></td>
    <td><?php echo MyFormatter::formatTanggal($data->TANGGAL_EXPIRED); ?></td>
    <!-- <td><?php echo MyFormatter::statusAktif($data->STATUS); ?></td> -->
</tr>