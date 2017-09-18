<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/9/8
 * Time: 22:56
 */
if(!defined("IN_TG")){
    exit("Access Defined");
}
?>
<?php

class mysqliCom
{
    private static $myServer="localhost";
    private static $mysqlName="root";
    private static $mysqlKey="wan129681";
    private static $mysqlDatabase="swzlw";
    private $con;
    public function __construct()
    {
        $this->con=new mysqli(self::$myServer,self::$mysqlName,self::$mysqlKey,self::$mysqlDatabase);
        if($this->con->connect_error)
        {
            die("连接失败".$this->con->connect_error);
        }
    }

    public function getDataRow($sql,$design)
    {
        $res=$this->con->query($sql);
        if($res)
        {
            if($design=='Array')
                return $res->fetch_array();
            else {
                return $res->fetch_row();
            }
        }
        else {
            echo "sql语句错误";
        }
        return false;
    }

    public function query($sql)
    {
        $res=$this->con->query($sql);
        if($res)
        {
            return $res;
        }
        else
        {
            return false;
        }
    }

    public function fetchArray($res)
    {
        if(!empty($res))
        {
            return mysqli_fetch_array($res);
        }
        return false;
    }

    /**
     * [insert description]
     * @param  [type] $table [description]
     * @param  [type] $arr   [description]
     * @return [type]        [description]
     */
    function insert($table,$arr)
    {
        foreach ($arr as $key =>$value){
            $keyArr[]="`".$key."`";
            $valueArr[]="`".value."`";
         }
         $keys=inplode(",",$keyArr);
         $values=implode(",",$keyArr); 
         $sql="insert into".$table."(".$keys.")values(".$values.")";
         $this->con->query();
         return $this->con->insert_id();      
    }


    public function closeMysql()
    {
        $this->con->close();
    }
}
$mysqli=new mysqliCom();
?>