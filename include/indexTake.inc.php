<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/23
 * Time: 11:05
 */
?>

<?php
define("IN_TG",true);
$sql="SELECT take_name,take_id,take_time FROM sw_take ORDER BY take_id DESC";
$res=$mysqli->query($sql);
for($i=0;$i<14;$i++){
    $_Array=$mysqli->fetchArray($res);
    echo "<li><a href='goodDesc.php?take_id=$_Array[1]'>$_Array[0]</a><span class='list_time'>$_Array[2]</span></li>";
}
?>
