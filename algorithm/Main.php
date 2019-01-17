<?php
//定义防跳墙访问常量
define('ACC', true);
include './include/init.php';

$array = Util::fill(10);
echo "原数组<br/>";
echo implode(",", $array) . '<br/>';
echo '<hr/>';
echo "冒泡排序<br/>";
$bubble = new Bubble();
//基本冒泡排序
$order = $bubble->baseSort($array);

//标志位冒泡排序
// $order = $bubble->flagSort($array);

//截面冒泡排序
// $order = $bubble->sectionSort($array);
echo implode(",", $order);
echo '<hr/>';

?>