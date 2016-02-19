<?php echo Yii::app()->user->getFlash('info') ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'order-form',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
    ),
)); ?>

<?php echo $form->errorSummary($orderbaru); ?>

<div class="invoice-content-2 bordered">
    <div class="row invoice-head">
        <div class="col-md-7 col-xs-6">
            <div class="invoice-logo">
                <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/pages/img/logos/logo5.jpg" class="img-responsive" alt="" />
                <!-- <h1 class="uppercase">Invoice</h1> -->
            </div>
        </div>
        <div class="col-md-5 col-xs-6">
            <div class="company-address">
                <span class="bold uppercase">Klinik Uce & Phe</span>
                <br/> Jalan Celalu Beldua
                <br/> Sepanjang - Sidoarjo
                <br/>
                <span class="bold">T</span> 1800 123 456
            </div>
        </div>
    </div>
    <div class="row invoice-cust-add">
        <div id="pasien-grid" class="col-xs-12 table-responsive">
            <div class="portlet light ">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Daftar Pasien</span>
                    </div>
                    <div class="actions">
                        <!-- <?//= CHtml::link('<span class="fa fa-plus"></span> Tambah Baru', array('#basic'), array('class' => 'btn green btn-outline sbold uppercase', 'data-toggle'=>'modal')); ?> -->
                        <a class="btn green btn-outline sbold uppercase" data-toggle="modal" href="#basic"> Tambah Baru </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Pasien </th>
                                <th> Alamat </th>
                                <th> Nomor Telepon </th>
                                <th> Jenis Kelamin </th>
                                <th> Tanggal Registrasi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $this->widget('zii.widgets.CListView', array(
                                'dataProvider'=>$dataProvider,
                                'itemView'=>'_view_pasien',
                                'summaryText'=>'',
                                'emptyText'=>'',
                            )); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <h2 class="invoice-title uppercase">Pasien</h2>
            <?php echo $form->textField($orderbaru,'NAMA',array('maxlength'=>100,'class'=>'form-control','placeholder'=>'Pilih pasien terlebih dahulu','disabled'=>true)); ?>
            <?php echo $form->hiddenField($orderbaru,'ID_PASIEN',array('type'=>'hidden')); ?>
            <?php echo $form->error($orderbaru,'ID_PASIEN'); ?>
        </div>
        <div class="col-xs-4">
            <h2 class="invoice-title uppercase">Tanggal</h2>
            <input name="tanggal" id="tanggal" type="text" class="form-control" value="<?= MyFormatter::formatTanggal(date('Y-m-d')); ?>" disabled="true">
        </div>
        <div class="col-xs-4">
            <h2 class="invoice-title uppercase">Biaya Registrasi</h2>
            <p class="invoice-desc inv-address">5000</p>
        </div>        
    </div>
    <div class="row invoice-body">
        <div class="col-xs-8 table-responsive">
            <div class="portlet mt-element-ribbon light portlet-fit bordered">
                <div class="ribbon ribbon-vertical-right ribbon-shadow ribbon-color-primary uppercase">
                    <div class="ribbon-sub ribbon-bookmark"></div>
                    <i class="fa fa-star"></i>
                </div>
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers"></i>
                        <span class="caption-subject bold uppercase">Detil Order</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-custom ">
                        <ul class="nav nav-tabs ">
                            <!-- <?php //foreach (Kategori::listAll() as $i => $tipe): ?>
                                <li class="<?php //echo $i == 1 ? 'active' : '' ?>">
                                    <a href="#tab_5_<?php //echo $i ?>" data-toggle="tab">
                                        <?php //echo strtoupper($tipe) ?> </a>
                                </li>
                            <?php //endforeach; ?> -->
                            <li class="active">
                                <a href="#tab_5_1" data-toggle="tab">DAFTAR ITEM</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_5_1">
                                <div class="clearfix"></div></br>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($orderbaru, 'RESEP', array('class' => 'control-label col-md-3')); ?>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <div class="icheck-inline">
                                                            <label><input data-radio="iradio_square-blue" type="radio" name="Order[RESEP]" checked class="icheck" value="1"> Resep Umum </label>
                                                            <label><input data-radio="iradio_square-blue" type="radio" name="Order[RESEP]" class="icheck" value="2"> Resep Obat </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama</label>
                                                <div class="col-md-9">
                                                    <?php echo $form->dropDownList($orderbaru->orderdetail, '[0]ID_ITEM', /*Item::listItemPerKategori(Item::KATEGORI_OBAT)*/Item::listAllItem(), array(
                                                        'class' => 'form-control form-select',
                                                        'prompt' => '-- Pilih Item --',
                                                        'required',
                                                        'onchange' => 'getStokItem(this.value, 0)',
                                                    )); ?>
                                                    <!-- </br>
                                                    <dl>
                                                        <dt>Description lists</dt>
                                                        <dd>A description list is perfect for defining terms.</dd>
                                                    </dl> -->
                                                    <span class="help-block"> Ketikkan nama item </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($orderbaru->orderdetail,'[0]JUMLAH',array('class'=>'control-label col-md-4')); ?>
                                                <div class="col-md-6">
                                                    <?php echo $form->numberField($orderbaru->orderdetail,'[0]JUMLAH',array(
                                                        'class' => 'form-control input-xsmall',
                                                        'min' => 0,
                                                        //'max' => Item::getTotalStok($item->ID_ITEM),
                                                        'placeholder' => '0',
                                                        'disabled' => 'true',
                                                    ));?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($orderbaru->orderdetail,'[0]DISKON',array('class'=>'control-label col-md-4')); ?>
                                                <div class="col-md-6">
                                                    <?php echo $form->numberField($orderbaru->orderdetail,'[0]DISKON',array(
                                                        'class' => 'form-control input-xsmall',
                                                        'min' => 0,
                                                        //'max' => Item::getTotalStok($item->ID_ITEM),
                                                        'placeholder' => '0',
                                                        'disabled' => 'true',
                                                    ));?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div id="newfield_0"></div> -->
                                <div id="newfield_0">
                                    <div id="form_kolom_0_0"></div>
                                </div>

                                <div class="form-actions center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-9 col-md-12">
                                                    <button type="button" class="btn btn-sm red uppercase" onclick="newField(0)"><i class="fa fa-plus"></i> Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_5_2">
                                <p> Howdy, I'm in Section 2. </p>
                                <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                    consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation. </p>
                                <p>
                                    <a class="btn green" href="ui_tabs_accordions_navs.html#tab_5_2" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div>
                            <div class="tab-pane" id="tab_5_3">
                                <p> Howdy, I'm in Section 3. </p>
                                <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                                    iriure dolor in hendrerit in vulputate velit esse molestie consequat </p>
                                <p>
                                    <a class="btn yellow" href="ui_tabs_accordions_navs.html#tab_5_3" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php echo CHtml::submitButton('Hitung & Cetak Nota', array('class' => 'btn btn-lg green-haze uppercase print-btn')); ?>
                </div>
            </div>
            <?php $this->endWidget();?>
        </div>
        <div class="col-xs-4 table-responsive">
            <div class="mt-element-ribbon bg-grey-steel">
                <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-round ribbon-color-info uppercase">
                    <div class="ribbon-sub ribbon-clip ribbon-right"></div> Data Pasien Hari Ini : <?= MyFormatter::formatTanggal(date('Y-m-d')); ?> </div>
                <p class="ribbon-content">
                    <div class="clearfix"></div></br>
                    <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                        <ul class="feeds">
                        <?php 
                        if (count($pasien_today) > 0) {
                        foreach ($pasien_today as $value) { ?>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"><?= $value->NAMA_PASIEN; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins </div>
                                </div>
                            </li>
                            <?php } } else { ?>
                                <div class="alert alert-warning"><i>Belum ada data yang masuk.</i> </div>
                            <?php } ?>
                        </ul>
                    </div>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Tambah Pasien</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('_new_pasien', array('pelanggan_baru' => $pelanggan_baru)) ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script type="text/javascript">
$(document).ready(function(){
    $(".form-select").select2();
    $("#order-form").validate();
});

var idform=1;

function newField(i){
    //alert("#form_kolom_"+idform+" input[name='OrderDetail["+idform+"][ID_ITEM]']");
    $('.form-select').select2('destroy');
    var form_template = $('#options_template_template').html();

    form_template = form_template.replace('OrderDetail_0_JUMLAH','OrderDetail_'+idform+'_JUMLAH');
    // form_template = form_template.replace('OrderDetail_0_DISKON','OrderDetail_'+idform+'_DISKON');
    form_template = form_template.replace('[0][ID_ITEM]','['+idform+'][ID_ITEM]');
    form_template = form_template.replace('[0][JUMLAH]','['+idform+'][JUMLAH]');
    form_template = form_template.replace('[0][DISKON]','['+idform+'][DISKON]');
    form_template = form_template.replace('options_template_template','options_'+idform);
    form_template = form_template.replace('newoptions_template','newfield_'+idform);
    form_template = form_template.replace('getStokItem(this.value, 0)','getStokItem(this.value, '+idform+')');

    form_template = form_template.replace('removeForm(template)','removeForm('+idform+')');

    form_template = form_template.replace('remove-btn-value','remove-btn-'+idform);
    $('#newfield_'+i).append('<div id="form_kolom_'+idform+'">'+form_template+'</div>');
    idform++;
    //alert(form_template);
    var i = 0;
    $('.form-select').each(function () {
        $(this).attr("id",'item-' + i).select2();
        i++;
    });
}

function getStokItem(id, i) {
    var path = '<?= Yii::app()->baseUrl; ?>/site/getstokitem';
    //var i = 0;
    //alert('#OrderDetail_'+i+'_JUMLAH');
    $.ajax({
        url:path,
        type:'get',
        data:'id='+id,
        beforeSend: function(){},
        success: function(data){
            //$("input[name='OrderDetail["+idform+"][ID_ITEM]']").val(mapping[ui.item.value]);
            //$('#OrderDetail_'+i+'_JUMLAH').attr('value', data);
            //$("input[name='OrderDetail["+i+"][JUMLAH]']").attr('value', data);
            if(data == null || data == 0 || data == '') {
                //$("#OrderDetail_0_JUMLAH").attr("value", "0");
                $("input[name='OrderDetail["+i+"][JUMLAH]']").attr("disabled", "disabled");
                $("input[name='OrderDetail["+i+"][DISKON]']").attr("disabled", "disabled");
                alert("Item yang dipilih tidak dapat diproses dikarenakan STOK HABIS!");
            }
            else {
                $("input[name='OrderDetail["+i+"][JUMLAH]']").removeAttr("disabled");
                $("input[name='OrderDetail["+i+"][DISKON]']").removeAttr("disabled");
            }
            //i++;
        }
    });
}

function pilihpasien(kdpasien) {
    var path = '<?= Yii::app()->baseUrl; ?>/site/getpasien';
    $.ajax({
        url:path,
        type:'get',
        data:'id='+kdpasien,
        beforeSend: function(){},
        success: function(data){
            //$("#dialog-body").html(data);
            $('#Order_NAMA').attr('value', data);
            $('#Order_ID_PASIEN').attr('value', +kdpasien);
        }
    });
}
</script>

<div style="display:none;">
    <?php $this->renderPartial('_form_order_template', array('order'=>$order,'orderbaru'=>$orderbaru));?>
</div>