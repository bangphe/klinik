<?php

/**
 * This is the model class for table "order_detail".
 *
 * The followings are the available columns in table 'order_detail':
 * @property integer $KODE_ORDER_DETAIL
 * @property string $KODE_ORDER
 * @property integer $ID_ITEM
 * @property integer $HARGA
 * @property integer $JUMLAH
 * @property integer $DISKON
 *
 * The followings are the available model relations:
 * @property Item $iDITEM
 * @property Order $kODEORDER
 */
class OrderDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('KODE_ORDER', 'required'),
			array('ID_ITEM, HARGA, JUMLAH, DISKON', 'numerical', 'integerOnly'=>true),
			array('KODE_ORDER', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KODE_ORDER_DETAIL, KODE_ORDER, ID_ITEM, HARGA, JUMLAH, DISKON', 'safe', 'on'=>'search'),
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
			'item' => array(self::BELONGS_TO, 'Item', 'ID_ITEM'),
			'order' => array(self::BELONGS_TO, 'Order', 'KODE_ORDER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KODE_ORDER_DETAIL' => 'Kode Order Detail',
			'KODE_ORDER' => 'Kode Order',
			'ID_ITEM' => 'Id Item',
			'HARGA' => 'Harga',
			'JUMLAH' => 'Jumlah',
			'DISKON' => 'Diskon',
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

		$criteria->compare('KODE_ORDER_DETAIL',$this->KODE_ORDER_DETAIL);
		$criteria->compare('KODE_ORDER',$this->KODE_ORDER,true);
		$criteria->compare('ID_ITEM',$this->ID_ITEM);
		$criteria->compare('HARGA',$this->HARGA);
		$criteria->compare('JUMLAH',$this->JUMLAH);
		$criteria->compare('DISKON',$this->DISKON);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	//ngitung jumlah order per pelanggan
	public static function getJumlahItem($kdorder)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'KODE_ORDER=:kdorder';
		$criteria->params = array(':kdorder'=>$kdorder);
		$jumlah = OrderDetail::model()->count($criteria);
		return $jumlah;
	}
}
