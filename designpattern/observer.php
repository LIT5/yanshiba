<?php
/**
 *观察者模式
 *当对象间存在一对多关系时（一个主题接口对应多个观察者），一个对象的状态发生改变时，依赖他的对象会全部收到通知，并自动更新。
 *士兵报数
 */

// 主题接口
interface Subject {
	public function register(Observer $observer);
	public function notify();
}
// 观察者接口
interface Observer {
	public function numbered();
}

// 主题：队长
class captain implements Subject {
	//士兵名册
	public $_observers = array();
	//登记士兵
	public function register(Observer $observer) {
		$this->_observers[] = $observer;
	}

	//要求报数
	public function notify() {
		foreach ($this->_observers as $observer) {
			$observer->numbered();
		}

	}
}

// 观察者：士兵
class soldierA implements Observer {
	public function numbered() {
		echo "one！<hr/>";
	}
}
class soldierB implements Observer {
	public function numbered() {
		echo "two！<hr/>";
	}
}
class soldierC implements Observer {
	public function numbered() {
		echo "three！<hr/>";
	}
}

// 应用实例
$captain = new captain();
$captain->register(new soldierA());
$captain->register(new soldierB());
$captain->register(new soldierC());
$captain->notify();
?>