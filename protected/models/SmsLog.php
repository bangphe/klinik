<?php

/**
 * This is the model class for table "sms_log".
 *
 * The followings are the available columns in table 'sms_log':
 * @property integer $ID_SMS_LOG
 * @property string $ID_USER
 * @property integer $ID_PASIEN
 * @property string $PESAN
 * @property string $TUJUAN
 * @property string $TANGGAL_KIRIM
 * @property integer $STATUS
 */
class SmsLog extends CActiveRecord
{
	const NAMAPERUSAHAAN = "[KLINIK AR-RAHMAH]";

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sms_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_USER, ID_PASIEN, PESAN, TUJUAN, TANGGAL_KIRIM, STATUS', 'required'),
			array('ID_PASIEN, STATUS', 'numerical', 'integerOnly'=>true),
			array('ID_USER', 'length', 'max'=>20),
			array('PESAN', 'length', 'max'=>161),
			array('TUJUAN', 'length', 'max'=>14),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_SMS_LOG, ID_USER, ID_PASIEN, PESAN, TUJUAN, TANGGAL_KIRIM, STATUS', 'safe', 'on'=>'search'),
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
			'ID_SMS_LOG' => 'Id Sms Log',
			'ID_USER' => 'Id User',
			'ID_PASIEN' => 'Id Pasien',
			'PESAN' => 'Pesan',
			'TUJUAN' => 'Tujuan',
			'TANGGAL_KIRIM' => 'Tanggal Kirim',
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

		$criteria->compare('ID_SMS_LOG',$this->ID_SMS_LOG);
		$criteria->compare('ID_USER',$this->ID_USER,true);
		$criteria->compare('ID_PASIEN',$this->ID_PASIEN);
		$criteria->compare('PESAN',$this->PESAN,true);
		$criteria->compare('TUJUAN',$this->TUJUAN,true);
		$criteria->compare('TANGGAL_KIRIM',$this->TANGGAL_KIRIM,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SmsLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
