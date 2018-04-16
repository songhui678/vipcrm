<?php

/**
 * This is the model class for table "{{import_file}}".
 *
 * The followings are the available columns in table '{{import_file}}':
 * @property integer $id
 * @property integer $userid
 * @property string $file
 * @property string $title
 * @property integer $status
 * @property integer $site_id
 */
class ImportFile extends CActiveRecord
{

	public $_modelName = '数据文件表';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ImportFile the static model class
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
		return '{{import_file}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required','message'=>'文件名称不能为空！'),
			array('file', 'required','message'=>'还没有上传文件！'),
			array('userid, status, site_id', 'numerical', 'integerOnly'=>true),
			array('file, title,createtime', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userid, file, title, status, site_id,createtime', 'safe', 'on'=>'search'),
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
			'adminOne'=>array(self::BELONGS_TO, 'Admins', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'userid' => '用户ID',
			'file' => '文件地址',
			'title' => '文件名称',
			'status' => '状态',//0为可以导入，1为已经导入过
			'site_id' => '站点ID',
			'createtime' => '创建时间',
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
		$criteria->compare('userid',$this->userid);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('site_id',$this->site_id);
        $criteria->compare('createtime',$this->createtime,true);
        $criteria->order = 'status ASC,id DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	//是否数据导入状态
	public function getStatusName(){
		return $this->StatusArr[$this->status];
	} 
	//是否数据导入状态
	public function getStatusArr(){
		$res = array(
			0 => '未导入',
			1 => '已导入',
		);
		return $res;
	}

	//客户类型
	public function getEntrystatusArr(){
		$res = array(
			1 => '市场部',
			2 => '销售部',
		);
		return $res;
	}
}