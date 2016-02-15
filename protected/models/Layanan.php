<?php

/**
 * This is the model class for table "layanan".
 *
 * The followings are the available columns in table 'layanan':
 * @property integer $ID_LAYANAN
 * @property string $LAYANAN
 * @property integer $BIAYA
 *
 * The followings are the available model relations:
 * @property Pasien[] $pasiens
 */
class Layanan extends CActiveRecord
{
	const OPTIK = 1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'layanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LAYANAN', 'required', 'message' => '{attribute} wajib diisi'),
			array('BIAYA', 'numerical', 'integerOnly'=>true),
			array('LAYANAN', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_LAYANAN, LAYANAN, BIAYA', 'safe', 'on'=>'search'),
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
			'pasiens' => array(self::HAS_MANY, 'Pasien', 'ID_LAYANAN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_LAYANAN' => 'Id Layanan',
			'LAYANAN' => 'Layanan',
			'BIAYA' => 'Biaya',
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

		$criteria->compare('ID_LAYANAN',$this->ID_LAYANAN);
		$criteria->compare('LAYANAN',$this->LAYANAN,true);
		$criteria->compare('BIAYA',$this->BIAYA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Layanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function listLayanan() {
        $model = self::model()->findAll();
        $data = CHtml::listData($model,'ID_LAYANAN','LAYANAN');
        return $data;
    }
}
