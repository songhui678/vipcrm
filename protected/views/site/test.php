<div class="top" style="display:none;">
    <div class="top1">
        <div class="top11">
            <?php echo  Helper::siteConfig()->site_name; ?></div>
        <div class="top12">
            <div class="top121">
                <?php echo  Helper::siteConfig()->site_slogan; ?></div>
            <div class="top122"> 入驻超200!已有 <b style="color:red;"><?php echo $mcount = Member::model()->count(); ?></b> 位 <b style="color:red;">成员</b> 入驻！ </div>
            <div class="top123">
                <a href="<?php echo Yii::app()->
              createUrl('public/register'); ?> "> 加入我们&nbsp;
                <font>注册</font>
                </a>
                <a href="<?php echo Yii::app()->
              createUrl('site/down'); ?> "> 源码下载 </a>
            </div>
        </div>
    </div>
    <div class="top2">
        <?php  if(Yii::app()->user->isGuest){?>
        <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableAjaxValidation'=>false,
                    'action'=>'/public/login',
                    'htmlOptions'=>array('class'=>'login'),
                    )); ?>
        <div class="login1"> 帐 号 <?php echo $form->  
        textField($model,'username',array('class'=>'inp1','value'=>'')); ?>
        </div>
        <div class="login1"> 密 码 <?php echo $form->  
        passwordField($model,'password',array('class'=>'inp1')); ?>
            <!-- <a href="#">忘记密码？</a> -->
        </div>
        <div class="login2">
            <?php echo $form->  
        checkBox($model,'rememberMe',array()); ?>
            <span>记住我</span>
            <a href="javascript:void(0)" class="green_btn">
            <img src="<?php echo  IMAGES_PATH; ?>login.jpg" /></a>
            <a style="margin:5px 0 0 5px; background:none;" href="
        <?php
          $this->widget('ext.oauthlogin.OauthLogin',array(
            'itemView'=>'qqurl', //效果样式
          ));
        ?>
        "><img src="/images/connect_qq.png" /></a>
            <a style="margin:5px 0 0 5px; background:none;" href="
        <?php
          $this->widget('ext.oauthlogin.OauthLogin',array(
            'itemView'=>'sinaurl', //效果样式
          ));
        ?>
        "><img src="/images/connect_sina_weibo.png" /></a>
        </div>
        <?php $this->  
      endWidget(); ?>
        <?php }else{?>
        <!-- 欢迎:
      <?php echo Yii::app()->  
      user->nickname; ?>
      <br />  
      <a href="<?php echo Yii::app()->createUrl('public/logout'); ?>">退出</a> -->
        <div style="padding:7px;">
            <div style="clear:both; overflow:hidden;">
                <a style="float:left;" href="<?php echo $this->createUrl('/kongjian/info'); ?>"><img width="50" height="50" alt="<?php echo Yii::app()->user->nickname; ?>" src="<?php echo IMAGES_USER_PHOTO.Yii::app()->user->photo;?>" /></a>
                <div style="float:left; padding-left:20px; line-height:18px;">
                    <a href="<?php echo $this->createUrl('/kongjian/info'); ?>"><?php echo Yii::app()->user->nickname; ?></a>
                    <b style="color:red; font-weight:100;">恭喜您成为第<?php echo Yii::app()->user->id; ?>位
                    <?php if(Yii::app()->user->id <= 100){ ?>
                    尊贵VIP
                    <?php }else{ ?>
                    成员
                    <?php } ?>
                    </b>
                    <div>
                        <a href="<?php echo $this->createUrl('/kongjian/info'); ?>">我的信息</a>
                        <a href="<?php echo $this->createUrl('/kongjian/index',array('uid'=>Yii::app()->user->id)); ?>">我的空间</a>
                        <a href="<?php echo $this->createUrl('group/mine'); ?>">我的小组</a>
                        <a href="<?php echo $this->createUrl('group/mytopic'); ?>">我的话题</a>
                        </br>
                        <a href="<?php echo Yii::app()->createUrl('public/logout'); ?>">退出</a>
                    </div>
                </div>
            </div>
            <div style="clear:both; overflow:hidden;border-top:1px solid #cccccc; border-bottom:1px solid #cccccc;margin:7px 0 5px 0; padding:5px 0;">
                <div style="float:left; width:70px; height:50px; border-right:1px solid #cccccc; text-align:center; line-height:20px;">
                    <?php echo Yii::app()->user->groupCount; ?><br />
                    <a href="<?php echo $this->createUrl('group/mine'); ?>">创建的小组</a>
                </div>
                <div style="float:left; width:70px; height:50px; border-right:1px solid #cccccc; text-align:center; line-height:20px;">
                    <?php echo Yii::app()->user->topicCount; ?><br />
                    <a href="<?php echo $this->createUrl('group/mytopic'); ?>">发起的话题</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>