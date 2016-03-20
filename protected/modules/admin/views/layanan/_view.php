<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link(CHtml::encode($data->LAYANAN), array('view','id'=>$data->ID_LAYANAN), array('title'=>'Detil')); ?></td>
    <td><?php echo MyFormatter::formatUang($data->BIAYA); ?></td>
    <td width="12%">
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i> Hapus',array('delete','id'=>$data->ID_LAYANAN),array('class'=>'btn btn-sm red filter-cancel','submit'=>array('delete','id'=>$data->ID_LAYANAN),'confirm'=>'Apakah Anda yakin akan menghapus '.$data->LAYANAN.'?')); ?>
    </td>
</tr>