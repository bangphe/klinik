<table border="1">
    <tr>
    <th colspan="6">KLINIK AR-RAHMAH | Rekap Transaksi Harian <?= MyFormatter::formatTanggal(date('Y-m-d')); ?></th>
    </tr>
    <tr>
        <th>NO NOTA</th>
        <th>TANGGAL ORDER</th>
        <th>KODE PASIEN</th>
        <th>NAMA PASIEN</th>
        <th>PENDAFTARAN</th>
        <th>SUBTOTAL</th>
        <th>TOTAL</th>
    </tr>
    <?php $grandtotal = 0 ?>
    <?php foreach ($order as $data): ?>
        <tr>
            <td><?php echo '#'.$data->KODE_ORDER ?></td>
            <td><?php echo MyFormatter::formatTanggal($data->TANGGAL_ORDER) ?></td>
            <td><?php echo $data->ID_PASIEN ?></td>
            <td><?php echo $data->pasien->NAMA_PASIEN ?></td>
            <td><?php echo $data->layanan->BIAYA ?></td>
            <td><?php echo MyFormatter::formatUang($data->SUBTOTAL) ?></td>
            <td><?php echo MyFormatter::formatUang($data->TOTAL) ?></td>
        </tr>
    <?php $grandtotal += $data->TOTAL ?>
    <?php endforeach ?>
    <tr>
        <th colspan="5">TOTAL TRANSAKSI HARI INI</th>
        <th><?php echo MyFormatter::formatUang($grandtotal) ?></th>
    </tr>
</table>