<?php
/**
 *冒泡排序
 */
class bubble {
	//交换
	public function swap($sa, $sb) {
		$temp = $sa;
		$sa = $sb;
		$sb = $temp;
		// return $array;
	}

	//基本排序
	public function baseSort($array) {
		$size = sizeof($array);
		// 该层循环控制 需要冒泡的轮数
		for ($i = 0; $i < $size - 1; $i++) {
			// 该层循环用来控制每轮 冒出一个数 需要比较的次数
			for ($j = 0; $j < $size - 1 - $i; $j++) {
				if ($array[$j] > $array[$j + 1]) {
					Util::swap($array[$j], $array[$j + 1]);
				}
			}
		}
		return $array;
	}

	//通过设立的标识位，来判断当前排序数组是否有序
	public function flagSort($array) {
		$size = sizeof($array);
		for ($i = 0; $i < $size - 1; $i++) {
			//假设每一轮循环的数组皆为有序
			$flag = true;
			for ($j = 0; $j < $size - 1 - $i; $j++) {
				if ($array[$j] > $array[$j + 1]) {
					Util::swap($array[$j], $array[$j + 1]);

					//本轮循环的数组为无序
					$flag = false;
				}
			}
			if ($flag) {
				break;
			}
		}
		return $array;
	}

	//通过已排序位置来截取无序数组进行排序
	public function sectionSort($array) {
		$size = sizeof($array);
		//每轮循环的排序范围：初始值为全排
		$sortRange = $size - 1;
		for ($i = 0; $i < $size - 1; $i++) {
			//假设数组为有序
			$flag = true;
			$lastPostion = 0;
			for ($j = 0; $j < $sortRange; $j++) {
				if ($array[$j] > $array[$j + 1]) {
					Util::swap($array[$j], $array[$j + 1]);
					//本轮循环，发现数组为无序
					$flag = false;
					//记录数组最后的排序位置
					$lastPostion = $j;
				}
			}
			//数组有序，不需要继续再进行循环
			if ($flag) {
				break;
			}
			//最后排序位置往后的数据为有序数组，不需要参与排序；作为排序范围的右极限
			$sortRange = $lastPostion;
		}
		return $array;
	}

}
?>