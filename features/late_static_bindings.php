<?php
/****
php延迟静态绑定
范围解析操作符::
self::中的self指向当前运行的类;运行到哪个声明的类，便指向哪个类。

static::中的static其实是起始运行时所在类的别名，并不是定义时所在的那个类名;在哪个类开始运行的，便回指向哪个类。这个东西可以实现在父类中能够调用子类的方法和属性。
使用(static)关键字来表示这个别名，和静态方法，静态类没有任何的关系，static::不仅支持静态类，还支持对象（动态类）。
 ****/
/**
 * 父类
 */
class godFather {
	const age = 60;
	protected static $name = 'Corleone ';
	public static $gun = 100;

	public static function shoot() {
		echo "一万点伤害<br/>";
	}
	public static function attack() {
		echo self::$name . '<br/>';
		echo self::age . '岁<br/>';
		echo self::$gun . '只枪<br/>';
		self::shoot();
	}
	public static function support() {
		echo static::$name . '<br/>';
		echo static::age . '岁<br/>';
		echo static::$gun . '只枪<br/>';
		static::shoot();
	}
}

/**
 * 相关接口
 */
interface drive {
	public static function car();
}

interface think {
	public static function plan();
}

interface move {
	public static function run();
}

/**
 * 子类
 */
class sonny extends godFather implements drive, think, move {
	const age = 40;
	protected static $name = 'sonny';
	public static function shoot() {
		echo "零点伤害伤害<br/>";
	}

	public static function car() {
		echo "开车<br/>";
	}
	public static function plan() {
		echo "没有计划<br/>";
	}
	public static function run() {
		echo "绝不撤退<br/>";
	}
}

/**
 * 孙类
 */
class heeler extends sonny {
	public static $gun = 1;

	public static function who($name) {
		self::$name = $name;
	}
	public static function shoot() {
		echo "一百点伤害<br/>";
		heeler::car();
		heeler::plan();
		parent::run();
	}

	public static function car() {
		echo "开车<br/>";
	}
	public static function plan() {
		echo "定个计划<br/>";
	}
	public static function run() {
		echo "撤退<br/>";
	}

}

/**
 * 孙类修改本身没有的属性，孙类向上查找子类name;孙类self::修改当前运行的子类name属性。
 */
// heeler::who('路人甲');

/**
 * 孙类调用只有父类才有的方法，父类self::返回当前运行的godFather类属性。
 */
heeler::attack();
echo "<hr/>";

/**
 * 孙类调用只有父类才有的方法，父类static::返回起始运行时类的属性；
 * 孙类没有，孙类起始调用子类；子类没有，子类起始调用父类。
 * 此处由子类sonny起始调用的父类，所以父类返回子类的name。
 *
 * 孙类parent::返回继承自子类的接口方法返回值“绝不撤退”。
 */
heeler::support();
echo "<hr/>";
?>