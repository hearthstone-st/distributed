<?php
require_once 'core/init.php';
include "includes/header.php";
$token = Token::generate();
$teacher = new Teacher();
if($teacher->data()->id) $data = $teacher->_taskOperation->taskFindAll($teacher->data()->id);
?>
<script type="text/javascript">
$(document).ready(function(){
  $(".delete").click(function(){
   var mark;
   mark=$(this).val();
   $.post("deltask.php",
     {
       'taskid':mark,
       'token':$("[name$='token']").val()
     },
     function(data,status){
         if(status=='success'){
            alert(data);
            window.location.reload();
         }
         else 
            {
            alert('删除失败！');
            }
     });
  });
});
</script>
<div class="main row">
      <div class="col-md-8 col-md-offset-2">
      <?php 
      for ($i=0; $i < count($data); $i++) {
      ?> 
            <div class="col-ld-6 col-md-offset-1">题目：
                  <a href="<?php echo 'setTask.php?taskmark='.$data[$i]->id; ?>">
                  <?php 
                  echo $data[$i]->title; 
                  ?>
                  </a>
            </div>
            <div class="col-ld-6 col-md-offset-1">
                  时间：
                  <?php 
                  echo date("Y-n-d H:i",$data[$i]->start_time);
                  echo "-";
                  echo date("Y/F/dS",$data[$i]->end_time);
                  ?>
            </div>
            <button class="col-ld-6 col-md-offset-6 delete" value="<?php echo $data[$i]->id; ?>">
                  删除
            </button>
      <?php
      }
      ?>
      <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
      </div>
</div>
<?php
include "includes/footer.php";
?>