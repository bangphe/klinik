<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $KODE_ORDER
 * @property integer $ID_PASIEN
 * @property integer $RESEP
 * @property string $TANGGAL_ORDER
 * @property string $USER_PEMBUAT
 * @property integer $PEMBAYARAN
 * @property integer $KEMBALIAN
 *
 * The followings are the available model relations:
 * @property Pasien $iDPASIEN
 * @property OrderDetail[] $orderDetails
 */
class Order extends CActiveRecord
{
	//STATUS RESEP
	const RESEP_UMUM = 1, RESEP_DOKTER = 2;

	public $NAMA, $SUBTOTAL, $TOTAL, $TGL_ORDER_X;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_PASIEN', 'required', 'on' => 'baru', 'message' => '{attribute} wajib diisi'),
			array('ID_PASIEN, RESEP, PEMBAYARAN, KEMBALIAN', 'numerical', 'integerOnly'=>true),
			array('TANGGAL_ORDER', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KODE_ORDER, ID_PASIEN, RESEP, TANGGAL_ORDER, USER_PEMBUAT, PEMBAYARAN, KEMBALIAN', 'safe', 'on'=>'search'),
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
			'pasien' => array(self::BELONGS_TO, 'Pasien', 'ID_PASIEN'),
			'orderdetail' => array(self::HAS_MANY, 'OrderDetail', 'KODE_ORDER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KODE_ORDER' => 'Kode Order',
			'ID_PASIEN' => 'Id Pasien',
			'RESEP' => 'Resep',
			'TANGGAL_ORDER' => 'Tanggal Order',
			'USER_PEMBUAT' => 'User Pembuat',
			'PEMBAYARAN' => 'Pembayaran',
			'KEMBALIAN' => 'Kembalian',
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

		$criteria->compare('KODE_ORDER',$this->KODE_ORDER,true);
		$criteria->compare('ID_PASIEN',$this->ID_PASIEN);
		$criteria->compare('RESEP',$this->RESEP);
		$criteria->compare('TANGGAL_ORDER',$this->TANGGAL_ORDER,true);
		$criteria->compare('USER_PEMBUAT',$this->USER_PEMBUAT);
		$criteria->compare('PEMBAYARAN',$this->PEMBAYARAN);
		$criteria->compare('KEMBALIAN',$this->KEMBALIAN);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function afterFind() {
        parent::afterFind();
        $this->SUBTOTAL = $this->getSubtotal();
        $this->TOTAL = $this->getTotal();
    }

	public function getTotal($subtotal = '') {
        if(empty($subtotal))
            $subtotal = $this->getSubtotal();

        //return $subtotal - ($subtotal * ($this->DISKON / 100));
    	return $subtotal;
    }

    public function getSubtotal() {
        $subtotal = 0;
        $harga_total = 0;
        $harga_diskon = 0;
        foreach ($this->orderdetail as $detail) {
        	if($detail->DISKON==0)
            	$subtotal += ($detail->HARGA * $detail->JUMLAH);
            else {
            	$harga_diskon = $detail->HARGA * $detail->DISKON/100;
            	$harga_total = $detail->HARGA - $harga_diskon;
            	$subtotal += ($harga_total * $detail->JUMLAH);
            }
        }

        return $subtotal;
    }

    public static function listResep() {
        return array(
            self::RESEP_UMUM => 'Resep umum',
            self::RESEP_DOKTER => 'Resep dokter',
        );
    }

    public static function ListOrder() {
        $criteria = new CDbCriteria;
		$criteria->order = 'TANGGAL_ORDER DESC';
		$criteria->limit = '5';
        return self::model()->findAll($criteria);
    }

    public function getTotalNota($subtotal = '') {
        if(empty($subtotal))
            $subtotal = $this->getSubtotal();

        return $subtotal;
    }

    public static function listOrderToday() {
    	$criteria2 = new CDbCriteria;
        $criteria2->condition = 'date(TANGGAL_ORDER) = date(NOW())';
        $hariini = Order::model()->count($criteria2);
    }
}
