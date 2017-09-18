<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2016-11-20 18:49:07
 * @version $Id$
 */

class mysqliCom
{
    private static $myServer="localhost";
    private static $mysqlName="root";
    private static $mysqlKey=wan129681";
    private $con;
    public function __construct($mysqlDatabase)
    {
        $this->con=new mysqli(self::$myServer,self::$mysqlName,self::$mysqlKey,$mysqlDatabase);
        if($this->con->connect_error)
        {
            die("连接失败".$this->con->connect_error);
        }
    }

    /**
     * [query description]
     * @param  [type] $sql [description]
     * @return [type]      [description]
     */
    function query($sql)
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
    /**
     * [findAll description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    function findAll($query)
    {
    	while ($rs=$query->fetch_array())
    	{
    		$list[]=$rs;
    	}
    	return isset($list)?$list:"";
    }

    function findOne($query)
    {
    	$rs=$query->fetch_array(MYSQLI_NUM);
    	return $rs;
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
            $valueArr[]="'".value."'";
         }
         $keys=inplode(",",$keyArr);
         $values=implode(",",$keyArr); 
         $sql="insert into".$table."(".$keys.")values(".$values.")";
         $this->con->query();
         return $this->con->insert_id();      
    }

    function update($table,$arr,$where)
    {
    	foreach($arr as $key=>$value)
    	{
    		$keyAndvalueArr[]="`".$key."`='".$value."'";
    	}
    	$keyAndvalueArrs=implode(",",$keyAndvalueArr);
    	$sql="update".$table."set".$keyAndvalueArrs."where".$where;
    	$this->con->query($sql);
    }

    function del($table,$where)
    {
    	$sql="delete from".$table."where".$where;
    	$this->query($sql);
    }

    public function closeMysql()
    {
        $this->con->close();
    }

}