<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2016-11-20 18:59:43
 * @version $Id$
 */

require "sql.testClass.php";
$mysqli=new mysqliCom("test");


$res=$mysqli->query("select `number` from my_pri3");
$arr=$mysqli->findAll($res);





?>
