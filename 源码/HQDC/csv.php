<?php
include "includes/header.php";


?>

<div class="main">
	<?php
		$temp=file("user.csv");//连接EXCEL文件,格式为了.csv 
		for ($i=0;$i <count($temp);$i++) 
		{ 
			$string=explode(",",$temp[$i]);//通过循环得到EXCEL文件中每行记录的值 
			//将EXCEL文件中每行记录的值插入到数据库中 
			var_dump($string);
			echo '<br/><br/>';

		}
	?>

</div>

<?php
include "includes/footer.php";
?>