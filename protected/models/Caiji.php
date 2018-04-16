<?php

/**
 * This is the model class for table "cm_caiji".
 *
 * The followings are the available columns in table 'cm_caiji':
 * @property integer $id
 * @property string $url
 * @property integer $status
 * @property integer $type
 * @property integer $start_page
 * @property integer $stop_page
 * @property integer $cate_id
 * @property string $laiyuan
 * @property integer $code
 * @property string $cate_name
 * @property integer $bianma
 * @property string $img_path
 * @property string $host
 * @property integer $guize_id
 * @property string $caiji_time
 */
class Caiji extends CActiveRecord
{

	public $_modelName = '采集列表';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Caiji the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cm_caiji';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, type, start_page, stop_page, cate_id, code, bianma, guize_id', 'numerical', 'integerOnly'=>true),
			array('url, laiyuan, cate_name, img_path, host', 'length', 'max'=>255),
			array('caiji_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url, status, type, start_page, stop_page, cate_id, laiyuan, code, cate_name, bianma, img_path, host, guize_id, caiji_time', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'url' => '采集页面',
			'status' => '状态',
			'type' => '类型',
			'start_page' => '开始分页',
			'stop_page' => '结束分类',
			'cate_id' => '分类',
			'laiyuan' => '来源',
			'code' => '网站状态',
			'cate_name' => '分类名称',
			'bianma' => '网站编码',
			'img_path' => '存储图片路径',
			'host' => '域名',
			'guize_id' => '采用规则',
			'caiji_time' => '采集时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type);
		$criteria->compare('start_page',$this->start_page);
		$criteria->compare('stop_page',$this->stop_page);
		$criteria->compare('cate_id',$this->cate_id);
		$criteria->compare('laiyuan',$this->laiyuan,true);
		$criteria->compare('code',$this->code);
		$criteria->compare('cate_name',$this->cate_name,true);
		$criteria->compare('bianma',$this->bianma);
		$criteria->compare('img_path',$this->img_path,true);
		$criteria->compare('host',$this->host,true);
		$criteria->compare('guize_id',$this->guize_id);
		$criteria->compare('caiji_time',$this->caiji_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}