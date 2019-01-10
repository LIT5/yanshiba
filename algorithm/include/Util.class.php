<?php
/**
 *
 */
//填充数组
class util {
	public static function fill($n) {
		$array = array();
		for ($i = 0; $i < $n; $i++) {
			array_push($array, $i + 1);
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