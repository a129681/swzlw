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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>填写招领信息</title>
    <link href="css/common.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/css1.css">
    <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.min.js"></script>
    <script src="js/tool.class.js"></script>
</head>
<body>
    <?php
    require '../include/header.inc.php';
    ?>
    <div class="wid960 marAuto">
        <div class="form_cont marAuto">
            <form method="post" action="../function/mesPub.php" enctype="multipart/form-data">
                <input type="hidden" name="take" value="take_submit">
                <div class="form_name">
                    <span>物品名称</span><input type="text" value="" name="take_name"/><dfn></dfn>
                </div>
                <div class="form_file">
                    <span>上传图片</span><span class="form_file_replace"><input type="file" name="form_file"/></span><dfn class="form_file_name"></dfn>
                </div>
                <div class="form_sorts">
                    <span>物品种类</span>
                    <select name="" id="" >
                        <option value="证件">证件</option>
                        <option value="财物">财物</option>
                        <option value="书本">书本</option>
                    </select>
                </div>
                <div class="form_take_place">
                    <span>拾到地点</span><input type="text" name="take_place"/><dfn></dfn>
                </div>
                <div class="form_take_data">
                    <span>拾到日期</span><input type="text" name="take_data"/><dfn></dfn>
                </div>
                <div class="form_desc">
                    <span>物品描述</span><textarea cols="43" rows="5" style="resize:none;" name="take_desc"></textarea><dfn></dfn>
                </div>
                <div class="form_submit">
                    <input type="submit"/>
                </div>
            </form>
        </div>
    </div>
    <script>
        var myVerify=new ShapeBase();
        var oText=$('.form_cont input[type=text]');
        myVerify.maxWord(oText,15);
        myVerify.maxWord($('.form_desc textarea'),80);
        $('.form_submit input').click(function(){
            var flag=1;
            for(var i=0;i<3;i++)
            {
                var verifyRes=myVerify.notEmpty(oText.eq(i),'输入信息');
                flag=flag&&verifyRes;
            }
            if(!flag)
            {
                return false;
            }
        });
        $('.form_file input').change(function(){
            $('.form_file_name').html('');
            var fileName=$(this).val().replace(/.+\\/,'');
            $('.form_file_name').html(fileName);
        });
    </script>
</body>
</html>
