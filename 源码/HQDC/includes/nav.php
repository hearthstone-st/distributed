<?php
$user = new User();
$message = new Message();
$m1 = $message->getMessage();
$privilege = new Privilege();
$role = $privilege->judge($user);

?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
            <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><i class="fa fa-leaf icon-leaf green"></i></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">分布式课程<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="course.php">课程首页</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="courseIntroduce.php">课程信息</a></li>
                <li><a href="outline.php">教学大纲</a></li>
                <li><a href="calendar.php">教学日历</a></li>
                
                <li role="separator" class="divider"></li>
                <li><a href="course.php">作业实验</a></li>
                <li><a href="courseware.php">教学课件</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="document.php">文献资料</a></li>
              </ul>
            </li>        
           
            <li><a href="forum.php">论坛</a></li>
            <li><a href="admin.php">管理</a></li>
            <li><a href="contact.php">联系我们</a></li>
          </ul>
  <!--         <form class="navbar-form navbar-left" role="search" action="#" type="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="搜索帖子">
            </div>
            
          </form> -->
                
          <ul class="nav navbar-nav navbar-right">
            
            
            <?php if($user->isLoggedIn()){
                //var_dump($m1);
              ?>
              <li class="dropdown">
              <a href="#" class="message dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell-o toggle-img"><font><?php echo count($m1)?></font></i>  
              </a>
              <ul class="dropdown-menu">
                <?php
                 foreach ($m1 as $key => $value) {
                    # code...
                  if($value['type']=="task"){
                  
                ?>

                <li><a href=<?php echo "taskdetail.php?taskmark=".$value['taskId']?>><?php echo $value["message"]?></a></li>
                
                <?php 
                }else if($value['type']=="post"){

                ?>
                <li><a href=<?php echo "post.php?postId=".$value['postId']?>><?php echo $value["message"]?></a></li>
                <?php 
                }
                }?>
              </ul>
            </li>   
            <li >  
              <!-- <a class="message" href="info.php#tab44">
                <i class="fa fa-bell-o toggle-img"><font><?php echo count($m1)?></font></i>
              </a> -->
              <a class="head-container" href="info.php#tab11">
                <img class="head-img" src=<?php echo Config::get('images/portraits').$user->data()->portraits;?>><font>您好：<?php echo $user->data()->name;?></font>
              </a> 
            </li>
            
            <li>
              <a class="log" href="logout.php">注销</a>
            </li>
            <?php

            }else{
            ?>
            <li><a class="log" href="login.php">登录系统</a></li>
            <?php
              }
            ?>
          <!--   <li class="hidden dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li> -->
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      </div>
    </div>
  
</nav>