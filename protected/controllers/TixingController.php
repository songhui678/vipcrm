<?php
set_time_limit (0);
//需要提醒的时间

//remind_time 		提醒时间（当天）
//photo_date  		拍摄时间
//choose_date 		选片时间
//design_date 		看设计时间
//taketablets_date 	取片日期（摄影，婚庆，礼服，钻石）
//looksite_date 	看场地时间
//style_date 		看风格时间
//scheme_date 		方案时间
//makeup_date 		试装时间
//compere_date 		司仪时间
//rehearsal_date 	彩排时间
class TixingController extends Controller
{

	public $times;//当前时间
	public function init(){
		$this->times=strtotime(date('Y-m-d',time()));
	}
	public function actionIndex()
	{
		// echo $timess=date('Y-m-d').'<br />';
		// echo $timess=strtotime(date('Y-m-d'));
		$limit=1000;
		for ($i=0; $i <100; $i++) { 
			
			$criteria = new CDbCriteria;     
			$criteria->addCondition("remind_status=0");       
	      	$criteria->limit=$limit;
			$criteria->offset=$i*$limit;
	   
	        $artList = Client::model()->findAll($criteria); 

	        if(!empty($artList)){

	        	foreach ($artList as $key => $value) {
	        	
	        		$remind_time=$this->chuli($value->remind_time,1);//提醒时间（当天）

	        		if($remind_time){
	        			$value->remind_status=1;
	        		}
	        		$value->save(false);
	        	}
	        }else{
	        	break; 
	        }
		}		
		$this->render('index');
	}
	/*
	$time  提醒时间
	$type  提醒类型 1 当天  2提前一天
	return 布尔值  
	 */
	private function chuli($time,$type=2){

		if(!empty($time)){
			if($type==1){
				// echo $time=strtotime(date('Y-m-d',$time)).'|'.date('Y-m-d',$time).'<br>';
				// echo $this->times.'|'.date('Y-m-d',$this->times).'<br><br>';
			
				$time=strtotime(date('Y-m-d',$time));
				if($time==$this->times){
					$status=1;
				}else{
					$status=0;
				}

				
			}elseif ($type==2) {
				$time=strtotime(date('Y-m-d',$time-86400));
				if($time==$this->times){
					$status=1;
				}else{
					$status=0;
				}
			}

			return $status;
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}