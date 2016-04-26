<?php
require_once 'core/init.php';
include "includes/header.php";
$token = Token::generate();

?>
<!-- css local-->
<link rel="stylesheet" type="text/css" href="css/login.css">
	<div class="main">
	
	
	
	<div class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid hidden">
								<div class="center">
									<h1>
										<i class="fa fa-leaf icon-leaf green"></i>
										<span class="red">分布式</span>
										<span class="black">精品课程</span>
									</h1>
									<h4 class="blue">&copy; 理工大学软件工程专业</h4>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header black smaller lighter">
													<i class="fa fa-coffee icon-coffee"></i>
													登入系统
												</h4>
												<p class="intro-p">
													请输入管理员提供的用户名和密码
												</p>
												<div class="space-6"></div>

												<form method="POST" action="login_run.php">
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" name="username" class="span12" placeholder="用户名" required/>
																<i class="fa fa-user icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" name="password" class="span12" placeholder="密码" required/>
																<i class="fa fa-lock icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>
														
														<div class="clearfix">
															<label class="inline">
																<input type="checkbox" />
																<span class="lbl"> 记住密码</span>
															</label>
															<input type="hidden" name="token" value="<?php echo $token; ?>">
															<button  class="login width-35 pull-right btn-primary  btn btn-small">
																<i class="fa fa-key icon-key"></i>
																登录
															</button>
														</div>
														

														<div class="space-4"></div>
													</fieldset>
												</form>

												<div class="hidden social-or-login center">
													<span class="bigger-110">使用以下账号登录</span>
												</div>

												<div class="hidden social-login center">
													<a class="btn btn-primary">
														<i class="fa fa-facebook icon-facebook"></i>
													</a>

													<a class="btn btn-info">
														<i class="fa fa-twitter icon-twitter"></i>
													</a>

													<a class="btn btn-danger">
														<i class="fa fa-google-plus icon-google-plus"></i>
													</a>
												</div>
											</div> <!--/widget-main-->

											<!-- <div class="toolbar clearfix">
												<span>
													<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
														<i class="fa fa-arrow-left icon-arrow-left"></i>
														忘记密码？
													</a>
												</span>

												<span class="pull-right">
													<a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
														注册
														<i class="fa fa-arrow-right icon-arrow-right"></i>
													</a>
												</span>
											</div> -->
										</div><!--/widget-body-->
									</div><!--/login-box-->

									<div id="forgot-box" class="forgot-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header red lighter bigger">
													<i class="fa fa-key icon-key"></i>
													找回密码
												</h4>

												<div class="space-6"></div>
												<p>
													输入您的电子邮箱
												</p>

												<form>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email" />
																<i class="fa fa-envelope icon-envelope"></i>
															</span>
														</label>

														<div class="clearfix">
															<button onclick="return false;" class="width-35 pull-right btn btn-small btn-danger">
																<i class="fa fa-lightbulb icon-lightbulb"></i>
																Send Me!
															</button>
														</div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													Back to login
													<i class="fa fa-arrow-right icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->

									<div id="signup-box" class="signup-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="fa fa-group icon-group blue"></i>
													New User Registration
												</h4>

												<div class="space-6"></div>
												<p> Enter your details to begin: </p>

												<form>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email" />
																<i class="fa fa-envelope icon-envelope"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" placeholder="Username" />
																<i class="fa fa-user icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Password" />
																<i class="fa fa-lock icon-lock"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Repeat password" />
																<i class="fa fa-retweet icon-retweet"></i>
															</span>
														</label>

														<label>
															<input type="checkbox" />
															<span class="lbl">
																I accept the
																<a href="#">User Agreement</a>
															</span>
														</label>

														<div class="space-24"></div>

														<div class="clearfix">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="fa fa-refresh icon-refresh"></i>
																Reset
															</button>

															<button onclick="return false;" class="width-65 pull-right btn btn-small btn-success">
																Register
																<i class="fa fa-arrow-right icon-arrow-right icon-on-right"></i>
															</button>
														</div>
													</fieldset>
												</form>
											</div>

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													<i class="fa fa-arrow-left icon-arrow-left"></i>
													Back to login
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/signup-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->
		<!--inline scripts related to this page-->

		<div class="center nav-bar">
	<a href="course.php"><i class="fa fa-book "></i><br><span>课程</span></a>	
	<a href="index.php"><i class="fa fa-leaf "></i><br><span>主页</span></a>	
	<a href="forum.php"><i class="fa fa-comments "></i><br><span>论坛</span></a>	
	</div>	
	</div>	
		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>
	</div>
<?php
include "includes/footer.php";
?>