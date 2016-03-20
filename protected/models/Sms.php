<?php

/**
 * This is the model class for table "sms".
 *
 * The followings are the available columns in table 'sms':
 * @property integer $ID_SMS
 * @property integer $DEPOSIT
 * @property integer $TIPE
 * @property integer $HARGA
 * @property integer $SISA_KUOTA
 * @property string $MASA_BERLAKU
 * @property integer $STATUS
 */
class Sms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DEPOSIT, TIPE, HARGA, SISA_KUOTA, MASA_BERLAKU, STATUS', 'required'),
			array('DEPOSIT, TIPE, HARGA, SISA_KUOTA, STATUS', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_SMS, DEPOSIT, TIPE, HARGA, SISA_KUOTA, MASA_BERLAKU, STATUS', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SMS' => 'Id Sms',
			'DEPOSIT' => 'Deposit',
			'TIPE' => 'Tipe',
			'HARGA' => 'Harga',
			'SISA_KUOTA' => 'Sisa Kuota',
			'MASA_BERLAKU' => 'Masa Berlaku',
			'STATUS' => 'Status',
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

		$criteria->compare('ID_SMS',$this->ID_SMS);
		$criteria->compare('DEPOSIT',$this->DEPOSIT);
		$criteria->compare('TIPE',$this->TIPE);
		$criteria->compare('HARGA',$this->HARGA);
		$criteria->compare('SISA_KUOTA',$this->SISA_KUOTA);
		$criteria->compare('MASA_BERLAKU',$this->MASA_BERLAKU,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
