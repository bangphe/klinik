<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link(CHtml::encode($data->NAMA_PASIEN), array('view','id'=>$data->ID_PASIEN), array('title'=>'Detil')); ?></td>
    <td><?php echo CHtml::encode($data->ALAMAT); ?></td>
    <td><?php echo CHtml::encode($data->NO_TELP); ?></td>
    <td><?php echo CHtml::encode($data->JENIS_KELAMIN == 'L' ? '<i class="fa fa-mars"></i> Pria' : 'Wanita'); ?></td>
    <td><?php echo CHtml::encode(MyFormatter::formatTanggalWaktu($data->TANGGAL_REGISTRASI)); ?></td>
    <td width="12%">
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i> Hapus',array('delete','id'=>$data->ID_PASIEN),array('class'=>'btn btn-sm red filter-cancel','submit'=>array('delete','id'=>$data->ID_PASIEN),'confirm'=>'Apakah Anda yakin akan menghapus '.$data->NAMA_PASIEN.'?')); ?>
    </td>
</tr>