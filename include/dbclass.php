<?php 
class recordset
{
	var $result ;
	var $record_count ;
	var $position ;
	var $eof ;
	var $page_size ;
	var $conn;
    var $error_message = "";

	function __construct($sql = null, $data_array=array()) {
        try {
            $this->db = sql_conn();
			$stmt = $this->db->prepare($sql);
            $stmt->execute($data_array);
			$this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->record_count = count($this->result);
			$this->position = 0 ;
			$this->page_size = -1 ;
			$this->eof = ( $this->record_count == 0 ) ? true : false ;
            //return $stmt->fetchAll(PDO::FETCH_ASSOC); 
		} catch(PDOException $e) {
		    $this->error_message = '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	function absolutepage( $Page )
	{
		$this->position = $this->page_size * ( $Page - 1 ) ;
	}

	function page_count()
	{
		$return_value = $this->record_count / $this->page_size ;

		if( $this->record_count % $this->page_size > 0 ) $return_value ++ ;

		return $return_value ;
	}

	function move( $position )
	{
		$this->position = $position ;

		if( $this->position >= $this->record_count ) $this->eof = true ;
	}

	function movenext()
	{
			$this->position ++ ;

			if( $this->position >= $this->record_count ) $this->eof = true ;
	}

	function movefirst()
	{
			$this->position = 0 ;

			if( $this->record_count == 0 ) $this->eof = true ;
			else $this->eof = false ;
	}

	function field( $field_name)
	{
		$field_name = strtolower($field_name);
		if( $this->eof )
		{
			return "" ;
		}
		else
		{
			//mysqli_data_seek($this->result,$this->position);
			$line = array_change_key_case($this->result[$this->position]);
			return isset($line[$field_name])?$line[$field_name]:false; 
		}
	}

    /**
     * @return string
     * 取出物件內的錯誤訊息
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * @param string $error_message
     * 記下錯誤訊息到物件變數內
     */
    private function setErrorMessage($error_message)
    {
        $this->error_message = $error_message;
    }

    /**
     * 這段是『解構式』會在物件被 unset 時自動執行，裡面那行指令是切斷跟資料庫的連接
     */
    public function __destruct() {
        $this->db = null;
    }

    /**
     *關閉資料連接
     */
    public function close() {
        $this->db = null;
    }
}

class dbPDO {
    private $db;
    private $last_sql = "";
    private $last_id = 0;
    private $last_num_rows = 0;
    private $error_message = "";

    /**
     * 這段是『建構式』會在物件被 new 時自動執行，裡面主要是建立跟資料庫的連接，並設定語系是萬國語言以支援中文
     */
    public function __construct() {
        try {
            $this->db = sql_conn();
			/* $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
            $this->db = $db;    */     
        } catch(PDOException $e) {
            //show error
            echo '<p class="bg-danger">'.$e->getMessage().'</p>';
            exit;
        } 
    }

    /**
     * 這段是『解構式』會在物件被 unset 時自動執行，裡面那行指令是切斷跟資料庫的連接
     */
    public function __destruct() {
        $this->db = null;
    }

    /**
     *關閉資料連接
     */
    public function close() {
        $this->db = null;
    }

    /**
     * 這段用來執行 MYSQL 資料庫的語法，可以靈活使用
     */
    public function execute($sql = null, $data_array=array()) {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($data_array);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
		} catch(PDOException $e) {
		    $this->error_message = '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

    /**
     * 這段用來讀取資料庫中的資料，回傳的是陣列資料
     */
    public function query($sql = null, $data_array=array()){
        try {
			$stmt = $this->db->prepare($sql);
            $stmt->execute($data_array);
			$this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->record_count = count($this->result);
			$this->position = 0 ;
			$this->page_size = -1 ;
			$this->eof = ( $this->record_count == 0 ) ? true : false ;
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
		} catch(PDOException $e) {
		    $this->error_message = '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

    /**
     * 這段可以新增資料庫中的資料，並把最後一筆的 ID 存到變數中，可以用 getLastId() 取出
     */
    public function insert($table = null, $data_array = array()) {
        if($table===null)return false;
        if(count($data_array) == 0) return false;

        $tmp_col = array();
        $tmp_dat = array();
        foreach ($data_array as $key => $value) {
            $tmp_col[] = $key;
            $tmp_dat[] = ":$key";
            $prepare_array[":".$key] = $value;
        }
        $columns = join(",", $tmp_col);
        $data = join(",", $tmp_dat);

        $this->last_sql = "INSERT INTO " . $table . "(" . $columns . ")VALUES(" . $data . ")";
        $stmt = $this->db->prepare($this->last_sql);
        $stmt->execute($prepare_array);
        $this->last_id = $this->db->lastInsertId();
    }

    /**
     * 這段可以更新資料庫中的資料
     */
    public function update($table = null, $data_array = null, $key_column = null, $id = null, $add = null) {
        if($table == null)return false;
        if($id == null) return false;
        if($key_column == null) return false;
        if(count($data_array) == 0) return false;

        $setting_list = "";
		$i = 0;
        foreach ($data_array as $key => $value) {
			$i++;
			$setting_list .= $key . "=" . ':'.$key;
            if ($i < count($data_array)){
                $setting_list .= ",";
            }
		}
/* 		for ($xx = 0; $xx < count($data_array); $xx++) {
            list($key, $value) = each($data_array);
            $setting_list .= $key . "=" . ':'.$key;
            if ($xx != count($data_array) - 1){
                $setting_list .= ",";
            }
        } */
        $data_array[$key_column] = $id;
        $this->last_sql = "UPDATE " . $table . " SET " . $setting_list . " WHERE " . $key_column . " = " . ":".$key_column.$add;
        $stmt = $this->db->prepare($this->last_sql);                       
        $stmt->execute($data_array);
    }
    /**
     * 這段可以刪除資料庫中的資料
     */
    public function delete($table = null,$key_column = null,$data_array = array()) {
        if ($table===null) return false;
        if(! is_array($data_array)) return false;
        if($key_column===null) return false;

        $this->last_sql = "DELETE FROM $table WHERE ".$key_column;
        $stmt = $this->db->prepare($this->last_sql);
        $stmt->execute($data_array);
    }

    /**
     * @return string
     * 這段會把最後執行的語法回傳給你
     */
    public function getLastSql() {
        return $this->last_sql;
    }

    /**
     * @param string $last_sql
     * 這段是把執行的語法存到變數裡，設定成 private 只有內部可以使用，外部無法呼叫
     */
    private function setLastSql($last_sql) {
        $this->last_sql = $last_sql;
    }

    /**
     * @return int
     * 主要功能是把新增的 ID 傳到物件外面
     */
    public function getLastId() {
        return $this->last_id;
    }

    /**
     * @param int $last_id
     * 把這個 $last_id 存到物件內的變數
     */
    private function setLastId($last_id) {
        $this->last_id = $last_id;
    }

    /**
     * @return int
     */
    public function getLastNumRows() {
        return $this->last_num_rows;
    }

    /**
     * @param int $last_num_rows
     */
    private function setLastNumRows($last_num_rows) {
        $this->last_num_rows = $last_num_rows;
    }

    /**
     * @return string
     * 取出物件內的錯誤訊息
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * @param string $error_message
     * 記下錯誤訊息到物件變數內
     */
    private function setErrorMessage($error_message)
    {
        $this->error_message = $error_message;
    }
}

function execute_sql($sql=null,$data_array=array())
{
	try {
		$conn= sql_conn();
		$stmt = $conn->prepare($sql);
		$stmt->execute($data_array);
		return $stmt->fetchAll(PDO::FETCH_ASSOC); 
	} catch(PDOException $e) {
		$error_message = '<p class="bg-danger">'.$e->getMessage().'</p>';
		return $error_message ;
	}
}

?>