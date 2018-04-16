<?php

/**
 * This is the model class for table "{{record}}".
 *
 * The followings are the available columns in table '{{record}}':
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property integer $validate
 * @property integer $site_id
 */
class Record extends CActiveRecord
{

	public $_modelName = '联系状态';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Record the static model class
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
		return '{{record}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, validate, site_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, type, validate, site_id', 'safe', 'on'=>'search'),
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
			'title' => '名称',
			'type' => '类型',
			'validate' => '状态',
			'site_id' => '站点',
			'sort' => '排序',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('validate',$this->validate);
		$criteria->compare('site_id',$this->site_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
			    'pageSize'=>20,
			),
		));
	}
	//1市场 2销售
	public  function defaultStatus($type)
	{
		if($type==1){
			$arr=array(
				//0=>'尚未联系',
				1=>'无需求',
				2=>'近期有需求',
				3=>'远期有需求',
				4=>'有异地需求',
			);
		}elseif($type==2){
			$arr=array(
				//0=>'尚未联系',
				1=>'初次联系无需求',
				2=>'初次联系有需求',
				3=>'见面后有订单可能',
				4=>'有异地需求',
				5=>'跟进中',
				6=>'跟进失败',
				7=>'已签单',
			);
		}
		return $arr;
		
	}

	//客户状态
	public function getStatusName(){
		return $this->StatusArr[$this->validate];
	} 
	//客户状态
	public function getStatusArr(){
		$res = array(
			0 => '禁用',
			1 => '启用',
		);
		return $res;
	}
	//类型状态
	public function getTypeName(){
		return $this->TypeArr[$this->type];
	} 
	//类型状态
	public function getTypeArr(){
		$res = array(
			1 => '市场',
			2 => '销售',
		);
		return $res;
	}
	// 获取状态列表
	public function getTypeList(){
		return array(
			1 => '市场',
			2 => '销售',
			);
	}
	// 获取状态列表
	public function getValidateList(){
		return array(
			1 => '启用',
			0 => '禁用',
			
			);
	}
	public function defaultScope()
	{
	    $id = Yii::app()->controller->module->getComponent('user')->site_id;
	    $post = Yii::app()->controller->module->getComponent('user')->post;
	    $dep_id = Yii::app()->controller->module->getComponent('user')->dep_id;
	    $type = Yii::app()->controller->module->getComponent('user')->type;
		$name = Yii::app()->controller->id;//控制器名
		$status=Yii::app()->controller->getAction()->getId();//方法名
		if($id!=1){
			if($name=='kehu'){
				if($status=='admin'){
					if($post==1||$post==4){
						return array(
						'condition'=>"site_id=$id",
					);
					} else if($post==2){
						$d=Department::model()->find("id=$dep_id");
						return array(
						 'condition'=>"site_id=$id and type=".$d->type,);
						// if($type==1){
						// 	return array(
						// 		'condition'=>"site_id=$id",
						// 	);
						// }else{
						// 	$d=Department::model()->find("id=$dep_id");
						// 	return array(
						// 	 'condition'=>"site_id=$id and type=".$d->type,);
						// }

					}else if( $post==3){

						$d=Department::model()->find("id=$dep_id");
						return array(
						 'condition'=>"site_id=$id and type=".$d->type,);
					}
				}else{
					if($post==1||$post==4){
						return array(
						'condition'=>"site_id=$id",
						);

					}else if($post==2 || $post==3){

						$d=Department::model()->find("id=$dep_id");
						return array(
						 'condition'=>"site_id=$id and type=".$d->type,);
					}


				}

 			}else if($name=='zykhgl'){
 				return array(
					'condition'=>"site_id=$id",
				);
			}else{

				if($post==1||$post==4){
					return array(
					'condition'=>"site_id=$id",
				);

				}else if($post==2 || $post==3){

					$d=Department::model()->find("id=$dep_id");
					return array(
					 'condition'=>"site_id=$id and type=".$d->type,);
				}	

			}					
		}

	}
}