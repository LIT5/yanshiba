<?php
/**
 *直接插入排序
 *每步将一个待排序的记录按其关键字的大小插到前面已经排序的序列中的适当位置，直到全部记录插入完毕为止。
 */
class insertion {
	public function sort($array) {
		$size = sizeof($array);
		//外：从第二个元素开始比较；第一个元素为已排序
		for ($i = 1; $i < $size; $i++) {
			//获得当前需要比较的元素值。
			$insertion = $array[$i];
			//内：循环已排序的元素；从后向前扫描
			/*
			//简化写法
			// for ($j = $i - 1; $j >= 0 and $array[$j] > $insertion; $j--) {
			// 	$array[$j + 1] = $array[$j];
			// 	$array[$j] = $insertion;
			// }
			*/
			for ($j = $i - 1; $j >= 0; $j--) {
				//已排序元素与当前元素比对；条件成立，元素互换
				if ($array[$j] > $insertion) {
					//已排序元素后移
					$array[$j + 1] = $array[$j];
					//当前元素前移
					$array[$j] = $insertion;
				} else {
					//由于是已经排序好是数组，则前面的就不需要再次比较了。
					break;
				}
			}

		}
		return $array;
	}
}
?>