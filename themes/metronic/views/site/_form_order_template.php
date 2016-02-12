<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survei-form-template',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

	<div id="form-order-template">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<br>
		<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3">Nama</label>
                    <div class="col-md-9">
                        <input type="text" id="nama" name="[0]nama" class="form-control namas" placeholder="Cari disini" />
                        <span class="help-block"> This is inline help </span>
                    </div>
                </div>
            </div>
            <!--/span-->
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
            <!--/span-->
        </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->