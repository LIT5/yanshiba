<?php
/**
 *多态
 */

abstract class human {
	public abstract function speak();
}

class man extends human {
	public function speak() {
		echo "man";
	}
}

class women extends human {
	public function speak() {
		echo "women";
	}
}

class children {
	public function speak() {
		echo "children";
	}
}

class who {
	public function call($who) {
		$who->speak();
	}
}

$man = new man();
$women = new women();
$children = new children();

$who = new who();

switch (mt_rand() % 3) {
case '1':
	$who->call($man);
	break;
case '2':
	$who->call($women);
	break;
default:
	$who->call($children);
	break;
}
?>