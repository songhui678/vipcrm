<?php

/**
 * This is the model class for table "{{import_mismatching}}".
 *
 * The followings are the available columns in table '{{import_mismatching}}':
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $bride
 * @property string $bride_name
 * @property string $remark
 * @property string $createtime
 */
class ImportMismatching extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ImportMismatching the static model class
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
		return '{{import_mismatching}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, phone, bride, bride_phone,client_import_id', 'length', 'max'=>50),
			array('remark, createtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, phone, bride, bride_phone, remark, createtime', 'safe', 'on'=>'search'),
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
			'ImportOne'=>array(self::BELONGS_TO, 'ImportFile', 'client_import_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '新郎',
			'phone' => '新郎手机号',
			'bride' => '新娘',
			'bride_phone' => '新娘手机号',
			'remark' => '备注',
			'createtime' => '创建时间',
			'client_import_id' => 'client_import_id',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('bride',$this->bride,true);
		$criteria->compare('bride_phone',$this->bride_phone,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('createtime',$this->createtime,true);
        $criteria->compare('client_import_id',$this->client_import_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}