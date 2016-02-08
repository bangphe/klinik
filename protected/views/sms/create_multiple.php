<?php
$this->pageTitle = 'Kirim SMS Pelanggan';
$this->breadcrumbs = array(
    'Manajemen SMS' => array('index'),
    'Kirim SMS Pelanggan',
);
?>

<?php 
	$this->renderPartial('_form_multiple', 
		array(
			'model' => $model,
			'smsBerhasil'=>$smsBerhasil,
			'smsGagal'=>$smsGagal,
			'smsTotal'=>$smsTotal,
			'smsKuota'=>$smsKuota,
		)
	); 
?>