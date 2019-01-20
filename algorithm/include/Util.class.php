<?php
/**
 *
 */
//填充数组
class util {
	public static function fill($n, $order = 0) {
		$array = array();
		for ($i = 0; $i < $n; $i++) {
			array_push($array, $i + 1);
		}
		if ($order) {
			return $array;
		}
		shuffle($array);
		return $array;
	}

	//交换
	public static function swap(&$current, &$next) {
		$temp = $current;
		$current = $next;
		$next = $temp;
	}

}

?>