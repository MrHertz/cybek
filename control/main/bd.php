/**
    $q (string) - подготовленный запрос
    $t (array) - тип передаваемых параметров
    $p (array) - сами параметры
*/
<?php
class Sql {
    private $sql;
    function __construct() {
        $sql = new mysqli($Config::dbhost, $Config::dbuser, $Config::dbpassword, $Config::db);
        if ($sql->connect_error) die('Connect Error (' . $sql->connect_errno . ') ' . $sql->connect_error);
    }
	public function prepare($q, $t, $p) {
        $stmt = $this->sql->stmt_init();
        if (($stmt->prepare($q) === false)
            or ($stmt->bind_param('ii', $id, $_id) === false)
                or ($stmt->execute() === false)
                    or (($result = $stmt->get_result()) === false)
                        or ($stmt->close() === false))
                            die('Query Error [' . $stmt->errno . '] ' . $stmt->error);
        else
            return $result;

    }
	public function select($q, $t, $p) {
        $this->prepare($q);
    }
	public function update() {}
	public function insert() {}
	public function delete() {}
	public function drop() {}
	public function custom() {}
}

$db = new Sql();
?>