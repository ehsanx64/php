<?php
namespace empress\conf;

class main {
	private $activeCommentWalker;

	public function getCommentWalker() {
//		echo __METHOD__;
		return $this->activeCommentWalker;
	}

	public function setCommentWalker($classInstance) {
//		echo __METHOD__;
		$this->activeCommentWalker = $classInstance;
	}
}
