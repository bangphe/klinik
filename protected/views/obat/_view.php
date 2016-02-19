<?php $jumlah_stok = Item::getTotalStok($data->ID_ITEM); ?>

<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::encode($data->NAMA_ITEM); ?></td>
    <td><?php echo CHtml::encode($data->golongan->NAMA_GOLONGAN); ?></td>
    <td><?php echo CHtml::encode(MyFormatter::formatUang($data->HARGA_JUAL)); ?></td>
    <td><?php echo $jumlah_stok!=NULL ? MyFormatter::stokBarang($jumlah_stok) : '<span class="label label-warning">HABIS</span>'; ?></td>
    <td><?php echo MyFormatter::formatTanggal($data->TANGGAL_EXPIRED); ?></td>
    <td><?php echo MyFormatter::statusAktif($data->STATUS); ?></td>
</tr>