<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <style>
    *{margin:0;
      padding:0;}
    body{
      background:#CCCCCC;
    }
    #mesPub{
      width:500px; height:300px;
      position: absolute;top:50%;left:50%;
      margin-left:-250px;margin-top:-200px;
      background:#ecfaff;border:1px solid #9a9a9a;
    }
  </style>
</head>
<body>
        <?php
            define("IN_TG",true);
            require '../tools/sqlHleper.class.php';
            header("Content-type: text/html; charset=utf-8");

            date_default_timezone_set('prc');
            if($_POST['lost']=='lost_submit')
            {
              $lost_name=$_POST['lost_name'];
              $lost_date=$_POST['lost_data'];
              $lost_time=date('y-m-d h:i:s');
              $lost_place=$_POST['lost_place'];
              $lost_desc=$_POST['lost_desc'];
              $lost_pic=upload('../phps/img/lost/');
              $pub=$mysqli->getDataRow("select sw_id from sw_user where sw_username='$user_name'",'Array');
              $pub1=$pub[0];
              $sql1="INSERT INTO sw_lost (lost_name,lost_date,lost_image,lost_time,lost_place,lost_desc,sw_id) VALUES('$lost_name','$lost_date','$lost_pic','$lost_time','$lost_place','$lost_desc','$pub1')";
              $lost_result=$mysqli->query($sql1);
              if(!empty($lost_result))
              {
                $myRes='pass';
                $mysqli->closeMysql();
              }
              else
              {
                $myRes="数据插入错误";
              }
            }

        if($_POST['take']=='take_submit')
        {
            $take_name=$_POST['take_name'];
            $take_date=$_POST['take_data'];
            $take_time=date('y-m-d h:i:s');
            $take_place=$_POST['take_place'];
            $take_desc=$_POST['take_desc'];
            $take_pic=upload('../phps/img/take/');
            $pub=$mysqli->getDataRow("select sw_id from sw_user where sw_username='$user_name'",'Array');
            $pub1=$pub[0];
            $sql1="INSERT INTO sw_take (take_name,take_date,take_image,take_time,take_place,take_desc,sw_id) VALUES('$take_name','$take_date','$take_pic','$take_time','$take_place','$take_desc','$pub1')";
            $take_result=$mysqli->query($sql1);
            if(!empty($take_result))
            {
                $myRes='pass';
                $mysqli->closeMysql();
            }
            else
            {
                $myRes="数据插入错误";
            }
        }
            function upload($road){
              $file = $_FILES['form_file'];
              //得到传输的数据
    //得到文件名称
              $name = $file['name'];
              $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
              $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
    //判断文件类型是否被允许上传
              if(!in_array($type, $allow_type)){
                //如果不被允许，则直接停止程序运行
                $myRes="图片类型不允许";
                exit();
              }
    //判断是否是通过HTTP POST上传的
              if(!is_uploaded_file($file['tmp_name'])){
                //如果不是通过HTTP POST上传的
                $myRes="非法上传";
                exit();
              }
              if(move_uploaded_file($file['tmp_name'],$road.time().'.'.$type)){
                return substr($road.time().'.'.$type,8);
              }
              else
              {
                return 'image/Infor/default_pic.jpg';
              }
            }
        ?>
      <div id="mesPub">
          <h1><?php echo $myRes;?></h1>
          <div><a href="../phps/index.php">返回首页</a></div>
      </div>
</body>
</html>