<?php
class MyFormatter extends CFormatter
{   
    public static function formatTimeAgo($date,$granularity=2) {
        $retval='';
        $date = strtotime($date);
        $difference = time() - $date;
        $periods = array('decade' => 315360000,
            'year' => 31536000,
            'month' => 2628000,
            'week' => 604800, 
            'day' => 86400,
            'hour' => 3600,
            'minute' => 60,
            'second' => 1);

        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return $retval.' ago';      
    }

    public static function formatAngka($value) {
        return number_format($value, 0, ',', '.');
    }
    public static function alertInfo($message)
    {
        return '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
    
    public static function alertWarning($message)
    {
        return '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
    
    public static function alertError($message)
    {
        return '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
    
    public static function alertSuccess($message)
    {
        return '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }

    public static function alertInfoSuccess($message)
    {
        return '<div class="callout callout-success fade in"><button type="button" class="close" data-dismiss="alert">×</button><h5>Selamat!</h5><p>'.$message.'</p></div>';
    }

    public static function stokBarang($value){
        if($value < 50)
            return '<span class="label label-danger">'.$value.'</span>';
        else if($value >= 50 && $value < 75)
            return '<span class="label label-warning">'.$value.'</span>';
        else if($value >=75 && $value <= 200)
            return '<span class="label label-success">'.$value.'</span>';
    }

    public static function formatRoleUser($value){
        if($value==User::ADMIN)
            return '<span class="label label-info">Admin</span>';
        else if($value==User::USER)
            return '<span class="label label-danger">User</span>';
        else
            return '<span class="label">Unknown</span>';
    }

    public static function formatJk($value){
        if($value==Pasien::PRIA)
            return '<span class="label label-success">Pria</span>';
        else if($value==Pasien::WANITA)
            return '<span class="label label-danger">Wanita</span>';
        else
            return '<span class="label">Unknown</span>';
    }

    public static function formatResep($value){
        if($value==Order::RESEP_UMUM)
            return '<span class="label label-info">Resep umum</span>';
        else if($value==Order::RESEP_DOKTER)
            return '<span class="label label-danger">Resep dokter</span>';
        else
            return '<span class="label">Unknown</span>';
    }

    public static function formatLayanan($value){
        if($value==Layanan::OPTIK)
            return '<span class="label label-info">Optik</span>';
        else
            return '<span class="label">Unknown</span>';
    }

    public static function formatKategori($value){
        if($value==Kategori::OBAT)
            return '<span class="label label-info">OBAT</span>';
        else if($value==Kategori::GAGANG)
            return '<span class="label label-danger">GAGANG</span>';
        else if($value==Kategori::LENSA)
            return '<span class="label label-warning">LENSA</span>';
        else
            return '<span class="label">Unknown</span>';
    }

    public static function formatPembayaran($value){
        if($value==Order::BELOM_DIBAYAR)
            return '<span class="label label-warning">Belum dibayar</span>';
        else if($value==Order::SUDAH_DIBAYAR)
            return '<span class="label label-success">Sudah dibayar</span>';
        else
            return '<span class="label">Unknown</span>';
    }

    public static function formatUang($value) {
        return "Rp. " . number_format($value, 0, ',', '.');
    }

    public static function formatUangNota($value) {
        return "Rp. " . number_format($value, 0, ',', '.');
    }
	public static function formatUangNotaTanpaRupiah($value) {
        return "" . number_format($value, 0, ',', '.');
    }

    public static function hitungDiskon($diskon, $harga) {
        $harga_diskon=0;
        $harga_total=0;
        
        if($diskon==0) {
            return "Rp. " . number_format($harga, 0, ',', '.');
        }
        else {
            $harga_diskon = ($diskon*$harga)/100;
            $harga_total = $harga-$harga_diskon;
            return "Rp. " . number_format($harga_total, 0, ',', '.');
        }       
    }

    public static function subtotalNota($diskon, $harga, $jumlah, $resep) {
        $harga_diskon=0;
        $harga_total=0;
        
        if($diskon==0) {
            if ($resep == Order::RESEP_DOKTER) {
                return "Rp. " . number_format(($harga * $jumlah) + 1200, 0, ',', '.');
            }
            elseif ($resep == Order::RESEP_UMUM) {
                return "Rp. " . number_format($harga * $jumlah, 0, ',', '.');
            }
        }
        else {
            $harga_diskon = ($diskon*$harga)/100;
            $harga_total = $harga-$harga_diskon;
            if ($resep == Order::RESEP_DOKTER) {
                return "Rp. " . number_format(($harga * $jumlah) + 1200, 0, ',', '.');
            }
            elseif ($resep == Order::RESEP_UMUM) {
                return "Rp. " . number_format($harga * $jumlah, 0, ',', '.');
            }
        }       
    }
	
	public static function subtotalNotaTanpaRp($diskon, $harga, $jumlah) {
        $harga_diskon=0;
        $harga_total=0;
        
        if($diskon==0) {
            return "" . number_format($harga * $jumlah, 0, ',', '.');
        }
        else {
            $harga_diskon = ($diskon*$harga)/100;
            $harga_total = $harga-$harga_diskon;
            return "" . number_format($harga_total * $jumlah, 0, ',', '.');
        }       
    }

    public static function formatStatusBerhasil($value) {
       if ($value == 1)
           return '<span class="label label-success">Berhasil</span>';
       else
           return '<span class="label label-danger">Gagal</span>';
   }

    public static function formatStatusUser($value)
    {
        if($value==User::STATUS_AKTIF)
            return '<span class="label label-success">Aktif</span>';
        else
            return '<span class="label label-warning">Non Aktif</span>';
    }

    public static function statusPembayaran($value)
    {
        if($value==0)
            return '<span class="label label-sm label-success">TUNAI</span>';
        else
            return '<span class="label label-sm label-warning">HUTANG</span>';
    }

    public static function statusAktif($value)
    {
        if($value==Item::STATUS_AKTIF)
            return '<span class="label label-sm label-success">AKTIF</span>';
        else
            return '<span class="label label-sm label-warning">NON AKTIF</span>';
    }
    
    public function formatStatusAktif($value)
    {
        if($value==Item::STATUS_AKTIF)
            return '<span class="label label-success">AKTIF</span>';
        else
            return '<span class="label label-warning">NON AKTIF</span>';
    }

    public static function formatApprovalSurvei($value)
    {
        if($value==Respon::DISETUJUI)
            return '<span class="label label-success">Disetujui</span>';
        else
            return '<span class="label label-warning">Belum disetujui</span>';
    }

    public static function formatBulan($bulan) {
        if ($bulan=='01') {
            return 'Januari';
        } elseif ($bulan=='02') {
            return 'Februari';
        } elseif ($bulan=='03') {
            return 'Maret';
        } elseif ($bulan=='04') {
            return 'April';
        } elseif ($bulan=='05') {
            return 'Mei';
        } elseif ($bulan=='06') {
            return 'Juni';
        } elseif ($bulan=='07') {
            return 'Juli';
        } elseif ($bulan=='08') {
            return 'Agustus';
        } elseif ($bulan=='09') {
            return 'September';
        } elseif ($bulan=='10') {
            return 'Oktober';
        } elseif ($bulan=='11') {
            return 'Nopember';
        } elseif ($bulan=='12') {
            return 'Desember';
        } else {
            return 'Bulan tidak diketahui';
        }
    }

    public static function formatTanggal($value)
	{
        if($value != NULL) {
            $date = explode('-',$value);
            $bulan = '';
            switch($date[1])
            {
                case '01':
                    $bulan = 'Januari';
                    break;
                case '02':
                    $bulan = 'Februari';
                    break;
                case '03':
                    $bulan = 'Maret';
                    break;
                case '04':
                    $bulan = 'April';
                    break;
                case '05':
                    $bulan = 'Mei';
                    break;
                case '06':
                    $bulan = 'Juni';
                    break;
                case '07':
                    $bulan = 'Juli';
                    break;
                case '08':
                    $bulan = 'Agustus';
                    break;
                case '09':
                    $bulan = 'September';
                    break;
                case '10':
                    $bulan = 'Oktober';
                    break;
                case '11':
                    $bulan = 'Nopember';
                    break;
                case '12':
                    $bulan = 'Desember';
                    break;
            }

            return substr($date[2],0,2).' '.$bulan.' '.$date[0];
        }
	}

    public static function formatTanggalWaktu($value) {
        $date = explode('-', $value);
        $bulan = '';
        switch ($date[1]) {
            case '01':
                $bulan = 'Januari';
                break;
            case '02':
                $bulan = 'Februari';
                break;
            case '03':
                $bulan = 'Maret';
                break;
            case '04':
                $bulan = 'April';
                break;
            case '05':
                $bulan = 'Mei';
                break;
            case '06':
                $bulan = 'Juni';
                break;
            case '07':
                $bulan = 'Juli';
                break;
            case '08':
                $bulan = 'Agustus';
                break;
            case '09':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'Nopember';
                break;
            case '12':
                $bulan = 'Desember';
                break;
        }

        return substr($date[2], 0, 2) . ' ' . $bulan . ' ' . $date[0] . ' ' . date('H:i', strtotime($value)) . ' WIB';
    }

    public static function formatTanggalWaktu2($value) {
        $date = explode('-', $value);
        
        return substr($date[2], 0, 2) . '-' . $date[1] . '-' . $date[0] . ' ' . date('H:i', strtotime($value)) . ' WIB';
    }
}
?>