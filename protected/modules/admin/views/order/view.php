<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Data Order'=>array('index'),
	$model->KODE_ORDER,
);
$totalItem = 0;
foreach ($model->orderdetail as $i => $detail) {
    $totalItem += $detail->JUMLAH;
}
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="col-md-6">
	<div class="portlet box green-jungle">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-desktop"></i>Data Order #<?php echo $model->KODE_ORDER; ?>
			</div>
			<div class="actions">
				<?php echo CHtml::link('<i class="fa fa-pencil"></i> Ubah', array('update', 'id' => $model->KODE_ORDER), array('class'=>'btn btn-default btn-sm')); ?>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data' => $model,
					'htmlOptions' => array(
						'class' => 'table table-bordered table-striped',
						),
					'attributes'=>array(
						'KODE_ORDER',
						'pasien.NAMA_PASIEN',
						array(
                            'name'=>'TANGGAL_ORDER',
                            'type'=>'tanggalWaktu',
                            'value'=>$model->TANGGAL_ORDER,
                        ),
						'USER_PEMBUAT',
						'PEMBAYARAN',
						'KEMBALIAN',
						),
					)); 
					?>
			</div>
		</div>
	</div>
	<div class="portlet box red">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-book"></i> Nota
			</div>
			<div class="tools"></div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form id="calculator" method="get">
				<div class="form-body">
					<div class="row">
						<div class="col-md-4">
							<label class="control-label">Total</label>
							<p class="lead"><strong><?php echo MyFormatter::formatUang($model->getTotal()) ?></strong></p>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="bayar" class="control-label">Pembayaran</label>
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="number" id="bayar" class="form-control" value="0" name="bayar">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="kembali" class="control-label">Kembalian</label>
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="number" id="kembali" class="form-control" value="0" readonly="readonly" name="kembali">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions center">
					<?php echo CHtml::link('Hitung & Cetak Nota', array('/order/cetak', 'id' => $model->KODE_ORDER), array(
                        'class' => 'btn btn-success pull-right print',
                        'id' => 'cetaknota'
                    )) ?>
				</div>
			</form>
				<!-- END FORM-->
		</div>
	</div>
</div>
<div class="col-md-6">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green-jungle">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-language"></i>Klinik
            </div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
               <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $cek = OrderDetail::model()->findAllByAttributes(array('KODE_ORDER' => $model->KODE_ORDER));
                        foreach ($cek as $dex => $row) {
                    ?>
                        <tr>
                            <td><?php echo $dex+1;?></td>
                            <td><?php echo $row->item->NAMA_ITEM;?></td>
                            <td><?php echo $row->item->kategori->KATEGORI;?></td>
                            <td><?php echo $row->JUMLAH;?></td>
                            <td><?php echo MyFormatter::formatUang($row->HARGA);?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="well">
                <table class="table table-condensed table-bordered">
                    <tbody>
                    <tr><th>Total Item</th><td><span class="label label-danger"><?php echo $totalItem;?></span></td></tr>
                    <tr><th>Total</th><td><strong><?php echo MyFormatter::formatUang($model->getTotal()) ?></strong></td></tr>
                </tbody></table>
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>

<div class="clearfix"></div>

<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/custom/jquery.printPage.js" type="text/javascript"></script>
<script>
    $(".print").printPage();
    
    $('#cetaknota').click(function() {
        var bayar = $('#bayar').val();
        bayar = bayar.replace('.', '');
        
        var kembali = bayar - <?php echo $model->getTotal() ?>;
        $('#kembali').attr('value', kembali);
        
        $(this).attr('href', $(this).attr('href') + '?bayar=' + bayar + '&kembali=' + kembali);
    });
</script>
