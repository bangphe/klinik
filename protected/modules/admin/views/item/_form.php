<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
	),
	'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnChange' => false,
        'validateOnSubmit' => true
    ),
)); ?>

	<h4 class="form-section"><i class="fa fa-download"></i> Detil Barang</h4>
	<p class="note note-warning">Isian dengan tanda <span class="required">*</span> harus diisi.</p>
	<div class="alert alert-danger">
        <strong>Note!</strong> Khusus Harga Jual Obat disesuaikan dengan Harga Beli di Supplier.
    </div>
	<div class="form-group">
		<?php echo $form->labelEx($item,'ID_KATEGORI',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->dropDownList($item,'ID_KATEGORI', Kategori::listAll(),
				array(
				'class'=>'bs-select form-control input-large',
				'prompt'=>'- Pilih Kategori -'
			)); ?>
			<?php echo $form->error($item,'ID_KATEGORI'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($item,'NAMA_ITEM',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->textArea($item,'NAMA_ITEM',array('maxlength'=>100,'class'=>'form-control input-large')); ?>
			<?php echo $form->error($item,'NAMA_ITEM'); ?>
		</div>
	</div>
	<div class="form-group" id="golongan">
		<?php echo $form->labelEx($item,'ID_GOLONGAN_OBAT',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->dropDownList($item,'ID_GOLONGAN_OBAT', GolonganObat::listAll(),
				array(
				'class'=>'bs-select form-control input-large',
				'prompt'=>'- Pilih Golongan Obat -'
			)); ?>
			<?php echo $form->error($item,'ID_GOLONGAN_OBAT'); ?>
		</div>
	</div>

	<div class="form-group" id="satuan">
		<?php echo $form->labelEx($item,'SATUAN',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->textField($item,'SATUAN',array(
                'class' => 'form-control input-large',
                'placeholder' => 'Tablet/Kapsul/Alpha',
            ));?>
			<?php echo $form->error($item,'SATUAN'); ?>
		</div>
	</div>

	<div class="form-group" id="ukuran">
		<?php echo $form->labelEx($item,'UKURAN',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->textField($item,'UKURAN',array(
                'class' => 'form-control input-large',
                'placeholder' => 'Contoh: 0.01mm',
            ));?>
			<?php echo $form->error($item,'UKURAN'); ?>
		</div>
	</div>

	<div class="form-group" id="harJul">
		<?php echo $form->labelEx($item,'HARGA_JUAL',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
            <div class="input-inline input-large">
				<div class="input-group">
					<span class="input-group-addon">Rp</span>
					<?php echo $form->textField($item, 'HARGA_JUAL', array('class'=>'form-control', 'placeholder'=>'Harga jual barang contoh: 10000')); ?>
				</div>
			</div>
			<?php echo $form->error($item,'HARGA_JUAL'); ?>
		<!-- <span class="help-inline"><code>Khusus Harga Jual Obat disesuaikan dengan Harga Beli di Supplier.</code></span> -->
		</div>
	</div>


	<div class="form-group" id="tanggal_exp">
		<?php echo $form->labelEx($item,'TANGGAL_EXPIRED',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
            <div class="input-inline input-large">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<?php echo $form->textField($item, 'TANGGAL_EXPIRED', array('class'=>'form-control date-picker', 'data-date-format'=>'yyyy-mm-dd', 'placeholder'=>'Tanggal Expired')); ?>
				</div>
			</div>
			<?php echo $form->error($item,'TANGGAL_EXPIRED'); ?>
		</div>
	</div>


    <h4 class="form-section"><i class="fa fa-group"></i> Detil Supplier</h4>
    <div class="form-group">
		<?php echo $form->labelEx($detil_item,'ID_SUPPLIER',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->dropDownList($detil_item,'ID_SUPPLIER', Supplier::optionSupplier(),
				array(
				'class'=>'form-control input-large',
				'prompt'=>'- Pilih Supplier -'
			)); ?>
			<?php echo $form->error($detil_item,'ID_SUPPLIER'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($detil_item,'STOK',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
			<?php echo $form->numberField($detil_item,'STOK',array(
                'class' => 'form-control input-large',
                'min' => 0,
                'placeholder' => 'Stok barang contoh: 10',
            ));?>
			<?php echo $form->error($detil_item,'STOK'); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($detil_item,'HARGA_BELI',array('class'=>'control-label col-md-3')); ?>
		<div class="col-md-4">
            <div class="input-inline input-large">
				<div class="input-group">
					<span class="input-group-addon">Rp</span>
					<?php echo $form->textField($detil_item, 'HARGA_BELI', array('class'=>'form-control', 'placeholder'=>'Harga beli barang contoh: 10000')); ?>
				</div>
			</div>
			<?php echo $form->error($detil_item,'HARGA_BELI'); ?>
		</div>
	</div>

	<div class="form-group">
        <?php echo $form->labelEx($detil_item, 'STATUS_PEMBAYARAN', array('class' => 'control-label col-md-3')); ?>
        <div class="col-md-9">
            <div class="input-group">
                <div class="icheck-inline">
                    <label><input data-radio="iradio_square-blue" type="radio" name="DetilItem[STATUS_PEMBAYARAN]" checked class="icheck" value="0"> TUNAI </label> 
                    <label><input data-radio="iradio_square-blue" type="radio" name="DetilItem[STATUS_PEMBAYARAN]" class="icheck" value="1"> HUTANG </label>
                </div>
            </div>
        </div>
    </div>

	<div class="form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button type="submit" class="btn green">
				<i class="fa fa-check"></i> <?php echo $item->isNewRecord ? 'Simpan' : 'Simpan Perubahan'; ?>
			</button>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$(function() {
	$('#golongan').hide();
	$('#ukuran').hide();
	$('#satuan').hide();
	$('#tanggal_exp').hide();
	$('#harJul').hide();

	$('#Item_ID_KATEGORI').change(function(){
		if ($('#Item_ID_KATEGORI').val() == 1) {
			$('#golongan').show();
			$('#satuan').show();
			$('#ukuran').hide();
			$('#tanggal_exp').show();
			$('#harJul').show();


		} else if($('#Item_ID_KATEGORI').val() == 2 || $('#Item_ID_KATEGORI').val() == 3) {
			$('#ukuran').show();
			$('#golongan').hide();
			$('#satuan').hide();
			$('#tanggal_exp').hide();
			$('#harJul').show();
		}
		else {
			$('#golongan').hide();
			$('#satuan').hide();
			$('#tanggal_exp').hide();
			$('#harJul').hide();
			$('#ukuran').hide();

		}
	});
});

function getKategori(id)
{
	var url = '<?php echo Yii::app()->createUrl("barang/getkategori/'+id+'")?>';
	$.ajax({
		url: url,
		data: '',
		type: 'GET',
		dataType: 'json',
		beforeSend: function()
		{
		},
		success: function(data)
		{
			var id;
			var option;
			var nama;
			
			//$('#testing').html('');
			
			$('#Barang_ID_KATEGORI').html('<option value="0">- Pilih Kategori -</option>');
			
			for(var i=0; i< data.length;i++)
			{
				id = data[i]['ID_KATEGORI'];
				nama = data[i]['NAMA_KATEGORI'];
				option += '<option value="'+id+'">['+id+'] '+nama+'</option>';
				
			}
			$('#Barang_ID_KATEGORI').append(option);
		}
	});	
}
</script>