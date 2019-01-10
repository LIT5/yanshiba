<?php
/**
 *面向接口
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
$clientdb = new sqlite();
$clientdb->conn();

?>