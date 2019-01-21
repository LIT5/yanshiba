<?php
/**数组插值
 *前提:数组必须是有序数组
 */

class interpolation {

	function insert($array, $insert) {
		$size = sizeof($array);
		//如果插入的值大于数组最大的值，直接追加在数组末尾返回
		if ($array[$size - 1] < $insert) {
			$array[$size] = $insert;
			return $array;
		}
		//从数组最前端开始比对
		for ($i = 0; $i < $size; $i++) {
			//找到插入的位置，执行插入后返回
			if ($array[$i] >= $insert) {
				$temp = $array[$i];
				$array[$i] = $insert;
				//将数组最后一个数组压入数组尾部
				array_push($array, $array[$size - 1]);
				//后面的数组值全部右移
				for ($j = $i + 1; $j < $size + 1; $j++) {
					Util::swap($temp, $array[$j]);
				}
				//返回，退出比对循环
				return $array;
			}
		}
	}
}

?>