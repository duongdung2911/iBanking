<?php 
include_once('database.php');
/**
* 
*/
class Library
{
	private static $_query='';
	private static $_stmt=NULL;
	function __construct()
	{
		# code...
	}

	// Phuong thuc gan cau query
	public static function setQuery($query)
	{
		self::$_query = $query;
	}

	// Phuong thuc thuc thi lay ve so dong bi tac dong
	public static function execSQL()
	{
		$conn = Database::connect();
		self::$_stmt = $conn->prepare(self::$_query);
		self::$_stmt= $conn->exec(self::$_query);
		return self::$_stmt;
	}

	// Phuong thuc thuc thi cau lenh SQL
	public static function executeSQL($object = array())
	{
		$conn = Database::connect();
		self::$_stmt = $conn->prepare(self::$_query);

		if ($object) {
			for ($i=0; $i < count($object); $i++) { 
				self::$_stmt->bindParam($i+1, $object[$i]);
			}
		}
		self::$_stmt->execute();
		return self::$_stmt;
	}


	// Phuong thuc lay ve tat ca ca hang
	public static function loadAllRows($object = array())
	{
		if (!$object) {
			$result = self::executeSQL();
		} else {
			$result = self::executeSQL($object);
		}
		if (!$result) {
			return false;
		}
		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	// Phuong thuc lay ve mot hang
	public static function loadRow($object = array())
	{

		if (!$object) {
			$result = self::executeSQL();
		} else {
			$result = self::executeSQL($object);
		}
		if (!$result) {
			return false;
		}
		
		return $result->fetch(PDO::FETCH_OBJ);
	}
}

?>