<?php
/**
 *责任链模式
 *使多个对象都有机会处理请求，从而避免请求的发送者与接受者之间的耦合关系。将这个对象连成一条链传递该请求，直到有一个对象处理它为止。
 *领导安排工作
 */

/**
 * Handler抽象类:作为职责接口，是所有职责对象的父类。
 *
 * 设置当前对象的职责等级
 * 设置当前对象的下一节点
 * 根据任务标识的处理等级，分配任务
 */
abstract class abstractHandler {
	//部队编制
	protected $dutys = array('士兵', '连长', '司令');

	//职务
	protected $duty;
	//当前处理级别
	protected $lever;
	//当前级别的处理回应
	abstract protected function response($doWork);

	//下一节点的处理者
	protected $handlerSuccessor;

	function __construct($duty) {
		$this->duty = $duty;
		//设置处理级别
		$this->lever = array_search($duty, $this->dutys);
	}
	//设置下一节点的处理者
	function setSuccessor(abstractHandler $successor) {
		$this->handlerSuccessor = $successor;
	}

	/**
	 * 处理申请
	 */
	function handlerRequest(Request $request) {
		if ($this->lever === $request->getLever()) {
			$this->response($request->doWork);
		} else {
			if ($this->handlerSuccessor != null) {
				$this->handlerSuccessor->handlerRequest($request);
			} else {
				//没有与之对应的处理级别或者没有合适的处理者
				echo '需要总司令批准' . $request->doWork . '工作。' . PHP_EOL;
			}
		}
	}
}

/**
 * 具体的职责实现对象
 *
 * 编写任务处理函数
 */
class general extends abstractHandler {

	function __construct($duty) {
		parent::__construct($duty);
	}
	public function response($doWork) {
		echo $this->duty . "执行" . $doWork . '工作。';
	}
}
class captain extends abstractHandler {

	function __construct($duty) {
		parent::__construct($duty);
	}
	public function response($doWork) {
		echo $this->duty . "执行" . $doWork . '工作。';
	}
}
class soldier extends abstractHandler {

	function __construct($duty) {
		parent::__construct($duty);
	}
	public function response($doWork) {
		echo $this->duty . "执行" . $doWork . '工作。';
	}
}

/**
 * 申请类
 * 生成任务，并返回任务的等级
 */
class request {
//工作内容
	protected $workLevel = array('赤身肉搏', '指挥战斗', '作战部署');

	//当前指派的工作
	public $doWork;
	function __construct($doWork) {
		# code...
		$this->doWork = $doWork;
	}

	public function getLever() {
		return array_search($this->doWork, $this->workLevel);
	}
}
$request = new request('指挥战斗');

$general = new general('司令');
$captain = new captain('连长');
$soldier = new soldier('士兵');

$general->setSuccessor($captain);
$captain->setSuccessor($soldier);

$general->handlerRequest($request);

?>