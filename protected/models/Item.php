<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $ID_ITEM
 * @property integer $ID_KATEGORI
 * @property integer $ID_GOLONGAN_OBAT
 * @property string $NAMA_ITEM
 * @property string $UKURAN
 * @property string $SATUAN
 * @property integer $HARGA_JUAL
 * @property string $TANGGAL_EXPIRED
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property DetilItem[] $detilItems
 * @property GolonganObat $iDGOLONGANOBAT
 * @property Kategori $iDKATEGORI
 * @property OrderDetail[] $orderDetails
 */
class Item extends CActiveRecord
{
	const STATUS_AKTIF=1, STATUS_NON_AKTIF=2;
	const KATEGORI_OBAT=1, KATEGORI_GAGANG=2, KATEGORI_LENSA=3;

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
			array('ID_KATEGORI, ID_GOLONGAN_OBAT, HARGA_JUAL, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAMA_ITEM', 'length', 'max'=>255),
            array('UKURAN', 'length', 'max'=>10),
            array('SATUAN', 'length', 'max'=>50),
			array('TANGGAL_EXPIRED', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ITEM, ID_KATEGORI, ID_GOLONGAN_OBAT, NAMA_ITEM, UKURAN, SATUAN, HARGA_JUAL, TANGGAL_EXPIRED, STATUS', 'safe', 'on'=>'search'),
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
			'detilitem' => array(self::HAS_MANY, 'DetilItem', 'ID_ITEM'),
            'golongan' => array(self::BELONGS_TO, 'GolonganObat', 'ID_GOLONGAN_OBAT'),
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
			'ID_KATEGORI' => 'Kategori',
            'ID_GOLONGAN_OBAT' => 'Golongan Obat',
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
        $criteria->compare('ID_GOLONGAN_OBAT',$this->ID_GOLONGAN_OBAT);
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

	public static function updateStokItem($iditem, $permintaan)
    {
        $stok = self::getTotalStok($iditem);
        if ($stok >= $permintaan) {
            $criteria = new CDbCriteria;
            $criteria->condition = 'ID_ITEM=:iditem';
            $criteria->params = array(':iditem'=>$iditem);
            $criteria->order = 'STOK DESC';
            $detilbarang = DetilItem::model()->findAll($criteria);
            
            $temp = $permintaan;
            foreach ($detilbarang as $databarang) {
                $databarang->scenario = 'updatestok';
                if($databarang->STOK >= $temp){
                    $databarang->STOK = $databarang->STOK - $temp;
                    $databarang->save();
                    break;
                }else{
                    $temp = $databarang->STOK - $temp;//ini hasil pasti minus
                    if($temp<=0)
                        $databarang->STOK = 0;
                    $temp = abs($temp);
                    $databarang->save();
                }
            }
        }
        else {//jelas ndak boleh
            return false;
        }
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
        
        //return CHtml::listData(self::model()->findAll($criteria), 'ID_ITEM', 'NAMA_BARANG');
        return self::model()->findAll($criteria);
    }

    //untuk dropdown obat di kasir
    public static function listItemPerKategori($kategori) {
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
        $model = self::model()->findAll($criteria);
        $data = CHtml::listData($model,'ID_ITEM',function($model){
            if ($model->ID_GOLONGAN_OBAT != NULL) {
                return $model->NAMA_ITEM . ' [' .$model->golongan->NAMA_GOLONGAN. '] - ' . MyFormatter::formatUang($model->HARGA_JUAL);
            } else {
                return $model->NAMA_ITEM . ' [' .$model->kategori->KATEGORI. '] - ' . MyFormatter::formatUang($model->HARGA_JUAL);
            }
        });
        return $data;
    }

    public static function listAllItem() {
        $criteria = new CDbCriteria(array(
            'with' => array(
                'kategori' => array(
                    'joinType' => 'inner join',
                )
            ),
            'condition' => 't.STATUS = :status',
            'params' => array(':status' => self::STATUS_AKTIF),
            'together' => true
        ));
        $model = self::model()->findAll($criteria);
        $data = CHtml::listData($model,'ID_ITEM',function($model){
            if ($model->ID_GOLONGAN_OBAT != NULL) {
                return $model->NAMA_ITEM . ' [' .$model->golongan->NAMA_GOLONGAN. '] - ' . MyFormatter::formatUang($model->HARGA_JUAL);
            } else {
                return $model->NAMA_ITEM . ' [' .$model->kategori->KATEGORI. '] - ' . MyFormatter::formatUang($model->HARGA_JUAL);
            }
        });
        return $data;
    }

    public static function getHargaById($id) {
        return self::model()->findByPk($id)->HARGA_JUAL;
    }

    public static function getHargaByResep($id, $resep) {
    	$total=0;
    	$kategori_obat = self::model()->findByPk($id)->ID_KATEGORI;
    	$harga = self::model()->findByPk($id)->HARGA_JUAL;
        if ($kategori_obat==self::KATEGORI_OBAT) {
        	if($resep==1)
	        	//kalo RESEP UMUM = harga ditambahkan 33%
	            $total = $harga + (33/100 * $harga);
	        else
	        	//kalo RESEP DOKTER = harga + 1200
	        	$total = $harga + 1200;
        } else {
        	$total = $harga;
        }

        //return $subtotal - ($subtotal * ($this->DISKON / 100));
    	return $total;
    }

    public function getStokItem($iditem){
        $connection = Yii::app()->db;
        return $connection->createCommand('SELECT SUM(STOK) FROM detil_item WHERE ID_ITEM='.$iditem)->queryScalar();
    }

    // list obat di halaman kasir
    public static function getTotalStok($iditem)
    {
        $connection = Yii::app()->db;
        return $connection->createCommand('SELECT SUM(STOK) FROM detil_item WHERE ID_ITEM='.$iditem)->queryScalar();
    }

    public static function getObatExpired() {
        $criteria = new CDbCriteria(array(
            'with' => array(
                'detilitem' => array(
                    'joinType' => 'inner join',
                )
            ),
            'condition' => 'STATUS = :status AND ID_KATEGORI = :kategori',
            'params' => array(':status' => self::STATUS_AKTIF, ':kategori' => self::KATEGORI_OBAT),
            'order' => 'TANGGAL_EXPIRED ASC',
            'limit' => '10',
            'together' => true
        ));
        
        //return CHtml::listData(self::model()->findAll($criteria), 'KODE_BARANG', 'NAMA_BARANG');
        return self::model()->findAll($criteria);
    }

    public static function getObatHabis() {
        $criteria = new CDbCriteria(array(
            'with' => array(
                'detilitem' => array(
                    'joinType' => 'inner join',
                )
            ),
            'condition' => 'STOK = :stok',
            'params' => array(':stok' => 0),
            'order' => 'TANGGAL_EXPIRED DESC',
            'limit' => '5',
            'together' => true
        ));
        
        //return CHtml::listData(self::model()->findAll($criteria), 'KODE_BARANG', 'NAMA_BARANG');
        return self::model()->findAll($criteria);
    }

    public static function getExpired()
    {
        $connection = Yii::app()->db;
        return $connection->createCommand('SELECT * FROM item WHERE date(TANGGAL_EXPIRED) >= date(NOW()) AND date(TANGGAL_EXPIRED) <= DATE_ADD(date(now()), INTERVAL 10 DAY)')->queryAll();
    }

    public static function getPenjualanItem($kategori) {
        $criteria = new CDbCriteria(array(
            'condition' => 'ID_KATEGORI = :kategori',
            'params' => array(':kategori' => $kategori),
            'group' => 'ID_ITEM',
        ));
        
        return self::model()->findAll($criteria);
    }

    public static function getTotalItemDijual($kd)
    {
        $connection = Yii::app()->db;
        $query = $connection->createCommand('SELECT SUM(JUMLAH) FROM order_detail WHERE ID_ITEM='.$kd)->queryScalar();
        if ($query==null) {
            return '0';
        }
        else {
            return $query;
        }
    }

    public static function listAll() {
        $criteria = new CDbCriteria(array(
            'condition' => 't.STATUS = :status',
            'params' => array(':status' => self::STATUS_AKTIF),
        ));
        
        return self::model()->findAll($criteria);
    }
}