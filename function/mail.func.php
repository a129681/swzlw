<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/11/3
 * Time: 15:40
 */?>

<?php
    define("IN_TG",true);
    require '../tools/sqlHleper.class.php';
    date_default_timezone_set('prc');
    session_start();
    $curID=$_SESSION['user_id'];
    $sqlRes=$mysqli->query("select * from sw_mail WHERE r_id='$curID'");
    $i=0;
    while($dataArray=$mysqli->fetchArray($sqlRes))
    {
        $i++;
        $s_id=$dataArray['s_id'];
        $mail_id=$dataArray['mail_id'];
        $res=$mysqli->getDataRow("select sw_Name from sw_user WHERE sw_id='$s_id' ","row");
        $s_name=$res[0];
        $r_time=date('y-m-d h:i:s');
        echo "<li ><a href=\"mailContent.php?mailC=$mail_id\" class='clear'><em class=\"mailTitle \">".$i.".系统的提示信</em><span class=\"mailTime\">$r_time</span></a></li>";
    }


?>
