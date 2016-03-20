<table border="1">
    <tr>
    <th colspan="13">KLINIK AR-RAHMAH | Rekap Transaksi Bulan <?= MyFormatter::formatBulan($model->BULAN) . '-' . $model->TAHUN ?></th>
    </tr>
    <tr>
        <th>NO NOTA</th>
        <th>TANGGAL ORDER</th>
        <th>NAMA PASIEN</th>
        <th>JASA DOKTER</th>
        <th>APOTEK</th>
        <th>KERATO</th>
        <th>RR</th>
        <th>RACIK</th>
        <th>DAFTAR</th>
        <th>LAB</th>
        <th>OPTIK</th>
        <th>FOTO FUNDUS</th>
        <th>OPERASI</th>
        <th>TOTAL</th>
        <!-- <th>NAMA ITEM</th> -->
        
        <!-- <th>UANG RESEP</th> -->
    </tr>
    <?php $grandtotal = 0 ?>
    <?php foreach ($order as $data): ?>
        <tr>
            <td><?php echo '#'.$data->KODE_ORDER ?></td>
            <td><?php echo MyFormatter::formatTanggal($data->TANGGAL_ORDER) ?></td>
            <td><?php echo $data->pasien->NAMA_PASIEN ?></td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='5') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL); ?></br>
                <?php } } ?>
            </td>
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
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='6') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL); ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php if ($data->RESEP==Order::RESEP_DOKTER) { ?>
                    <?php echo MyFormatter::formatUang(count($data->orderdetail) * 1200); ?></br>
                <?php } ?>
            </td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='9') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL); ?></br>
                <?php } } ?>
            </td>
            <td><?php echo MyFormatter::formatUang($data->layanan->BIAYA) ?></td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='7') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL); ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='2') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL); ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='8') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL); ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='10') { ?>
                    <?php echo MyFormatter::formatUang($value->item->HARGA_JUAL); ?></br>
                <?php } } ?>
            </td>
            <!-- <td>
            <?php foreach ($data->orderdetail as $value) { ?>
                <?php echo $value->item->NAMA_ITEM.' ('.$value->JUMLAH.')'; ?></br>
            <?php } ?>
            </td> -->
            <!-- <td><?php echo MyFormatter::formatUang($data->SUBTOTAL) ?></td> -->
            <td><?php echo MyFormatter::formatUang($data->TOTAL) ?></td>
        </tr>
    <?php $grandtotal += $data->TOTAL ?>
    <?php endforeach ?>
    <tr>
        <th colspan="12">TOTAL PER BULAN</th>
        <th><?php echo MyFormatter::formatUang($grandtotal) ?></th>
    </tr>
</table>
