<?php

class KehuController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='application.modules.srbac.views.layouts.admin';
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		$model=new Client;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
            
            $model->type =1;//客户类型 个人
            $model->status =1;//有效
            if(Yii::app()->controller->module->getComponent('user')->post==1 ||Yii::app()->controller->module->getComponent('user')->post==4){
				$model->entry_status =$_POST['Client']['entry_status'];//录入来源
            }else{
                $model->entry_status =Yii::app()->controller->module->getComponent('user')->type;//录入来源
            }
			$model->dangqian=$model->entry_status;
			$model->update_time = time(); //修改时间
			$model->usiness = Yii::app()->controller->module->getComponent('user')->__id;//业务人员id
			$model->contact=Yii::app()->controller->module->getComponent('user')->realname;//业务人员id
			$model->entry = Yii::app()->controller->module->getComponent('user')->__id;//录入人员id
			$model->create_time = time(); //创建时间
			$model->site_id =Yii::app()->controller->module->getComponent('user')->site_id;//录入人员站点id
            $model->dep_id =Yii::app()->controller->module->getComponent('user')->dep_id;//录入人员部门id

            if(!empty($_POST['Client']['eserve_time'])){
            	$model->eserve_time=strtotime($_POST['Client']['eserve_time']);
            }

            if(!empty($_POST['Client']['deposit_time'])){
            	$model->deposit_time=strtotime($_POST['Client']['deposit_time']);
            }
            if(!empty($_POST['Client']['photo_date'])){
            	$model->photo_date=strtotime($_POST['Client']['photo_date']);
            }
            if(!empty($_POST['Client']['choose_date'])){
            	$model->choose_date=strtotime($_POST['Client']['choose_date']);
            }
            if(!empty($_POST['Client']['design_date'])){
            	$model->design_date=strtotime($_POST['Client']['design_date']);
            }
            if(!empty($_POST['Client']['taketablets_date'])){
            	$model->taketablets_date=strtotime($_POST['Client']['taketablets_date']);
            }
            if(!empty($_POST['Client']['looksite_date'])){
            	$model->looksite_date=strtotime($_POST['Client']['looksite_date']);
            }
            if(!empty($_POST['Client']['style_date'])){
            	$model->style_date=strtotime($_POST['Client']['style_date']);
            }
            if(!empty($_POST['Client']['scheme_date'])){
            	$model->scheme_date=strtotime($_POST['Client']['scheme_date']);
            }

			if(!empty($_POST['Client']['makeup_date'])){
            	$model->makeup_date=strtotime($_POST['Client']['makeup_date']);
            }

			if(!empty($_POST['Client']['compere_date'])){
            	$model->compere_date=strtotime($_POST['Client']['compere_date']);
            }
			if(!empty($_POST['Client']['rehearsal_date'])){
            	$model->rehearsal_date=strtotime($_POST['Client']['rehearsal_date']);
            }
			if($model->save())
				$this->redirect(array('lianxi','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			$model->update_time = time(); //修改时间

			if(!empty($_POST['Client']['eserve_time'])){
            	$model->eserve_time=strtotime($_POST['Client']['eserve_time']);
            }

            if(!empty($_POST['Client']['deposit_time'])){
            	$model->deposit_time=strtotime($_POST['Client']['deposit_time']);
            }
            if(!empty($_POST['Client']['photo_date'])){
            	$model->photo_date=strtotime($_POST['Client']['photo_date']);
            }
            if(!empty($_POST['Client']['choose_date'])){
            	$model->choose_date=strtotime($_POST['Client']['choose_date']);
            }
            if(!empty($_POST['Client']['design_date'])){
            	$model->design_date=strtotime($_POST['Client']['design_date']);
            }
            if(!empty($_POST['Client']['taketablets_date'])){
            	$model->taketablets_date=strtotime($_POST['Client']['taketablets_date']);
            }
            if(!empty($_POST['Client']['looksite_date'])){
            	$model->looksite_date=strtotime($_POST['Client']['looksite_date']);
            }
            if(!empty($_POST['Client']['style_date'])){
            	$model->style_date=strtotime($_POST['Client']['style_date']);
            }
            if(!empty($_POST['Client']['scheme_date'])){
            	$model->scheme_date=strtotime($_POST['Client']['scheme_date']);
            }

			if(!empty($_POST['Client']['makeup_date'])){
            	$model->makeup_date=strtotime($_POST['Client']['makeup_date']);
            }

			if(!empty($_POST['Client']['compere_date'])){
            	$model->compere_date=strtotime($_POST['Client']['compere_date']);
            }
			if(!empty($_POST['Client']['rehearsal_date'])){
            	$model->rehearsal_date=strtotime($_POST['Client']['rehearsal_date']);
            }

			if($model->save())
				$this->redirect(array('lianxi','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$model->status=0; //无效
		$model->save(false);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Client');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		$model=new Client('search');

		$id =Yii::app()->controller->module->getComponent('user')->id;
		

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	// 批量删除操作
	public function actionDelall(){
		$res = array();
		if(isset($_POST['selectdel'])){
			foreach ($_POST['selectdel'] as $key => $value) {

				$model = $this->loadModel($value);
				$model->status=0;//删除状态
				$model->save(false);
			}
			$res['statu'] = 0;
			echo CJSON::encode($res);
		}else{
			$res['statu'] = 1;
			echo CJSON::encode($res);
		}
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Client the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Client::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Client $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	// 联系记录
	public function actionLianxi($id){

		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		$kehumodel=$this->loadModel($id);
		
		$model= new ContactRecord;
		
		$contactRecordmany = ContactRecord::model()->count("client_id=$kehumodel->id");

		if(isset($_POST['ContactRecord']))
		{
			$model->attributes=$_POST['ContactRecord'];


			// if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){
			// 	if(empty($_POST['typename'])){
			// 		echo '未选择联系状态';exit;
			// 	}else if($_POST['typename']==1){
			// 		$model->result=$_POST['result1']; //市场联系状态
			// 	}else if($_POST['typename']==2){
			// 		$model->result=$_POST['result2'];//销售联系状态
			// 	}
			// }
			// $model->result=$_POST['ContactRecord']['result']; //联系记录状态
			$model->client_id=$kehumodel->id; //客户ID
			$model->contact_time=time();//添加联系记录时间
			$model->personnel=Yii::app()->controller->module->getComponent('user')->__id;// 业务人员ID
			if(!empty($_POST['remindtime'])){
					$model->genjin_time=strtotime($_POST['remindtime']);
			}
			if($model->save()){
				
				if(!empty($_POST['remindtime'])){
					$kehumodel->remind_time=strtotime($_POST['remindtime']);
				}
				
				if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){
					if($model->ClientOne->dangqian==1){
						$kehumodel->situation=$model->result;

					}else if($model->ClientOne->dangqian==2){
						$kehumodel->xsituation=$model->result;
					}

				}else{
					if(Yii::app()->controller->module->getComponent('user')->type==2){
						$kehumodel->xsituation=$model->result;
					}else if(Yii::app()->controller->module->getComponent('user')->type==1){
						$kehumodel->situation=$model->result;
					}

				}

				$kehumodel->update_time=time();
				$kehumodel->save(false);
				$model= new ContactRecord;
			}
		}

		$this->render('recordcreate',array(
			'model'=>$model,'contactRecordmany'=>$contactRecordmany,'kehumodel'=>$kehumodel,
		));
	}

	// public function actionRecorddelete($id)
	// {
	// 	$contactRecord = ContactRecord::model()->findAll("client_id=$id");
	// 	$contactRecord->status=0; //无效
	// 	$contactRecord->save(false);
	// 	$this->render('recordcreate',array(
	// 		'model'=>$model,'contactRecordmany'=>$contactRecordmany,'kehumodel'=>$kehumodel,
	// 	));
	// }

   // 批量恢复操作
	public function actionHuifuall(){
		$res = array();
		if(isset($_POST['selectdel'])){
			foreach ($_POST['selectdel'] as $key => $value) {

				$model = $this->loadModel($value);
				$model->status=1;//恢复状态
				$model->save(false);
			}
			$res['statu'] = 0;
			echo CJSON::encode($res);
		}else{
			$res['statu'] = 1;
			echo CJSON::encode($res);
		}
	}
   // 批量放弃操作
	// public function actionFangqiall(){
	// 	$res = array();
	// 	if(isset($_POST['selectdel'])){
	// 		foreach ($_POST['selectdel'] as $key => $value) {

	// 			$model = $this->loadModel($value);
	// 			$model->situation=0;//放弃状态
	// 			$model->save(false);
	// 		}
	// 		$res['statu'] = 0;
	// 		echo CJSON::encode($res);
	// 	}else{
	// 		$res['statu'] = 1;
	// 		echo CJSON::encode($res);
	// 	}
	// }

	// 批量调换操作
	public function actionChangeall(){
		$res = array();
		if(isset($_POST['selectdel'])){
			foreach ($_POST['selectdel'] as $key => $value) {
				$models=Client::model()->find('id = :id', array(':id'=>$value));
				$admins=Admins::model()->find('userid=:userid',array(':userid'=>$_POST['name']));
				if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){
					if($models->entry_status==1){

						if(empty($models->AdminsOne->DepOne)){
							$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
							if(empty($changeclient)){
								$cc = new ChangeClient;
								$cc->clientid = $models->id;
								$cc->site_id = $models->site_id;
								$cc->dep_id = $models->dep_id;
								$cc->status = 1;
								$cc->create_time = date("Y-m-d h:i:s",time());
								$cc->save(false);
							}
							$models->usiness=$_POST['name'];//转业务人员
							$models->update_time = time();
							$models->dep_id =$admins->dep_id;//业务人员部门id
							$models->contact=$admins->realname;
							if($models->entry_status==1){
								if(!empty($admins->DepOne)){
									if($admins->DepOne->type==2){
										$models->dangqian=2;
									}
								}	
							}
							$models->save(false);
						}else{
							if($models->AdminsOne->DepOne->type==1){
								$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
								if(empty($changeclient)){
									$cc = new ChangeClient;
									$cc->clientid = $models->id;
									$cc->site_id = $models->site_id;
									$cc->dep_id = $models->dep_id;
									$cc->status = 1;
									$cc->create_time = date("Y-m-d h:i:s",time());
									$cc->save(false);
								}
								$models->usiness=$_POST['name'];//转业务人员
								$models->update_time = time();
								$models->dep_id =$admins->dep_id;//业务人员部门id
								$models->contact=$admins->realname;
								if($models->entry_status==1){
									if(!empty($admins->DepOne)){
										if($admins->DepOne->type==2){
											$models->dangqian=2;
										}
									}	
								}
								$models->save(false);
							}else if($models->AdminsOne->DepOne->type==2){
								if(empty($admins->DepOne)){
									$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
									if(empty($changeclient)){
										$cc = new ChangeClient;
										$cc->clientid = $models->id;
										$cc->site_id = $models->site_id;
										$cc->dep_id = $models->dep_id;
										$cc->status = 1;
										$cc->create_time = date("Y-m-d h:i:s",time());
										$cc->save(false);
									}
									$models->usiness=$_POST['name'];//转业务人员
									$models->update_time = time();
									$models->dep_id =$admins->dep_id;//业务人员部门id
									$models->contact=$admins->realname;
									if($models->entry_status==1){
										if(!empty($admins->DepOne)){
											if($admins->DepOne->type==2){
												$models->dangqian=2;
											}
										}	
									}
									$models->save(false);
								}else{
									if($admins->DepOne->type==2){
										$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
										if(empty($changeclient)){
											$cc = new ChangeClient;
											$cc->clientid = $models->id;
											$cc->site_id = $models->site_id;
											$cc->dep_id = $models->dep_id;
											$cc->status = 1;
											$cc->create_time = date("Y-m-d h:i:s",time());
											$cc->save(false);
										}
										$models->usiness=$_POST['name'];//转业务人员
										$models->update_time = time();
										$models->dep_id =$admins->dep_id;//业务人员部门id
										$models->contact=$admins->realname;
										if($models->entry_status==1){
											if(!empty($admins->DepOne)){
												if($admins->DepOne->type==2){
													$models->dangqian=2;
												}
											}	
										}
										$models->save(false);
									}else{}
								}	
							}else{}
						}
					}else if($models->entry_status==2){
						if(empty($models->AdminsOne->DepOne)){
							if(empty($admins->DepOne)){
								$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
								if(empty($changeclient)){
									$cc = new ChangeClient;
									$cc->clientid = $models->id;
									$cc->site_id = $models->site_id;
									$cc->dep_id = $models->dep_id;
									$cc->status = 1;
									$cc->create_time = date("Y-m-d h:i:s",time());
									$cc->save(false);
								}
								$models->usiness=$_POST['name'];//转业务人员
								$models->update_time = time();
								$models->dep_id =$admins->dep_id;//业务人员部门id
								$models->contact=$admins->realname;
								if($models->entry_status==1){
									if(!empty($admins->DepOne)){
										if($admins->DepOne->type==2){
											$models->dangqian=2;
										}
									}	
								}
								$models->save(false);
							}else{
								if($admins->DepOne->type==2){
									$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
									if(empty($changeclient)){
										$cc = new ChangeClient;
										$cc->clientid = $models->id;
										$cc->site_id = $models->site_id;
										$cc->dep_id = $models->dep_id;
										$cc->status = 1;
										$cc->create_time = date("Y-m-d h:i:s",time());
										$cc->save(false);
									}
									$models->usiness=$_POST['name'];//转业务人员
									$models->update_time = time();
									$models->dep_id =$admins->dep_id;//业务人员部门id
									$models->contact=$admins->realname;
									if($models->entry_status==1){
										if(!empty($admins->DepOne)){
											if($admins->DepOne->type==2){
												$models->dangqian=2;
											}
										}	
									}
									$models->save(false);
								}else{}
							}
						}else{
							if(empty($admins->DepOne)){
								$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
								if(empty($changeclient)){
									$cc = new ChangeClient;
									$cc->clientid = $models->id;
									$cc->site_id = $models->site_id;
									$cc->dep_id = $models->dep_id;
									$cc->status = 1;
									$cc->create_time = date("Y-m-d h:i:s",time());
									$cc->save(false);
								}
								$models->usiness=$_POST['name'];//转业务人员
								$models->update_time = time();
								$models->dep_id =$admins->dep_id;//业务人员部门id
								$models->contact=$admins->realname;
								if($models->entry_status==1){
									if(!empty($admins->DepOne)){
										if($admins->DepOne->type==2){
											$models->dangqian=2;
										}
									}	
								}
								$models->save(false);
							}else{
								if($admins->DepOne->type==2){
									$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
									if(empty($changeclient)){
										$cc = new ChangeClient;
										$cc->clientid = $models->id;
										$cc->site_id = $models->site_id;
										$cc->dep_id = $models->dep_id;
										$cc->status = 1;
										$cc->create_time = date("Y-m-d h:i:s",time());
										$cc->save(false);
									}
									$models->usiness=$_POST['name'];//转业务人员
									$models->update_time = time();
									$models->dep_id =$admins->dep_id;//业务人员部门id
									$models->contact=$admins->realname;
									if($models->entry_status==1){
										if(!empty($admins->DepOne)){
											if($admins->DepOne->type==2){
												$models->dangqian=2;
											}
										}	
									}
									$models->save(false);
								}else{}
							}
						}
					}else{}
				}else if(Yii::app()->controller->module->getComponent('user')->post==2){
					$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
					if(empty($changeclient)){
						$cc = new ChangeClient;
						$cc->clientid = $models->id;
						$cc->site_id = $models->site_id;
						$cc->dep_id = $models->dep_id;
						$cc->status = 1;
						$cc->create_time = date("Y-m-d h:i:s",time());
						$cc->save(false);
					}
					$models->usiness=$_POST['name'];//转业务人员
					$models->update_time = time();
					$models->dep_id =$admins->dep_id;//业务人员部门id
					$models->contact=$admins->realname;
					if($models->entry_status==1){
						if(!empty($admins->DepOne)){
							if($admins->DepOne->type==2){
								$models->dangqian=2;
							}
						}	
					}
					$models->save(false);
				}
			}
			$res['statu'] = 0;
			echo CJSON::encode($res);
		}else{
			$res['statu'] = 1;
			echo CJSON::encode($res);
		}
	}

	//获取业务人员名称
	public function actionAjaxUsiness()
	{
		$id =Yii::app()->controller->module->getComponent('user')->id;
        
		if(!empty($id)){
			
			$admin =Admins::model()->find('userid=:userid and validate=1',array(':userid'=>$id));
			$arr =Admins::model()->findAll('validate=1');
		    
			$str='<option value="">批量转移业务人</option>';
			foreach ($arr as $key => $value) {
				// $str.='<option class="sj" onclick="changeAll();" value="'.$value['userid'].'">'.$value['realname'].'</option>';
				// 
				$str.='<option  value="'.$value['userid'].'">'.$value['realname'].'</option>';
			}
			echo $str;
		}
	}

	// 关闭提醒
	public function actionCloseRemind($id){
		$model=$this->loadModel($id);
		$model->remind_status=0; //关闭提醒
		if($model->save(false)){
			if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		
	}

	// 关闭提醒
	public function actionCloseReminds($id){
		$model=$this->loadModel($id);
		$model->remind_status=0; //关闭提醒
		if($model->save(false)){
			$this->redirect(array('lianxi','id'=>$model->id));
		}	
	}
	// 调换操作正在用
	public function actionZhuanyi(){

		$admins=Admins::model()->find('userid=:userid',array(':userid'=>$_POST['uid']));
		$models=Client::model()->find('id = :id', array(':id'=>$_POST['id']));

		$changeclient = ChangeClient::model()->find('clientid=:clientid',array(':clientid'=>$models->id));
		if(empty($changeclient)){
			$cc = new ChangeClient;
			$cc->clientid = $models->id;
			$cc->site_id = $models->site_id;
			$cc->dep_id = $models->dep_id;
			$cc->status = 1;
			$cc->create_time = date("Y-m-d h:i:s",time());
			$cc->save(false);
		}

		$models->usiness=$_POST['uid'];//转业务人员
		$models->update_time = time();
		$models->dep_id =$admins->dep_id;//业务人员部门id
		$models->contact=$admins->realname;
		
		if($models->entry_status==1){
			if(!empty($admins->DepOne)){
				if($admins->DepOne->type==2){
					$models->dangqian=2;
				}
			}	
		}
		if($models->save(false)){
			echo 1;
		}else{
			echo 0;
		}
	}

	// 调换操作
	public function actionSetChangeusiness(){
		$admins=Admins::model()->find('userid=:userid',array(':userid'=>$_POST['value']));
		$models=Client::model()->find('id = :id', array(':id'=>$_POST['item']));
		if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){
			if($models->entry_status==1){
				if(empty($models->AdminsOne->DepOne)){
					$models->usiness=$_POST['value'];//转业务人员
					$models->update_time = time();
					$models->dep_id =$admins->dep_id;//业务人员部门id
					$models->contact=$admins->realname;
					$models->save(false);
				}else{
					if($models->AdminsOne->DepOne->type==1){
						$models->usiness=$_POST['value'];//转业务人员
						$models->update_time = time();
						$models->dep_id =$admins->dep_id;//业务人员部门id
						$models->contact=$admins->realname;
						$models->save(false);
					}else if($models->AdminsOne->DepOne->type==2){
						if(empty($admins->DepOne)){
							$models->usiness=$_POST['value'];//转业务人员
							$models->update_time = time();
							$models->dep_id =$admins->dep_id;//业务人员部门id
							$models->contact=$admins->realname;
							$models->save(false);
						}else{
							if($admins->DepOne->type==2){
								$models->usiness=$_POST['value'];//转业务人员
								$models->update_time = time();
								$models->dep_id =$admins->dep_id;//业务人员部门id
								$models->contact=$admins->realname;
								$models->save(false);
							}else{}
						}	
					}else{}
				}
			}else if($models->entry_status==2){
				if(empty($models->AdminsOne->DepOne)){
					if(empty($admins->DepOne)){
						$models->usiness=$_POST['value'];//转业务人员
						$models->update_time = time();
						$models->dep_id =$admins->dep_id;//业务人员部门id
						$models->contact=$admins->realname;
						$models->save(false);
					}else{
						if($admins->DepOne->type==2){
							$models->usiness=$_POST['value'];//转业务人员
							$models->update_time = time();
							$models->dep_id =$admins->dep_id;//业务人员部门id
							$models->contact=$admins->realname;
							$models->save(false);
						}else{}
					}
				}else{
					if(empty($admins->DepOne)){
						$models->usiness=$_POST['value'];//转业务人员
						$models->update_time = time();
						$models->dep_id =$admins->dep_id;//业务人员部门id
						$models->contact=$admins->realname;
						$models->save(false);
					}else{
						if($admins->DepOne->type==2){
							$models->usiness=$_POST['value'];//转业务人员
							$models->update_time = time();
							$models->dep_id =$admins->dep_id;//业务人员部门id
							$models->contact=$admins->realname;
							$models->save(false);
						}else{}
					}
				}
			}else{}
		}else if(Yii::app()->controller->module->getComponent('user')->post==2){
			$models->usiness=$_POST['value'];//转业务人员
			$models->update_time = time();
			$models->dep_id =$admins->dep_id;//业务人员部门id
			$models->contact=$admins->realname;
			$models->save(false);
		}		
	}

		//获取查询来源列表
	public function actionAjaxSources()
	{
		$name=Yii::app()->request->getParam('name');        
		if(!empty($name)){
			
		    $criteria=new CDbCriteria;
			$criteria->addSearchCondition('name', $name);
			$criteria->addCondition("site_id=".Yii::app()->controller->module->getComponent('user')->site_id);
			$Sources=Sources::model()->findAll($criteria);
			$str='<div style="padding:5px 5px;" value="">点击来源名称获取: </div>';
			foreach ($Sources as $key => $value) {
				$str.='<div onclick="changeAll('.$value['id'].')" value="'.$value['id'].'" style="cursor: pointer;">'.$value['name'].'</div>';
			}
			echo $str;
		}
	}
//彻底删除
	public function actionChedidel($id)
	{
		$model=$this->loadModel($id);
		ChangeClient::model()->deleteAll("clientid = :clientid and site_id = :site_id",array(":clientid"=>$model->id,":site_id"=>Yii::app()->controller->module->getComponent('user')->site_id));//转移客户表里的记录
		ContactRecord::model()->deleteAll("client_id = :client_id",array(":client_id"=>$model->id));//联系记录表里的记录
		if($model->delete()){
			if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}else{
			echo '彻底删除失败';exit;
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		
	}
	
}