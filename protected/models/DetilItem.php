<?php

/**
 * This is the model class for table "detil_item".
 *
 * The followings are the available columns in table 'detil_item':
 * @property integer $ID_DETIL_ITEM
 * @property integer $ID_ITEM
 * @property integer $ID_SUPPLIER
 * @property integer $STOK
 * @property integer $HARGA_BELI
 * @property string $TANGGAL_INPUT
 * @property string $TANGGAL_JATUH_TEMPO
 * @property string $TANGGAL_PEMBAYARAN
 * @property integer $STATUS_PEMBAYARAN
 *
 * The followings are the available model relations:
 * @property Item $iDITEM
 * @property Supplier $iDSUPPLIER
 */
class DetilItem extends CActiveRecord
{
	const STATUS_LUNAS=0, STATUS_HUTANG=1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detil_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_ITEM, ID_SUPPLIER, STOK, HARGA_BELI, STATUS_PEMBAYARAN', 'numerical', 'integerOnly'=>true),
			array('TANGGAL_INPUT, TANGGAL_JATUH_TEMPO, TANGGAL_PEMBAYARAN', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_DETIL_ITEM, ID_ITEM, ID_SUPPLIER, STOK, HARGA_BELI, TANGGAL_INPUT, TANGGAL_JATUH_TEMPO, TANGGAL_PEMBAYARAN, STATUS_PEMBAYARAN', 'safe', 'on'=>'search'),
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
			'iDITEM' => array(self::BELONGS_TO, 'Item', 'ID_ITEM'),
			'iDSUPPLIER' => array(self::BELONGS_TO, 'Supplier', 'ID_SUPPLIER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_DETIL_ITEM' => 'Id Detil Item',
			'ID_ITEM' => 'Id Item',
			'ID_SUPPLIER' => 'Supplier',
			'STOK' => 'Jumlah',
			'HARGA_BELI' => 'Harga Beli',
			'TANGGAL_INPUT' => 'Tanggal Input',
			'TANGGAL_JATUH_TEMPO' => 'Tanggal Jatuh Tempo',
			'TANGGAL_PEMBAYARAN' => 'Tanggal Pembayaran',
			'STATUS_PEMBAYARAN' => 'Status Pembayaran',
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

		$criteria->compare('ID_DETIL_ITEM',$this->ID_DETIL_ITEM);
		$criteria->compare('ID_ITEM',$this->ID_ITEM);
		$criteria->compare('ID_SUPPLIER',$this->ID_SUPPLIER);
		$criteria->compare('STOK',$this->STOK);
		$criteria->compare('HARGA_BELI',$this->HARGA_BELI);
		$criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);
		$criteria->compare('TANGGAL_JATUH_TEMPO',$this->TANGGAL_JATUH_TEMPO,true);
		$criteria->compare('TANGGAL_PEMBAYARAN',$this->TANGGAL_PEMBAYARAN,true);
		$criteria->compare('STATUS',$this->STATUS_PEMBAYARAN);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetilItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getDetilItem($kd) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'ID_ITEM=:kd';
		$criteria->params = array(':kd'=>$kd);
		$criteria->order = 'ID_DETIL_ITEM ASC';
        return self::model()->findAll($criteria);
    }

    public static function listStatusPembayaran() {
        return array(
            self::STATUS_LUNAS => 'Lunas',
            self::STATUS_HUTANG => 'Hutang',
        );
    }
}
