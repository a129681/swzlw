<!doctype html>
<html>
<head>
<title>物品详细</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="css/common.css" rel="stylesheet" type="text/css"/>
    <link href="css/css1.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.min.js"></script>
</head>
<body class="abus">
<?php
    require '../function/goodesc.func.php';
?>
	<div class="goodsDecBox wid960 marAuto">
		<div class="goods_titel">
			<a href="index.php">首页</a>|<a href="#">物品详细</a>
		</div>
		<div class="goodsDec_form">
            <h3>物品信息</h3>
            <ul class="clear">
                <li class="list1">
                    <div class="form_goods_name">
                        物品名称:<span><?php  echo $name;  ?></span>
                    </div>
                    <div class="form_sorts">
                        物品种类:<span></span>
                    </div>
                    <div class="form_lost_place">
                        地点:<span><?php  echo $date;  ?></span>
                    </div>
                    <div class="form_lost_data">
                        日期:<span><?php  echo $place;  ?></span>
                    </div>
                    <div class="form_lost_status">
                        物品状态:<span><?php
                            if($_GET['lost_id'])
                            {
                                $lostId=$_GET['lost_id'];
                                if($status==0){echo "未找到<a href='goodDesc.php?find_goods=$lostId' style='color:blue'>找到该物品</a>";}else{echo "已找到";}
                            }
                            else
                            {
                                $takeId=$_GET['take_id'];
                                if($status==0){echo "未领取<a href='goodDesc.php?take_goods=$takeId' style='color:blue'>领取该物品</a>";}else{echo "已领取";}
                            }

                            ?></span>
                    </div>
                </li>
                <li class="list2">
                    <div class="form_Contacts">
                        联系人:<span><?php  echo $_person['sw_Name'];  ?></span>
                    </div>
                    <div class="form_phone_number">
                        手机号:<span><?php  echo $_person['sw_phonenumber'];  ?></span>
                    </div>
                    <div class="form_qq">
                        qq:<span><?php  echo $_person['sw_qq'];  ?></span>
                    </div>
                </li>
                <li class="list3">
                    <div class="form_desc">
                        物品描述:<span><?php echo $desc?></span>
                    </div>
                </li>
            </ul>
            <div class="form_images">
                <h3>物品图片</h3>
                <ul>
                    <li style="text-align:center;"><img src="<?php echo $image;?>" alt="用户图片"></li>
                </ul>
            </div>
            <script>
                var oImg=$('.form_images img');
                var oWidth=oImg.width();
                var oHeight=oImg.height();
                if(oWidth>700)
                {
                    oImg.width(700);
                }
                if(oHeight>500)
                {
                    oImg.height(500);
                }
            </script>
		</div>
	</div>
</body>
</html>
