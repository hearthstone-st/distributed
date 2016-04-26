<?php
require_once 'core/init.php';
include 'includes/header.php';
$now = time();
if($role=='teacher') $user = new Teacher();
else $user = new User();
$data = $user->wareFindByAnd(array('materialsType'),array('like'),array('C'));

?>
<link rel="stylesheet" type="text/css" href="css/courseware.css">
<div class="main center row">
	<div class="wrapper col-md-10 col-md-offset-1">
		<div class="center-box">
			<div class="head">
				<span><i class="fa fa-list"></i> 课件列表</span>
				<?php
				if($role=='teacher')
				{
				?>
				<span class="new-task"><a class="" href="uploadware.php?type=C"><i class="fa fa-plus"></i> 上传课件</a></span>
				<?php
				}
				?>
				
						
						<select class="form-control">
							<option>2014-2015</option>
							<option>2015-2016</option>
						</select>
				<a href="#" class="pull-right"><i class="fa fa-refresh"></i> </a>
				
			</div>
				<div class="ul-box">
					
					<div>
						
						<ul>
						<?php
							if($data)foreach ($data as $d) {
								?>
							<li><a href="<?php echo $d->linkPDF; ?>"><?php echo $d->title; ?></a></li>
					    <?php
					    	}
					    	?>
					    </ul>
					</div>
				</div>
			</div>	
	</div>
	
</div>
<?php
include "includes/footer.php";
?>