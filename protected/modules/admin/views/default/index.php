<?php if (count($expired) > 0) {?>
<div class="note note-success">
    <h3>Informasi Penting !!</h3>
    <?php foreach ($expired as $value) { ?>
        <p>Obat <b> <?= $value['NAMA_ITEM']; ?> </b> masa expired akan segera berakhir pada tanggal <b> <?= MyFormatter::formatTanggal($value['TANGGAL_EXPIRED']); ?> </b> lagi, silahkan isi stock dengan obat yang terbaru. Terima Kasih</p>
    <?php } ?>
    <!-- <p>Obat <b> Oskadon </b> masa expired akan segera berakhir <b> 14 hari </b> lagi, silahkan isi stock dengan obat yang terbaru. Terima Kasih</p>
    <p>Obat <b> Ultraflu </b> masa expired akan segera berakhir <b> 14 hari </b> lagi, silahkan isi stock dengan obat yang terbaru. Terima Kasih</p>
    <p>Obat <b> Konidin </b> masa expired akan segera berakhir <b> 14 hari </b> lagi, silahkan isi stock dengan obat yang terbaru. Terima Kasih</p> -->
</div>
<?php } else { ?>
<div class="alert alert-info">
    <strong>Haloo!</strong> Selamat datang di Halaman Administrator.
</div>
<?php } ?>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"><?php echo MyFormatter::formatAngka($pelanggan) ?></span>
                </div>
                <div class="desc"> Total Pasien </div>
            </div>
            <a class="more" href="javascript:;"> Total Pasien
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"><?php echo MyFormatter::formatUang($total) ?></span></div>
                <div class="desc"> Total Kredit Bulan ini </div>
            </div>
            <a class="more" href="javascript:;"> Total Kredit Bulan ini
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"><?php echo MyFormatter::formatAngka($order) ?></span>
                </div>
                <div class="desc"> Total Pemesanan </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"><?php echo MyFormatter::formatAngka($hariini) ?></span></div>
                <div class="desc"> Pemesanan Hari ini </div>
            </div>
            <a class="more" href="javascript:;"> Pemesanan Hari ini
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
    <!-- BEGIN CONDENSED TABLE PORTLET-->
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-picture"></i>Obat Expired </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama Obat </th>
                                <th> Tanggal Expired </th>
                                <th> Jumlah Stock </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (Item::getObatExpired() as $key => $value) { ?>
                            <tr>
                                <td> <?= $key+1; ?> </td>
                                <td> <?= $value->NAMA_ITEM; ?> </td>
                                <td> <?= MyFormatter::formatTanggal($value->TANGGAL_EXPIRED); ?> </td>
                                <td>
                                    <span class="label label-sm label-success"> <?= Item::getTotalStok($value->ID_ITEM); ?> </span>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END CONDENSED TABLE PORTLET-->
    </div>
    <div class="col-md-6">
        <!-- BEGIN CONDENSED TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture"></i>Invoice Terbaru </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Pasien </th>
                                    <th> Tanggal Masuk </th>
                                    <th> Total Item </th>
                                    <!-- <th> Total Harga </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (Order::ListOrder() as $dex => $item) { ?>
                                <tr>
                                    <td><?php echo $dex+1;?></td>
                                    <td><?php echo $item->pasien->NAMA_PASIEN;?></td>
                                    <td><?php echo MyFormatter::formatTanggalWaktu($item->TANGGAL_ORDER);?></td>
                                    <td><?php echo OrderDetail::getJumlahItem($item->KODE_ORDER);?></td>
                                    <!-- <td><?php //echo MyFormatter::formatUang($item->getSubtotal());?></td> -->
                                    <!-- <td>
                                        <?php echo CHtml::link('<i class="fa fa-search"></i>',array('/admin/order/view/','id'=>$item->KODE_ORDER),array('class'=>'btn default btn-xs green-stripe')); ?>
                                    </td> -->
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td>1</td>
                                    <td><a href=""> Ini Contoh Link </a></td>
                                    <td>08 Februari 2016 20:19 WIB</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END CONDENSED TABLE PORTLET-->
        </div>
        <div class="col-md-6">
        <!-- BEGIN CONDENSED TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture"></i>Obat Habis </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Obat </th>
                                    <th> Generik </th>
                                    <th> Golongan </th>
                                    <!-- <th> Total Harga </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (Order::ListOrder() as $dex => $item) { ?>
                                <tr>
                                    <td><?php echo $dex+1;?></td>
                                    <td><?php echo $item->pasien->NAMA_PASIEN;?></td>
                                    <td><?php echo MyFormatter::formatTanggalWaktu($item->TANGGAL_ORDER);?></td>
                                    <td><?php echo OrderDetail::getJumlahItem($item->KODE_ORDER);?></td>
                                    <!-- <td><?php //echo MyFormatter::formatUang($item->getSubtotal());?></td> -->
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END CONDENSED TABLE PORTLET-->
        </div>
    </div>
</div>