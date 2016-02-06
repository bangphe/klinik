<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->KODE_ORDER,
);
?>

<style type="text/css">
.lead {
    color: #e84d1c;
    font-size: 22px;
    float: left;
    font-weight: bold;
}
.leads {
    font-size: 18px;
    float: left;
    padding-top: 3px;
}
</style>

<?php
/* @var $this OrderController */
/* @var $model Order */
$this->pageTitle = "Detail Order";
$this->breadcrumbs = array(
    'Manajemen Order' => array('index'),
    'Invoice #' . $model->KODE_ORDER,
);

$totalItem = 0;
foreach ($model->orderdetail as $i => $detail) {
    $totalItem += $detail->JUMLAH;
}
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-desktop"></i> Detail Invoice #<?php echo $model->KODE_ORDER ?>
                </div>
                <div class="tools">
                    <?php //echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->KODE_ORDER)) ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'htmlOptions' => array(
                            'class' => 'table table-bordered table-striped',
                        ),
						'attributes'=>array(
							'KODE_ORDER',
                            array(
                                'name' => 'PASIEN',
                                'value' => $model->pasien->NAMA_PASIEN
                            ),
							array(
                                'name' => 'TANGGAL_ORDER',
                                'type' => 'tanggal',
                                'value' => $model->TANGGAL_ORDER
                            ),
                            array(
                                'name' => 'RESEP',
                                'type' => 'resep',
                                'value' => $model->RESEP
                            )
						),
                    ));
                    ?>
                </div>
            </div>
        <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
    <div class="portlet box green-haze">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-tags"></i> Detail Item
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
                                <th>Diskon</th>
                                <th>Sub Total</th>
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
                                <td><?php echo $row->DISKON==NULL ? '0%' : $row->DISKON.'%';?></td>
                                <td><?php echo MyFormatter::formatUang(($row->HARGA - ($row->HARGA*$row->DISKON/100)) * $row->JUMLAH);?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="well">
                    <table class="table table-condensed">
                        <tr>
                            <th>Total Item</th>
                            <th colspan="10"></th>
                            <td></td>
                            <td></td>
                            <td><span class="label label-danger"><?php echo $totalItem;?></span></td>
                        </tr>
                        <!-- <tr>
                            <th>Sub Total</th>
                            <th colspan="10">:</th>
                            <td><strong><?php //echo MyFormatter::formatUang($model->getSubtotal()) ?></strong></td>
                        </tr> -->
                        <tr>
                            <th>Total Biaya</th>
                            <th colspan="10"></th>
                            <td></td>
                            <td></td>
                            <td><strong><?php echo MyFormatter::formatUang($model->getTotal()) ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
		<div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i> Nota
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'calculator',
                    'method'=>'GET',
                )); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="portlet mt-element-ribbon light portlet-fit bordered">
                                <div class="ribbon ribbon-vertical-right ribbon-shadow ribbon-color-primary uppercase">
                                    <div class="ribbon-sub ribbon-bookmark"></div>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-speech"></i>
                                        <span class="caption-subject bold uppercase">Total</span>
                                    </div>
                                </div>
                                <div class="portlet-body"><p style="font-size:22px; font-weight:bold; color: #e84d1c;"><?php echo MyFormatter::formatUang($model->getTotal()) ?></p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="portlet mt-element-ribbon light portlet-fit bordered">
	                                <div class="ribbon ribbon-vertical-right ribbon-shadow ribbon-color-primary uppercase">
	                                    <div class="ribbon-sub ribbon-bookmark"></div>
	                                    <i class="fa fa-star"></i>
	                                </div>
	                                <div class="portlet-title">
	                                    <div class="caption">
	                                        <i class=" icon-layers"></i>
	                                        <span class="caption-subject bold uppercase">Pembayaran</span>
	                                    </div>
	                                </div>
	                                <div class="portlet-body">
	                                	<div class="input-group">
		                                    <span class="input-group-addon">Rp</span>
		                                    <?php echo $form->textField($model, 'PEMBAYARAN', array(
		                                        'class'=>'form-control',
		                                        'placeholder'=>'0',
		                                        'onchange'=>'savePembayaran()',
		                                        //'readonly'=>$model->STATUS_BAYAR==1 ? 'readonly' : '',
		                                    )); ?>
		                                </div>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="portlet mt-element-ribbon light portlet-fit bordered">
	                                <div class="ribbon ribbon-vertical-right ribbon-shadow ribbon-color-primary uppercase">
	                                    <div class="ribbon-sub ribbon-bookmark"></div>
	                                    <i class="fa fa-star"></i>
	                                </div>
	                                <div class="portlet-title">
	                                    <div class="caption">
	                                        <i class=" icon-settings"></i>
	                                        <span class="caption-subject bold uppercase">Kembalian</span>
	                                    </div>
	                                </div>
	                                <div class="portlet-body">
	                                	<p id="Order_KEMBALIAN" style="font-size:22px; font-weight:bold; color: #e84d1c;"><?php echo MyFormatter::formatUang($model->KEMBALIAN); ?></p>
	                                </div>
	                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <?= CHtml::link('<i class="fa fa-print"></i> Cetak Nota', array('/order/cetak', 'id' => $model->KODE_ORDER), array(
                        'class' => 'btn btn-danger pull-right print',
                        'id' => 'cetaknota'
                    )) ?>
                </div>

                <?php $this->endWidget(); ?>
                <!-- END FORM-->
            </div>
        </div>
	</div>
</div>

<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/custom/jquery.printPage.js" type="text/javascript"></script>
<script>
    $(".print").printPage();
    //$(".printsuratjalan").printPage();

    function setJatuhTempo(v) {
        jatuh_tempo = v;
        //alert(jatuh_tempo);
        var id = '<?php echo $model->KODE_ORDER;?>';
        var url = '<?php echo Yii::app()->createUrl("order/savetempo/'+id+'")?>';
        $.ajax({
            url:url,
            data:'jatuh='+jatuh_tempo,
            type:'POST',
            beforeSend:function(){},
            success:function(data){
                $.gritter.add({
                    text: 'Data telah berhasil disimpan!'
                });
            }
        });
    }

    var jatuh_tempo;

    function savePembayaran() {
        var id = '<?php echo $model->KODE_ORDER;?>';
        var pembayaran = $('#Order_PEMBAYARAN').val();
        var total = '<?php echo $model->getTotal(); ?>';
        var url = '<?php echo Yii::app()->createUrl("order/savepembayaran/'+id+'")?>';
        $.ajax({
            url:url,
            data:'bayar='+pembayaran,
            type:'POST',
            beforeSend:function(){},
            success:function(data){
                var response = $.parseJSON(data);
                if($.isNumeric(pembayaran) == false){
                    if(pembayaran != ''){
                        $("#Order_PEMBAYARAN").val(pembayaran);
                        alert('Isian harus berupa angka.');
                    }else{
                        alert('Pembayaran harus diisi.');
                    }
                }
                else {
                    if (response.result == 'true') {
                        $.bootstrapGrowl("Data telah berhasil disimpan!",{
                            ele: 'body', // which element to append to
                            type: 'success', // (null, 'info', 'danger', 'success')
                            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
                            align: 'right', // ('left', 'right', or 'center')
                            width: 300, // (integer, or 'auto')
                            delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                            allow_dismiss: true, // If true then will display a cross to close the popup.
                            stackup_spacing: 10 // spacing between consecutively stacked growls.
                        });
                        $('#Order_PEMBAYARAN').html(pembayaran.toLocaleString());
                        updateKembalian(response.kembalian);
                    }
                    else if (response.result == 'false') {
                        $('#Order_PEMBAYARAN').html(pembayaran.toLocaleString());
                        alert("Isian pembayaran harus sama dengan atau melebihi dari total pembayaran.");
                    }
                }                
            }
        });
    }

    function updateKembalian(data){
        if(data.toLocaleString()!='NaN')
            $('#Order_KEMBALIAN').html(data.toLocaleString());
        else
            $('#Order_KEMBALIAN').html('0');
    }

    function cetakNota() {
        var bayar = $('#Order_PEMBAYARAN').val();
        bayar = bayar.replace('.', '');
        
        var kembali = bayar - <?php echo $model->getTotal() ?>;
        $('#Order_KEMBALIAN').attr('value', kembali);
        
        $(this).attr('href', $(this).attr('href') + '?bayar=' + bayar + '&kembali=' + kembali);
    }


    $('#cetaknota').click(function() {
        var bayar = $('#Order_PEMBAYARAN').val();
        bayar = bayar.replace('.', '');
        
        var kembali = bayar - <?php echo $model->getTotal() ?>;
        $('#Order_KEMBALIAN').attr('value', kembali);
        
        $(this).attr('href', $(this).attr('href') + '?bayar=' + bayar + '&kembali=' + kembali);
    });
</script>