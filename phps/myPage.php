<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/9/5
 * Time: 20:24
 */
?>
<?php
    define("IN_TG",true);
    require '../function/myPage.func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>个人主页----完善个人资料</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <link href="css/common.css" rel="stylesheet" type="text/css"/>
  <link href="css/css1.css" rel="stylesheet" type="text/css"/>
  <script src="js/jquery.min.js"></script>
</head>
<body>
      <div class="person wid960 marAuto">
          <div class="person_title">
              <a href="#" class="person_active">个人信息</a><a href="#">修改信息</a>
          </div>
          <script>
              /**+
               *
               *选项卡
               */
                  $('.person_title a').click(function(){
                  $('.person_title a').attr('class','');
                  $(this).attr('class','person_active');
                  $('.person >div').not('.person_title').hide();
                  $('.person >div').not('.person_title').eq($(this).index()).show();

              })
          </script>
          <div class="person_info marAuto Info">
            <div class="Info_name">
                <span>真实姓名:</span> <?php echo $_desc['sw_Name']?>
            </div>
            <div class="Info_image">
                <span>头像:</span>
                <img src="<?php echo $_desc['sw_headface']?>" alt="headerImg"/>
            </div>
            <div class="Info_sex">
                <span>性别:</span><?php echo $_desc['sw_sex']?>
            </div>
            <div class="Info_qq">
              <span>qq:</span><?php echo $_desc['sw_qq']?>
            </div>
            <div class="Info_email">
               <span>邮箱:</span><?php echo $_desc['sw_email']?>
            </div>
            <div class="Info_time">
              <span>注册时间:</span><?php echo $_desc['sw_regtime']?>
            </div>
            <div class="person_return">
                <a href="index.php">返回首页</a>
            </div>
          </div>
          <div class="person_alter marAuto form_cont" style="display: none">
              <div class="form_name">
                  <span>真实姓名:</span><input type="text" value="<?php echo $_desc['sw_Name'];?>"/>
              </div>
              <div class="form_sex">
                  <span>性别:</span>
                    <select>
                       <option value="男">男</option>
                       <option value="女">女</option>
                    </select>
              </div>
              <div class="form_qq">
                  <span>qq:</span><input type="text" value="<?php echo $_desc['sw_qq']?>"/>
              </div>
              <div class="form_email">
                  <span>邮箱:</span><input  type="text" value="<?php echo $_desc['sw_email']?>"/>
              </div>
              <div class="person_form_func">
                  <a href="javascript:;">修改信息</a><a href="index.php">返回首页</a>
              </div>
          </div>
      </div>
      <script>
          $('.person_form_func a:eq(0)').click(function(){
              alert($('.form_qq input').val());
                  $.ajax({
                      url:'../function/myPageData.func.php',
                      type:'post',
                      data:{
                          form_name:$('.form_name input').val(),
                          form_header:$('.form_file input').val(),
                          form_sex:$(".form_sex select option:selected").text(),
                          form_qq:$('.form_qq input').val(),
                          form_email:$('.form_email input').val(),
                          type:'alter'
                         },
                  success:function(data){
                      if($.trim(data)=='pass')
                      {
                          alert("修改信息成功");
                      }
                      else
                      {alert(data);}
                  }
              })
          })

      </script>
</body>
</html>