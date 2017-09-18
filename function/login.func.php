<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/17
 * Time: 15:26
 */
define("IN_TG",true);
if($_POST['logype'])
{
    exit("请不要非法盗链");
}
?>
<?php
require_once '../tools/sqlHleper.class.php';
require_once '../tools/toolsHelp.class.php';
session_start();
if($_POST['logType']=='login')
{
    $username=$_POST["username"];
    $keyword=$_POST["login_key"];
    $result=$mysqli->getDataRow("SELECT sw_username ,sw_password FROM sw_user WHERE sw_username='$username'",'row');
    if(!$result)
    {
        echo "账号错误";
    }
    else
    {
        if($keyword!=$result[1])
        {
            echo "密码错误";
        }
        else
        {
            echo "pass";
            $_SESSION['userName']=$_POST['username'];
            $res=$mysqli->getDataRow("select sw_id from sw_user where sw_username='$username' ",'row');
            $curID=$res[0];
            $_SESSION["user_id"]=$curID;
            $mysqli->closeMysql();
        }
    }
}

if($_POST['logType']=='reg')
{
        date_default_timezone_set('prc');
        $regName=$_POST['regName'];
        $regKey=$_POST['regKey'];
        $reg_result=$mysqli->getDataRow("SELECT sw_username FROM sw_user WHERE sw_username='$regName'",'row');
        if(empty($reg_result))
        {
            $curTime=date('y-m-d h:i:s');
            $res=$mysqli->query("INSERT INTO sw_user (sw_username,sw_password,sw_regtime) VALUES('$regName','$regKey','$curTime')");
            if($res)
            {
                echo "pass";
            }
            else
            {
                echo "注册信息失败";
            }
            $mysqli->closeMysql();
        }
        else
        {
            echo "账号已经被注册";
        }
}
?>

