<?php
/**
 *简单工厂模式
 *又称为静态工厂方法(Static Factory Method)模式，它属于类创建型模式。在简单工厂模式中，可以根据参数的不同返回不同类的实例。
 */
//一、服务器端
//1、共同接口
interface db {
	function conn();
}

//2、不知道谁调用，创建满足不同客户端调用的类：
class mysql implements db {
	public function conn() {
		echo "已连接mysql";
	}
}

class sqlite implements db {
	public function conn() {
		echo "已连接sqlite";
	}
}

//二、客户端
//看不到上述两个类的内部细节，只知道以上两个类实现的接口db及其conn()方法。
//简单工厂模式;公开一个静态方法Factory::createDB('');
class Factory {
	public static function createDB($type) {
		switch ($type) {
		case 'mysql':
			return new mysql();
			break;
		case 'sqlite':
			return new sqlite();
			break;

		default:
			throw new exception('error db type', 1);
			break;
		}

	}
}

$clientdb = Factory::createDB('mysql');
$clientdb->conn();
?>