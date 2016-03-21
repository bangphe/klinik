<table border="1">
    <tr>
    <th colspan="14">KLINIK AR-RAHMAH | Rekap Transaksi Bulan <?= MyFormatter::formatBulan($model->BULAN) . '-' . $model->TAHUN ?></th>
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
    <?php $grandtotal = 0; $t_jasa=0; $t_apotek=0; $t_kerato=0; $t_rr=0; $t_racik=0; $t_biaya=0; $t_lab=0; $t_optik=0; $t_fundus=0; $t_operasi=0; ?>
    <?php foreach ($order as $data): ?>
        <tr>
            <td><?php echo '#'.$data->KODE_ORDER ?></td>
            <td><?php echo MyFormatter::formatTanggal($data->TANGGAL_ORDER) ?></td>
            <td><?php echo $data->pasien->NAMA_PASIEN ?></td>
            <td>
                <?php 
                $total_jasa=0;
                foreach ($data->orderdetail as $value) {
                ?>
                    <?php if ($value->item->ID_KATEGORI=='5') { ?>
                    <?php 
                        $total_jasa += $value->item->HARGA_JUAL;
                        echo MyFormatter::formatUang($total_jasa);
                    ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php
                $total_apotek=0;
                foreach ($data->orderdetail as $value)
                    {
                        if ($value->item->ID_KATEGORI==Item::KATEGORI_OBAT) {
                            $total_apotek += $value->HARGA * $value->JUMLAH;
                        }
                    }
                ?>
                <?php echo MyFormatter::formatUang($total_apotek + 33/100 + 10/100); ?></br>
            </td>
            <td>
                <?php
                $total_kerato=0;
                foreach ($data->orderdetail as $value) {
                ?>
                    <?php if ($value->item->ID_KATEGORI=='6') { ?>
                    <?php
                        $total_kerato += $value->item->HARGA_JUAL;
                        echo MyFormatter::formatUang($total_kerato);
                    ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php 
                $total_rr=0;
                if ($data->RESEP==Order::RESEP_DOKTER) { ?>
                    <?php
                        $total_rr += count($data->orderdetail) * 1200;
                        echo MyFormatter::formatUang($total_rr);
                    ?></br>
                <?php } ?>
            </td>
            <td>
                <?php
                $total_racik=0;
                foreach ($data->orderdetail as $value) {
                ?>
                    <?php if ($value->item->ID_KATEGORI=='9') { ?>
                    <?php
                        $total_racik += $value->item->HARGA_JUAL;
                        echo MyFormatter::formatUang($total_racik);
                    ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php
                    $total_biaya=$data->layanan->BIAYA;
                    echo MyFormatter::formatUang($total_biaya);
                ?>
            </td>
            <td>
                <?php 
                $total_lab=0;
                foreach ($data->orderdetail as $value) {
                ?>
                    <?php if ($value->item->ID_KATEGORI=='7') { ?>
                    <?php
                        $total_lab += $value->item->HARGA_JUAL;
                        echo MyFormatter::formatUang($total_lab);
                    ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php
                $total_optik=0;
                foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='2') { ?>
                    <?php
                        $total_optik += $value->item->HARGA_JUAL;
                        echo MyFormatter::formatUang($total_optik);
                    ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php
                $total_fundus=0;
                foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='8') { ?>
                    <?php
                        $total_fundus += $value->item->HARGA_JUAL;
                        echo MyFormatter::formatUang($total_fundus);
                    ?></br>
                <?php } } ?>
            </td>
            <td>
                <?php
                $total_operasi=0;
                foreach ($data->orderdetail as $value) { ?>
                    <?php if ($value->item->ID_KATEGORI=='10') { ?>
                    <?php
                        $total_operasi += $value->item->HARGA_JUAL;
                        echo MyFormatter::formatUang($total_operasi);
                    ?></br>
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
    <?php $grandtotal += $data->TOTAL; $t_jasa += $total_jasa; $t_apotek += $total_apotek; $t_rr += $total_rr; $t_kerato += $total_kerato; $t_racik += $total_racik; $t_biaya += $total_biaya; $t_lab += $total_lab; $t_optik += $total_optik; $t_fundus += $total_fundus; $t_operasi += $total_operasi; ?>
    <?php endforeach ?>
    <tr style="background-color:grey;">
        <th colspan="3"> RINCIAN : </th>
        <th><?= MyFormatter::formatUang($t_jasa); ?></th>
        <th><?= MyFormatter::formatUang($t_apotek); ?></th>
        <th><?= MyFormatter::formatUang($t_kerato); ?></th>
        <th><?= MyFormatter::formatUang($t_rr); ?></th>
        <th><?= MyFormatter::formatUang($t_racik); ?></th>
        <th><?= MyFormatter::formatUang($t_biaya); ?></th>
        <th><?= MyFormatter::formatUang($t_lab); ?></th>
        <th><?= MyFormatter::formatUang($t_optik); ?></th>
        <th><?= MyFormatter::formatUang($t_fundus); ?></th>
        <th><?= MyFormatter::formatUang($t_operasi); ?></th>
        <th></th>
    </tr>
    
    <tr>
        <th colspan="3">TOTAL PER BULAN</th>
        <th colspan="10"></th>
        <th><?php echo MyFormatter::formatUang($grandtotal) ?></th>
    </tr>
</table>
