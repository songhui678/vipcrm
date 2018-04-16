<?php

/**
 * This is the model class for table "{{contact_record}}".
 *
 * The followings are the available columns in table '{{contact_record}}':
 * @property integer $id
 * @property integer $client_id
 * @property integer $contact_time
 * @property string $content
 * @property integer $personnel
 * @property integer $result
 * @property string $remark
 */
class ContactRecord extends CActiveRecord
{

	public $_modelName = '联系记录';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContactRecord the static model class
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
		return '{{contact_record}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('result','required','message'=>'联系情况不能为空！'),
			array('content','required','message'=>'联系内容不能为空！'),
			array('client_id, contact_time, personnel, result', 'numerical', 'integerOnly'=>true),
			array('content, remark,status,genjin_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, client_id, contact_time, content, personnel, result, remark,status,genjin_time', 'safe', 'on'=>'search'),
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
			'AdminsOne'=>array(self::BELONGS_TO, 'Admins', 'personnel'),
			'RecordOne'=>array(self::BELONGS_TO, 'Record', 'result'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_id' => '客户ID',
			'contact_time' => '联系时间',
			'content' => '联系内容',
			'personnel' => '业务人员',
			'result' => '联系结果',
			'remark' => '备注',
			'status' => '状态',
			'genjin_time' => '跟进时间',
			
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
		$criteria->compare('contact_time',$this->contact_time);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('personnel',$this->personnel);
		$criteria->compare('result',$this->result);
		$criteria->compare('remark',$this->remark,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('genjin_time',$this->genjin_time);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	 //时间戳转成日期
	public function GetTimetodate(){
		return $ytime = date("Y-m-d H:i:s",$this->contact_time);;
	}

	public function kehusearch($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('client_id',$id);
		$criteria->compare('contact_time',$this->contact_time);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('personnel',$this->personnel);
		$criteria->compare('result',$this->result);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('status',$this->status);
		$criteria->order = 'contact_time DESC' ;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
			    'pageSize'=>10,
			),
		));
	}

	//客户联系情况
	public function getResultName(){
		return $this->ResultArr[$this->result];
	} 
	//客户联系情况
	public function getResultArr(){
		$res = array(
			1 => '初次联系',
			2 => '无需求',
			3 => '有需求进店',
			4 => '有需求待进店',
			5 => '已成交',
			6 => '选择其他家订单',
		);
		return $res;
	}

	// 获取状态列表
	public function getTypeArr(){
		return array(
			1 => '市场',
			2 => '销售',
			);
	}


	 //时间戳转成日期
	public function GetGenjinTimetodate(){
		if(!empty($this->genjin_time)){
			$ytime = date("Y-m-d",$this->genjin_time);
		}else{
			$ytime ='';
		}
		return $ytime;
	}


}