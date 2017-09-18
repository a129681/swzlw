<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/30
 * Time: 12:52
 */
?>

<?php
    define("IN_TG",true);
    $f_sql="SELECT lost_id from f_person ORDER BY f_time DESC LIMIT 0,10";
    $f_res=$mysqli->query($f_sql);
    $f_num=mysqli_num_rows($f_res);
    $f_length=$f_num<10?$f_num:10;
    for($i=0;$i<$f_length;$i++) {
        $f_arr = $mysqli->fetchArray($f_res);
        $f_sql1="select lost_name from sw_lost WHERE lost_id='$f_arr[0]'";
        $lost_res=$mysqli->getDataRow($f_sql1,'row');
        echo "<li><a href='#' style='color:royalblue'>$lost_res[0]</a>已经找到了</li>";
    }
?>

