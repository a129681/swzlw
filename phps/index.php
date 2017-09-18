<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/9/5
 * Time: 20:24
 */
define("IN_TG",true);
define("IN_TP",true);
header("content-type:text/html; charset=utf-8");
?>
<!doctype html>
<html>
<head>
	<title>郑州轻工业学院失物招领-----首页</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="css/common.css" rel="stylesheet" type="text/css"/>
	<link href="css/css1.css" rel="stylesheet" type="text/css"/>
    <link href="image/icon/ico.ico" rel="icon" type="image/x-icon"/>
    <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.min.js"></script>
    <link href="video/videoDoc/video-js.css" rel="stylesheet" style="text/css"/>
    <script src="video/videoDoc/video.js"></script>
    <script src="js/tool.class.js"></script>
</head>
<body title="1">
<?php
    require '../include/header.inc.php';
?>
<div class="home_contBox wid960 marAuto">
        <div class="home_up wid960 clear">
          	<div class="home_lfb"> 
          		  <h2>招领详情</h2>
          		  <div class="home_lfb_list">       			
                      <ul>
                          <?php
                            require '../function/t_anounce.data.php';
                          ?>
                      </ul>
              	  </div>
            </div>
          	<div class="home_bulletin" >
                <video id="example-video1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="520" height="320"
                   poster="http://video-js.zencoder.com/oceans-clip.png"
                   data-setup="{}">
                   <source src="video/失物招领.mp4" type='video/mp4' />
            </video>
            </div>
              <div class="home_lastInfor">
                   <h2>寻物详情</h2>
                    <div class="home_lfb_list">
                          <ul>
                             <?php
                                require '../function/f_anounce.data.php';
                            ?> 
                          </ul>
                    </div>
              </div>
        </div>

    <div class="home_middle wid960 marAuto">
        <div class="homeMidLeft">
            <div class="homeMid_tl">
                <div class="homeMid_tr">
                    <div class="homeMid_tbg"></div>
                </div>
            </div>
            <div class="homeMid_bgl">
                <div class="homeMid_bgr">
                    <div class="homeMid_bg">
                        <div class="home_take">
                            <div class="home_mid_title">捡到物品</div>
                            <ul>
                                <?php
                                    require '../include/indexTake.inc.php';
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homeMid_bl">
                <div class="homeMid_br">
                    <div class="homeMid_b"></div>
                </div>
            </div>
        </div>
        <div class="homeMidRight">
            <div class="homeMid_tl">
                <div class="homeMid_tr">
                    <div class="homeMid_tbg"></div>
                </div>
            </div>
            <div class="homeMid_bgl">
                <div class="homeMid_bgr">
                    <div class="homeMid_bg">
                        <div class="home_lost">
                            <div class="home_mid_title">丢失物品</div>
                            <ul>
                              <?php
                                require '../include/indexLost.inc.php';
                              ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homeMid_bl">
                <div class="homeMid_br">
                    <div class="homeMid_b"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require '../include/footer.inc.php';
?>
</body>
</html>
