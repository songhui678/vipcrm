<?php

class LogoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='application.modules.srbac.views.layouts.admin';
	
		public $filePath;

	public function actions()
	{

	    list($s1, $s2) = explode(' ', microtime());   
	    $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
	    $fileName.=rand(0,9999);

	    if(!empty($_GET['fileName'])){
	      $fileName = $_GET['fileName'];
	    }

	    $path = $this->filePath[$_GET['filePath']];
	    $after = $_GET['after'];
	    $res = array(
	      //上传图片
	      'upload'=>array(
	        'class'=>'application.extensions.swfupload.SWFUploadAction',
	        'filepath'=>Yii::app()->basePath.'/../upload/'.$path.$fileName.'.EXT',
	        //注意这里是绝对路径,.EXT是文件后缀名替代符号
	      )
	    );
	    if(!empty($after)){
	      $res['upload']['onAfterUpload'] = array($this,$after);
	    }
	    return $res;
	}

	//处理logo图片
	public function tuangoutu($event){
	    //原图路径
	    $src = Yii::app()->basePath.'/../upload/'.$this->filePath[2].date('Y-m-d').'/'.$event->sender['name'];
	    //生成缩略图
	    $image = Yii::app()->image->load($src);

	    $src100 = Yii::app()->basePath.'/../upload/'.$this->filePath[2].'small/'.date('Y-m-d').'/'.$event->sender['name'];

	    $image->smart_resize(120,45); //120px*45px
	    $image->save($src100);

	    return true;

	}

	public function init()
	{
	      Yii::app()->clientScript->registerScriptFile('/js/jquery.form.js');
	    
	     $this->filePath=array(
	      
	      1=>'/logo_file/'.date('Y-m-d').'/',//团购焦点图
	      2=>'/logo_file/',//团购缩略图	     
	    );
	}
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
		$model=new Config;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Config']))
		{
			$model->attributes=$_POST['Config'];
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

		if(isset($_POST['Config']))
		{
			$model->attributes=$_POST['Config'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Config');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Config;
		if(isset($_POST['Config'])){
			$site_id=Yii::app()->controller->module->getComponent('user')->site_id;
			$Config=Config::model()->find('site_id='.$site_id);
			if($Config){
				$Config->site_logo=$_POST['Config']['site_logo'];
				$Config->save();
			}else{
				$model->site_logo=$_POST['Config']['site_logo'];
				$model->site_id=$site_id;
				$model->save();
			}
		}

		$this->render('create',array(
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
	 * @return Config the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Config::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Config $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='config-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
