<?php
/**
 *装饰器模式
 *装饰者模式就是不修改原类代码和继承的情况下动态扩展类的功能。传统的编程模式都是子类继承父类实现方法重载，使用装饰器模式，只需添加一个新的装饰器对象，更加灵活，避免类数量和层次过多。
 *士兵汇报
 */

/**被装饰者基类
 *
 */
abstract class report {
	protected $duty;
	protected $content;
	public function __construct($content) {
		$this->content = $content;
	}

	abstract public function response();
}

/**被装饰者具体类
 *
 */
class soldierReport extends report {
	public function response() {
		return $this->content . '</br>';
	}
}

/**装饰者具体类
 * 连长处理 重写构造函数以及执行函数
 */
class captainReport extends report {

	function __construct($supduty) {
		$this->duty = $supduty;
	}

	public function response() {
		$this->content = $this->duty->response() . ':连长已阅读。';

		return $this->content . '</br>';
	}
}

/**装饰者具体类
 * 司令处理 重写构造函数以及执行函数
 */
class generalReport extends report {

	function __construct($supduty) {
		$this->duty = $supduty;
	}

	public function response() {
		$this->content = $this->duty->response() . ':司令已阅读。';

		return $this->content . '</br>';
	}
}
$report = '我的名字叫小明，习惯熬夜到天明！';

$reporter = new soldierReport($report);
echo $reporter->response();

$reporter = new captainReport(new soldierReport($report));
echo $reporter->response();

$reporter = new generalReport(new captainReport(new soldierReport($report)));
echo $reporter->response();
?>