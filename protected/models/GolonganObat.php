<?php

/**
 * This is the model class for table "golongan_obat".
 *
 * The followings are the available columns in table 'golongan_obat':
 * @property integer $ID_GOLONGAN_OBAT
 * @property string $NAMA_GOLONGAN
 *
 * The followings are the available model relations:
 * @property Item[] $items
 */
class GolonganObat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'golongan_obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAMA_GOLONGAN', 'required'),
			array('NAMA_GOLONGAN', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_GOLONGAN_OBAT, NAMA_GOLONGAN', 'safe', 'on'=>'search'),
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
			'items' => array(self::HAS_MANY, 'Item', 'ID_GOLONGAN_OBAT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_GOLONGAN_OBAT' => 'Id Golongan Obat',
			'NAMA_GOLONGAN' => 'Nama Golongan',
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

		$criteria->compare('ID_GOLONGAN_OBAT',$this->ID_GOLONGAN_OBAT);
		$criteria->compare('NAMA_GOLONGAN',$this->NAMA_GOLONGAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GolonganObat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function listAll() {
		$criteria=new CDbCriteria;
        $criteria->order = 'NAMA_GOLONGAN ASC';
        $model = self::model()->findAll($criteria);
        $data = CHtml::listData($model,'ID_GOLONGAN_OBAT','NAMA_GOLONGAN');
        return $data;
    }
}
