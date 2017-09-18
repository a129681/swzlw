<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/9/5
 * Time: 20:24
 */
define("IN_TP",true);
if(!defined("IN_TG")){
    exit("Access Defined");
}
require '../tools/sqlHleper.class.php';

?>
<div class="mark"></div>
<div class="topBox wid960 marAuto">
    <div class="top_logo">
        <h3>Lost & Found</h3>
    </div>
    <form class="search" action="" method="post">
        <input type="text" name="search_text" value="你想搜索的东西" autocomplete="off"/>
        <input type="submit" name="serch_btn" value="搜索"/>
    </form>
    <div class="user">
        <?php
        session_start();
        if(isset($_SESSION['time'])&&isset($_GET['time'])) {
            if ($_SESSION['time'] == $_GET['time']) {
                session_unset(userName);
            }
        }
            if(!isset($_SESSION['userName']))
                echo '<a href="#" class="user_login">登陆</a><a href="#" class="user_register">注册</a>';
            else
            {
                $myName=$_SESSION['userName'];
                $time=time();//1
                $url="index.php?time=$time";
                $_SESSION['time']=$time;
                $curID=$_SESSION['user_id'];
                $mail_sql="select m_status from sw_mail WHERE m_status='0' AND r_id='$curID'";
                $mailRes=$mysqli->query($mail_sql);
                $mailR=mysqli_num_rows($mailRes);
                $mailNum=$mailR>0?$mailR:0;
                echo "欢迎您!<a href='../phps/myPage.php' style='color:blue;'>$myName</a>信件<a href='mailList.php' style='color:blue;'>($mailNum)</a><a href=$url class='user_cancel'>注销</a>";
            }

        ?>
    </div>
</div>
<script>

    (function(){
        $('.search input[type=text]').on({
            blur:function(){
                $(this).val("输入你想搜索的内容");
            },
            focus:function(){
                $(this).val('');
            }
        });
    }())

</script>
<div class="nav_bg wid960 marAuto">
	<div class="wid960 marAuto navBox">
		<ul class="nav_list clear">
			<li><a href="index.php">首页</a></li>
			<li><a href="takeInfor.php">招领信息</a></li>
			<li><a href="takeInfor.php">寻物信息</a></li>
			<li><a href="leaveMes.php">留言</a></li>
		</ul>
	</div>
</div>

