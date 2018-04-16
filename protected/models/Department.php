
<?php

/**
 * This is the model class for table "{{department}}".
 *
 * The followings are the available columns in table '{{department}}':
 * @property integer $id
 * @property string $name
 * @property string $create_time
 * @property integer $site_id
 * @property integer $validate
 */
class Department extends CActiveRecord
{

	public $_modelName = '部门表';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Department the static model class
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
		return '{{department}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('site_id, validate,type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,type, name, create_time, site_id, validate', 'safe', 'on'=>'search'),
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
			'ClientManyCont'=>array(self::STAT, 'Client', 'dep_id'),
			'AdminsManyCont'=>array(self::STAT, 'Admins', 'dep_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '部门名称',
			'create_time' => '创建时间',
			'site_id' => '站点ID',
			'validate' => '验证',//验证 1通过 0未通过
			'type' => '类型',//1市场部 2销售部
		);
	}

	public function getTypeList(){
		return array(
			1 => '市场',
			2 => '销售',
				);	
	}
	//订单状态
	public function getTypeName(){
		return $this->TypeArr[$this->order_status];
	} 
	//订单状态
	public function getTypeArr(){
		$res = array(
			1 => '市场',
			2 => '销售',
		);
		return $res;
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
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('validate',$this->validate);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function defaultScope()
	{
	    $name = Yii::app()->controller->id;
	    // echo $name;exit;
	    $status=Yii::app()->controller->getAction()->getId();//方法名
		// if($name=='default'){
		if($status=='login'){
		// }else if($status=='shouye'){	
		
			// return array(
			// 		'condition'=>"site_id=$id",
			// 	);
		}else{
			$id = Yii::app()->controller->module->getComponent('user')->site_id;

			if($id!=1){
				if($name=='zykhgl'){
					$type = Yii::app()->controller->module->getComponent('user')->type;
					$dep_id = Yii::app()->controller->module->getComponent('user')->dep_id;
					if($type==1){
						return array(
							'condition'=>"site_id=$id",
						);
						// return array(
						// 	'condition'=>"site_id=$id"." and id=$dep_id",
						// );
					}else if($type==2){
						return array(
							'condition'=>"site_id=$id",
						);
					}else{
						return array(
							'condition'=>"site_id=$id",
						);
					}

				}else{
					return array(
						'condition'=>"site_id=$id",
					);
				}
			}
		}
		
	}
}