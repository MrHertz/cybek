<?php
/** Возможные входные данные: $login (email), $password[0,1], $key
 *  Выходные данные: JSON status: true/false
 *  Ошибка: desc["where" => "what"]
 */
class Auth {
	public function auth($login, $password) {

	}
	public function register($login, $password) {
        if (filter_var($login, FILTER_VALIDATE_EMAIL) === false) {
            $error[] = ["login" => "Введите свой email"];
        } if ($password[0] !== $password[1]) {
            $error[] = ["password" => "Пароли не совпадают"];
        }

        if (isset($error))
            $response = ["status" => false, "desc" => $error];
        else
            $response = ["status" => true];

        echo json_encode($response);
        //hash('sha256', $password);
	}
	public function check($key) {

	}
	public function setAuth($key) {

	}
}
Auth::register('dfsfsd@cybek.ru', ['fdsfsd', 'fdsfsd']);
?>