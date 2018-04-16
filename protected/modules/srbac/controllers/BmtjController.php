<?php

class BmtjController extends Controller
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
		$model=new Client;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
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

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
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
		Yii::app()->clientScript->registerScriptFile('/js/jquery.form.js');
        $bumenmany=array();
        $usernamemany=array();
        $starttimes = '';
        $stoptimes='';
        $userid = Yii::app()->controller->module->getComponent('user')->__id;

	    $user=Admins::model()->find('userid=:userid',array(':userid'=>$userid));

	    $recordList=Record::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>$user->site_id));
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('create',array(
			'model'=>$model,'bumenmany'=>$bumenmany,'usernamemany'=>$usernamemany,'starttimes'=>$starttimes,'stoptimes'=>$stoptimes,'recordList'=>$recordList,
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

	public function actionJingli()
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		Yii::app()->clientScript->registerScriptFile('/js/jquery.form.js');
	    $model=new Client;
	    $userid = Yii::app()->controller->module->getComponent('user')->__id;
	    $user=Admins::model()->find('userid=:userid',array(':userid'=>$userid));
	    
	    $depList=Department::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>$user->site_id)); 

		$recordList=Record::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>$user->site_id));
	    
	    $bumenmany=array();
        $usernamemany=array();
        $total=array();

		if(!empty($_POST['pstarttime']) && !empty($_POST['pstoptime'])){
			$start =strtotime($_POST['pstarttime'].' 00:00:00');
			$stop =strtotime($_POST['pstoptime'].' 23:59:59');

          foreach($depList as $ku=>$vu){

          		$userList=Admins::model()->findAll('site_id=:site_id and validate=1 and dep_id=:dep_id',array(':site_id'=>$user->site_id,':dep_id'=>$vu->id));

          		$arr=array();
          		foreach($userList as $kv=>$vv){
                    $arr[]=$vv->userid;
          		}

                $usernamemany[$ku]=$vu->name;

				foreach($recordList as $k=>$v){

					$criteria=new CDbCriteria;
				    $criteria->addInCondition('entry',$arr);
					$criteria->addBetweenCondition('create_time', $start, $stop);
					if($v->type==1){
						$criteria->addCondition("situation=$v->id");

					}elseif($v->type==2){
						$criteria->addCondition("xsituation=$v->id");

					}
					$bumenmany[$ku][$k]['value']=Client::model()->count($criteria);
					$bumenmany[$ku][$k]['id'] = $v->id;
	                $bumenmany[$ku][$k]['us'] = $vu->id;
	                $bumenmany[$ku][$k]['start'] = $_POST['pstarttime'];
	                $bumenmany[$ku][$k]['stop'] = $_POST['pstoptime'];	 
				} 
				
          }
          	

			foreach($recordList as $k=>$v){

				$criterias=new CDbCriteria;
				$criterias->addBetweenCondition('create_time', $start, $stop);			
				if($v->type==1){
					$criterias->addCondition("situation=".$v->id);

				}elseif($v->type==2){
					$criterias->addCondition("xsituation=".$v->id);
				}
				$total[$k] =Client::model()->count($criterias);
			} 

          $this->render('create',array(
			'model'=>$model,'bumenmany'=>$bumenmany,'usernamemany'=>$usernamemany,'starttimes'=>$_POST['pstarttime'],'stoptimes'=>$_POST['pstoptime'],'total'=>$total,'recordList'=>$recordList,'arr'=>$arr,
		));
          // var_dump($aa);
       //    $res = $aa;
			    // die(CJSON::encode($res));

        }else{
      //   	$res['sta'] = '开始时间或截止时间不能为空';
			   // die(CJSON::encode($res));
        }
	}

		public function actionXiangxi()
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		$model=new Client('search');
		$start= $_GET["start"];
		$stop= $_GET["stop"];
		$dep_id= $_GET["us"];
		$st= $_GET["st"];
		$arr= $_GET["arr"];
// echo $start.'_'.$stop.'_'.$dep_id.'_'.$st.'_'.$arr;exit;
       $dep=Department::model()->find('id=:id and validate=1',array(':id'=>$dep_id)); 
	   // echo $dep->type;exit;
	    if($dep->type==1){
			 $type=1;
	    }else if($dep->type==2){
	       	 $type=2;

	    }

        $record=Record::model()->find('id=:id',array(':id'=>$st));
        $starttime=strtotime($start.' 00:00:00');
        $stoptime=strtotime($stop.' 23:59:59');
        $userList=Admins::model()->findAll('site_id=:site_id and validate=1 and dep_id=:dep_id',array(':site_id'=>$dep->site_id,':dep_id'=>$dep_id));
         $arr=array();
         foreach($userList as $kv=>$vv){
                    $arr[]=$vv->userid;
         }
    
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];
            $model->usiness=$userid;

            if($record->type==1){
               $model->situation=$st;
            }else if($record->type==2){
			   $model->xsituation=$st;
            } 
            
// var_dump($arr) ;exit;
		$this->render('xiangxi',array(
			'model'=>$model,'starttime'=>$starttime,'stoptime'=>$stoptime,'type'=>$type,'st'=>$st,'arr'=>$arr
		));
	}
}
