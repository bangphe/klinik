<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link(CHtml::encode($data->NAMA_GOLONGAN), array('view','id'=>$data->ID_GOLONGAN_OBAT), array('title'=>'Detil')); ?></td>
    <td width="12%">
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i> Hapus',array('delete','id'=>$data->ID_GOLONGAN_OBAT),array('class'=>'btn btn-sm red filter-cancel','submit'=>array('delete','id'=>$data->ID_GOLONGAN_OBAT),'confirm'=>'Apakah Anda yakin akan menghapus '.$data->NAMA_GOLONGAN.'?')); ?>
    </td>
</tr>