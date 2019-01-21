<?php
/**插值查找法
 *前提:数组必须是有序数组
 *对于极端不均匀的数据，插值查找效率比折半查找低。
 */

class insert {

	function search($array, $search) {
		$size = sizeof($array);
		$high = $size - 1;
		$low = 0;
		while ($low <= $high) {
			if ($array[$low] == $search) {
				return 'array[' . $low . '] == ' . $array[$low];
			}
			if ($array[$high] == $search) {
				return 'array[' . $high . '] == ' . $array[$high];
			}
			// 折半查找 ： $middle = intval(($lower + $high) / 2);
			$middle = intval($low + ($search - $array[$low]) / ($array[$high] - $array[$low]) * ($high - $low));
			if ($search < $array[$middle]) {
				$high = $middle - 1;
			} else if ($search > $array[$middle]) {
				$low = $middle + 1;
			} else {
				return 'array[' . $middle . '] == ' . $array[$middle];
			}
		}
		die('没有找到...');
	}

}

?>