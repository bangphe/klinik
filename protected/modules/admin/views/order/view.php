<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Data Order'=>array('index'),
	$model->KODE_ORDER,
);

?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="col-md-6">
	<div class="portlet box green-jungle">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-desktop"></i>Data Order #<?php echo $model->KODE_ORDER; ?>
			</div>
			<div class="actions">
				<a href="update" class="btn btn-default btn-sm">
					<i class="fa fa-pencil"></i> Ubah </a>
					<?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->KODE_ORDER)) ?>
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
						'ID_PASIEN',
						'TANGGAL_ORDER',
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
							<p class="lead">Rp. 67.500</p>
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
					<a class="btn red pull-right print" id="cetaknota" href="/laundry/order/cetak/000355">Hitung &amp; Cetak Nota</a>
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
            <br>
            <div class="table-scrollable">
                <table class="table table-condensed table-bordered">
                    <tbody><tr><th>Subtotal</th><td>Rp. 45.000</td></tr>
                    <tr><th>Diskon</th><td>0%</td></tr>
                    <tr><th>Total Item</th><td>1</td></tr>
                    <tr><th>Biaya Tambahan</th><td>Rp. 22.500</td></tr>
                    <tr><th>Total</th><td>Rp. 67.500</td></tr>
                </tbody></table>
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>

<div class="clearfix"></div>