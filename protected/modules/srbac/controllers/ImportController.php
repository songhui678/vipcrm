<?php

class ImportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='application.modules.srbac.views.layouts.admin';

	public $filePath;
	// public $users=Yii::app()->controller->module->getComponent('user');

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
  public function suologo($event){
    //原图路径
    $src = Yii::app()->basePath.'/../upload/'.$this->filePath[2].'big/'.date('Y-m-d').'/'.$event->sender['name'];
    //生成缩略图三种尺寸 50 80 100 120 230
    $image = Yii::app()->image->load($src);

    $src800 = Yii::app()->basePath.'/../upload/'.$this->filePath[2].'yulan/'.date('Y-m-d').'/'.$event->sender['name'];
    $src300 = Yii::app()->basePath.'/../upload/'.$this->filePath[2].'middle/'.date('Y-m-d').'/'.$event->sender['name'];
    $src200 = Yii::app()->basePath.'/../upload/'.$this->filePath[2].'small/'.date('Y-m-d').'/'.$event->sender['name'];

     $image->resize(600,800); //预览图尺寸
    $image->save($src800);
    $image->resize(230,307); //中图尺寸
    $image->save($src300);

    $image->resize(130,173);//小图尺寸
    $image->save($src200);
    return true;

  }

  public function init()
  {
      Yii::app()->clientScript->registerScriptFile('/js/jquery.form.js');
    
     $this->filePath=array(
      1=>'crm_file/'.date('Y-m-d').'/',//攻略pdf路径
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
		$model=new ImportFile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ImportFile']))
		{
			$model->attributes=$_POST['ImportFile'];
			$model->createtime=date('Y-m-d h:i:s',time());
			$model->status=0;//0为可以导入，1为已经导入过
            $model->site_id=Yii::app()->controller->module->getComponent('user')->site_id;//上传文件人站点id
            $model->userid=Yii::app()->controller->module->getComponent('user')->__id;//上传文件人id
			if($model->save())
				$this->redirect('/srbac/import/admin');
				// $this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['ImportFile']))
		{
			$model->attributes=$_POST['ImportFile'];
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
		$dataProvider=new CActiveDataProvider('ImportFile');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ImportFile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ImportFile']))
			$model->attributes=$_GET['ImportFile'];
		    $model->userid=Yii::app()->controller->module->getComponent('user')->__id;

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
	 * @return ImportFile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ImportFile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ImportFile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='import-file-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionSearchsame()
	{
		$id=Yii::app()->request->getParam('id');
		$model=new ClientImportSame('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientImportSame']))
			$model->attributes=$_GET['ClientImportSame'];
            $model->client_import_id=$id;
        if($model->ImportOne->userid!=Yii::app()->controller->module->getComponent('user')->__id){
					$this->redirect('/srbac/import/admin');
		} 
       
		$this->render('searchsame',array(
			'model'=>$model,
		));
	}

	public function actionMismatching()
	{
		$id=Yii::app()->request->getParam('id');
		$model=new ImportMismatching('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ImportMismatching']))
			$model->attributes=$_GET['ImportMismatching'];
		    $model->client_import_id=$id;
		if($model->ImportOne->userid!=Yii::app()->controller->module->getComponent('user')->__id){
					$this->redirect('/srbac/import/admin');
		}
		$this->render('mismatching',array(
			'model'=>$model,
		));
	}

	public function actionImport()
	{
		header("Content-type: text/html; charset=utf-8");
        header('Cache-control: private, must-revalidate');
		$id=Yii::app()->request->getParam('id');
		if(!empty($id)){
            $model=$this->loadModel($id);
			if($model->userid!=Yii::app()->controller->module->getComponent('user')->__id){
					$this->redirect('/srbac/import/admin');
			} 
            $this->render('import',array('model'=>$model,));
		}else{
			if(!empty($_POST['importid'])){
				var_dump($_POST['importid']);exit;
				$m =ImportFile::model()->find('id = :id', array(':id'=>$_POST['importid']));
				if($m->status==1){
					exit("此文件已经被导入了");
				}
				if(empty($_POST['source'])){
					exit("没有选择数据的信息来源");
				}
                if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){
                	if(empty($_POST['entry_status'])){
					exit("没有选择数据的录入来源");
				    }
                }

                // $filepath = 'D:/php_svn_test/crm/upload/crm_file/'.$m->file;
				$filepath = $_SERVER['DOCUMENT_ROOT'].'/upload/crm_file/'.$m->file;
                // echo file_exists($filepath);exit;
                // $filepath ='http://www.crm.com/upload/crm_file/'.$m->file;
               
                set_time_limit(0);
				ini_set('memory_limit','1024M');
				require_once $_SERVER['DOCUMENT_ROOT'].'/protected/extensions/PHPExcel/PHPExcel.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/protected/extensions/PHPExcel/PHPExcel/IOFactory.php';
				if (!file_exists($filepath)) {
					exit("没有找到此文件");
				}

				$reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
				$PHPExcel = $reader->load($filepath); // 载入excel文件
				$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
				$highestRow = $sheet->getHighestRow(); // 取得总行数
				// $highestColumm = $sheet->getHighestColumn(); // 取得总列数
				// $highestColumm= PHPExcel_Cell::columnIndexFromString($highestColumm); //字母列转换为数字列 如:AA变为27
				// echo '行数：'.$highestRow.'<br/>';exit;
				// echo '列数：'.$highestColumm.'<br/>';
			    for ($row = 2; $row <= $highestRow; $row++){
			    	$h1=  $sheet->getCellByColumnAndRow(0, $row)->getValue();//新娘
			    	$h2=  $sheet->getCellByColumnAndRow(1, $row)->getValue();//新娘手机号
			    	$h3=  $sheet->getCellByColumnAndRow(2, $row)->getValue();//新郎
			    	$h4=  $sheet->getCellByColumnAndRow(3, $row)->getValue();//新郎手机号
			    	$h5=  $sheet->getCellByColumnAndRow(4, $row)->getValue();//备注
                    if(!empty($h1)&&!empty($h2)){
                    	$cmc=Client::model()->find('bride_phone = :bride_phone', array(':bride_phone'=>$h2));
                    	if(empty($cmc)){
                              if(!empty($h4)){
                              	$cmb=Client::model()->find('phone = :phone', array(':phone'=>$h4));
                              	if(!empty($cmb)){
                              		$ClientImportSame=new ClientImportSame;
		                            $ClientImportSame->client_id=$cmc->id;
		                            $ClientImportSame->client_import_id=$m->id;
		                            $ClientImportSame->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
		                            $ClientImportSame->save(false);
                              	}else{
                              		$cm = new Client;
							    	$cm->bride=$h1;
							    	$cm->bride_phone=$h2;
							    	$cm->name=$h3;
							    	$cm->phone=$h4;
							    	$cm->remarks=$h5;
							    	$cm->source=$_POST['source'];
							    	$cm->province=Yii::app()->controller->module->getComponent('user')->area;//地区/省份id
							    	$cm->type =1;//客户类型 个人
									$cm->status =1;//有效
									$cm->create_time = time(); //创建时间
									$cm->update_time = time(); //修改时间
									$cm->usiness = Yii::app()->controller->module->getComponent('user')->__id;//业务人员id
									$cm->contact=Yii::app()->controller->module->getComponent('user')->realname;
									$type =Yii::app()->controller->module->getComponent('user')->type;
									if($type==1){
										$cm->entry_status = 1;
										$cm->dangqian = 1;
									}else if($type==2){
										$cm->entry_status = 2;
										$cm->dangqian = 2;
									}else{
										$cm->entry_status = $_POST['entry_status'];
										$cm->dangqian=$cm->entry_status;
									}
									// $cm->situation = 7;////联系情况 1初次联系,2 无需求,3 有需求进店,4有需求待进店,	5 已成交，6 选择其他家订单,7 尚未联系
									$cm->site_id =Yii::app()->controller->module->getComponent('user')->site_id;//录入人员站点id

									$cm->entry = Yii::app()->controller->module->getComponent('user')->__id;//录入人员id
									$cm->contact =Yii::app()->controller->module->getComponent('user')->realname;//录入人员
						            $cm->dep_id =Yii::app()->controller->module->getComponent('user')->dep_id;//录入人员部门id
							    	if($cm->save() == false){
							    		$ImportMismatching = new ImportMismatching;
				                    	$ImportMismatching->bride=$h1;
				                    	$ImportMismatching->bride_phone=$h2;
				                    	$ImportMismatching->name=$h3;
				                    	$ImportMismatching->phone=$h4;
				                    	$ImportMismatching->remark=$h5;
				                    	$ImportMismatching->createtime=date('Y-m-d h:m:s',time());
				                    	$ImportMismatching->client_import_id=$m->id;
				                    	$ImportMismatching->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
				                    	$ImportMismatching->save(false);
							    	}
                              	}

                              }else{

                              	$cm = new Client;
						    	$cm->bride=$h1;
						    	$cm->bride_phone=$h2;
						    	$cm->name=$h3;
						    	$cm->phone=$h4;
						    	$cm->remarks=$h5;
						    	$cm->source=$_POST['source'];
						    	$cm->province=Yii::app()->controller->module->getComponent('user')->area;//地区/省份id
						    	$cm->type =1;//客户类型 个人
								$cm->status =1;//有效
								$cm->create_time = time(); //创建时间
								$cm->update_time = time(); //修改时间
								$cm->usiness = Yii::app()->controller->module->getComponent('user')->__id;//业务人员id
								$cm->contact=Yii::app()->controller->module->getComponent('user')->realname;//业务人员id
								$type =Yii::app()->controller->module->getComponent('user')->type;
								if($type==1){
									$cm->entry_status = 1;
									$cm->dangqian = 1;
								}else if($type==2){
									$cm->entry_status = 2;
									$cm->dangqian = 2;
								}else{
									$cm->entry_status = $_POST['entry_status'];
									$cm->dangqian=$cm->entry_status;
								}
								// $cm->situation = 7;////联系情况 1初次联系,2 无需求,3 有需求进店,4有需求待进店,	5 已成交，6 选择其他家订单,7 尚未联系
								$cm->site_id =Yii::app()->controller->module->getComponent('user')->site_id;//录入人员站点id
								var_dump('-------');exit;
								$cm->entry = Yii::app()->controller->module->getComponent('user')->__id;//录入人员id
								$cm->contact =Yii::app()->controller->module->getComponent('user')->realname;//录入人员
					            $cm->dep_id =Yii::app()->controller->module->getComponent('user')->dep_id;//录入人员部门id
						    	// echo $row.'_'.$h1.'<br/>';
						    	if($cm->save() == false){
							    		$ImportMismatching = new ImportMismatching;
				                    	$ImportMismatching->bride=$h1;
				                    	$ImportMismatching->bride_phone=$h2;
				                    	$ImportMismatching->name=$h3;
				                    	$ImportMismatching->phone=$h4;
				                    	$ImportMismatching->remark=$h5;
				                    	$ImportMismatching->createtime=date('Y-m-d h:m:s',time());
				                    	$ImportMismatching->client_import_id=$m->id;
				                    	$ImportMismatching->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
				                    	$ImportMismatching->save(false);
							    }

                              }

                    	}else{
                    		  $ClientImportSame=new ClientImportSame;
                              $ClientImportSame->client_id=$cmc->id;
                              $ClientImportSame->client_import_id=$m->id;
                              $ClientImportSame->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
                              $ClientImportSame->save(false);
                    	}

                    }else if(!empty($h3)&&!empty($h4)){

                    	$bmc=Client::model()->find('phone = :phone', array(':phone'=>$h4));
                    	if(empty($bmc)){
                              if(!empty($h2)){
                              	$bmb=Client::model()->find('bride_phone = :bride_phone', array(':bride_phone'=>$h2));
                              	if(!empty($bmb)){
                              		$ClientImportSame=new ClientImportSame;
		                            $ClientImportSame->client_id=$bmb->id;
		                            $ClientImportSame->client_import_id=$m->id;
		                            $ClientImportSame->save(false);
                              	}else{
                              		$cm = new Client;
							    	$cm->bride=$h1;
							    	$cm->bride_phone=$h2;
							    	$cm->name=$h3;
							    	$cm->phone=$h4;
							    	$cm->remarks=$h5;
							    	$cm->source=$_POST['source'];
							    	$cm->province=Yii::app()->controller->module->getComponent('user')->area;//地区/省份id
							    	$cm->type =1;//客户类型 个人
									$cm->status =1;//有效
									$cm->create_time = time(); //创建时间
									$cm->update_time = time(); //修改时间
									$cm->usiness = Yii::app()->controller->module->getComponent('user')->__id;//业务人员id
									$cm->contact=Yii::app()->controller->module->getComponent('user')->realname;//业务人员id
									$type =Yii::app()->controller->module->getComponent('user')->type;
									if($type==1){
										$cm->entry_status = 1;
									}else if($type==2){
										$cm->entry_status = 2;
									}else{
										$cm->entry_status = $_POST['entry_status'];
									}
									$cm->dangqian=$cm->entry_status;
									// $cm->situation = 7;////联系情况 1初次联系,2 无需求,3 有需求进店,4有需求待进店,	5 已成交，6 选择其他家订单,7 导入 8 尚未联系
									$cm->site_id =Yii::app()->controller->module->getComponent('user')->site_id;//录入人员站点id

									$cm->entry = Yii::app()->controller->module->getComponent('user')->__id;//录入人员id
									$cm->contact =Yii::app()->controller->module->getComponent('user')->realname;//录入人员
						            $cm->dep_id =Yii::app()->controller->module->getComponent('user')->dep_id;//录入人员部门id
							    	// echo $row.'_'.$h1.'<br/>';
							    	if($cm->save() == false){
							    		$ImportMismatching = new ImportMismatching;
				                    	$ImportMismatching->bride=$h1;
				                    	$ImportMismatching->bride_phone=$h2;
				                    	$ImportMismatching->name=$h3;
				                    	$ImportMismatching->phone=$h4;
				                    	$ImportMismatching->remark=$h5;
				                    	$ImportMismatching->createtime=date('Y-m-d h:m:s',time());
				                    	$ImportMismatching->client_import_id=$m->id;
				                    	$ImportMismatching->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
				                    	$ImportMismatching->save(false);
							    	}
                              	}

                              }else{

                              	$cm = new Client;
						    	$cm->bride=$h1;
						    	$cm->bride_phone=$h2;
						    	$cm->name=$h3;
						    	$cm->phone=$h4;
						    	$cm->remarks=$h5;
						    	$cm->source=$_POST['source'];
						    	$cm->province=Yii::app()->controller->module->getComponent('user')->area;//地区/省份id
						    	$cm->type =1;//客户类型 个人
								$cm->status =1;//有效
								$cm->create_time = time(); //创建时间
								$cm->update_time = time(); //修改时间
								$cm->usiness = Yii::app()->controller->module->getComponent('user')->__id;//业务人员id
								$cm->contact=Yii::app()->controller->module->getComponent('user')->realname;//业务人员id
								$type =Yii::app()->controller->module->getComponent('user')->type;
								if($type==1){
									$cm->entry_status = 1;
								}else if($type==2){
									$cm->entry_status = 2;
								}else{
									$cm->entry_status = $_POST['entry_status'];
								}
								$cm->dangqian=$cm->entry_status;
								// $cm->situation = 7;////联系情况 1初次联系,2 无需求,3 有需求进店,4有需求待进店,	5 已成交，6 选择其他家订单,7 导入 8 尚未联系
								$cm->site_id =Yii::app()->controller->module->getComponent('user')->site_id;//录入人员站点id

								$cm->entry = Yii::app()->controller->module->getComponent('user')->__id;//录入人员id
								$cm->contact =Yii::app()->controller->module->getComponent('user')->realname;//录入人员
					            $cm->dep_id =Yii::app()->controller->module->getComponent('user')->dep_id;//录入人员部门id
						    	// echo $row.'_'.$h1.'<br/>';
						    	if($cm->save() == false){
							    		$ImportMismatching = new ImportMismatching;
				                    	$ImportMismatching->bride=$h1;
				                    	$ImportMismatching->bride_phone=$h2;
				                    	$ImportMismatching->name=$h3;
				                    	$ImportMismatching->phone=$h4;
				                    	$ImportMismatching->remark=$h5;
				                    	$ImportMismatching->createtime=date('Y-m-d h:m:s',time());
				                    	$ImportMismatching->client_import_id=$m->id;
				                    	$ImportMismatching->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
				                    	$ImportMismatching->save(false);
							    }

                              }

                    	}else{
                    		  $ClientImportSame=new ClientImportSame;
                              $ClientImportSame->client_id=$cmc->id;
                              $ClientImportSame->client_import_id=$m->id;
                              $ClientImportSame->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
                              $ClientImportSame->save(false);
                    	}


                    }else{
                    	$ImportMismatching = new ImportMismatching;
                    	$ImportMismatching->bride=$h1;
                    	$ImportMismatching->bride_phone=$h2;
                    	$ImportMismatching->name=$h3;
                    	$ImportMismatching->phone=$h4;
                    	$ImportMismatching->remark=$h5;
                    	$ImportMismatching->createtime=date('Y-m-d h:m:s',time());
                    	$ImportMismatching->client_import_id=$m->id;
                    	$ImportMismatching->site_id=Yii::app()->controller->module->getComponent('user')->site_id;
                    	$ImportMismatching->save(false);
                    }
			    }

			    $m->status=1;//已经导入
			    $m->save(false);
			    $this->redirect(array('/srbac/import/admin'));
			}else{
              echo '不能导入';
			}
		}
	}

	public function actionCheckMoible($mobile)
	{
		$site_id=Yii::app()->controller->module->getComponent('user')->site_id;
		// $c = Client::

	}

	public function actionDaoccvs()
	{
		$result =Client::model()->findAll("");
		$str = "新人,新人手机号,爱人,爱人手机号,联系情况,是否有效,婚期,信息来源,创建时间,备注\n";
		$str = iconv('utf-8','gb2312',$str);
		foreach($result as $k=>$v){
            $bride = iconv('utf-8','gb2312',self::changcontent($v->bride)); //新娘中文转码
            $bride_phone = iconv('utf-8','gb2312',self::changcontent($v->bride_phone)); //新娘手机号中文转码

		    $name = iconv('utf-8','gb2312',self::changcontent($v->name)); //新郎中文转码
		    $phone = iconv('utf-8','gb2312',self::changcontent($v->phone)); //新郎手机号中文转码
		    $situation = iconv('utf-8','gb2312',$v->situationName);//联系状况
		    $status = iconv('utf-8','gb2312',$v->statusName);//是否有效
		    $marry_date = iconv('utf-8','gb2312',$v->marry_date);//婚期
		    $source = iconv('utf-8','gb2312',$v->SourceOne->name);//来源
		    $remarks = iconv('utf-8','gb2312',self::changcontent($v->remarks));//备注
		    $str .= $bride.",".$bride_phone.",".$name.",".$phone.",".$situation.",".$status.",".$marry_date.",".$source.",".date('Y-m-d h:m:s',$v->create_time).",".$remarks."\n"; //用引文逗号分开
		}

		$filename = date('Ymd').'.csv'; //设置文件名
		self::actionExport_csv($filename,$str);
	}

	public function actionExport_csv($filename,$data)
	{
	    header("Content-type:text/csv");
	    header("Content-Disposition:attachment;filename=".$filename);
	    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
	    header('Expires:0'); header('Pragma:public');
	    echo $data;
	}

	public function changcontent($str)
	{
		$str = preg_replace("/(，){1,}/", "。", $str);
		$str = preg_replace("/(,){1,}/", "。", $str);
	     return $str;
	}  
}
