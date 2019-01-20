<?php
/****
查找算法
 ****/
//定义防跳墙访问常量
define('ACC', true);
include './include/init.php';
$array = Util::fill(7, 1);
echo "原数组<br/>";
echo implode(",", $array) . '<br/>';
echo '<hr/>';

echo "二分查找法<br/>";
$binary = new binary();
$result = $binary->search($array, 5);
echo $result . '<hr/>';

/*
echo "插值查找法<br/>";
$insert = new insert();
$result = $insert->search($array, 5);
echo implode(",", $result);
echo '<hr/>';
 */
?>