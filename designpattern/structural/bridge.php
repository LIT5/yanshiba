<?php
/**
 *桥接模式
 *桥接模式，将继承关系转换为组合关系，从而降低了系统间的耦合，减少了代码编写量。
 *例子：现在需要准备三种粗细（大中小），并且有五种颜色的笔。
 *如果使用蜡笔，我们需要准备3*5=15支蜡笔，也就是说必须准备15个具体的蜡笔类。
 *而如果使用毛笔的话，只需要3种型号的毛笔，外加5个颜料盒，用3+5=8个类就可以实现15支蜡笔的功能。
 *实际上，蜡笔和毛笔的关键一个区别就在于笔和颜色是否能够分离。即将抽象化(Abstraction)与实现化(Implementation)脱耦，使得二者可以独立地变化"。关键就在于能否脱耦:蜡笔由于无法将笔与颜色分离，造成笔与颜色两个自由度无法单独变化，使得只有创建15种对象才能完成任务。而毛笔与颜料能够很好的脱耦（笔和颜色是分开的），抽象层面的概念是："毛笔用颜料作画"，每个参与者（毛笔与颜料）都可以在自己的自由度上随意转换。
 */

/**抽象化角色  抽象笔
 * Class AbstractPen
 */
abstract class AbstractPen {
	//颜料
	public $color;
	//型号
	public $model;
	//作画
	abstract function draw();
}
/**修正抽象化角色 大号笔&小号笔
 *
 */
class bigPen extends AbstractPen {
	public $model = '10';

	function draw() {
		# code...
		echo "用大号笔画出";
		$this->color->dye($this->model);
	}
}
class smallPen extends AbstractPen {
	public $model = '3';
	function draw() {
		# code...
		echo "用小号笔画出";
		$this->color->dye($this->model);
	}
}

/**实现化角色 抽象颜料
 * Class ImplementColor
 */
abstract class ImplementColor {
	//染色
	abstract function dye($model);
}
/**具体实现化角色 蓝色&红色
 *
 */
class blue extends ImplementColor {
	function dye($model) {
		echo "蓝色线条：<hr  color='#0000FF' size='{$model}'>";
	}
}
class red extends ImplementColor {
	function dye($model) {
		echo "红色线条：<hr  color='#FF0000' size='{$model}'>";

	}
}

//"不同型号的毛笔用不同颜色的颜料画线"
$Pen = new bigPen();
$Pen->color = new blue();
$Pen->draw();
$Pen->color = new red();
$Pen->draw();

$Pen = new smallPen();
$Pen->color = new red();
$Pen->draw();
$Pen->color = new blue();
$Pen->draw();

?>