<?php
$this->pageTitle = 'Kirim SMS Manual';
$this->breadcrumbs = array(
    'Manajemen SMS' => array('index'),
    'Kirim SMS Manual',
);
?>

<?php 
	$this->renderPartial('_form', 
		array(
			'model' => $model,
			'smsBerhasil'=>$smsBerhasil,
			'smsGagal'=>$smsGagal,
			'smsTotal'=>$smsTotal,
			'smsKuota'=>$smsKuota,
		)
	); 
?>