<table border="1">
    <tr>
    <th colspan="7">LAPORAN STOK PENJUALAN LENSA BULAN <?= MyFormatter::formatBulan($bulan); ?></th>
    </tr>
    <tr>
        <th>#</th>
        <th>KODE BARANG</th>
        <th>NAMA BARANG</th>
        <th>HARGA</th>
        <th>STOK</th>
        <th>STOK TERJUAL</th>
        <th>STOK AKHIR</th>
    </tr>
    <?php $grandtotal = 0 ?>
    <?php foreach ($item as $i => $data): ?>
        <?php $jumlah_stok=Item::getTotalStok($data->ID_ITEM); $jumlah_penjualan=Item::getTotalItemDijual($data->ID_ITEM); $total=$jumlah_stok+$jumlah_penjualan;?>
        <tr>
            <td><?php echo $i+1;?></td>
            <td><?php echo '#'.$data->ID_ITEM; ?></td>
            <td><?php echo $data->NAMA_ITEM; ?></td>
            <td><?php echo $data->HARGA_JUAL; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $jumlah_penjualan; ?></td>
            <td><?php echo $total-$jumlah_penjualan; ?></td>
        </tr>
    <?php endforeach ?>
</table>