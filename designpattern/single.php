<?php
/**
 *单例模式
 */
class sigle {
	protected static $Ins = NULL;

	//方法前加final，方法不能被覆盖；类前加final，类不能被继承。
	final protected function __construct() {
		# code...
	}
	final protected function __clone() {
		# code...
	}
	public static function getIns() {
		if (is_null(self::$Ins)) {
			self::$Ins = new self();
		}
		return self::$Ins;

	}
}

$s1 = sigle::getIns();
$s2 = sigle::getIns();

if ($s1 === $s2) {
	echo "全等，是一个对象";
} else {
	echo "不是一个对象";
}
?>