<?php
/* @var $this UserController */
/* @var $data User */
?>
<div class="col-md-12 col-sm-12">
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Data User </div>
            <div class="actions">
                <a href="user/create" class="btn btn-default btn-sm">
                    <i class="fa fa-plus"></i> Tambah User </a>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_3">
                <thead>
                    <tr>
                        <th> Id User </th>
                        <th> Id Role </th>
                        <th> Nama User </th>
                        <th> Username </th>
                        <th> Password </th>
                        <th> Terakhir Login </th>
                        <th> Status </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td>
                        	<?php echo CHtml::link(CHtml::encode($data->ID_USER), array('view', 'id'=>$data->ID_USER)); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->ID_ROLE); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->NAMA); ?> 
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->USERNAME); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->PASSWORD); ?>
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->TERAKHIR_LOGIN); ?> 
                        </td>
                        <td>
                             <?php echo CHtml::encode($data->STATUS); ?> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="clearfix"></div>