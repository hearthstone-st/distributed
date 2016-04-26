<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>搜索账号</title>
<link rel="stylesheet" type="text/css" href="css/table/component.css">
<script src="js/jquery-2.0.3.min.js"></script>


</head>
<body>
<div class="main">
    <div>
        <p>请输入需要搜索的学号或姓名</p>
        <input type="text" id="searchContext" name="searchContext" placeholder="搜索内容">
        <button type="submit" id="search" name="search" value="search">搜索</button>
    </div> 
    <div id="serachRes">
        <p>搜索结果如下:</p>
        <table id="table">
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
<script src="js/jquery.ba-throttle-debounce.min.js"></script>
<script src="js/jquery.stickyheader.js"></script>
<script src="js/searchAccount.js"></script>

</body>
</html>
