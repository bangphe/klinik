<?php

/**
 * This is the model class for table "pasien".
 *
 * The followings are the available columns in table 'pasien':
 * @property integer $ID_PASIEN
 * @property integer $ID_LAYANAN
 * @property string $NAMA_PASIEN
 * @property string $ALAMAT
 * @property string $NO_TELP
 * @property string $JENIS_KELAMIN
 * @property string $KETERANGAN
 * @property integer $BIAYA_REGISTRASI
 * @property string $TANGGAL_REGISTRASI
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 * @property Layanan $iDLAYANAN
 */
class Pasien extends CActiveRecord
{
	const PRIA = 'L', WANITA = 'P';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pasien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_LAYANAN, NAMA_PASIEN, ALAMAT, NO_TELP, JENIS_KELAMIN', 'required', 'on' => 'baru', 'message' => '{attribute} wajib diisi'),
			array('ID_LAYANAN, BIAYA_REGISTRASI', 'numerical', 'integerOnly'=>true),
			array('NAMA_PASIEN', 'length', 'max'=>100),
			array('ALAMAT', 'length', 'max'=>200),
			array('NO_TELP', 'length', 'max'=>15),
			array('KETERANGAN', 'length', 'max'=>255),
			array('TANGGAL_REGISTRASI', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PASIEN, ID_LAYANAN, NAMA_PASIEN, ALAMAT, NO_TELP, JENIS_KELAMIN, KETERANGAN, BIAYA_REGISTRASI, TANGGAL_REGISTRASI', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'orders' => array(self::HAS_MANY, 'Order', 'ID_PASIEN'),
			'iDLAYANAN' => array(self::BELONGS_TO, 'Layanan', 'ID_LAYANAN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PASIEN' => 'Id Pasien',
			'ID_LAYANAN' => 'Layanan',
			'NAMA_PASIEN' => 'Nama Pasien',
			'ALAMAT' => 'Alamat',
			'NO_TELP' => 'No Telp',
			'JENIS_KELAMIN' => 'Jenis Kelamin',
			'KETERANGAN' => 'Keterangan',
			'BIAYA_REGISTRASI' => 'Biaya Registrasi',
			'TANGGAL_REGISTRASI' => 'Tanggal Registrasi',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_PASIEN',$this->ID_PASIEN);
		$criteria->compare('ID_LAYANAN',$this->ID_LAYANAN);
		$criteria->compare('NAMA_PASIEN',$this->NAMA_PASIEN,true);
		$criteria->compare('ALAMAT',$this->ALAMAT,true);
		$criteria->compare('NO_TELP',$this->NO_TELP,true);
		$criteria->compare('JENIS_KELAMIN',$this->JENIS_KELAMIN);
		$criteria->compare('KETERANGAN',$this->KETERANGAN,true);
		$criteria->compare('BIAYA_REGISTRASI',$this->BIAYA_REGISTRASI);
		$criteria->compare('TANGGAL_REGISTRASI',$this->TANGGAL_REGISTRASI,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function siapaAku($id)
    {
       if($id != 0){
           $pelanggan = Pasien::model()->findByPk($id);
           if(count($pelanggan) > 0){
               return $pelanggan->NAMA_PASIEN;
           }else{
               return "-";
           }
       }else{
           return "-";
       }
    }
	public function searchDesc()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
        $criteria->order = 'ID_PASIEN desc';

		$criteria->compare('ID_PASIEN',$this->ID_PASIEN);
		$criteria->compare('NAMA_PASIEN',$this->NAMA_PASIEN,true);
		$criteria->compare('ALAMAT',$this->ALAMAT,true);
		$criteria->compare('NO_TELP',$this->NO_TELP,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pasien the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function ListPasienSMS()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "NO_TELP != ''";
        $pelanggan = self::model()->findAll($criteria);
        $list = array();
        foreach ($pelanggan as $key => $value) {
            if(strlen($value['NO_TELP']) > 10){
                $list[$value['ID_PASIEN']] = $value['NAMA_PASIEN']." (".$value['NO_TELP'].")";
            }
        }
        return $list;

    }
}
