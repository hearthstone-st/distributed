<?php
include 'includes/header.php';
if ($role == 'tourist') {
    echo "<script type='text/javascript'>
    
		
        if(confirm('您没有登录，是否跳转到登录页面？')){
        window.location.href = 'login.php';
        }else{
        window.location.href = 'index.php';
        }
        
		</script>";
}
if(Session::exists("loginTime")){
	$expiretime = time()-Session::get('loginTime');
	if($expiretime<=1800)
	echo "<script type='text/javascript'>
	$(document).ready(function(){
	    logIn();
	});</script>";	
}


?>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<link rel="stylesheet" type="text/css" href="application/simditor-2.3.6/styles/simditor.css" />
 
<script src="js/jquery.ba-throttle-debounce.min.js"></script>
     
<script src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="application/simditor-2.3.6/scripts/module.js"></script>
<script type="text/javascript" src="application/simditor-2.3.6/scripts/hotkeys.js"></script>
<script type="text/javascript" src="application/simditor-2.3.6/scripts/uploader.js"></script>
<script type="text/javascript" src="application/simditor-2.3.6/scripts/simditor.js"></script>
<div class="main">
	
		<div class="left info">
			<div class="login-layout">
				
			
				<div class="login-img">
					<img src=<?php echo Config::get('images/portraits').$user->data()->portraits;?>>
					<p><?php 
					echo $user->data()->name;
					?></p>
				</div>

				<form id="login">
					<fieldset>
						

						<label class="row">
							<span class="block input-icon input-icon-right">
								<input type="password" id="admin_password" name="password" class="span12" placeholder="密码" required>
								<i class="fa fa-lock icon-lock"></i>

								<span  id="admin_login" class="login-button width-35 pull-right btn-primary  btn btn-small">
								<i class="fa fa-arrow-right icon-key"></i>
								</span>
							</span>
						</label>
						
						<div class="space"></div>
						
						<div class="clearfix text-left">
							
							<input type="hidden" name="token" value="c95ab5d475c48afaee64eaeff08328a2">
							
						</div>
						

						<div class="space-4"></div>
					</fieldset>
				
				</form>
				<div class="nav-box">
					<ul>

						<li><a href="#" class="to-account"><i class="fa fa-user"></i>账号设置</a></li>
						<li><a href="#" class="to-courses"><i class="fa fa-lock"></i>课程信息</a></li>
						<li><a href="#" class="to-news"><i class="fa fa-file-o"></i>动态新闻</a></li>
						<li><a href="#"><i class="fa fa-bell-o"></i>消息</a></li>

					</ul>
				</div>
			</div>
			
		</div>
		<div class="right content row">
			<div class="">
			<div class="account row">
				
			<div id="top1"></div>
				<h1>账号管理</h1>
				
				<div class="col-md-8 col-md-offset-2">

                	<form   method="post">
<!--     <fieldset> -->
<!--     <legend>注册信息</legend> -->
                    	<h3>输入账号信息以创建账号：</h3>
		                <label>用户名：</label>
		                <input type="text" name="username" id="username" placeholder="请输入10位学号或教职工号" required>
		                <label>性别：</label>
		                <input type="radio" name="sex" id="sex" value="M" checked> 男
		            	<input type="radio" name="sex" id="sex" value="F" > 女 
		                <label>姓名：</label>
		                <input type="text" name="name" id="name" placeholder="请输入真实姓名" required>
                        <label>密码：</label>
                        <input type="password" placeholder="请输入账号密码" name="password" id="password" required>
                        <label>确认密码：</label>
                        <input type="password" placeholder="请确认账号密码" name="password_confirm" id="password_confirm" required>
		                <label>账号类型：</label>
		                <input type="radio" name="group" id="group" value="S" checked> 学生
		            	<input type="radio" name="group" id="group" value="T" > 教师  *  
		            	<br>
		            	<button  class='btn btn-default' name="submitreg"  value="createAccount" type="button" id="fromhand">创建账号</button>
<!-- 	</fieldset> -->
                	</form>

                	<br><br>

                	<form method="post"  action="createAccount_run.php" enctype="multipart/form-data" id="form">
                    	<h3>导入Excel表：</h3>
                    	<a  class='btn btn-default' href="upfile/Excel/用户账号表_模板.xlsx">导出账号表模板</a>
<!--                     	<input type="button"  class='btn btn-default' id="exportExcelModel" value="导出Excel模板"/><br> -->
                    	<input type="file" id="file_stu" name="file_stu" /><br>
     <!-- <input type="submit"  value="fromExcel" /> -->
<!--         <input name = "token" type="hidden"> -->
                                                                                           密码类型：<input type="radio" name="radio_password" id="radio_password" value="default_password" checked> 默认密码（与用户名相同）
                    			<input type="radio" name="radio_password" id="radio_password" value="user_defined"> 自定义 
                    			<input type="text" name="defined_password" id="defined_password" placeholder="请输入自定义密码"><br>
                    	<button class='btn btn-default' type="button" id="fromExcel" name="submitreg" value="fromExcel">导入账号</button>
                	</form>
                	<div id="message"></div>
				</div>
				<div class="clear-both"></div>
				
				
				<br><br><br><br>
				<div class="search-box">
					
				
						
						
						<div class="col-md-8 col-md-offset-2">
						<h3 >搜索、删除账号 </h3>
							<div>
		        				<label>请输入需要搜索的学号或姓名</label>
		        				<input type="text" id="searchContext" name="searchContext" placeholder="搜索内容"/>
		        				<button class='btn btn-default' type="submit" id="search" name="search" value="search">搜索</button>
		    				</div> 
		    				<div id="serachRes">
		        				<p>搜索结果如下:</p>
		        				<table class="table table-striped" id="table">
		        				<thead>
		        					<tr>
		            					<th>用户名</th>
		            					<th>姓名</th>
		            					<th>添加时间</th>
		            					<th>身份</th>
		            					<th>操作</th>
		        					</tr>
		        				</thead>
		        				<tbody>
		      
		       					</tbody>
		        				</table>
		    				</div> 
						</div>
					</div>
				</div><!-- 账号设置 -->

				<div id="top2"></div>
				<br><br><br><br>
				<div class="courses row">
					<h1>更新课程信息</h1>
					
					<div>
						<select class="form-control" id="course_info">
	                    	<option value="teaching_program">教学大纲</option>
	                    	<option value="teaching_environment">教学条件</option>
	                    	<option value="course_introduce">课程简介</option>
	                	</select>
	                	<textarea id="editor_course" placeholder="输入内容" autofocus required></textarea><br>
	                	<button class='btn btn-default' id="button_course">提交</button>
					</div>
				</div><!--课程信息-->
				
				<div id="top3"></div>
				<br><br><br><br>
				<div class="news row">
					<h1>发布新闻、动态</h1>
					
					<div>
						<select class="form-control"  id="type">
	                    	<option value="notice">通知</option>
	                    	<option value="news">动态</option>
	                	</select>
	                	<input type="text" id="title" placeholder="输入标题" required><br>
	                	<textarea id="editor_news" placeholder="输入内容" autofocus required></textarea><br>
	                	<button class='btn btn-default' id="button_news">提交</button>
					</div>
				</div>	
				</div>
		</div>

	
</div>

<script src="js/admin.js"></script>
<script src="js/createAccount.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/global.js"></script>
<script src="js/createNews.js"></script>
<script src="js/searchAccount.js"></script>
<script src="js/courseInfo.js"></script>
<?php if($user->isLoggedIn()){?>
	<script type="text/javascript">
		
			
		
	</script>
<?php 
}
include 'includes/footer.php';
?>