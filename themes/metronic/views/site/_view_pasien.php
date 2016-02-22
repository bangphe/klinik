<tr>
    <td width="5%"><?php echo CHtml::link('<span class="fa fa-check-square-o"></span> PILIH', "#", array("class" => "btn btn-xs green-meadow", "onclick" => "pilihpasien($data->ID_PASIEN)")); ?></td>
    <td>
    	<?php echo CHtml::link(CHtml::encode($data->NAMA_PASIEN), array('/pasien/view','id'=>$data->ID_PASIEN), array('title'=>'Detil')); ?>
    </td>
    <td><?php echo CHtml::encode($data->ALAMAT); ?></td>
    <td><?php echo CHtml::encode($data->NO_TELP); ?></td>
    <td><?php echo CHtml::encode($data->JENIS_KELAMIN); ?></td>
    <td><?php echo CHtml::encode(MyFormatter::formatTanggalWaktu($data->TANGGAL_REGISTRASI)); ?></td>
</tr>