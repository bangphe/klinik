<?php

/**
 * This is the model class for table "supplier".
 *
 * The followings are the available columns in table 'supplier':
 * @property integer $ID_SUPPLIER
 * @property string $NAMA_SUPPLIER
 * @property string $ALAMAT_SUPPLIER
 * @property string $NO_TELP_SUPPLIER
 *
 * The followings are the available model relations:
 * @property DetilItem[] $detilItems
 */
class Supplier extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAMA_SUPPLIER, ALAMAT_SUPPLIER, NO_TELP_SUPPLIER', 'required'),
			array('NAMA_SUPPLIER, ALAMAT_SUPPLIER', 'length', 'max'=>200),
			array('NO_TELP_SUPPLIER', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_SUPPLIER, NAMA_SUPPLIER, ALAMAT_SUPPLIER, NO_TELP_SUPPLIER', 'safe', 'on'=>'search'),
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
			'detilItems' => array(self::HAS_MANY, 'DetilItem', 'ID_SUPPLIER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SUPPLIER' => 'Id Supplier',
			'NAMA_SUPPLIER' => 'Nama Supplier',
			'ALAMAT_SUPPLIER' => 'Alamat Supplier',
			'NO_TELP_SUPPLIER' => 'No Telp Supplier',
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

		$criteria->compare('ID_SUPPLIER',$this->ID_SUPPLIER);
		$criteria->compare('NAMA_SUPPLIER',$this->NAMA_SUPPLIER,true);
		$criteria->compare('ALAMAT_SUPPLIER',$this->ALAMAT_SUPPLIER,true);
		$criteria->compare('NO_TELP_SUPPLIER',$this->NO_TELP_SUPPLIER,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Supplier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function optionSupplier()
    {
        $criteria=new CDbCriteria;
        $criteria->order = 'ID_SUPPLIER ASC';
        $model = self::model()->findAll($criteria);
        $data = CHtml::listData($model,'ID_SUPPLIER','NAMA_SUPPLIER');
        return $data;
    }

    public static function getSupplierById($id) {
        return self::model()->findByPk($id)->NAMA_SUPPLIER;
    }
}
