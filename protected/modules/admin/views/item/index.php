<?php
/* @var $this BarangController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Manajemen Data'=>array('#'),
	'Data Barang',
);
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="row">
	<div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-shopping-cart"></i>Daftar Barang
                </div>
                <div class="actions">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah', array('/admin/item/create'),array('class' => 'btn green')) ?>
                    <?php echo CHtml::link('<i class="fa fa-print"></i> Rekap Stok', array('/admin/item/cetak'),array('class' => 'btn default')) ?>
                </div>
            </div>
            <div class="portlet-body">
            <?php if (count($model) > 0) { ?>
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <?php foreach (Kategori::listAll() as $i => $tipe): ?>
                            <li class="<?php echo $i == 1 ? 'active' : '' ?>">
                                <a href="#overview_<?php echo $i ?>" data-toggle="tab">
                                    <?php echo strtoupper($tipe) ?> </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
                        <?php foreach (Kategori::listAll() as $i => $tipe): ?>
                            <div class="tab-pane <?php echo $i == 1 ? 'active' : '' ?>" id="overview_<?php echo $i ?>">
                                <table class="table table-condensed table-bordered table-striped tabel-dashboard-admin">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Item</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Ukuran</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (Item::ListBarangByKategori($i) as $dex => $item): ?>
                                        <tr>
                                            <td><?php echo $dex+1;?></td>
                                            <td>Kode item <?php echo $item->ID_ITEM;?></td>
                                            <td><?php echo CHtml::link(CHtml::encode($item->NAMA_ITEM), array('view','id'=>$item->ID_ITEM), array('title'=>'Detil')); ?></td>
                                            <td><?php echo $item->kategori->KATEGORI; ?></td>
                                            <td style="text-align:center;"><?php echo MyFormatter::stokBarang(Item::getTotalStok($item->ID_ITEM)); ?></td>
                                            <td><?php echo $item->UKURAN;?></td>
                                            <td><?php echo $item->SATUAN;?></td>
                                            <td><?php echo MyFormatter::formatUang($item->HARGA_JUAL); ?></td>
                                            <td><?php echo MyFormatter::statusAktif($item->STATUS); ?></td>
                                            <td width="20%">
                                                <?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i> Ubah',array('/admin/item/update/','id'=>$item->ID_ITEM),array('class'=>'btn dark btn-sm btn-outline sbold uppercase')); ?>
                                                <?php echo CHtml::link('<i class="fa fa-trash-o"></i> Hapus',array('/admin/item/hapus/','id'=>$item->ID_ITEM),array('class'=>'btn red btn-sm btn-outline sbold uppercase','submit'=>array('hapus','id'=>$item->ID_ITEM),'confirm'=>'Apakah Anda yakin akan menghapus '.$item->NAMA_ITEM.'?')); ?>
                                            </td>
                                            <!-- <a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase">
                                                        <i class="fa fa-share"></i> View </a> -->
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php } else { ?>
            <div class="alert alert-success">
                <strong>Maaf,</strong> tidak ada data yang ditampilkan.
            </div>
            <?php } ?>
            </div>
        </div>
	</div>
</div>