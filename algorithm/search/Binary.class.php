<?php
/**二分查找法
 *前提:数组必须是有序数组
 */
class binary {

	function search($array, $search) {
		$size = sizeof($array);
		$high = $size - 1;
		$low = 0;
		while ($low <= $high) {
			//获取中间数
			$mid = intval(($low + $high) / 2);
			if ($array[$mid] == $search) {
				return 'array[' . $mid . '] == ' . $array[$mid];
			} elseif ($array[$mid] > $search) {
				$high = $mid - 1;
			} else {
				$low = $mid + 1;
			}
		}
		die('没有找到...');
	}
}

?>