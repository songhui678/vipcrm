<?php

class TongjiController extends Controller
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


	public function actionYuangong()
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		Yii::app()->clientScript->registerScriptFile('/js/jquery.form.js');
	    $userid = Yii::app()->controller->module->getComponent('user')->__id;
	    $user=Admins::model()->find('userid=:userid',array(':userid'=>$userid));
	    $recordList=Record::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>$user->site_id));
	    // $sit =array(7 => '尚未联系',1 => '初次联系',2 => '无需求',3 => '有需求进店',4 => '有需求待进店',5 => '已成交',6 => '选择其他家订单') ;
	    // 
	    $aa=array();
       
		if(!empty($_POST['starttime'])&&!empty($_POST['stoptime'])){
			$start =strtotime($_POST['starttime'].' 00:00:00');
			$stop =strtotime($_POST['stoptime'].' 23:59:59');

          $sqlCount = "SELECT count(usiness) FROM cm_client WHERE  status=1  AND usiness=$userid  AND create_time BETWEEN $start AND $stop"; //计算总数语句

			foreach($recordList as $k=>$v){

				if($v->type==1){
					$aa[$k]['value'] = Yii::app()->db->createCommand($sqlCount."  AND situation=".$v->id)->queryScalar();
				}elseif($v->type==2){
					$aa[$k]['value'] = Yii::app()->db->createCommand($sqlCount."  AND xsituation=".$v->id)->queryScalar();
				}

                $aa[$k]['id'] = $v->id;
                $aa[$k]['us'] = $userid;
                $aa[$k]['start'] = $_POST['starttime'];
                $aa[$k]['stop'] = $_POST['stoptime'];     
			} 
		
			$res = $aa;
			   die(CJSON::encode($res));

        }else{
        	$res['sta'] = '开始时间或截止时间不能为空';
			   die(CJSON::encode($res));

        }
	}

	public function actionBumen()
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		Yii::app()->clientScript->registerScriptFile('/js/jquery.form.js');
	    $model=new Client;
	    $userid = Yii::app()->controller->module->getComponent('user')->__id;
	    $user=Admins::model()->find('userid=:userid',array(':userid'=>$userid));
	    $userList=Admins::model()->findAll('dep_id=:dep_id and validate=1',array(':dep_id'=>$user->dep_id));
	    $recordList=Record::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>$user->site_id));
	    // $type = Yii::app()->controller->module->getComponent('user')->type;
        // $sit =array(7 => '尚未联系',1 => '初次联系',2 => '无需求',3 => '有需求进店',4 => '有需求待进店',5 => '已成交',6 => '选择其他家订单') ;
	    $bumenmany=array();
        $usernamemany=array();
        $total=array();
		if(!empty($_POST['bstarttime'])&&!empty($_POST['bstoptime'])){
			$start =strtotime($_POST['bstarttime'].' 00:00:00');
			$stop =strtotime($_POST['bstoptime'].' 23:59:59');

            foreach($userList as $ku=>$vu){

	          	$sqlCount = "SELECT count(usiness) FROM cm_client WHERE  status=1  AND usiness=$vu->userid  AND create_time BETWEEN $start AND $stop"; //计算总数语句
                $usernamemany[$ku]=$vu->realname;
				foreach($recordList as $k=>$v){

					// $aa[$ku]['userid'] = $vu->realname;
					if($v->type==1){
						$bumenmany[$ku][$k]['value'] = Yii::app()->db->createCommand($sqlCount."  AND situation=".$v->id)->queryScalar();

					}elseif($v->type==2){
						$bumenmany[$ku][$k]['value'] = Yii::app()->db->createCommand($sqlCount."  AND xsituation=".$v->id)->queryScalar();
					}
					// $bumenmany[$ku][$k]['value'] = Yii::app()->db->createCommand($sqlCount."  AND xsituation=".$v->id)->queryScalar();
					$bumenmany[$ku][$k]['id'] = $v->id;
	                $bumenmany[$ku][$k]['us'] = $vu->userid;
	                $bumenmany[$ku][$k]['start'] = $_POST['bstarttime'];
	                $bumenmany[$ku][$k]['stop'] = $_POST['bstoptime'];           
				} 
			}
			$sqlCounts = "SELECT count(usiness) FROM cm_client WHERE  status=1  AND dep_id=$user->dep_id  AND create_time BETWEEN $start AND $stop"; //计算总数语句
			foreach($recordList as $k=>$v){
				// $aa[$ku]['userid'] = $vu->realname;
				if($v->type==1){
					$total[$k] = Yii::app()->db->createCommand($sqlCounts."  AND situation=".$v->id)->queryScalar(); 
				}elseif($v->type==2){
					$total[$k] = Yii::app()->db->createCommand($sqlCounts."  AND situation=".$v->id)->queryScalar(); 	
				}	
			}	
         
          $this->render('create',array(
			'model'=>$model,'bumenmany'=>$bumenmany,'usernamemany'=>$usernamemany,'starttimes'=>$_POST['bstarttime'],'stoptimes'=>$_POST['bstoptime'],'total'=>$total,'recordList'=>$recordList,
		));
          // var_dump($aa);
       //    $res = $aa;
			    // die(CJSON::encode($res));

        }else{
      //   	$res['sta'] = '开始时间或截止时间不能为空';
			   // die(CJSON::encode($res));
        }
	}

	public function actionJingli()
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		Yii::app()->clientScript->registerScriptFile('/js/jquery.form.js');
	    $model=new Client;
	    $userid = Yii::app()->controller->module->getComponent('user')->__id;
	    $user=Admins::model()->find('userid=:userid',array(':userid'=>$userid));
	    $userList=Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>$user->site_id));
		$recordList=Record::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>$user->site_id));
	    
        // $sit =array(7 => '尚未联系',1 => '初次联系',2 => '无需求',3 => '有需求进店',4 => '有需求待进店',5 => '已成交',6 => '选择其他家订单') ;
	    $bumenmany=array();
        $usernamemany=array();
        $total=array();
		if(!empty($_POST['pstarttime'])&&!empty($_POST['pstoptime'])){
			$start =strtotime($_POST['pstarttime'].' 00:00:00');
			$stop =strtotime($_POST['pstoptime'].' 23:59:59');

          foreach($userList as $ku=>$vu){

	          	$sqlCount = "SELECT count(usiness) FROM cm_client WHERE  status=1  AND usiness=$vu->userid  AND create_time BETWEEN $start AND $stop"; //计算总数语句
                $usernamemany[$ku]=$vu->realname;
				foreach($recordList as $k=>$v){
					// $aa[$ku]['userid'] = $vu->realname;
					if($v->type==1){
						$bumenmany[$ku][$k]['value'] = Yii::app()->db->createCommand($sqlCount."  AND situation=".$v->id)->queryScalar();

					}elseif($v->type==2){
						$bumenmany[$ku][$k]['value'] = Yii::app()->db->createCommand($sqlCount."  AND xsituation=".$v->id)->queryScalar();
					}
					// $bumenmany[$ku][$k]['value'] = Yii::app()->db->createCommand($sqlCount."  AND xsituation=".$v->id)->queryScalar();
					$bumenmany[$ku][$k]['id'] = $v->id;
	                $bumenmany[$ku][$k]['us'] = $vu->userid;
	                $bumenmany[$ku][$k]['start'] = $_POST['pstarttime'];
	                $bumenmany[$ku][$k]['stop'] = $_POST['pstoptime'];	 
				} 
				
          }
          	$sqlCounts = "SELECT count(usiness) FROM cm_client WHERE  status=1  AND site_id=$vu->site_id  AND create_time BETWEEN $start AND $stop"; //计算总数语句
			foreach($recordList as $k=>$v){
				// $aa[$ku]['userid'] = $vu->realname;
				if($v->type==1){
					$total[$k] = Yii::app()->db->createCommand($sqlCounts."  AND situation=".$v->id)->queryScalar(); 
				}elseif($v->type==2){
					$total[$k] = Yii::app()->db->createCommand($sqlCounts."  AND xsituation=".$v->id)->queryScalar();	
				}	
			} 

          $this->render('create',array(
			'model'=>$model,'bumenmany'=>$bumenmany,'usernamemany'=>$usernamemany,'starttimes'=>$_POST['pstarttime'],'stoptimes'=>$_POST['pstoptime'],'total'=>$total,'recordList'=>$recordList,
		));
          // var_dump($aa);
       //    $res = $aa;
			    // die(CJSON::encode($res));

        }else{
      //   	$res['sta'] = '开始时间或截止时间不能为空';
			   // die(CJSON::encode($res));
        }
	}

// 	public function actionXiangqing()
// 	{
// 		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
// 		Yii::app()->clientScript->registerScriptFile('/js/jquery.form.js');
// 	    $model=new Client;
// 	    $userid = Yii::app()->controller->module->getComponent('user')->__id;
// 	    $user=Admins::model()->find('userid=:userid',array(':userid'=>$userid));
// 	    $userList=Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>$user->site_id));

//         $sit =array(7 => '尚未联系',1 => '初次联系',2 => '无需求',3 => '有需求进店',4 => '有需求待进店',5 => '已成交',6 => '选择其他家订单') ;
// 	    $bumenmany=array();
//         $usernamemany=array();
//         $total=array();
//         if(!empty($_POST['pstarttime'])&&!empty($_POST['pstoptime'])){
// 			$start =strtotime($_POST['pstarttime'].' 00:00:00');
// 			$stop =strtotime($_POST['pstoptime'].' 23:59:59');

// 			$ClientCount = Client::model()->count("status=1 AND site_id=$user->site_id  AND create_time BETWEEN $start AND $stop");
// 			// echo $ClientCount; exit;
// 	 		$pages = new CPagination($Count);
// 			$pages->pageSize = 2; //分页显示条数
// 		    $pages->pageVar = 'p1';
// 			$ClientMany = Client::model()->findAll(array('condition'=>"status=1 AND site_id=$user->site_id  AND create_time BETWEEN $start AND $stop",'limit'=>$pages->pageSize,'offset'=>$pages->currentPage*$pages->pageSize,'order'=>'create_time desc'));
// 			// var_dump($pages);exit;
// 			$this->render('updateview',array(
// 			'model'=>$model,'ClientMany'=>$ClientMany,'ClientCount'=>$ClientCount,'starttimes'=>$_POST['pstarttime'],'stoptimes'=>$_POST['pstoptime'],'total'=>$total,'pages'=>$pages,
// 		   ));
// //'limit'=>$pages->pageSize,'offset'=>$pages->currentPage*$pages->pageSize,
// 	    }

        

//         $this->render('update',array(
// 			'model'=>$model,'ClientMany'=>$ClientMany,'ClientCount'=>$ClientCount,'starttimes'=>$_POST['pstarttime'],'stoptimes'=>$_POST['pstoptime'],'total'=>$total,
// 		));
// 	}

		public function actionXiangxi()
	{
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		$model=new Client('search');
		$start= $_GET["start"];
		$stop= $_GET["stop"];
		$userid= $_GET["us"];
		$st= $_GET["st"];
        $user=Admins::model()->find('userid=:userid',array(':userid'=>$userid));
        $record=Record::model()->find('id=:id',array(':id'=>$st));
        $starttime=strtotime($start.' 00:00:00');
        $stoptime=strtotime($stop.' 23:59:59');
        // echo $user->userid;exit;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];
            $model->usiness=$userid;
            $model->xsituation=$st;
            if($record->type==1){
               $model->situation=$st;
            }else if($record->type==2){
			   $model->xsituation=$st;
            } 
            

		$this->render('xiangxi',array(
			'model'=>$model,'starttime'=>$starttime,'stoptime'=>$stoptime,'type'=>$type,'st'=>$st
		));
	}
}
