<?php

/**
 * This is the model class for table "{{sources}}".
 *
 * The followings are the available columns in table '{{sources}}':
 * @property integer $id
 * @property string $name
 * @property string $createtime
 * @property integer $validate
 * @property integer $site_id
 */
class Sources extends CActiveRecord
{

	public $_modelName = '客户来源表';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sources the static model class
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
		return '{{sources}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name','required','message'=>'来源名称不能为空！'),
			array('id, validate, site_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('createtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, createtime, validate, site_id', 'safe', 'on'=>'search'),
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
			'AdminsOne'=>array(self::BELONGS_TO, 'Admins', 'site_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '来源名称',
			'createtime' => '创建时间',
			'validate' => 'Validate',
			'site_id' => 'Site',
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
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('validate',$this->validate);
		$criteria->compare('site_id',$this->site_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	 //来源状态
	public function getValidateName(){
		return $this->ValidateArr[$this->validate];
	} 
	//来源状态
	public function getValidateArr(){
		$res = array(
			0 => '有效',
			1 => '无效',
		);
		return $res;
	}
	public function getTongji($value='zongji',$type='1',$title=''){

		
		if($value=='zongji'){
			//合计市场
			if($type==1){
				$model=Client::model()->findAll(array('condition'=>'source = :source and entry_status=:entry_status','params'=>array(':source'=>$this->id,':entry_status'=>$type)));
					return count($model).'人';
			//合计销售
			}elseif($type==2){
				$model=Client::model()->findAll(array('condition'=>'source = :source  and dangqian=:dangqian','params'=>array(':source'=>$this->id,':dangqian'=>$type)));
				return count($model).'人';
				// $model=Client::model()->findAll(array('condition'=>'source = :source','params'=>array(':source'=>$this->id)));
				// return count($model).'人';
			}

			//return '<a title="查看详细" href="/srbac/kehu/admin/search_source/'.$this->id.'">'.count($model=Client::model()->findAll($criteria)).'人</a>';
			
		}elseif($value=='kong'){
			//未联系状态市场
			if($type==1){
				$model=Client::model()->findAll(array('condition'=>'source = :source  and entry_status=:entry_status and situation is null','params'=>array(':source'=>$this->id,':entry_status'=>$type)));
				return count($model).'人';
			//未联系状态销售
			}elseif($type==2){
					//销售
					$model=Client::model()->findAll(array('condition'=>'source = :source   and dangqian=:dangqian and  xsituation is null','params'=>array(':source'=>$this->id,':dangqian'=>$type)));
				

					return count($model).'人';
					// $model=Client::model()->findAll(array('condition'=>'source = :source   and  xsituation is null','params'=>array(':source'=>$this->id)));
					// return count($model).'人';
			}
		}else{
			//市场
			if($type==1){
			

			
					$model=Client::model()->findAll(array('condition'=>'source = :source and entry_status=:entry_status and situation=:situation','params'=>array(':source'=>$this->id,':situation'=>$value,':entry_status'=>$type)));
					return count($model).'人';	
			
		
	
			//销售
			}elseif($type==2){

			
					// $model=Client::model()->findAll(array('condition'=>'source = :source and entry_status=:entry_status and   xsituation=:xsituation','params'=>array(':source'=>$this->id,':xsituation'=>$value,':entry_status'=>$type)));
					// //return count($model).'人';
					
					
					//销售
					$model=Client::model()->findAll(array('condition'=>'source = :source and   xsituation=:xsituation','params'=>array(':source'=>$this->id,':xsituation'=>$value)));

					
			
					return count($model).'人'.$xiaoshuo;

			
			}
			
			//return '<a title="查看详细" href="/srbac/kehu/admin/search_situation/'.$value.'/search_source/'.$this->id.'">'.count($model=Client::model()->findAll($criteria)).'人</a>';
			
	
		}
		
		
	}

	public function defaultScope()
	{

		$id = Yii::app()->controller->module->getComponent('user')->site_id;
		$name = Yii::app()->controller->id;
		$status=Yii::app()->controller->getAction()->getId();//方法名
		if($id!=1){
			if($name=='zykhgl'){
				return array(
					'condition'=>"site_id=$id",
				);
			}else if($status!='ajaxSources'){
				return array(
				'condition'=>"site_id=$id",
				);
			}
		}
	}
}