<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/23
 * Time: 11:10
 */
    define("IN_TG",true);
    require '../tools/sqlHleper.class.php';
    session_start();
?>

<?php
    $curUserName=$_SESSION['userName'];
    $curMysql="select sw_id from sw_user where sw_username='$curUserName'";
    $curRes=$mysqli->getDataRow($curMysql,'Row');
    $curId=$curRes[0];
    date_default_timezone_set('prc');
    $curTime=date('y-m-d h:i:s');
    if($_GET['lost_id'])
    {
        $temp=$_GET['lost_id'];
        $sql1="SELECT * FROM sw_lost WHERE lost_id='$temp'";
        $_goods=$mysqli->getDataRow($sql1,'Array');
        $person_id=$_goods['sw_id'];
        $sql2="SELECT * FROM sw_user where sw_id='$person_id'";
        $_person=$mysqli->getDataRow($sql2,'Array');
        $name=$_goods['lost_name'];
        $date=$_goods['lost_date'];
        $place=$_goods['lost_place'];
        $status=$_goods['lost_status'];
        $desc=$_goods['lost_desc'];
        $image=$_goods['lost_image'];
    }


    if($_GET['take_id'])
    {
        $temp=$_GET['take_id'];
        $sql1="SELECT * FROM sw_take WHERE take_id='$temp'";
        $_goods=$mysqli->getDataRow($sql1,'Array');
        $person_id=$_goods['sw_id'];
        $sql2="SELECT * FROM sw_user where sw_id='$person_id'";
        $_person=$mysqli->getDataRow($sql2,'Array');
        $name=$_goods['take_name'];
        $date=$_goods['take_date'];
        $place=$_goods['take_place'];
        $status=$_goods['take_status'];
        $desc=$_goods['take_desc'];
        $image=$_goods['take_image'];
    }
    
    if($_GET['take_goods'])
    {
        $takeGood=$_GET['take_goods'];
        $lostRes1=$mysqli->query("update sw_take set take_status=1 where take_id='$takeGood'");
        $lostRes2=$mysqli->query("insert into t_person (sw_id,take_id,t_time)values('$curId','$takeGood','$curTime')");
        $lostRes3=$mysqli->getDataRow("select sw_id,take_name from sw_take WHERE take_id='$takeGood' ",'Row');
        $take_id=$lostRes3[0];
        $take_name=$lostRes3[1];
        $person_name=$mysqli->getDataRow("select sw_Name from sw_user WHERE sw_id='$curId'");
        $take_text="你的捡到的".$take_name."已经被".'<a href="#">'.$person_name[0].'</a>'."认领，请尽快联系他";
        $mysqli->query("insert into sw_mail (r_id,s_id,m_content)VALUES ('$take_id','$curId','$take_text')");
        if($lostRes1&&$lostRes2)
        {
            header("location:index.php");
        }
    }
    if($_GET['find_goods'])
    {
        $findGood=$_GET['find_goods'];
        $lostRes1=$mysqli->query("update sw_lost set lost_status=1 where lost_id='$findGood'");
        $lostRes2=$mysqli->query("insert into f_person (sw_id,lost_id,f_time)values('$curId','$findGood','$curTime')");
        $lostRes3=$mysqli->getDataRow("select sw_id,lost_name from sw_lost WHERE lost_id='$findGood' ",'Row');
        $lost_id=$lostRes3[0];
        $lost_name=$lostRes3[1];
        $person_name=$mysqli->getDataRow("select sw_Name from sw_user WHERE sw_id='$curId'");
        $lost_text="你的丢失的".$lost_name."已经被".'<a href="#" class="keyPerson">'.$person_name[0].'</a>'."找到了，请尽快联系他";
        $mysqli->query("insert into sw_mail (r_id,s_id,m_content)VALUES ('$lost_id','$curId','$lost_text')");
        if($lostRes1&&$lostRes2)
        {
            header("location:index.php");
        
        }
    }
?>
