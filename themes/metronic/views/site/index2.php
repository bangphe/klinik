<?php echo Yii::app()->user->getFlash('info') ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'order-form',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
    ),
)); ?>

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
                <span class="bold uppercase">Metronic Inc.</span>
                <br/> 25, Lorem Lis Street, Orange C
                <br/> California, US
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
            <?php echo $form->textField($orderbaru,'ID_PASIEN',array('maxlength'=>100,'class'=>'form-control','placeholder'=>'Pilih pasien terlebih dahulu','disabled'=>true)); ?>
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
                            <li class="active">
                                <a href="#tab_5_1" data-toggle="tab"> Section 1 </a>
                            </li>
                            <li>
                                <a href="#tab_5_2" data-toggle="tab"> Section 2 </a>
                            </li>
                            <li>
                                <a href="#tab_5_3" data-toggle="tab"> Section 3 </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_5_1">
                                <div class="clearfix"></div></br>
                                <form action="#" class="form-horizontal">
                                    <div class="form-body">
                                        <!-- <div class="form-group">
                                            <label class="col-md-4 control-label">Status</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="icheck-inline">
                                                        <label><input data-radio="iradio_square-blue" type="radio" name="Banner[STATUS]" checked class="icheck" value="1"> Aktif </label>
                                                        <label><input data-radio="iradio_square-blue" type="radio" name="Banner[STATUS]" class="icheck" value="0"> Non Aktif </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nama</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="nama" name="[0]nama" class="form-control nama" placeholder="Cari disini" />
                                                        <span class="help-block"> Ketikkan nama barang </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Jumlah</label>
                                                    <div class="col-md-9">
                                                        <select name="foo" class="form-control">
                                                            <option value="1">Option 1</option>
                                                            <option value="1">Option 2</option>
                                                            <option value="1">Option 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nama</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="nama" name="[0]nama" class="form-control nama" placeholder="Cari disini" />
                                                        <span class="help-block"> Ketikkan nama barang </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Jumlah</label>
                                                    <div class="col-md-9">
                                                        <select name="foo" class="form-control">
                                                            <option value="1">Option 1</option>
                                                            <option value="1">Option 2</option>
                                                            <option value="1">Option 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nama</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="nama" name="[0]nama" class="form-control nama" placeholder="Cari disini" />
                                                        <span class="help-block"> Ketikkan nama barang </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Jumlah</label>
                                                    <div class="col-md-9">
                                                        <select name="foo" class="form-control">
                                                            <option value="1">Option 1</option>
                                                            <option value="1">Option 2</option>
                                                            <option value="1">Option 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="newfield"></div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn btn-md red uppercase" onclick="newField()"><i class="fa fa-plus"></i> Tambah</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                        if (count($pasien_today > 0)) {
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
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">Tidak ada data.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins </div>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </p>
            </div>
        </div>
    </div>
    <div class="row invoice-subtotal">
        <div class="col-xs-3">
            <h2 class="invoice-title uppercase">Subtotal</h2>
            <p class="invoice-desc">23,800$</p>
        </div>
        <div class="col-xs-3">
            <h2 class="invoice-title uppercase">Tax (0%)</h2>
            <p class="invoice-desc">0$</p>
        </div>
        <div class="col-xs-6">
            <h2 class="invoice-title uppercase">Total</h2>
            <p class="invoice-desc grand-total">23,800$</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <a class="btn btn-lg green-haze uppercase print-btn"><i class="fa fa-save"></i> Simpan</a>
        </div>
    </div>
</div>
<?php $this->endWidget();?>

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
    var item = '<?= Yii::app()->baseUrl; ?>/site/getitem';
    $.ajax({
        url: item,
        data: '',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var result;
            var source  = [ ];
            var mapping = { };

            if (!data || data.length === 0) {
                result = [{
                    label: 'No match found.'
                }];
            } else {
                for(var i = 0; i < data.length; ++i) {
                    source.push($.trim(data[i]['NAMA_ITEM']));
                    mapping[data[i]['NAMA_ITEM']] = data[i]['ID_ITEM'];
                }
                $(".nama").autocomplete({
                    delay: 0,
                    source: source,
                    minLength:0,
                    search  : function(){$(this).addClass('working');},
                    // open: function (e, ui) {
                    //     $(this).removeClass('working');

                    //     var acData = $(this).data('ui-autocomplete');
                    //     acData
                    //     .menu
                    //     .element
                    //     .find('li')
                    //     .each(function () {
                    //         var me = $(this);
                    //         var keywords = acData.term.split(' ').join('|');
                    //         me.html(me.text().replace(new RegExp("(" + keywords + ")", "gi"), '<b>$1</b>'));
                    //     });
                    // },
                    // select: function(e, ui) {
                    //     $("#ID_ITEM").val(mapping[ui.item.value]);
                    // }
                    create: function () {
                        $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                          return $('<li>')
                            .append( "<a>" + item.value + ' </br> Harga: ' + item.label + "</a>" )
                            .appendTo(ul);
                        };
                    }
                });
            }
        }
    });
});

var idform=1;
function newField(){
    var form_template = $('#form-order-template').html();
    form_template = form_template.replace('[0][nama]','['+idform+'][nama]');
    form_template = form_template.replace('[0][ID_KATEGORI_JURNAL]','['+idform+'][ID_KATEGORI_JURNAL]');
    form_template = form_template.replace('[0][KUANTITAS_OUTPUT]','['+idform+'][KUANTITAS_OUTPUT]');

    form_template = form_template.replace('removeForm(template)','removeForm('+idform+')');
    form_template = form_template.replace('newoptionscontainer_0','newoptionscontainer_'+idform);

    form_template = form_template.replace('showOptions(this.value,0)','showOptions(this.value,'+idform+')');

    form_template = form_template.replace('remove-btn-value','remove-btn-'+idform);
    $('#newfield').append('<div id="form_kolom_'+idform+'">'+form_template+'</div>');
    idform++;
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
            $('#Order_ID_PASIEN').attr('value', data);
        }
    });
}
</script>

<div style="display:none;">
    <?php $this->renderPartial('_form_order_template', array('order'=>$order));?>
</div>