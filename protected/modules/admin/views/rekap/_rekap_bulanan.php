<table border="1">
    <tr>
    <th colspan="11">KLINIK AR-RAHMAH | Rekap Transaksi Bulan <?= MyFormatter::formatBulan($model->BULAN) . '-' . $model->TAHUN ?></th>
    </tr>
    <tr>
        <th>NO NOTA</th>
        <th>TANGGAL ORDER</th>
        <th>NAMA PASIEN</th>
        <th>PENDAFTARAN</th>
        <th>JASA DOKTER</th>
        <th>KERATO</th>
        <th>LAB</th>
        <th>FOTO FUNDUS</th>
        <th>NAMA ITEM</th>
        <th>SUBTOTAL</th>
        <th>TOTAL</th>
    </tr>
    <?php $grandtotal = 0 ?>
    <?php foreach ($order as $data): ?>
        <tr>
            <td><?php echo '#'.$data->KODE_ORDER ?></td>
            <td><?php echo MyFormatter::formatTanggal($data->TANGGAL_ORDER) ?></td>
            <!-- <td><?php echo $data->ID_PASIEN ?></td> -->
            <td><?php echo $data->pasien->NAMA_PASIEN ?></td>
            <td><?php echo MyFormatter::formatUang($data->layanan->BIAYA) ?></td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='5') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL).' ('.$value->JUMLAH.')'; ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='6') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL).' ('.$value->JUMLAH.')'; ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='7') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL).' ('.$value->JUMLAH.')'; ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='8') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL).' ('.$value->JUMLAH.')'; ?></br>
                <?php } } ?>
            </td>
            <td>
            <?php foreach ($data->orderdetail as $value) { ?>
                <?php echo $value->item->NAMA_ITEM.' ('.$value->JUMLAH.')'; ?></br>
            <?php } ?>
            </td>
            <td><?php echo MyFormatter::formatUang($data->SUBTOTAL) ?></td>
            <td><?php echo MyFormatter::formatUang($data->TOTAL) ?></td>
        </tr>
    <?php $grandtotal += $data->TOTAL ?>
    <?php endforeach ?>
    <tr>
        <th colspan="10">TOTAL PER BULAN</th>
        <th><?php echo MyFormatter::formatUang($grandtotal) ?></th>
    </tr>
</table>