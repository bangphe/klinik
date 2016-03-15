<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link(CHtml::encode($data->NAMA), array('view','id'=>$data->ID_USER), array('title'=>'Detil')); ?></td>
    <td><?php echo MyFormatter::formatRoleUser($data->ID_ROLE); ?></td>
    <td><?php echo CHtml::encode($data->USERNAME); ?></td>
    <td><?php echo $data->TERAKHIR_LOGIN == NULL ? '-' : CHtml::encode(MyFormatter::formatTanggalWaktu($data->TERAKHIR_LOGIN)); ?></td>
    <td><?php echo MyFormatter::statusAktif($data->STATUS); ?></td>
    <td width="12%">
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i> Hapus',array('delete','id'=>$data->ID_USER),array('class'=>'btn btn-sm red filter-cancel','submit'=>array('delete','id'=>$data->ID_USER),'confirm'=>'Apakah Anda yakin akan menghapus '.$data->NAMA.'?')); ?>
    </td>
</tr>