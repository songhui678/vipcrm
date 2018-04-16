<?php

class ZykhglController extends Controller
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
		$model=new ChangeClient;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ChangeClient']))
		{
			$model->attributes=$_POST['ChangeClient'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ChangeClient']))
		{
			$model->attributes=$_POST['ChangeClient'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		// $this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ChangeClient');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		 $id=Yii::app()->controller->module->getComponent('user')->__id;
		//  var_dump($d);
		// $admins=Admins::model()->find('userid=:userid',array(':userid'=>$d));
		// var_dump($admins);
		// exit;
		$type = Yii::app()->controller->module->getComponent('user')->type;
		$dep_id = Yii::app()->controller->module->getComponent('user')->dep_id;
		$post = Yii::app()->controller->module->getComponent('user')->post;
		$model=new ChangeClient('search');
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ChangeClient']))
			$model->attributes=$_GET['ChangeClient'];

			$model->status=1;

			if($type==1){
				$department=Department::model()->findAll('type=1');
				$arr=array();
				foreach ($department as $key => $value) {
					$arr[]=$value->id;
				}
			    $criteria=new CDbCriteria;
			    $criteria->order='userid desc';
			    $criteria->addNotInCondition('dep_id',$arr);
			    $criteria->addCondition("site_id=".Yii::app()->controller->module->getComponent('user')->site_id); 
				$aa=Admins::model()->findAll($criteria);

				if($post==2){
					$model->dep_id=$dep_id;
				}else if($post==3){
					$model->dep_id=$dep_id;
					$model->entry=$id;
				}
				
			} else if($type==2){
				$aa=Admins::model()->findAll('site_id=:site_id and validate=1 and dep_id=:dep_id',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id,':dep_id'=>$dep_id));
				if($post==2){
					$model->zrdep=$dep_id;
				}else if($post==3){
					exit;
				}
			}else{
				$aa=Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id));

			}
		
		$this->render('admin',array(
			'model'=>$model,'aa'=>$aa,
		));
	}

	// 批量删除操作
	public function actionDelall(){
		$res = array();
		if(isset($_POST['selectdel'])){
			foreach ($_POST['selectdel'] as $key => $value) {
				$model = $this->loadModel($value);
				// $model->delete();

				
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
	 * @return ChangeClient the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ChangeClient::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ChangeClient $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='change-client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	// 联系记录
	public function actionLianxi($id)
	{
		$post = Yii::app()->controller->module->getComponent('user')->post;
		$uid = Yii::app()->controller->module->getComponent('user')->__id;
		$dep_id = Yii::app()->controller->module->getComponent('user')->dep_id;
		$type = Yii::app()->controller->module->getComponent('user')->dep_id;
		$kehumodel=Client::model()->find('site_id=:site_id and id=:id',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id,':id'=>$id));
		if($post==3){
			if($kehumodel->entry!=$uid){
				exit;
			}
		}else if($post==2){
			$bb = Department::model()->find('site_id=:site_id and id=:id',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id,':id'=>$type));
			if($bb->type==1){
				$cc = ChangeClient::model()->find('site_id=:site_id and clientid=:clientid',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id,':clientid'=>$id));
				if(empty($cc)){
					exit;
				}else{
					if($cc->dep_id!=$dep_id){
						exit;
					}
				}

			}else if($bb->type==2){
				if($kehumodel->dep_id!=$dep_id){
					exit;
				}
			}		
		}else{
		}
		
		$model= new ContactRecord;
		if(empty($kehumodel)){
			exit;
		}else{
			$contactRecordmany = ContactRecord::model()->count("client_id=".$kehumodel->id);
		}
		
		$this->render('recordcreate',array(
			'model'=>$model,'contactRecordmany'=>$contactRecordmany,'kehumodel'=>$kehumodel,
		));
	}
}