<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/30
 * Time: 10:14
 */
?>

<?php
    define("IN_TG",true);
    $t_sql="SELECT take_id from t_person ORDER BY t_time DESC LIMIT 0,10";
    $t_res=$mysqli->query($t_sql);
    $t_num=mysqli_num_rows($t_res);
    $t_length=$t_num<10?$t_num:10;
    for($i=0;$i<$t_length;$i++) {
        $t_arr = $mysqli->fetchArray($t_res);
        $t_sql1="select take_name from sw_take WHERE take_id='$t_arr[0]'";
        $take_res=$mysqli->getDataRow($t_sql1,'row');
        echo "<li><a href='#' style='color:royalblue'>$take_res[0]</a>已经被领走了</li>";
    }
?>
