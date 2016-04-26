<?php
include 'includes/header.php';
?>
<?php 
$task = new DBTask();
$taskAll = $task->findAll();
$dbtaskSubmit = new DBTaskSubmit();
$taskSubmit = new TaskSubmit();
$submitData = $dbtaskSubmit->findAll();
$student = new DBStudent();
$stu = $student->findAll();
//var_dump($submitData);
?>
<link rel="stylesheet" type="text/css" href="css/table/component.css">
<link rel="stylesheet" type="text/css" href="css/grade.css">  
<div id="modal" class="modal fade" role="dialog" aria-labelledby="newEventModal">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="ModalLabel">任务权重</h4>
            </div>
            <div class="modal-body">
            <div class="task-box row">
                <div class="col-md-10 col-md-offset-1">
                    <p>为各个作业分配0-10的权重</p>
                    <?php
                        if($taskAll)foreach ($taskAll as $key => $value) {
                                # code...
                                
                    ?>
                    <div class="tasks">
                        <input class="task-name" type="text" value=<?php echo $value->title;?> palceholder="服务名">
                        <input class="importance" ref=<?php echo $value->id;?> type="text" value=<?php echo $value->importance;?> placeholder="请输入0~10之间的任务权重">
                        
                    </div>  
                    <?php 
                    }?>                            
                </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              <button type="button" id="change-importance" class="btn btn-primary">确认</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<div class="main row">
    <div class="box col-md-8 col-md-offset-2 center">

    <i class="logo fa fa-bar-chart fa-animate"></i>
    <div class="task-box row">
        <div class="col-md-8 col-md-offset-2">
            <h4>本学期课程成绩</h4>
            <p>截止目前，已有<?php echo count($taskAll)?>个任务发布，以下是所有学生关于所有任务的成绩，以及根据权重计算的总成绩</p>
            <p>
            <?php if($role=='teacher'){?>
            <a href="#" class="btn btn-default new-event" data-toggle="modal" data-target="#modal"><i class="fa fa-pencil"></i> 为各个任务分配权重</span></a>
            <?php }?>
             <a class="save btn btn-primary" href="course.php"><i class="fa fa-arrow-left"></i> 返回课程</a>
             <a class=" btn btn-primary" href="#"> 导出excel表 <i class="fa fa-arrow-right"></i></a>
             </p>                      
        </div>
    </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>学号</th>
                    <th>姓名</th>
                    <?php foreach ($taskAll as $key=>$value){
                        echo "<th>{$value->title}</th>\n";
                    }?>
                    <th>成绩</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($stu as $key1=>$value1){
              
                
            ?>
                <tr>
                 
                    <?php 
                    $u1 = $user->find($value1->user_id);
                     //echo $value1->user_id;
                    if($u1){


                     echo "<td>{$u1->data()->username}</td>";
                     echo "<td>{$u1->data()->name}</td>";
                     $totalGrade = 0;
                     $totalImportance = 0;
                     foreach ($taskAll as $key=>$value){
                        $imp = $value->importance;
                        $totalImportance+=$imp;
                     }
                     if($totalImportance!=0){
                        foreach ($taskAll as $key=>$value){
                          $imp = $value->importance;
                          $taskS = $taskSubmit->findWithUserAndTask($value1->user_id, $value->id);
                          $grade = 0;
                          if($taskS){
                           
                            $grade = $taskS->score;  
                          }
                          $totalGrade+=($grade*$imp/$totalImportance);
                          echo "<td>{$grade}</td>\n";
                        }
                        //$totalGrade/=count($taskAll);
                        $totalGrade = intval($totalGrade);
                     }else{
                      foreach ($taskAll as $key=>$value){
                          $imp = $value->importance;
                          $taskS = $taskSubmit->findWithUserAndTask($value1->user_id, $value->id);
                          $grade = 0;
                          if($taskS){
                           
                            $grade = $taskS->score;  
                          }
                          $totalGrade+=$grade;
                          echo "<td>{$grade}</td>\n";
                        }
                        $totalGrade/=count($taskAll);
                        //$totalGrade = intval($totalGrade);
                        
                     }
                     
                    echo "<td>{$totalGrade}</td>";
                  }
                    ?>
                    
                </tr>
               <?php }?>
            </tbody>
        </table>
    </div>     
</div>
<script src="js/grade.js"></script>
<script src="js/jquery.ba-throttle-debounce.min.js"></script>
<script src="js/jquery.stickyheader.js"></script>


<?php
include "includes/footer.php";
?>