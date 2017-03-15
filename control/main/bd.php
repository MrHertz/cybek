<?php
/**
	$q (string) - подготовленный запрос
	$t (array) - тип передаваемых параметров
	$p (array) - сами параметры
 */
class Sql {
		private $sql, $stmt;
    function __construct() {
        $sql = new mysqli($Config::dbhost, $Config::dbuser, $Config::dbpassword, $Config::db);
        if ($sql->connect_error) die('Connect Error (' . $sql->connect_errno . ') ' . $sql->connect_error);
    }

		public function prepare($q) {
        $this->stmt = $this->sql->stmt_init();
        if ($this->stmt->prepare($q) === false)
        		return false;
        else
        		return true;
    }

		public function query() {
				if (($this->stmt->execute() === false)
						or (($result = $this->stmt->get_result()) === false)
								or ($this->stmt->close() === false))
										die('Query Error [' . $this->stmt->errno . '] ' . $this->stmt->error);
        else
            return $result;
		}
}

$db = new Sql();
?>