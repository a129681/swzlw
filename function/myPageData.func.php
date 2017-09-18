<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/22
 * Time: 21:21
 */
?>

<?php
define("IN_TG",true);
session_start();
require '../tools/sqlHleper.class.php';

if($_POST['type']=='alter')
{
    $user=$_SESSION['userName'];
    $form_name=$_POST['form_name'];
    $form_sex=$_POST['form_sex'];
    $form_qq=$_POST['form_qq'];
    $form_email=$_POST['form_email'];
    $form_result=$mysqli->query("update sw_user set sw_Name='$form_name',sw_sex='$form_sex',sw_qq='$form_qq',sw_email='$form_email' WHERE sw_username='$user'");
    if(!empty($form_result))
    {
        $mysqli->closeMysql();
        echo 'pass';
    }
    else
    {echo "error";}
}
else
{
    exit("Access Defined");
}

?>
