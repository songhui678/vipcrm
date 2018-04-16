<?php

/**
 * This is the model class for table "{{client}}".
 *
 * The followings are the available columns in table '{{client}}':
 * @property integer $id
 * @property string $name
 * @property string $bride
 * @property string $bride_phone
 * @property integer $type
 * @property string $contact
 * @property string $address
 * @property string $tel
 * @property string $phone
 * @property string $email
 * @property string $qq
 * @property integer $status
 * @property integer $update_time
 * @property integer $usiness
 * @property integer $situation
 * @property integer $province
 * @property integer $zip
 * @property integer $eserve_time
 * @property string $remarks
 * @property integer $entry
 * @property integer $create_time
 * @property integer $oid
 * @property integer $source
 * @property integer $site_id
 * @property integer $remind_time
 * @property integer $remind_status
 * @property string $marry_date
 * @property string $budget
 * @property integer $order_status
 * @property integer $prcie_total
 * @property integer $deposit
 * @property integer $deposit_time
 * @property string $sign_user
 * @property string $executor
 * @property string $photo_date
 * @property string $choose_date
 * @property string $photographer
 * @property string $makeupartist
 * @property string $design_date
 * @property string $taketablets_date
 * @property string $looksite_date
 * @property string $style_date
 * @property string $scheme_date
 * @property string $makeup_date
 * @property string $compere_date
 * @property string $rehearsal_date
 */
class Client extends CActiveRecord
{

	public $_modelName = '客户表';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Client the static model class
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
		return '{{client}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, status, update_time, usiness, situation, province, zip, eserve_time, entry, create_time, oid, source, site_id, remind_time, remind_status, order_status, prcie_total, deposit, deposit_time,dep_id,photo_date, choose_date, design_date, taketablets_date, looksite_date, style_date, scheme_date, makeup_date, compere_date, rehearsal_date,entry_status,xsituation', 'numerical', 'integerOnly'=>true),
			
			array('phone', 'match', 'pattern'=>'/^1[3|4|5|8]\d{9}$/', 'message'=>'新郎手机号请输入11位手机号码'),
			array('bride_phone', 'match', 'pattern'=>'/^1[3|4|5|8]\d{9}$/', 'message'=>'新娘手机号请输入11位手机号码'),
			array('bride','checkusername'),
			array('name','checkusername'),			
			array('phone','checkuserphone'),
			array('bride_phone','checkuserphone'),
			array('phone','checktel','on'=>'insert'),
			array('bride_phone','checkbridetel','on'=>'insert'),
			array('bride_phone','checkusertel','on'=>'update'),
			array('phone','checkbusertel','on'=>'update'),
			
			array('name, address, photographer, makeupartist,wx,wangwang', 'length', 'max'=>255),
			array('bride, bride_phone, tel, phone, qq, marry_date, budget, sign_user, executor', 'length', 'max'=>50),
			array('source','required'),
			array('contact, email', 'length', 'max'=>100),
			array('remarks,dangqian,contract_code', 'safe'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, bride, bride_phone, type, contact, address, tel, phone, email, qq, status, update_time, usiness, situation, province, zip, eserve_time, remarks, entry, create_time, oid, source, site_id, remind_time, remind_status, marry_date, budget, order_status, prcie_total, deposit, deposit_time, sign_user, executor, photo_date, choose_date, photographer, makeupartist, design_date, taketablets_date, looksite_date, style_date, scheme_date, makeup_date, compere_date, rehearsal_date,dep_id,xsituation,entry_status,wx,dangqian,contract_code,wangwang', 'safe', 'on'=>'search'),

		);
	}

	public function checkusername(){
		if(empty($this->name) or  empty($this->phone)){
			if(empty($this->bride) or empty($this->bride_phone)){
				
					$this->addError('bride','新人或爱人名称不能为空');
					$this->addError('bride_phone','新人或爱人手机不能为空！');
	    	}
		}

	}
	public function getCheckupdatetime(){
		if(empty($this->update_time)){
		$a ='<input type="text" maxlength="50" name="Client[update_time]" onfocus="WdatePicker()" value="">';
		}else{
			$a ='<input type="text" maxlength="50" name="Client[update_time]" onfocus="WdatePicker()" value='.$this->update_time.'>';
		}
		return $a;
	}

	public function checklianxi($i){
		if(!empty($this->ContactRecordMany)){
			if($i<6){
				if($this->ContactRecordManyCount>5){
					foreach($this->ContactRecordMany as $ck=>$cv){
						if($ck==$i){
							return $cv->content;
						}
					}
			    }else{
			    	if($this->ContactRecordManyCount<$i){

                             return '';
			    	}else{
			    		foreach($this->ContactRecordMany as $ck=>$cv){
						if($ck==$i){
							return $cv->content;
						}
					}

			    	}

			    }
				
			}else{
				return '';
			}
			
		}else{
			return '';
		}

	}


	public function checkuserphone(){
		if(empty($this->bride) or  empty($this->bride_phone)){
			if(empty($this->name) or empty($this->phone)){
				$this->addError('name','新人或爱人名称不能为空');
				$this->addError('phone','新人或爱人手机不能为空！');		
	    	}
		}
	}

	public function checkbridetel(){
		if(!empty($this->bride_phone)){
            $b = Client::model()->find("bride_phone='".$this->bride_phone."'");
			if(empty($b)){
				$a = Client::model()->find("phone='".$this->bride_phone."'");
				if(!empty($a)){
					$this->addError('bride_phone','新人或爱人手机号已存在！');
				}
			}else{
				$this->addError('bride_phone','新人或爱人手机号已存在！');
			}
		}
	}

	public function checktel(){
		if(!empty($this->phone)){
            $b = Client::model()->find("phone='".$this->phone."'");
			if(empty($b)){
				$a = Client::model()->find("bride_phone='".$this->phone."'");
				if(!empty($a)){
					$this->addError('phone','新人或爱人手机号已存在！');
				}
			}else{
				$this->addError('phone','新人或爱人手机号已存在！');
			}
		}
	}

	public function checkusertel(){
        if(!empty($this->bride_phone)){
			$a = self::model()->find("id=".$this->id);
			if(!empty($a)){
				if($this->bride_phone!=$a->bride_phone){
					$b = self::model()->find("bride_phone='".$this->bride_phone."'");
					if(empty($b)){
						$a = self::model()->find("phone='".$this->bride_phone."'");
						if(!empty($a)){
							$this->addError('bride_phone','新人或爱人手机号已存在！');
						}
					}else{
						$this->addError('bride_phone','新人或爱人手机号已存在！');
					}
				}
			}			
		}	
	}

	public function checkbusertel(){

		if(!empty($this->phone)){
			$a = self::model()->find("id=".$this->id);
			if(!empty($a)){
				if($this->phone!=$a->phone){
					$b = self::model()->find("bride_phone='".$this->phone."'");
					if(empty($b)){
						$a = self::model()->find("phone='".$this->phone."'");
						if(!empty($a)){
							$this->addError('phone','新人或爱人手机号已存在！');
						}
					}else{
						$this->addError('phone','新人或爱人手机号已存在！');
					}
				}
						
			}

		}
			
	}	


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'AdminsOne'=>array(self::BELONGS_TO, 'Admins', 'usiness'),
			'ContactRecordOne'=>array(self::BELONGS_TO, 'ContactRecord', 'situation'),
			'LuruOne'=>array(self::BELONGS_TO, 'Admins', 'entry'),
			'CaozuoOne'=>array(self::BELONGS_TO, 'Admins', 'oid'),
			'SourceOne'=>array(self::BELONGS_TO, 'Sources', 'source','condition'=>'validate = 0'),
			'ProvinceOne'=>array(self::BELONGS_TO, 'Province', 'province','condition'=>'validate = 0'),
			'SiteOne'=>array(self::BELONGS_TO, 'Admins', 'site_id'),
			'ContactRecordMany'=>array(self::HAS_MANY, 'ContactRecord', 'client_id','limit'=>5,'order'=>'contact_time DESC'),
			'ContactRecordManyCount'=>array(self::STAT, 'ContactRecord', 'client_id'),
			'XRecordOne'=>array(self::BELONGS_TO, 'Record', 'xsituation'),
			'SRecordOne'=>array(self::BELONGS_TO, 'Record', 'situation'),
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
			'name' => '爱人',
			'bride' => '新人',
			'bride_phone' => '新人手机号',
			'type' => '类型',//1 个人 2企业
			'contact' => '联系人',
			'address' => '地址',
			'tel' => '座机',
			'phone' => '爱人手机',
			'email' => '邮箱',
			'qq' => 'Qq',
			'status' => 'Status',//1有效客户 0无效客户
			'update_time' => '更新时间',
			'usiness' => '业务人员',
			'situation' => '市场联系情况',//
			'xsituation' => '销售联系情况',//
			'entry_status' => '录入状态',//
			'province' => '省份',
			'zip' => '邮编',
			'eserve_time' => '预约到店日期',
			'remarks' => '备注',
			'entry' => '录入人员',
			'create_time' => '创建时间',
			'oid' => '操作人员',
			'source' => '信息来源',
			'site_id' => '站点ID',
			'remind_time' => '提醒时间',
			'remind_status' => '提醒状态',
			'marry_date' => '婚期',
			'budget' => '预算',
			'order_status' => '订单状态',
			'prcie_total' => '合同总额',
			'deposit' => '定金',
			'deposit_time' => '订单日期',
			'sign_user' => '签单人',
			'executor' => '执行人',
			'photo_date' => '拍摄日期',
			'choose_date' => '选片日期',
			'photographer' => '摄影师',
			'makeupartist' => '化妆师',
			'design_date' => '看设计日期',
			'taketablets_date' => '取片日期',
			'looksite_date' => '看场地日期',
			'style_date' => '谈风格日期',
			'scheme_date' => '看方案日期',
			'makeup_date' => '试妆日期',
			'compere_date' => '司仪日期',
			'rehearsal_date' => '彩排布置日期',
			'dep_id' => '部门',
			'wx' => '微信号',
			'dangqian' => '当前状态',
			'contract_code' => '合同编号',	
			'wangwang' => '旺旺号',
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
		$criteria->compare('name',$this->bride,true,'OR');
		$criteria->compare('bride',$this->bride,true,'OR');
		$criteria->compare('bride_phone',$this->bride_phone,true,'OR');
		$criteria->compare('phone',$this->bride_phone,true,'OR');
		// $criteria->compare('bride_phone',$this->bride_phone,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel',$this->tel,true);
		// $criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('status',$this->status);
		 if(empty($this->update_time)){
		 	$criteria->compare('update_time',$this->update_time);
		 }else{
		 	$start =$this->update_time.' 00:00:00';
		 	$stop =$this->update_time.' 23:59:59';
		 	$start=strtotime($start);
		 	$stop=strtotime($stop);
		 	$criteria->addBetweenCondition('update_time', $start, $stop);
		 }
		
		$criteria->compare('usiness',$this->usiness);
		$criteria->compare('situation',$this->situation);
		$criteria->compare('province',$this->province);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('eserve_time',$this->eserve_time);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('entry',$this->entry);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('oid',$this->oid);
		$criteria->compare('source',$this->source);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('remind_time',$this->remind_time);
		$criteria->compare('remind_status',$this->remind_status);
		$criteria->compare('marry_date',$this->marry_date,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('prcie_total',$this->prcie_total);
		$criteria->compare('deposit',$this->deposit);
		$criteria->compare('deposit_time',$this->deposit_time);
		$criteria->compare('sign_user',$this->sign_user,true);
		$criteria->compare('executor',$this->executor,true);
		$criteria->compare('photo_date',$this->photo_date,true);
		$criteria->compare('choose_date',$this->choose_date,true);
		$criteria->compare('photographer',$this->photographer,true);
		$criteria->compare('makeupartist',$this->makeupartist,true);
		$criteria->compare('design_date',$this->design_date,true);
		$criteria->compare('taketablets_date',$this->taketablets_date,true);
		$criteria->compare('looksite_date',$this->looksite_date,true);
		$criteria->compare('style_date',$this->style_date,true);
		$criteria->compare('scheme_date',$this->scheme_date,true);
		$criteria->compare('makeup_date',$this->makeup_date,true);
		$criteria->compare('compere_date',$this->compere_date,true);
		$criteria->compare('rehearsal_date',$this->rehearsal_date,true);
		$criteria->compare('dep_id',$this->dep_id,true);	
		$criteria->compare('entry_status',$this->entry_status);	
		$criteria->compare('xsituation',$this->xsituation);	
		$criteria->compare('wx',$this->wx,true);
		$criteria->compare('wangwang',$this->wangwang,true);
		$criteria->compare('dangqian',$this->dangqian,true);
		$criteria->order = 'remind_status DESC,status DESC,update_time desc';


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
			    'pageSize'=>30,
			),
		));
	}

//统计查询用的
	public function searchcx($pstarttime, $pstoptime)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
        // echo $pstarttime.'-'.$pstoptime;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('bride',$this->bride,true);
		$criteria->compare('bride_phone',$this->bride_phone,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('usiness',$this->usiness);
		$criteria->compare('situation',$this->situation);
		$criteria->compare('province',$this->province);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('eserve_time',$this->eserve_time);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('entry',$this->entry);
		// $criteria->compare('create_time',$this->create_time);
		$criteria->addBetweenCondition('create_time', $pstarttime, $pstoptime);
		$criteria->compare('oid',$this->oid);
		$criteria->compare('source',$this->source);
		$criteria->compare('site_id',Yii::app()->controller->module->getComponent('user')->site_id);
		$criteria->compare('remind_time',$this->remind_time);
		$criteria->compare('remind_status',$this->remind_status);
		$criteria->compare('marry_date',$this->marry_date,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('prcie_total',$this->prcie_total);
		$criteria->compare('deposit',$this->deposit);
		$criteria->compare('deposit_time',$this->deposit_time);
		$criteria->compare('sign_user',$this->sign_user,true);
		$criteria->compare('executor',$this->executor,true);
		$criteria->compare('photo_date',$this->photo_date,true);
		$criteria->compare('choose_date',$this->choose_date,true);
		$criteria->compare('photographer',$this->photographer,true);
		$criteria->compare('makeupartist',$this->makeupartist,true);
		$criteria->compare('design_date',$this->design_date,true);
		$criteria->compare('taketablets_date',$this->taketablets_date,true);
		$criteria->compare('looksite_date',$this->looksite_date,true);
		$criteria->compare('style_date',$this->style_date,true);
		$criteria->compare('scheme_date',$this->scheme_date,true);
		$criteria->compare('makeup_date',$this->makeup_date,true);
		$criteria->compare('compere_date',$this->compere_date,true);
		$criteria->compare('rehearsal_date',$this->rehearsal_date,true);
		$criteria->compare('dep_id',$this->dep_id,true);
		$criteria->compare('wx',$this->wx,true);
		$criteria->compare('wangwang',$this->wangwang,true);
		$criteria->order = 'remind_status DESC,id desc' ;


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
			    'pageSize'=>30,
			),
		));
	}

	//统计查询用的列表
	public function searchtj($pstarttime,$pstoptime,$type,$st)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
        // // echo $pstarttime;
        //   echo $pstoptime;
            // echo $type;
            // exit;
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('bride',$this->bride,true);
		$criteria->compare('bride_phone',$this->bride_phone,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('usiness',$this->usiness);
		$criteria->compare('province',$this->province);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('eserve_time',$this->eserve_time);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('entry',$this->entry);
		$criteria->compare('situation',$this->situation);
		$criteria->compare('xsituation',$this->xsituation);
		$criteria->compare('oid',$this->oid);
		$criteria->compare('source',$this->source);
		$criteria->compare('site_id',Yii::app()->controller->module->getComponent('user')->site_id);
		if($type==1){
			// $criteria->addCondition("situation==$st");
			$criteria->addBetweenCondition('create_time', $pstarttime, $pstoptime);
		}else if($type==2){
			// $criteria->addCondition("xsituation==$st");
			$criteria->addBetweenCondition('update_time', $pstarttime, $pstoptime);
		}
		$criteria->compare('remind_time',$this->remind_time);
		$criteria->compare('remind_status',$this->remind_status);
		$criteria->compare('marry_date',$this->marry_date,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('prcie_total',$this->prcie_total);
		$criteria->compare('deposit',$this->deposit);
		$criteria->compare('deposit_time',$this->deposit_time);
		$criteria->compare('sign_user',$this->sign_user,true);
		$criteria->compare('executor',$this->executor,true);
		$criteria->compare('photo_date',$this->photo_date,true);
		$criteria->compare('choose_date',$this->choose_date,true);
		$criteria->compare('photographer',$this->photographer,true);
		$criteria->compare('makeupartist',$this->makeupartist,true);
		$criteria->compare('design_date',$this->design_date,true);
		$criteria->compare('taketablets_date',$this->taketablets_date,true);
		$criteria->compare('looksite_date',$this->looksite_date,true);
		$criteria->compare('style_date',$this->style_date,true);
		$criteria->compare('scheme_date',$this->scheme_date,true);
		$criteria->compare('makeup_date',$this->makeup_date,true);
		$criteria->compare('compere_date',$this->compere_date,true);
		$criteria->compare('rehearsal_date',$this->rehearsal_date,true);
		$criteria->compare('dep_id',$this->dep_id,true);
		$criteria->compare('wx',$this->wx,true);
		$criteria->compare('wangwang',$this->wangwang,true);
		$criteria->order = 'remind_status DESC,id desc' ;


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
			    'pageSize'=>30,
			),
		));
	}

	//部门查询用的列表
	public function searchbmtj($pstarttime,$pstoptime,$type,$st,$arr)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('bride',$this->bride,true);
		$criteria->compare('bride_phone',$this->bride_phone,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('usiness',$this->usiness);
		$criteria->compare('province',$this->province);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('eserve_time',$this->eserve_time);
		$criteria->compare('remarks',$this->remarks,true);
		// $criteria->compare('entry',$this->entry);
		$criteria->addInCondition('entry',$arr);
		$criteria->compare('situation',$this->situation);
		$criteria->compare('xsituation',$this->xsituation);
		$criteria->compare('oid',$this->oid);
		$criteria->compare('source',$this->source);
		$criteria->compare('site_id',Yii::app()->controller->module->getComponent('user')->site_id);
		// if($type==1){
			// $criteria->addCondition("situation==$st");
		$criteria->addBetweenCondition('create_time', $pstarttime, $pstoptime);
		// }else if($type==2){
		// 	// $criteria->addCondition("xsituation==$st");
		// 	$criteria->addBetweenCondition('update_time', $pstarttime, $pstoptime);
		// }
		$criteria->compare('remind_time',$this->remind_time);
		$criteria->compare('remind_status',$this->remind_status);
		$criteria->compare('marry_date',$this->marry_date,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('prcie_total',$this->prcie_total);
		$criteria->compare('deposit',$this->deposit);
		$criteria->compare('deposit_time',$this->deposit_time);
		$criteria->compare('sign_user',$this->sign_user,true);
		$criteria->compare('executor',$this->executor,true);
		$criteria->compare('photo_date',$this->photo_date,true);
		$criteria->compare('choose_date',$this->choose_date,true);
		$criteria->compare('photographer',$this->photographer,true);
		$criteria->compare('makeupartist',$this->makeupartist,true);
		$criteria->compare('design_date',$this->design_date,true);
		$criteria->compare('taketablets_date',$this->taketablets_date,true);
		$criteria->compare('looksite_date',$this->looksite_date,true);
		$criteria->compare('style_date',$this->style_date,true);
		$criteria->compare('scheme_date',$this->scheme_date,true);
		$criteria->compare('makeup_date',$this->makeup_date,true);
		$criteria->compare('compere_date',$this->compere_date,true);
		$criteria->compare('rehearsal_date',$this->rehearsal_date,true);
		$criteria->compare('dep_id',$this->dep_id,true);
		$criteria->compare('wx',$this->wx,true);
		$criteria->compare('wangwang',$this->wangwang,true);
		$criteria->order = 'remind_status DESC,id desc' ;


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
			    'pageSize'=>10,
			),
		));
	}

	//时间戳转成日期
	public function timetodate($time){
		if(!empty($time)){
			return $ytime = date("Y-m-d H:i:s",$time);
		}
		
	}

	//时间戳转成日期
	public function timetodate2($time){
		if(!empty($time)){
			return $ytime = date("Y-m-d",$time);
		}
		
	}

	// //日期转成时间戳转成
	// public function datetotime($time){
	// 	return $ytime = date("Y-m-d H:i:s",$time);
	// }

	//客户类型
	public function getTypeName(){
		return $this->TypeArr[$this->type];
	} 
	//客户类型
	public function getTypeArr(){
		$res = array(
			1 => '个人',
			2 => '企业',
		);
		return $res;
	}

	//客户联系情况
	public function getSituationName(){
		return $this->SituationArr[$this->situation];
	} 
	//客户联系情况
	public function getSituationArr(){
		$res = array(
			7 => '尚未联系',
			1 => '初次联系',
			2 => '无需求',
			4 => '有需求待进店',
			3 => '有需求进店',
			5 => '已成交',
			6 => '选择其他家订单',
		);
		return $res;
	}

    //客户状态
	public function getStatusName(){
		return $this->StatusArr[$this->status];
	} 
	//客户状态
	public function getStatusArr(){
		$res = array(
			0 => '无效',
			1 => '有效',
		);
		return $res;
	}

	public function getStatusColor(){
		
		return $this->status;
	}

	//客户颜色状态
	public function getStatussArr(){
		$res = array(
			0 => '<font color="#ff0000">无效</font>',
			1 => '有效',
		);
		return $res;
	}

	//客户颜色状态
	public function getStatussName(){
		return $this->StatussArr[$this->status];
	} 

	//订单状态
	public function getOrderStatusName(){
		return $this->OrderStatusArr[$this->order_status];
	} 
	//订单状态
	public function getOrderStatusArr(){
		$res = array(
			0 => '无',
			1=> '有',
		);
		return $res;
	}

	//客户类型
	public function getEntrystatusName(){
		if(empty($this->entry_status)){

			return '';
		}else{
			return $this->EntrystatusArr[$this->entry_status];
		}
	} 
	//客户录入来源
	public function getEntrystatusArr(){
		$res = array(
			1 => '市场',
			2 => '销售',
		);
		return $res;
	}	
	//客户类型
	public function getDangqianName(){
	
			return $this->DangqianArr[$this->dangqian];
		
	} 
	//客户录入来源
	public function getDangqianArr(){
		$res = array(
			1 => '市场',
			2 => '销售',
		);
		return $res;
	}

	public function getActions() {

		$post = Yii::app()->controller->module->getComponent('user')->post;
		if($post){ 
			if($this->AdminsOne->DepOne->type==2){//当前业务人员为销售，可以转到销售及总监和系统管理
				$department=Department::model()->findAll('type=1');
				$arr=array();
				foreach ($department as $key => $value) {
					$arr[]=$value->id;
				}
			    $criteria=new CDbCriteria;
			    $criteria->order='userid desc';
			    $criteria->addNotInCondition('dep_id',$arr);

				return CHtml::dropDownList('userid_'.$this->id, 'usiness',  CHtml::listData(Admins::model()->findAll($criteria), 'userid', 'realname'),array(
		             'empty'=>'请选择转移人',
		             'class'=>'myzhuanyi',
		            'ajax'=>array(
		                'type'=>'POST',
		                'url'=>Yii::app()->createUrl('/srbac/kehu/zhuanyi'),
		                'data'=>array('uid'=>'js:this.value','id'=>$this->id),
		                'cache'=>false,
                		'success'=>'function(html){ window.location.reload();}',
		               // 'update'=>'#us',
		            )
		            ));
			}else if($this->AdminsOne->DepOne->type==1){////当前业务人员是市场，可以转到全部人员
				$criteria=new CDbCriteria;
			    	$criteria->order='userid desc';
					return CHtml::dropDownList('userid_'.$this->id, 'usiness',  CHtml::listData(Admins::model()->findAll($criteria), 'userid', 'realname'),     array(
		            'empty'=>'请选择转移人',
		             'class'=>'myzhuanyi',
		            'ajax'=>array(
		                'type'=>'POST',
		                'url'=>Yii::app()->createUrl('/srbac/kehu/zhuanyi'),
		                'data'=>array('uid'=>'js:this.value','id'=>$this->id),
		               // 'update'=>'',
		                'cache'=>false,
                		'success'=>'function(html){ window.location.reload();}',

		            )
		            ));

			}else{
				if($this->AdminsOne->post==1 || $this->AdminsOne->post==4){////当前业务人员是总监或系统管理
					if($this->dangqian==2){
						$department=Department::model()->findAll('type=1');
						$arr=array();
						foreach ($department as $key => $value) {
							$arr[]=$value->id;
						}
					    $criteria=new CDbCriteria;
					    $criteria->order='userid desc';
					    $criteria->addNotInCondition('dep_id',$arr);

						return CHtml::dropDownList('userid_'.$this->id, 'usiness',  CHtml::listData(Admins::model()->findAll($criteria), 'userid', 'realname'),array(
				             'empty'=>'请选择转移人',
				             'class'=>'myzhuanyi',
				            'ajax'=>array(
				                'type'=>'POST',
				                'url'=>Yii::app()->createUrl('/srbac/kehu/zhuanyi'),
				                'data'=>array('uid'=>'js:this.value','id'=>$this->id),
				                'cache'=>false,
		                		'success'=>'function(html){ window.location.reload();}',
				               // 'update'=>'#us',
				            )
				            ));


					}else{
						$criteria=new CDbCriteria;
				    	$criteria->order='userid desc';
						return CHtml::dropDownList('userid_'.$this->id, 'usiness',  CHtml::listData(Admins::model()->findAll($criteria), 'userid', 'realname'),     array(
			            'empty'=>'请选择转移人',
			             'class'=>'myzhuanyi',
			            'ajax'=>array(
			                'type'=>'POST',
			                'url'=>Yii::app()->createUrl('/srbac/kehu/zhuanyi'),
			                'data'=>array('uid'=>'js:this.value','id'=>$this->id),
			               // 'update'=>'',
			                'cache'=>false,
	                		'success'=>'function(html){ window.location.reload();}',

			            )
			            ));

					}

					

				// }else{
				// 	$criteria=new CDbCriteria;
			 //    	$criteria->order='userid desc';
				// 	return CHtml::dropDownList('userid_'.$this->id, 'usiness',  CHtml::listData(Admins::model()->findAll($criteria), 'userid', 'realname'),     array(
		  //           'empty'=>'请选择转移人',
		  //            'class'=>'myzhuanyi',
		  //           'ajax'=>array(
		  //               'type'=>'POST',
		  //               'url'=>Yii::app()->createUrl('/srbac/kehu/zhuanyi'),
		  //               'data'=>array('uid'=>'js:this.value','id'=>$this->id),
		  //              // 'update'=>'',
		  //               'cache'=>false,
    //             		'success'=>'function(html){ window.location.reload();}',

		  //           )
		  //           ));

				}
				
			}
			//$models=Admins::model()->find('userid='.$this->usiness);
			
		}
    	
	}

	public function defaultScope()
	{
		$name = Yii::app()->controller->id;
		$status=Yii::app()->controller->getAction()->getId();
		if($name=='tixing'){
			return array(
						
					);
			exit;
		}
		$id = Yii::app()->controller->module->getComponent('user')->site_id;
		$post = Yii::app()->controller->module->getComponent('user')->post;
		$dep_id = Yii::app()->controller->module->getComponent('user')->dep_id;
        $user_id = Yii::app()->controller->module->getComponent('user')->__id;

		if($id!=1 ){
			if($name=='kehu'){
				if($status=='create' || $status=='update'){
					return array(
						'condition'=>"site_id=$id",
					);
				} else if($status!='setChangeusiness'){
					if($post==1){
						return array(
							'condition'=>"site_id=$id",
						);		
					}elseif($post==2){
							return array(
							'condition'=>"site_id=$id  and dep_id=$dep_id",
						);	
					}elseif($post==4){
							return array(
							'condition'=>"site_id=$id",
						);	
					}elseif($post==3){
							return array(
							'condition'=>"site_id=$id  and usiness=$user_id",
						);	
					}
				}
			}else if($name=='zykhgl'){
					return array(
							'condition'=>"t.site_id=$id",
					);
			}else if($name=='import'){
				if($status=='import' || $status=='searchsame'){
					return array(
							'condition'=>"site_id=$id",
					);
				}else{
					if($post==1){
						return array(
							'condition'=>"site_id=$id",
						);		
					}elseif($post==2){
							return array(
							'condition'=>"site_id=$id  and dep_id=$dep_id",
						);	
					}elseif($post==4){
							return array(
							'condition'=>"site_id=$id",
						);	
					}elseif($post==3){
							return array(
							'condition'=>"site_id=$id  and usiness=$user_id",
						);	
					}
				}
			}else {
				if($post==1){
					return array(
						'condition'=>"site_id=$id",
					);		
				}elseif($post==2){
						return array(
						'condition'=>"site_id=$id  and dep_id=$dep_id",
					);	
				}elseif($post==4){
						return array(
						'condition'=>"site_id=$id",
					);	
				}elseif($post==3){
						return array(
						'condition'=>"site_id=$id  and usiness=$user_id",
					);	
				}     
			}	
		}
	}
}