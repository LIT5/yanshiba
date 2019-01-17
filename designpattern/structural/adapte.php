<?php
/**
 *适配器模式
 *面向对象设计中的开闭原则：对于"扩展"开放，对于"修改"关闭。
 *源(Adaptee)角色：需要进行适配的接口
 *目标(Target)角色：定义客户端使用的与特定目标领域相关的接口，这也就是我们所期待得到的
 *适配器(Adapter)角色：对Adaptee的接口与Target接口进行适配；适配器是本模式的核心，适配器把源接口转换成目标接口，此角色为具体类
 */

//源(Adaptee)角色:中餐
abstract class ChineseFood {
	public abstract function chopsticks();
}

class Dumplings extends ChineseFood {
	private $food = 'dumplings';
	public function chopsticks() {
		echo "Eat " . $this->food . ".<br/>";
	}
}
class Rice extends ChineseFood {
	private $food = 'rice';
	public function chopsticks() {
		echo "Eat " . $this->food . ".<br/>";
	}
}

//目标(Target)角色：西餐&印度餐
interface EuropeanFood {
	public function KnifeAndfork();
}
interface Hindumeal {
	public function Spoon();
}

//适配器(Adapter)角色：西餐&印度餐
class WesternAdapter implements EuropeanFood {
	private $adaptee;

	function __construct(ChineseFood $adaptee) {
		$this->adaptee = $adaptee;
	}

	//委派调用Adaptee的chopsticks方法
	public function KnifeAndfork() {
		$this->adaptee->chopsticks();
	}

}
class HinduAdapter implements Hindumeal {
	private $adaptee;

	function __construct(ChineseFood $adaptee) {
		$this->adaptee = $adaptee;
	}

	//委派调用Adaptee的chopsticks方法
	public function Spoon() {
		$this->adaptee->chopsticks();
	}
}

//客户端
class LIT {
	public function haveMeals() {
		//实例化一个饺子；米饭同理
		$adaptee_Dumplings = new Dumplings();
		echo "刀叉吃饺子:";
		$adapter_Western = new WesternAdapter($adaptee_Dumplings);
		//用刀叉
		$adapter_Western->KnifeAndfork();

		echo "汤匙吃饺子:";
		$adapter_Hindu = new HinduAdapter($adaptee_Dumplings);
		//用勺子
		$adapter_Hindu->Spoon();
	}
}

$LIT = new LIT();
$LIT->haveMeals();
?>