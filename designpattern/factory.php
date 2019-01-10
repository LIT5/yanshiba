<?php
/**
 *工厂模式
 *
 */
//一、服务器端
//1、共同接口
interface db {
	function conn();
}
interface Factory {
	function createDB();
}
//2、不知道谁调用，创建满足不同客户端调用的工厂类及其对应的基础类：
class mysqlFactory implements Factory {
	public function createDB() {
		return new mysql;
	}
}

class mysql implements db {
	public function conn() {
		echo "已连接mysql";
	}
}

class sqliteFactory implements Factory {
	public function createDB() {
		return new sqlite;
	}
}
class sqlite implements db {
	public function conn() {
		echo "已连接sqlite";
	}
}
//3、服务器端后来扩展的新类
class oracleFactory implements Factory {
	public function createDB() {
		return new oracle;
	}
}
class oracle implements db {
	public function conn() {
		echo "已连接oracle";
	}
}

//二、客户端
//看不到上述类的内部细节，只知道某Factory类实现的接口db及其conn()方法。
$factory = new oracleFactory();
$clientdb = $factory->createDB();
$clientdb->conn();
?>