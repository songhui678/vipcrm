<?php

/**
 * This is the model class for table "{{change_client}}".
 *
 * The followings are the available columns in table '{{change_client}}':
 * @property integer $id
 * @property integer $clientid
 * @property integer $site_id
 * @property integer $dep_id
 * @property integer $status
 * @property string $create_time
 */
class ChangeClient extends CActiveRecord
{

	public $_modelName = '转移客户表';
    public $zrdep ='';//转入部门
    public $sclx ='';//市场联系状态
    public $xslx ='';//销售联系状态
    public $source ='';//来源
    public $validate ='';//客户状态
    public $xiaoshou ='';//销售人员名称
    public $ddzh ='';//订单总金额
    public $htbh ='';//合同编号
    public $entry ='';//添加人
    public $name ='';//新人名称
    public $mobile ='';//新人手机号
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChangeClient the static model class
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
		return '{{change_client}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clientid, site_id, dep_id, status', 'numerical', 'integerOnly'=>true),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, clientid, site_id, dep_id, status, create_time,zrdep,sclx,xslx,source,validate,xiaoshou,ddzh,htbh,entry,name,mobile', 'safe', 'on'=>'search'),
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
			'ClientOne'=>array(self::BELONGS_TO, 'Client', 'clientid'),
			'DepOne'=>array(self::BELONGS_TO, 'Department', 'dep_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'clientid' => 'Clientid',
			'site_id' => 'Site',
			'dep_id' => 'Dep',
			'status' => 'Status',//状态 1为有效，0为无效
			'create_time' => 'Create Time',
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
		$criteria->compare('clientid',$this->clientid);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('dep_id',$this->dep_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	// //市场联系状态
	// public function getSclxs(){
	// 	 $this->sclx = $this->ClientOne->situation;
	// }
	// //销售联系状态
	// public function getXslxs(){
	// 	 $this->xslx = $this->ClientOne->xsituation;
	// }
	// //转入部门
	// public function getZrdeps(){
	// 	 $this->zrdep = $this->ClientOne->dep_id;
	// }
	// //来源
	// public function getSources(){
	// 	 $this->source = $this->ClientOne->source;
	// }
	// //客户状态
	// public function getValidates(){
	// 	 $this->validate = $this->ClientOne->status;
	// }
	// //订单总金额
	// public function getDdzhs(){
	// 	 $this->ddzh = $this->ClientOne->prcie_total;
	// }
 //    //合同编号
	// public function getHtbhs(){
	// 	 $this->htbh = $this->ClientOne->contract_code;
	// }
	//销售人员
	public function getXiaoshous(){
		 $this->xiaoshou = $this->ClientOne->usiness;
		 $sx = $this->ClientOne->usiness;
		 $admins=Admins::model()->find('userid=:userid',array(':userid'=>$sx));
		 if(empty($admins)){
		 	return '';
		 }else{
		 	if(empty($admins->DepOne)){
		 		return '';
		 	}else{
		 		if($admins->DepOne->type==2){
		 			return $admins->userid;
		 		}else{
					return '';
		 		}
		 	}
		 }
	}

	public function searchzy()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
        // $criteria->select='t.*,cm_client.*';
		$criteria->compare('t.id',$this->id);
		// $criteria->compare('t.clientid',$this->clientid);
		// $criteria->join =' LEFT JOIN cm_client ON cm_client.id=t.clientid ';
		// $criteria->'with'=array('ClientOne');
		$criteria->compare('t.site_id',$this->site_id);
		$criteria->compare('t.dep_id',$this->dep_id);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.create_time',$this->create_time,true);
		// $criteria->with = 'ClientOne';
        $criteria->compare('ClientOne.dep_id',$this->zrdep);
        $criteria->compare('ClientOne.situation',$this->sclx);
        $criteria->compare('ClientOne.xsituation',$this->xslx);
        $criteria->compare('ClientOne.source',$this->source);
        $criteria->compare('ClientOne.status',$this->validate);
        $criteria->compare('ClientOne.usiness',$this->xiaoshou);
        $criteria->compare('ClientOne.prcie_total',$this->ddzh);
        $criteria->addSearchCondition('ClientOne.prcie_total', $this->ddzh);
        $criteria->addSearchCondition('ClientOne.contract_code', $this->htbh);
        $criteria->compare('ClientOne.entry',$this->entry);
        // $criteria->compare( 'ClientOne.bride',$this->name,true,'AND');
        // $criteria->compare( 'ClientOne.name',$this->name, true,'OR');
        // $criteria->compare( 'ClientOne.phone',$this->mobile, true,'AND');
        // $criteria->compare( 'ClientOne.bride_phone',$this->mobile,true,'OR');
        $criteria->addSearchCondition('ClientOne.bride',$this->name,true,'AND','like');
        $criteria->addSearchCondition('ClientOne.name',$this->name,true,'OR','like');
        $criteria->addSearchCondition('ClientOne.bride_phone',$this->mobile,true,'AND','like');
        $criteria->addSearchCondition('ClientOne.phone',$this->mobile,true,'OR','like');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
			    'pageSize'=>30,
			),
		));
	}



	// public function getZrdepName(){
	// 	$zr = $this->ClientOne->DepOne;
	// 	if(empty($zr)){
	// 		return 0;

	// 	}else{
	// 		return $zr->id;
	// 	}
		
	// }

	// public function getZrdepArr(){

	// 	$res = array(
	// 		1 => '是',
	// 		0 => '否',
	// 	);
	// 	return $res;
	// }

	//客户状态
	public function getValidateArr(){
		$res = array(
			0 => '无效',
			1 => '有效',
		);
		return $res;
	}

	//客户状态
	public function getValidateName(){
			return $this->ClientOne->statusName;
	}


	public function defaultScope()
	{
	    $status=Yii::app()->controller->getAction()->getId();//方法名
	    $name = Yii::app()->controller->id;
		if($status=='login'){
		}else{
			$id = Yii::app()->controller->module->getComponent('user')->site_id;
			if($id!=1){
				if($name=='zykhgl'){
					return array(
						'condition'=>"t.site_id=$id",
					);
				}else{
					return array(
						'condition'=>"site_id=$id",
					);
				}
				
			}
		}
		
	}

}