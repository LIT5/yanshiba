<?php
/**
 *快速排序
 */
class quick {
	public function sort($array) {
		$size = sizeof($array);

		//递归出口:数组长度为1，直接返回数组
		if ($size <= 1) {
			return $array;
		}

		//数组元素有多个,则定义两个空数组
		$left = $right = array();

		//使用for循环进行遍历，把数组第一个元素当做比较的对象
		for ($i = 1; $i < $size; $i++) {
			//判断当前元素的大小,进行分组
			if ($array[0] > $array[$i]) {
				$left[] = $array[$i];
			} else {
				$right[] = $array[$i];
			}
		}
		//对这两个分组，递归调用排序函数
		$left = $this->sort($left);
		$right = $this->sort($right);
		//将所有的结果合并，返回
		return array_merge($left, array($array[0]), $right);
	}
}
?>