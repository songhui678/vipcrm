<?php

  set_time_limit(0);
  ini_set('memory_limit','2048M'); 
  date_default_timezone_set('Asia/Shanghai');

  class XnjCommand extends CConsoleCommand {

    public function actionLevel(){
      $u = Author::model()->findAll(array('limit'=>50000));
      foreach ($u as $key => $value) {
        if($value->BlogOne){
          if($value->BlogOne->grade==0){
            if($value->BlogOne->isVip == 1 || $value->BlogOne->isVip == 2){
              $value->level = 1;
              $value->save(false);
              echo 'success:'.$value->userid."\n";
              // if($fen >= 500){
              //   echo $value->id,' ',$value->username,' ',$fen,' ',$value->creattime,'<br/>';
              // }
            }
          }
        }
      }
    }

    /**
    * 清理系统缓存
    */
    public function actionClean(){
      // Yii::app()->cache -> flush();
      // Yii::app()->dbcache -> flush();
      // Yii::app()->fcache -> flush();
    }

    //自动更新
    public function actionZidonggengxin()
    {
      $fenleiMany   = SupplyCashColumn::model()->fenlei()->findAll('');

        for($i =0;$i<count($fenleiMany);$i++) { 
          list($s1, $s2) = explode(' ', microtime());   
        $createtimestr = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
          if($fenleiMany[$i]->column_id==1 or $fenleiMany[$i]->column_id==3){
          $VipMany  = ShopPhoto::model()->findAll('validate=0 and profession_mark=:profession_mark and shop_mark=:shop_mark order by createtime ASC', array(':profession_mark'=>$fenleiMany[$i]->column_id,':shop_mark'=>Yii::app()->params['userGrade']['vip']));
          $GoldMany = ShopPhoto::model()->findAll('validate=0 and profession_mark=:profession_mark and shop_mark=:shop_mark order by createtime ASC', array(':profession_mark'=>$fenleiMany[$i]->column_id,':shop_mark'=>Yii::app()->params['userGrade']['gold']));
          $SilverMany = ShopPhoto::model()->findAll('validate=0 and profession_mark=:profession_mark and shop_mark=:shop_mark order by createtime ASC', array(':profession_mark'=>$fenleiMany[$i]->column_id,':shop_mark'=>Yii::app()->params['userGrade']['silver']));
           if(!empty($VipMany)){
                 $model = ShopPhoto::model()->find("shop_photo_id = :shop_photo_id", array(":shop_photo_id"=>$VipMany[0]->shop_photo_id));
             $model->createtime = $createtimestr;
             $model->save(false);
           }
           if(!empty($GoldMany)){
                 $model = ShopPhoto::model()->find("shop_photo_id = :shop_photo_id", array(":shop_photo_id"=>$GoldMany[0]->shop_photo_id));
             $model->createtime = $createtimestr;
             $model->save(false);
           }
           if(!empty($SilverMany)){
                 $model = ShopPhoto::model()->find("shop_photo_id = :shop_photo_id", array(":shop_photo_id"=>$SilverMany[0]->shop_photo_id));
             $model->createtime = $createtimestr;
             $model->save(false);
           }
        }else{
            $VipMany  = ShopPhoto::model()->findAll('validate=0 and profession_mark=:profession_mark and shop_mark=:shop_mark order by createtime ASC', array(':profession_mark'=>$fenleiMany[$i]->column_id,':shop_mark'=>Yii::app()->params['userGrade']['vip']));

           if(!empty($VipMany)){
                 $model = ShopPhoto::model()->find("shop_photo_id = :shop_photo_id", array(":shop_photo_id"=>$VipMany[0]->shop_photo_id));
             $model->createtime = $createtimestr;
             $model->save(false);
           }
        }
      }
    }

    //一键处理商家三天未审核预约
    public function actionYjclsjsh()
    {
      $unexamineproductmembermany = ProductMember::model()->findAll('replystate=1 and validate=0');
      $currenttime = date('Y-m-d H:i:s',time());
      $k = 0;
      foreach($unexamineproductmembermany as $key=>$value){
        $days=$this->getDaysValue($value->createTime,$currenttime) ;
        if($days>3){
          $value->score =6;
          $value->replystate =2;
          $value->save(false);
          $k+=1;
        }
      }
    }
    //计算相册图片数
  public function actionUpdatealbumphotocount() {
      
      $sql ='update dc_album as a set a.photocount=(SELECT count(*)FROM dc_photo as b WHERE (b.albumid=a.id and b.validate=0 )) where a.validate=0';
      Yii::app()->db->createCommand($sql)->queryScalar();
  }
    //计算商家合作天数
  public function getDaysValue($strattime,$stoptime) {
      
      $startdate=strtotime(date('Y-m-d',strtotime($strattime)));
    $enddate=strtotime(date('Y-m-d',strtotime($stoptime))); 
    $days= round(($enddate-$startdate)/3600/24) ;
      return $days;
  }


  //处理晒单图片
  public function actionChulitu(){
    
    set_time_limit(0);

    $r = $this->getfiles('/data/www/test/site/xinniang/upload/shaidan_photo/2013-03-30');
    
    foreach ($r as $key => $value) {
      $p = pathinfo($value);
      $basename = $p['basename'];

      $image = Yii::app()->image->load($value);
      $src100 = '/data/www/test/site/xinniang/upload/shaidan_photo/2013-03-30/test/'.$basename;
      $image->smart_resize(100,100);
      $image->save($src100);

      echo $basename."\n";
    }
  }

  /**
   * 递归显示当前指定目录下所有文件
   * 使用dir函数
   * @param string $dir 目录地址
   * @return array $files 文件列表
   */
  public function getfiles($dir) {
      $files = array();
   
      if (!is_dir($dir)) {
          return $files;
      }
   
      $d = dir($dir);
      while (false !== ($file = $d->read())) {
          if ($file != '.' && $file != '..') {
              $filename = $dir . "/"  . $file;
   
              if(is_file($filename)) {
                  $files[] = $filename;
              }else {
                  $files = array_merge($files, $this->getfiles($filename));
              }
          }
      }
      $d->close();
      return $files;
  }
  //删除首页签发论坛帖子
  public function actionDelcmstiezikey(){
    $cmsCacheQian  = 'cmsCache_1_';
    Yii::app()->cache->delete($cmsCacheQian.'tiezi');
  }

  public function actionBind() {

    set_time_limit(0);
    ini_set('memory_limit', '512M');
    //$model=Author::model()->count();
    $s = 0;
    while ($s <= 60000) {
      $list = Author::model()->findAll(array('select'=>'id','limit'=>"$s,10000"));
      $s += 10000;
      foreach ($list as $key => $value) {
        echo $value->id;
        echo "\n";
      }
      sleep(5);
    }

  }

}

?>