<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/22
 * Time: 19:18
 */
?>

<?php
    if(!defined("IN_TG")){
        exit("Access Defined");
    }
    define("IN_TG",true);
    require '../tools/sqlHleper.class.php';
    session_start();

    $curName=$_SESSION['userName'];
    $sqlStr="SELECT * FROM sw_user WHERE sw_username='$curName'";
    $_desc=$mysqli->getDataRow($sqlStr,'Array');
    $mysqli->closeMysql();
?>
