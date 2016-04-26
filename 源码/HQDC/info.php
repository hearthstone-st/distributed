<?php
include 'includes/header.php';
$data = $user->data();
$token = Token::generate();
if ($role == 'tourist') {
    echo "<script type='text/javascript'>
    
		
        if(confirm('您没有登录，是否跳转到登录页面？')){
        window.location.href = 'login.php';
        }else{
        window.location.href = 'index.php';
        }
        
		</script>";
}
?>
<link rel="stylesheet" type="text/css" href="css/info.css">
<div id="main" class="main">
		<div class="setting">
			<i class="fa fa-gear fa-animate"></i>
			<p>用户信息与设置</p>
		</div>
		<div class="head-choices" style="left: 100%;">
			<i class="head-close fa fa-times"></i>
			<i class="to-left fa fa-angle-double-left"></i>

			<div class="scroll-img" style="margin-left: 0px;">
			<img src="images/portraits/hp_defalut_stu_female.png" style="margin-left: -70px;">
    		<img src="images/portraits/hp_defalut_tea_female.png" style="margin-left: -70px;">
    		<img src="images/portraits/hp_defalut_stu_male.png" style="margin-left: -70px;">
    		<img src="images/portraits/hp_defalut_tea_male.png" style="margin-left: -70px;">
    		<img src="images/portraits/hp1.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp2.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp3.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp4.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp5.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp6.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp7.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp8.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp9.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp10.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp11.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp12.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp13.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp14.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp15.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp16.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp17.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp18.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp19.jpg" style="margin-left: -70px;">
    		<img src="images/portraits/hp20.jpg" style="margin-left: -70px;">

    		<i class="to-right fa fa-angle-double-right"></i></div>
    	</div>
		<div class="infobox">

			<nav class="navbar nav-pills" data-tools="tabs" data-active="#tab11">
				<ul>
					<li class="active"><a href="#tab11" rel="#tab11">用户信息</a></li>
					<li class=""><a href="#tab22" rel="#tab22">更改密码</a></li>
					<li class=""><a href="#tab33" rel="#tab33">用户权限</a></li>
					<li class=""><a href="#tab44" rel="#tab44">用户消息</a></li>
				</ul>
			</nav>
			 
			<div id="tab11" class="centerbox" style="display: block;">
				<div class="head-big">
					<img class="head-chooce" id="head" src=<?php echo Config::get('images/portraits').$data->portraits;?>>
					<p><?php echo $data->name;?></p>
					
					<a class="head-chooce" href="#">更换头像</a>

				</div>
				<form method="post" action="userUpdate.php" class="forms info_change">

					<input type="hidden" id="portrait" name="portrait" value=<?php echo $data->portraits;?>>
					<label>
				        <p>姓名 </p>
				        <input type="text" name="name" value=<?php echo $data->name?> class="width-100">
				    </label>
				    <label>
				        <p>电子邮箱</p>
				        <input type="email" name="user-email" value="12345@gmail.com" class="width-100">
				    </label>
				    <label>
				        <p>联系电话 </p>
				        <input type="text" name="user-name" value="86-12345678" class="width-100">
				    </label>
				    <label for="text">
				        <p>个人简介</p>
				        <textarea rows="4" class="width-100">我的简介</textarea>
				    </label>
				    <input type="hidden" name="token" value=<?php echo $token?>>

				    <p>
				        <button class="btn btn-small btn-danger">保存修改</button>
				        
				    </p>
				</form>
			</div>
			<div id="tab22" class="centerbox" style="display: none;">
				<form style="margin-top:30px" method="post" action="changePassword.php" class="forms">
					    
					    <label>
					        <input type="password" name="password_current" placeholder="原密码" class="width-100">
					    </label>
					    <label>
					        <input type="password" name="password_new" placeholder="新密码" class="width-100">
					    </label>
					    <label>
					        <input type="password" name="password_agan" placeholder="确认新密码" class="width-100">
                            
					    </label>					    
					    <p>
					        <button class="btn btn-primary">提交</button>
					    </p>
					    <input type="hidden" name="token" value=<?php echo $token?>>
					</form>		
			</div>
			<div id="tab33" class="centerbox" style="display: none;">
				<div class="privelege">
					<p>您的身份为<?php if($role=='teacher'){
					echo '教师';
				}else if($role=='student'){
					echo "学生";
				}else if($role=='admin'){
					echo "管理员";
				}

				?>，拥有的权限有：</p>	
				</div>
				<a href="login.php" class="pri-box"><i class="fa fa-lock"></i><br><span>登录网站</span></a>
				<a href="forum.php"  class="pri-box"><i class="fa fa-comments"></i><br><span>发帖回帖</span></a>
				<a href="course.php"  class="pri-box"><i class="fa fa-mortar-board"></i><br><span>查看课程</span></a>
				<a href="calendar.php"  class="pri-box"><i class="fa fa-calendar"></i><br><span>查看日历</span></a>
				<a href="grade.php"  href="login.php"  class="pri-box"><i class="fa fa-bar-chart "></i><br><span>查看成绩</span></a>
				<?php
					if($role=="teacher"){
						?>
						<a href="newTask.php"  class="pri-box"><i class="fa fa-upload"></i><br><span>发布作业</span></a>
						<a href="course.php"  class="pri-box"><i class="fa fa-edit"></i><br><span>作业评分</span></a>

						<?php
					}else if($role=="student"){
						?>
						<a href="course.php"  class="pri-box"><i class="fa fa-upload"></i><br><span>提交作业</span></a>
						

						<?php
					}else if($role=="admin"){
						?>
						<a href="admin.php"  class="pri-box"><i class="fa fa-upload"></i><br><span>发布通知，公告</span></a>
						<a href="admin.php"  class="pri-box"><i class="fa fa-user"></i><br><span>用户管理</span></a>

						<?php
					}
				?>
			</div>
			<div id="tab44" class="centerbox" style="display: none;">
                <div class="message ul-box">
                <ul class=" ">
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
                    <!-- <ul>
                        <li class="row">
                            <div class="col-md-2 head-img-box">
                            <img src="images/portraits/hp1.jpg">
                            </div>
                            <div class="col-md-10 message-detail">
                            	<h5 class="pull-left">janny</h5>
                                <div class="clear-both"></div>
                            	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                             </p>
                             	<span class="pull-left">1 day ago</span>
                             	<span class="pull-right">
                             		<i title="回复" class="fa fa-reply"></i><i title="删除" class="fa fa-trash-o"></i>
                             		
                             	</span>
                         	</div>
                         </li>
                        <!--  <img src="svg/spinner.svg"> 
                         <li class="reply-li row">
                            <div class="col-md-2 ">
                            <img src="images/portraits/hp13.jpg">
                            </div>
                            <form type="post" class="col-md-10">
								<input name="reply" type="text" class="input-reply width-100" placeholder="添加回复">
								<input style="display:none">
							</form>
                         	
                        </li> 
                        
                 
                       
                        
                                          
                    </ul> -->
                </div>
            
            </div>	
		</div>
	</div>
<script src="js/info.js"></script>
<?php
include "includes/footer.php";
?>