<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>NOTA #<?php echo $model->KODE_ORDER ?></title>
        <style type="text/css">
            @page {
                size: A5;
            }
            @font-face {
                font-family:"Open Sans",Arial,Helvetica,sans-serif;
                src: url("../font/SourceSansPro-Regular.ttf");
            }
            @media print {
                .clearfix:after {
                    content: "";
                    display: table;
                    clear: both;
                }

                a {
                    color: black;
                    text-decoration: none;
                }

                body {
                    position: relative;
                    width: 14cm !important;  
                    height: 10cm !important;
                    margin: 0 0 20px 0 !important;
                    padding-bottom: 20px !important;
                    color: #555555;
                    background: #FFFFFF; 
                    font-family: "Open Sans",Arial,Helvetica,sans-serif; 
                    font-size: 10px; 
                }

                header {
                    margin-bottom: 15px;
                    /*border-bottom: 1px solid #AAAAAA;*/
                }

                #logo {
                    float: left;
                }

                #logo img {
                    height: 90px;
                }

                #company {
                    float: right;
                    margin-top: 5px;
                    text-align: right;
                }


                #details {
                    margin-bottom: 20px;
                }

                #client {
                    /*padding-left: 6px;*/
                    /*border-left: 6px solid #e67417;*/
                    float: left;
                }

                #client .to {
                    color: #777777;
                }

                h2.name {
                    font-size: 1.2em;
                    font-weight: normal;
                    margin: 0;
                }

                #invoice {
                    float: right;
                    text-align: right;
                }

                #invoice h1 {
                    color: black;
                    font-size: 1.6em;
                    line-height: 1em;
                    font-weight: normal;
                    margin: 0  0 10px 0;
                }

                #invoice .date {
                    font-size: 1.1em;
                    color: #777777;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    border-spacing: 0;
                    margin-bottom: 20px;
                }

                table thead tr {
                    border-bottom: 1px solid black;
                }

                table th,
                table td {
                    padding: 5px;
                    background: #EEEEEE;
                    text-align: center;
                    border-bottom: 1px solid #FFFFFF;
                }

                table th {
                    white-space: nowrap;        
                    font-weight: normal;
                }

                table td {
                    text-align: right;
                }

                table td h3{
                    color: black;
                    font-size: 1.2em;
                    font-weight: bold;
                    margin: 0 0 0.2em 0;
                }

                table .no {
                    color: #FFFFFF;
                    font-size: 1.6em;
                    background: #FFB26A;
                }

                table .desc {
                    text-align: left;
                }

                table .unit {
                    text-align: center;
                }

                table .qty {
                    text-align: center;
                }

                table .total {
                    /*background: #FFB26A;
                    color: #000000;*/
                }

                table td.unit,
                table td.qty,
                table td.total {
                    font-size: 1em;
                }

                table tbody tr:last-child td {
                    border: none;
                }

                table tfoot td {
                    padding-right: 5px !important;
                    padding: 10px 20px;
                    background: #FFFFFF;
                    border-bottom: none;
                    font-size: 1em;
                    white-space: nowrap; 
                    border-top: 1px solid #AAAAAA; 
                }

                table tfoot tr:first-child td {
                    border-top: none; 
                }

                table tfoot tr:last-child td {
                    color: #FFB26A;
                    font-size: 1.4em;
                    border-top: 1px solid #FFB26A; 

                }

                table tfoot tr td:first-child {
                    border: none;
                }

                #thanks{
                    font-size: 2em;
                    margin-bottom: 50px;
                }

                #notices{
                    border-top: 1px dotted #000000;  
                }

                #notices .notice {
                    font-size: 1.2em;
                }
                .notice ul li {font-size: 10px;}
                .notice {margin-top: -8px;}

                footer {
                    color: #777777;
                    width: 100%;
                    height: 30px;
                    position: absolute;
                    bottom: 0;
                    border-top: 1px solid #AAAAAA;
                    padding: 8px 0;
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center">INVOICE PEMBELIAN</h2>
        <header class="clearfix">
            <div id="logo">
                <!-- <img src="<?php //echo Yii::app()->request->baseUrl ?>/images/logo-baru.png"> -->
                <h2 class="name">KLINIK AR-RAHMAH</h2>
                <div>(ALAMAT KLINIK)</div>
                <!-- <div>031- 5679813</div>
                <div><a href="mailto:vielelaundry@gmail.com">vielelaundry@gmail.com</a></div> -->
            </div>
            <div id="company">
                <h2 class="name">Kepada Yth. :</h2>
                <div><?php echo strtoupper($model->pasien->NAMA_PASIEN); ?></div>
                <div><?php echo $model->pasien->ALAMAT; ?></div>
            </div>
        </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <h2 class="name">NOTA : #<?php echo $model->KODE_ORDER; ?></h2>
                <div class="date">TANGGAL : <?php echo MyFormatter::formatTanggal($model->TANGGAL_ORDER); ?></div>
            </div>
            <div id="invoice">
                
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr style="border-top: 1px dotted #000000;">
                    <th>#</th>
                    <th class="unit">KODE</th>
                    <th class="desc">NAMA ITEM</th>
                    <th class="qty">JUMLAH YANG DIBELI</th>
                    <th class="unit">HARGA</th>
                    <th class="desc">DISC%</th>
                    <th class="total">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalItem = 0;
                foreach ($model->orderdetail as $i => $detail): 
                    $totalItem += $detail->JUMLAH;
                ?>
                <tr>
                    <td class="unit"><?php echo $i+1; ?></td>
                    <td class="unit"><?php echo $detail->item->ID_ITEM; ?></td>
                    <td class="desc">
                        <?php echo strtoupper($detail->item->NAMA_ITEM); ?>
                    </td>
                    <td class="qty"><?php echo $detail->JUMLAH.' PCS'; ?></td>
                    <td class="unit"><?php echo MyFormatter::formatUangNota($detail->HARGA) ?></td>
                    <td class="qty"><?php echo $detail->DISKON==NULL ? '0%' : $detail->DISKON.'%'; ?></td>
                    <td class="total"><?php echo MyFormatter::subtotalNota($detail->DISKON, $detail->HARGA, $detail->JUMLAH, $model->RESEP) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div id="notices">
            <div style="float:left; padding:5px;">
                <h2 class="name">PERHATIAN :</h2>
                <div>1. Barang yang sudah dibeli tidak dapat dikembalikan/ditukar</div>
                <div>2. Pembayaran dengan Cek dianggap lunas setelah dicairkan</div>
                </br>
                <h2 class="name">Petugas</h2>
                </br></br></br>
                <div><?php echo $model->USER_PEMBUAT;?></div>
            </div>
            <div id="company">
                <table border="0">
                    <tr style="background:none !important">
                        <td colspan="2"></td>
                        <td colspan="2">SubTotal:</td>
                        <td><?php echo MyFormatter::formatUang($model->getTotalNota()) ?></td>
                    </tr>
                    <!-- <tr style="background:none !important">
                        <td colspan="2"></td>
                        <td colspan="2">Disc:</td>
                        <td><?php //echo MyFormatter::formatUang($model->getTotal()) ?></td>
                    </tr> -->
                    <tr style="background:none !important">
                        <td colspan="2"></td>
                        <td colspan="2">Ppn:</td>
                        <td>Rp. 0</td>
                    </tr>
                    <tr style="background:none !important">
                        <td colspan="2"></td>
                        <td colspan="2">Total:</td>
                        <td><strong><?php echo MyFormatter::formatUang($model->getTotal()); ?></strong></td>
                    </tr>
                    <tr style="background:none !important">
                        <td colspan="2"></td>
                        <td colspan="2">Pembayaran:</td>
                        <td><strong><?php echo MyFormatter::formatUang($_GET['bayar']); ?></strong></td>
                    </tr>
                    <tr style="background:none !important">
                        <td colspan="2"></td>
                        <td colspan="2">Kembali:</td>
                        <td><strong><?php echo MyFormatter::formatUang($_GET['kembali']); ?></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>