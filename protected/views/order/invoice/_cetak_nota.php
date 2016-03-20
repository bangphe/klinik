<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>NOTA #<?php echo $model->KODE_ORDER ?></title>
        <style type="text/css">
            @page {
                size: A6;
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
                    height: 10cm !important;
                    margin: 0 0 10px 0 !important;
                    padding-bottom: 20px !important;
                    color: #555555;
                    background: #FFFFFF; 
                    font-family: "Open Sans",Arial,Helvetica,sans-serif; 
                    font-size: 13px; 
                }
				
                header {
                    margin-bottom: 15px;
                    /*border-bottom: 1px solid #AAAAAA;*/
                }

                #logo {
                    text-align:center;
                }

                #logo img {
                    height: 90px;
                }

                #company {
                    float: right;
                    margin-top: 5px;
                    text-align: right;
					font-size: 1.4em;
                }
				
				#companys {
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
                    font-size: 1.4em;
                    font-weight: normal;
					margin:0 auto;
                    
                }
				h2.nameNota {
                    font-size: 1.4em;
                    font-weight: normal;
					margin:0 auto;
                    
                }
				.alamat {
					font-size: 1.1em;
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
				
				.date {
					font-size: 1.2em;
				}
                #invoice {
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
                    font-size: 1.1em;
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
        <header class="clearfix">
            <div id="logo">
                <!-- <img src="<?php //echo Yii::app()->request->baseUrl ?>/images/logo-baru.png"> -->
                <h2 class="name">KLINIK AR-RAHMAH</h2>
                <div class="alamat">Jl. Melati (Samping Jembatan Jerbus) <br>Telp : (0921)-3110222</div>
            </div>
            <!--div id="companys">
                <h2 class="name">Kepada Yth. :</h2>
                <div><?php echo strtoupper($model->pasien->NAMA_PASIEN); ?></div>
                <div><?php echo $model->pasien->ALAMAT; ?></div>
            </div-->
        </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <h2 class="nameNota">NOTA : #<?php echo $model->KODE_ORDER; ?></h2>
                <div class="date">TANGGAL : <?php echo MyFormatter::formatTanggalWaktu($model->TANGGAL_ORDER); ?></div>
            </div>
            <div id="invoice">
                
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr style="border-top: 1px dotted #000000;">
                    <!--th>#</th-->
                    <th class="unit">KODE</th>
                    
                    <th class="qty">QTY</th>
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
                    <!--td class="unit"><?php echo $i+1; ?></td-->
                    <td class="unit"><?php echo $detail->item->ID_ITEM; ?></td>
                    <td class="qty"><?php echo $detail->JUMLAH.''; ?></td>
                    <td class="unit"><?php echo MyFormatter::formatUangNotaTanpaRupiah($detail->HARGA) ?></td>
                    <td class="qty"><?php echo $detail->DISKON==NULL ? '0%' : $detail->DISKON.'%'; ?></td>
                    <td class="total"><?php echo MyFormatter::subtotalNotaTanpaRp($detail->DISKON, $detail->HARGA, $detail->JUMLAH) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div id="notices">
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
                    <!--tr style="background:none !important">
                        <td colspan="2"></td>
                        <td colspan="2">Ppn:</td>
                        <td>Rp. 0</td>
                    </tr-->
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