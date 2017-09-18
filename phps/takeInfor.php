<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/9/5
 * Time: 20:24
 */
define("IN_TG",true);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>招领信息_捡到东西了</title>
    <link href="css/common.css" rel="stylesheet" type="text/css"/>
    <link href="css/css1.css" rel="stylesheet" type="text/css" />
      <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
      <script src="js/jquery.min.js"></script>
      <script src="js/tool.class.js"></script>
  </head>
<body>
    <?php
        require '../include/header.inc.php';
    ?>
    <div class="Infor_query_list wid960 marAuto">
      <div class="Infor_relase wid960">
          <a href="lostPub.php" class="Infor_relase_finder">发布寻物信息</a><a href="takePub.php" class="Infor_relase_lost">发布招领信息</a>
      </div>
      <div class="Infor_list_content clear">
          <ul class="InfoUl">
              <?php
//                  require_once '../function/pagination.func.php';
              ?>

          </ul>
      </div>
        <div class="infor_divpage">

        </div>
        总页数:<span class="span"></span>
    </div>
    <script>
        var pageNum=null;

        $.ajax({
            url:'../function/pagination.func.php',
            type:'post',
            async:false,
            data:{pageCount:'pages'},
            success:function(data)
            {
                pageNum=data.match(/\d+/);
                var str= $.trim(data).substr(pageNum.length+1,data.length);
                $('.InfoUl').html(str);
            }
        });

        var count=10;
        var perPage=6;
        var pageCount=Math.ceil(pageNum/perPage);
        $('.span').html(pageCount);
        myPage(10,pageCount,$('.infor_divpage'));
        $('.pageBox a').eq(0).attr('class',"pageActive");
        //ajax传送页码
        $('.pageBox a').click(function(){

            $('.pageBox a').attr('class'," ");
            $(this).attr('class',"pageActive");
            $.ajax({
                url:'../function/pagination.func.php',
                type:'post',
                data:{page:$(this).html(),perPage:perPage},
                success:function(data){
                    $('.InfoUl').html(data);
                }

            });
        });
    </script>
    <?php
    require '../include/footer.inc.php';
    ?>
</body>
</html>