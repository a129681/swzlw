<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/23
 * Time: 16:11
 */
?>

<?php
    define("IN_TG",true);
    session_start();
    require '../tools/sqlHleper.class.php';
    $mysqli=new mysqliCom();
    $num=$mysqli->getDataRow("select count(*) from sw_lost",'row');
    $pageCount=$num[0];   //总数据条数
    if($_POST['pageCount']=='pages')
    {
        echo $pageCount;
    }
    if(isset($_POST['perPage']))
    {
        $per=$_POST['perPage'];
    }
    else
    {
        $per=6;
    }
    $pageNum=ceil($num[0]/$per);//总页数
    if(empty($_POST['page']))
    {
        $page=$_SESSION['page']=1;
    }
    if(!empty($_POST['page']))
    {
        switch ($_POST['page']) {
            case '首页':
                $page =$_SESSION['page']=1;break;
            case '尾页':
                $page =$_SESSION['page']=$pageNum;break;
            case '上一页':
                $page =$_SESSION['page']=$_SESSION['page']+10;break;
            case '下一页':
                $page =$_SESSION['page']=$_SESSION['page']-10;break;
            default:
                $page = $_SESSION['page'] = $_POST['page'];
        }
    }
        $sql = "SELECT * FROM sw_lost ORDER BY lost_id DESC LIMIT " . ($page - 1) * $per . "," . $per;
        $res = $mysqli->query($sql);
        while ($lostArray = $mysqli->fetchArray($res)) {
            $lost_pic = $lostArray['lost_image'];
            $lost_place = $lostArray['lost_place'];
            $lost_data = $lostArray['lost_date'];
            $lost_name = $lostArray['lost_name'];
            $lost_time = $lostArray['lost_time'];
            $lost_id = $lostArray['lost_id'];

            echo "<li class='Infor_list_form'>
                       <ul>
                            <li><a href='goodDesc.php?lost_id=$lost_id'><img src='$lost_pic' alt=''/></a></li>
                            <li><span>物品名称:</span>$lost_name</li>
                            <li><span>丢失时间:</span>$lost_data</li>
                            <li><span>丢失地点:</span>$lost_place</li>
                            <li><span>发布时间:</span>$lost_time</li>
                        </ul>
                  </li>";
        }

?>
