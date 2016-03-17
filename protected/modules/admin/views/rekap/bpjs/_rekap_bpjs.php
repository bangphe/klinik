<table border="1">
    <tr>
    <th colspan="7">KLINIK AR-RAHMAH | Rekap Pengambilan Obat-Obatan BPJS Bulan <?= MyFormatter::formatBulan($model->BULAN) . '-' . $model->TAHUN ?></th>
    </tr>
    <tr>
        <th>NO NOTA</th>
        <th>TANGGAL ORDER</th>
        <th>NAMA PASIEN</th>
        <th>NAMA ITEM</th>
        <th>QTY</th>
        <th>UANG RESEP</th>
        <th>TOTAL</th>
    </tr>
    <?php $grandtotal = 0 ?>
    <?php foreach ($order as $data): ?>
    <tr>
        <td><?php echo '#'.$data->KODE_ORDER ?></td>
        <td><?php echo MyFormatter::formatTanggal($data->TANGGAL_ORDER) ?></td>
        <td><?php echo $data->pasien->NAMA_PASIEN ?></td>
        <td>
        <?php foreach ($data->orderdetail as $value) { ?>
            <?php echo $value->item->NAMA_ITEM; ?></br>
        <?php } ?>
        </td>
        <td>
        <?php foreach ($data->orderdetail as $value) { ?>
            <?php echo $value->JUMLAH; ?></br>
        <?php } ?>
        </td>
        <td>
            <?php if ($data->RESEP==Order::RESEP_DOKTER) { ?>
                <?php echo MyFormatter::formatUang(count($data->orderdetail) * 1200); ?></br>
            <?php } ?>
        </td>
        <td><?php echo MyFormatter::formatUang($data->TOTAL) ?></td>
    </tr>
    <?php $grandtotal += $data->TOTAL ?>
    <?php endforeach ?>
    <tr>
        <th colspan="6">TOTAL PER BULAN</th>
        <th><?php echo MyFormatter::formatUang($grandtotal) ?></th>
    </tr>
</table>
