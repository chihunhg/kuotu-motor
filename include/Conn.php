<?Php
function sql_conn(){
	$dbhost = 'localhost';
	$dbuser = 'kuotu';
	$dbpasswd = 'Z30h&e1f';
	$dbname = 'kuotu';	 
	try
	{
		$conn = new PDO("mysql:host=".$dbhost.";charset=utf8mb4;dbname=".$dbname,$dbuser,$dbpasswd);
		//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		//$this->db = $db;
	
		//注意，使用PDO方式連結，需要指定一個資料庫，否則將拋出異常
		//$conn = new PDO($dsn,$dbuser,$dbpasswd);
		//$conn->exec("SET CHARACTER SET utf8");
		//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected Successfully";
	}
	catch(PDOException $e)
	{
		echo "Connection failed: ".$e->getMessage();
	}
	return $conn;
}
?>