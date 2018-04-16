<?php

class AdminsController extends Controller
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
		$model=new Admins;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Admins']))
		{
			
			
			$model->attributes=$_POST['Admins'];
		
			if($model->save()){
				$model->createtime=date('Y-m-d',time());
				$model->password = md5($_POST['Admins']['password']);
				if(Yii::app()->controller->module->getComponent('user')->id!=1){
					if($model->post==4){
						$model->dep_id=0;
					}
					
					$model->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
					$model->cate=Yii::app()->controller->module->getComponent('user')->cate;
				}else{
					// echo $model->userid;exit;
					$model->pid=0;
					$model->dep_id=0;
					$model->site_id=$model->userid;

					$record=new Record;

					foreach($record->defaultStatus('1') as $k=>$v){
						$record=new record;
						$record->title=$v;
						$record->type=1;
						$record->validate=1;
						$record->site_id=$model->site_id;
						$record->sort=$k;
						$record->save();
					}
					foreach($record->defaultStatus('2') as $k1=>$v1){
						$record=new record;
						$record->title=$v1;
						$record->type=2;
						$record->validate=1;
						$record->site_id=$model->site_id;
						$record->sort=$k1;
						$record->save();
					}
				}
				$Assignments=new Assignments;
				$Assignments->data='s:0:"";';
				$Assignments->userid=$model->userid;
				$Assignments->itemname=$model->getPostName();
				$Assignments->save();
				$model->save();
				$this->redirect(array('view','id'=>$model->userid));
			}
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
		// var_dump($model);
		// exit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Admins']))
		{
			
			$model->attributes=$_POST['Admins'];
			if(!empty($_POST['Admins']['password'])){
				$model->password = md5($_POST['Admins']['password']);
			}
			if($model->save()){
				$res=Assignments::model()->find(array('condition'=>'userid= '.$model->userid));
				$res->itemname=$model->getPostName();
				$res->save(false);
				$model->save(false);
				

				$this->redirect(array('view','id'=>$model->userid));
			}
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
		$res=$this->loadModel($id);
		if($res->pid==0){
			throw new CHttpException(404,'删除失败！不能删除系统管理员');
		}else{
			$res->delete();
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDel($id)
	{
		$res=$this->loadModel($id);
		if($res->post==1 or $res->post==0){
			throw new CHttpException(404,'删除失败！不能删除系统管理员');
		}else{
			if($res->validate==1){
				$res->validate=2;
			}else{
				$res->validate=1;
			}
			
			$res->save();
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	
		$dataProvider=new CActiveDataProvider('Admins');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		$model=new Admins('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Admins']))

			$model->attributes=$_GET['Admins'];

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
				$model->delete();

				
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
	 * @return Admins the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		
		$model=Admins::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Admins $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='admins-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	
}
