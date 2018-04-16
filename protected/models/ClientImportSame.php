<?php

/**
 * This is the model class for table "{{client_import_same}}".
 *
 * The followings are the available columns in table '{{client_import_same}}':
 * @property integer $id
 * @property integer $client_id
 * @property integer $client_import_id
 */
class ClientImportSame extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClientImportSame the static model class
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
		return '{{client_import_same}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_id, client_import_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, client_id, client_import_id', 'safe', 'on'=>'search'),
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
			'ClientOne'=>array(self::BELONGS_TO, 'Client', 'client_id'),
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
			'client_id' => 'Client',
			'client_import_id' => 'Client Import',
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
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('client_import_id',$this->client_import_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}