<?php
class Auth {
	public function auth($login, $password) {

	}
	public function register($login, $password) {
        hash('sha256', $password);
	}
	public function check($key) {

	}
	public function setAuth($key) {

	}
}
?>