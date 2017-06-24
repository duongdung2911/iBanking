<?php 
/**
* 
*/
class Database
{
	private static $dsn = 'mysql:host=localhost; dbname=ibanking';
	private static $username = 'root';
	private static $password = '';
	private static $db = NULL;
	function __construct()
	{
		# code...
	}

	// Phuong thuc ket noi database
	public function connect()
	{
		if (self::$db == NULL) {
			try {
				self::$db = new PDO(self::$dsn, self::$username, self::$password);

				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				self::$db->query('set names "utf8"');
			} catch (PDOException $e) {
				echo "No connection !";
				echo $e->getMessage();
				exit();
			}
		}
		return self::$db;
	}

	// Phuong thuc ngat ket noi database
	public function disconnect()
	{
		if (self::$db != NULL) {
			self::$db = NULL;
		}
	}
}
?>