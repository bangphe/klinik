<?php
$baseUrl = Yii::app()->theme->baseUrl;
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function(){
        $('#pelanggan-grid').yiiGridView('update', {
          data: $(this).serialize()
        });
        return false;
    });
    
    $('.pelanggan-plus').click(function(){
    $('.new-pelanggan').toggle();
    return false;
    });
");
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red-sunglo search-form">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Daftar Pasien
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', '#', array('style' => 'color:white', 'class' => 'pelanggan-plus')); ?>
                </div>
            </div>
            <div class="portlet-body">
                    <?php
                    $search = $this->beginWidget('CActiveForm', array(
                        'action' => Yii::app()->createUrl($this->route),
                        'method' => 'get',
                    ));
                    ?>

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="fa fa-filter"></i>
                                        <?php echo $search->textField($pelanggan, 'ID_PASIEN', array('class' => 'form-control', 'placeholder' => 'Kode Pasien')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <?php echo $search->textField($pelanggan, 'NAMA_PASIEN', array('class' => 'form-control', 'placeholder' => 'Nama Pasien')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="fa fa-phone"></i>
                                        <?php echo $search->textField($pelanggan, 'NO_TELP', array('class' => 'form-control', 'placeholder' => 'No Telepon')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <?php echo CHtml::submitButton('Cari', array('class' => 'btn blue')); ?>
                            </div>
                        </div>
                        <!--/row-->
                    </div>

                    <?php $this->endWidget(); ?>

                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'pelanggan-grid',
                    'dataProvider' => $pelanggan->searchDesc(),
                    //styling pagination
                    'pager' => array(
                        'header' => '',
                        'selectedPageCssClass' => 'paginate_button active',
                        'hiddenPageCssClass' => 'paginate_button disabled',
                        'htmlOptions' => array('class' => 'pagination'),
                    ),
                    'pagerCssClass' => 'pagination',
                    //'summaryCssClass'=>'alert alert-info',
                    //end styling pagination
                    'summaryText' => 'Menampilkan {start} - {end} dari {count} data Pelanggan',
                    'emptyText' => '<div class="alert alert-error">Tidak ada data Pelanggan ditampilkan</div>',
                    'showTableOnEmpty' => false,
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content table-hover',
                    'columns' => array(
                        array(
                            'name' => 'ID_PASIEN',
                            'type' => 'raw',
                            'value' => 'CHtml::link($data->ID_PASIEN, "#", array("class" => "btn btn-xs btn-success", "onclick" => "pilihkode($data->ID_PASIEN)"))'
                        ),
                        'NAMA_PASIEN',
                        'ALAMAT',
                        'NO_TELP',
                        array(
                            'class' => 'MyCButtonColumn',
                            'template' => '{view} {update}',
                            'buttons' => array(
                                'view' => array(
                                    'url' => 'array("/pelanggan/view", "id" => $data->ID_PASIEN)'
                                ),
                                'update' => array(
                                    'url' => 'array("/pelanggan/update", "id" => $data->ID_PASIEN)'
                                )
                            )
                        )
                    ),
                ));
                ?>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>

    <div class="col-md-12">
        <div class="portlet box blue-hoki new-pelanggan" style="display:none">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Pasien Baru
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <?php $this->renderPartial('_newpelanggan', array('pelanggan_baru' => $pelanggan_baru)) ?>
            </div>
        </div>
    </div>

    <div class="col-md-12">
         <div class="portlet box green-haze">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-shopping-cart"></i>Form Order
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'order-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions'=>array(
                        'class'=>'form-horizontal',
                    ),
                )); ?>
                <div class="form-body">
                    <div class="form-group">
                        <?php echo $form->labelEx($orderbaru,'ID_PASIEN',array('class'=>'control-label col-md-3')); ?>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php echo $form->textField($orderbaru,'ID_PASIEN',array('maxlength'=>100,'class'=>'form-control')); ?>
                            </div>
                            <span class="help-inline"><code>KODE PASIEN</code> yang sudah terdaftar pada sistem.</span>
                            <?php echo $form->error($orderbaru,'ID_PASIEN'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($orderbaru, 'RESEP', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <div class="radio-list">
                                <?php
                                echo $form->radioButtonList($orderbaru, 'RESEP', Order::listResep(), array(
                                    'class'=>'form-control input-large',
                                    'labelOptions'=>array('style'=>'display:inline'),
                                    'template'=>'{input} {label}',
                                ));
                                ?>
                            </div>
                            <?php echo $form->error($orderbaru, 'RESEP'); ?>
                        </div>
                    </div>
                </div>

                <div class="portlet box blue-steel">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-thumb-tack"></i>Daftar Item
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">
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
                                        <div class="row margin-bottom-40">
                                            <div class="search-page search-content-3">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <?php foreach (Item::ListBarangByKategori($i) as $dex => $item): ?>
                                                        <div class="col-md-2">
                                                            <div class="mt-element-ribbon bg-grey-steel">
                                                                <div class="ribbon ribbon-color-danger uppercase"><?php echo $item->NAMA_ITEM;?></div>
                                                                <p class="ribbon-content">
                                                                    <p><?php echo MyFormatter::formatUang($item->HARGA_JUAL); ?>
                                                                         -
                                                                        <span class="<?php echo $item->getStokItem($item->ID_ITEM) > 0 ? 'label label-sm label-primary' : 'label label-sm label-warning';?>"><?php echo $item->getStokItem($item->ID_ITEM) > 0 ? $item->getStokItem($item->ID_ITEM) : 'HABIS';?></span>
                                                                    </p>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo $form->labelEx($orderbaru->orderdetail,'JUMLAH',array('class'=>'control-label')); ?>
                                                                                <?php if($item->getStokItem($item->ID_ITEM) == 0) { ?>
                                                                                <?php echo $form->numberField($orderbaru->orderdetail,"[$item->ID_ITEM]JUMLAH",array(
                                                                                    'class' => 'form-control input-xsmall',
                                                                                    'placeholder' => '0',
                                                                                    'disabled' => 'disabled',
                                                                                ));?>
                                                                                <?php } else { ?>
                                                                                <?php echo $form->numberField($orderbaru->orderdetail,"[$item->ID_ITEM]JUMLAH",array(
                                                                                    'class' => 'form-control input-xsmall',
                                                                                    'min' => 0,
                                                                                    'max' => Item::getTotalStok($item->ID_ITEM),
                                                                                    'placeholder' => '0',
                                                                                ));?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo $form->labelEx($orderbaru->orderdetail,'DISKON',array('class'=>'control-label')); ?>
                                                                                <?php if($item->getStokItem($item->ID_ITEM) == 0) { ?>
                                                                                <?php echo $form->numberField($orderbaru->orderdetail,"[$item->ID_ITEM]DISKON",array(
                                                                                    'class' => 'form-control input-xsmall',
                                                                                    'placeholder' => '0',
                                                                                    'disabled' => 'disabled',
                                                                                ));?>
                                                                                <?php } else { ?>
                                                                                <?php echo $form->numberField($orderbaru->orderdetail,"[$item->ID_ITEM]DISKON",array(
                                                                                    'class' => 'form-control input-xsmall',
                                                                                    'min' => 0,
                                                                                    'max' => 100,
                                                                                    'placeholder' => '0',
                                                                                ));?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions" style="text-align:center">
                    <?php echo CHtml::submitButton('Simpan', array('class' => 'btn blue')); ?>
                </div>
                <?php $this->endWidget();?>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>

<script>
    $('#pelanggan-grid').hide();

    function pilihkode(objek) {
        $('#pelanggan-grid').hide();
        $('#Order_ID_PASIEN').attr('value', objek);
    }
</script>