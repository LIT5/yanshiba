<?php
/**
 *策略模式
 *它定义了算法家族，分别封装起来，让他们之间可以互相替换，此模式让算法的变化不会影响到使用算法的客户。减少了各种算法类与使用算法类之间的耦合。
 *超市促销活动
 */
/**
 * 抽象活动算法类
 */
abstract class abstractStrategy {
	/**
	 * 留出重写具体活动算法方法的接口
	 */
	public abstract function doAction($money);
}

/**
 * 满减算法产品类
 */
class ManJianStrategy extends abstractStrategy {
	public function doAction($money) {
		echo '满减算法：原价' . $money . '元';
	}
}

/**
 * 打折算法产品类
 */
class DaZheStrategy extends abstractStrategy {
	/**
	 * 具体活动算法实现
	 */
	public function doAction($money) {
		echo '打折算法：原价' . $money . '元';
	}
}

/**
 * 策略工厂类
 */

class StrategyFind {
	private $strategy_mode;

	/**
	 * 初始时，传入具体的策略对象
	 * @param $mode
	 */
	public function __construct($mode) {
		$this->strategy_mode = $mode;
	}

	/**
	 * 执行打折算法
	 * @param $money
	 */
	public function get($money) {
		$this->strategy_mode->doAction($money);
	}
}

// 满减活动
$manjian = new StrategyFind(new ManJianStrategy());
$manjian->get(100);

echo '<br>';

// 打折活动
$dazhe = new StrategyFind(new DaZheStrategy());
$dazhe->get(100);
?>