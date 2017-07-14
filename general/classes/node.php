<?php

class Node {
	private $value;
	private $left;
	private $right;

	public function __construct($value, $left = null, $right = null) {
		$this->value = $value;
		$this->left = $left;
		$this->right = $right;
	}

	public function getValue() {
		return $this->value;
	}

	public function setValue($value) {
		$this->value = $value;
	}

	public function getLeft() {
		return $this->left;
	}

	public function setLeft($value) {
		$this->left = $value;
	}

	public function getRight() {
		return $this->right;
	}

	public function setRight($value) {
		$this->right = $value;
	}
}

