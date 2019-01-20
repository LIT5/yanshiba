<?php
/****
排序算法
 ****/
//定义防跳墙访问常量
define('ACC', true);
include './include/init.php';
$array = Util::fill(5);

echo "原数组<br/>";
echo implode(",", $array) . '<br/>';
echo '<hr/>';
/*
echo "冒泡排序<br/>";
$bubble = new Bubble();
//基本冒泡排序
$order = $bubble->baseSort($array);

//标志位冒泡排序
$order = $bubble->flagSort($array);

//截面冒泡排序
$order = $bubble->sectionSort($array);
 */

/*
echo "选择排序<br/>";
$selection = new selection();
$order = $selection->sort($array);
 */

echo "插入排序<br/>";
$insertion = new insertion();
$order = $insertion->sort($array);

/*
echo "快速排序<br/>";
$quick = new quick();
$order = $quick->sort($array);
 */

echo implode(",", $order);
echo '<hr/>';

?>