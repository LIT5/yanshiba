<?php
/**
 *选择排序
 */
class selection {
	public function sort($array) {
		$size = sizeof($array);
		// 该层循环为 需要排序的轮数
		for ($i = 0; $i < $size - 1; $i++) {
			//假设最值的排序位置：当前轮数为每轮排序的数组首位;首位之前为有序数组。
			$sortPostion = $i;
			// 该层循环用来控制每轮 需要比较的位数
			for ($j = $i + 1; $j < $size; $j++) {
				//取出最值的排序位置
				if ($array[$sortPostion] > $array[$j]) {
					$sortPostion = $j;
				}
			}
			//如果本轮循环的数组首位不等于最值的位置则进行数据交换；本轮循环的数组首位为最值
			if ($sortPostion != $i) {
				Util::swap($array[$i], $array[$sortPostion]);

			}
		}
		return $array;
	}
}
?>