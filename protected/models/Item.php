<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $ID_ITEM
 * @property integer $ID_KATEGORI
 * @property string $NAMA_ITEM
 * @property integer $UKURAN
 * @property integer $SATUAN
 * @property integer $HARGA_JUAL
 * @property string $TANGGAL_EXPIRED
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property DetilItem[] $detilItems
 * @property Kategori $iDKATEGORI
 * @property OrderDetail[] $orderDetails
 */
class Item extends CActiveRecord
{
	const STATUS_AKTIF=1;
    const STATUS_NON_AKTIF=2;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_KATEGORI, NAMA_ITEM', 'required'),
			array('ID_KATEGORI, UKURAN, SATUAN, HARGA_JUAL, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAMA_ITEM', 'length', 'max'=>255),
			array('TANGGAL_EXPIRED', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ITEM, ID_KATEGORI, NAMA_ITEM, UKURAN, SATUAN, HARGA_JUAL, TANGGAL_EXPIRED, STATUS', 'safe', 'on'=>'search'),
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
			'detilItems' => array(self::HAS_MANY, 'DetilItem', 'ID_ITEM'),
			'kategori' => array(self::BELONGS_TO, 'Kategori', 'ID_KATEGORI'),
			'orderDetails' => array(self::HAS_MANY, 'OrderDetail', 'ID_ITEM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ITEM' => 'Id Item',
			'ID_KATEGORI' => 'Id Kategori',
			'NAMA_ITEM' => 'Nama Item',
			'UKURAN' => 'Ukuran',
			'SATUAN' => 'Satuan',
			'HARGA_JUAL' => 'Harga Jual',
			'TANGGAL_EXPIRED' => 'Tanggal Expired',
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

		$criteria->compare('ID_ITEM',$this->ID_ITEM);
		$criteria->compare('ID_KATEGORI',$this->ID_KATEGORI);
		$criteria->compare('NAMA_ITEM',$this->NAMA_ITEM,true);
		$criteria->compare('UKURAN',$this->UKURAN);
		$criteria->compare('SATUAN',$this->SATUAN);
		$criteria->compare('HARGA_JUAL',$this->HARGA_JUAL);
		$criteria->compare('TANGGAL_EXPIRED',$this->TANGGAL_EXPIRED,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Item the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function ListBarangByKategori($kategori) {
        $criteria = new CDbCriteria(array(
            'with' => array(
                'kategori' => array(
                    'joinType' => 'inner join',
                )
            ),
            'condition' => 't.ID_KATEGORI = :kategori AND t.STATUS = :status',
            'params' => array(':kategori' => $kategori, ':status' => self::STATUS_AKTIF),
            'together' => true
        ));
        
        //return CHtml::listData(self::model()->findAll($criteria), 'KODE_BARANG', 'NAMA_BARANG');
        return self::model()->findAll($criteria);
    }

    public static function getHargaById($id) {
        return self::model()->findByPk($id)->HARGA_JUAL;
    }
}
