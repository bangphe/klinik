<table border="1">
    <tr>
    <th colspan="5">KLINIK AR-RAHMAH | Rekap Obat Bebas Bulan <?= MyFormatter::formatBulan($model->BULAN) . '-' . $model->TAHUN ?></th>
    </tr>
    <tr>
        <th>NO NOTA</th>
        <th>TANGGAL ORDER</th>
        <th>NAMA PASIEN</th>
        <th>APOTEK</th>
        <th>TOTAL</th>
    </tr>
    <?php $grandtotal = 0 ?>
    <?php foreach ($order as $data): ?>
        <tr>
            <td><?php echo '#'.$data->KODE_ORDER ?></td>
            <td><?php echo MyFormatter::formatTanggal($data->TANGGAL_ORDER) ?></td>
            <td><?php echo $data->pasien->NAMA_PASIEN ?></td>
            <td>
                <?php
                $total=0;
                foreach ($data->orderdetail as $value)
                    {
                        if ($value->item->ID_KATEGORI==Item::KATEGORI_OBAT) {
                            $total += $value->HARGA * $value->JUMLAH;
                        }
                    }
                ?>
                <?php echo MyFormatter::formatUang($total + 33/100 + 10/100); ?></br>
            </td>
            <td><?php echo MyFormatter::formatUang($data->TOTAL) ?></td>
        </tr>
    <?php $grandtotal += $data->TOTAL ?>
    <?php endforeach ?>
    <tr>
        <th colspan="4">TOTAL PER BULAN</th>
        <th><?php echo MyFormatter::formatUang($grandtotal) ?></th>
    </tr>
</table>
