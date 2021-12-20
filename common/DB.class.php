<?php
class DB {
    public $connection;
    private $host;
    private $user;
    private $password;
    private $database;
    public $table;
    
    function __construct($host, $user, $password, $database) {
        $this->host       = $host;
        $this->user       = $user;
        $this->password   = $password;
        $this->database   = $database;
        $this->connection=mysqli_connect($this->host,$this->user,$this->password,$this->database);
        //$this->connection = mysqli_connect('localhost', 'giftpro_askvouge', 'ASk~MB$LIO*y', 'giftpro_askvogue');
        // Check connection
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //echo "Connected successfully";
    }
    //-----------------------------------------------------------------------------------------------------
    public function close() {
        try {
            mysqli_close($this->connection);
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    //-----------------------------------------------------------------------------------------------------
    public function insert($table,$rfields, $rvalues) {
        try {
            $this->table=$table;
            $fields = implode('`,`', $rfields);
            $values = implode("','", $rvalues);
            $sql    = 'INSERT INTO ' . $this->table . ' (`' . $fields . "`) VALUES ('" . $values . "')";
            
            // echo $sql; 
            // exit;
            
            $result = mysqli_query($this->connection, $sql);
            
            if ($result) {
                return $result;
            } else {
                return mysqli_error($this->connection);
            }
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    public function lastid() {
        try {
            return $result = mysqli_insert_id($this->connection);
            
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }

    //---------------------------------------------------------------------------------------
    public function update($table,$rfields, $rvalues, $rid) {
        try {
            $arraycnt = count($rfields);
            $upstring = '';
            $upstring .= $rfields[0] . '`="' . $rvalues[0] . '"';
            for ($i = 1; $i < $arraycnt; $i++) {
                $upstring .= ', `' . $rfields[$i] . '`="' . $rvalues[$i] . '" ';
            }
              $sql    = 'UPDATE `' . $table . '` SET `' .$upstring. ' WHERE id='.$rid;
            
            // echo $sql;
            // exit;
            $result = mysqli_query($this->connection, $sql);
            if ($result) {
                return $result;
            } else {
                return mysqli_error($this->connection);
            }
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function selectAllData($table) {
        try {
           $sql = 'select * from ' . $table;
            //echo $sql;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /****************************************************************************/  
    public function delete($table, $rid) {
        try {
            $sql    = 'DELETE FROM `'.$table.'` WHERE `id`=' . $rid;
            //echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            if ($result) {
                return $result;
            } else {
                return mysqli_error($this->connection);
            }
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /****************************************************************************/
    public function login($user,$pass) {
        try {
            $sql    = "SELECT * FROM `register` WHERE `email`='$email' AND `password`='$password' ";
           // echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    //----------------------------------------------------------------------------------------

    public function selectData($firstname,$password) {
        try {
            $sql    = "SELECT * FROM `test` WHERE `firstname`='$firstname' AND `password`='$password'";
            //echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            return $data = mysqli_fetch_assoc($result);
            //return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }

    //----------------------------------------------------------------------------------------
    
    public function countif($table,$f, $v) {
        try {
            $sql    = 'select count(*) phase1 from ' . $table . ' where ' . $f . '="' . $v . '"';
            // echo $sql;
            // exit;
            $result = mysqli_query($this->connection, $sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['phase1'];
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    //----------------------------------------------------------------------------------------
    public function countifs($table,$condition) {
        try {
            $this->table=$table;
            $sql    = 'select count(*) info from ' . $this->table . ' where ' . $condition;
            //echo $sql;
            $result = mysqli_query($this->connection, $sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['info'];
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function findall($table,$f, $v, $order = '') {
        try {
            $sql    = 'select * from ' . $table . ' where ' . $f . '="' . $v . '" ' . $order;
            //  echo $sql;
            //  exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }

     /***************************************************************************/
    public function selectdata1($table,$f, $v) {
        try {
            $sql    = 'select * from ' . $table . ' where ' . $f . '=' . $v ;
             // echo $sql;
             // exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function findallbyc($table,$f, $v, $order = '') {
        try {
            $sql    = "select * from " . $table . " where " . $f . "='" . $v . "order by id desc";
             // echo $sql;
             // exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    //----------------------------------------------------------------------------------------
    public function findwhere($table,$f, $v, $rid) {
        try {
            $sql="SELECT `$f` info FROM `$table` WHERE `$v`='$rid'";
            //echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['info'];
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function select($table,$rid = '') {
        try {
           $sql = 'select * from ' . $table;
            if ($rid != '') {
                $sql .= ' WHERE id=' . $rid . '  order by id desc';
            }
           // echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    
    /***************************************************************************/
    
    public function selectorderby($table,$f) {
        try {
            $sql = "SELECT * FROM `".$table."` WHERE `status`!='0' ORDER BY `".$f."`";
            //echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    //-------------------------------------------------------------------------------------------------------------------
    public function selectnotin($table,$table2,$fid,$rid = '') {
        try {
            $sql = "SELECT * FROM `".$table."` WHERE `id` not in(SELECT `".$fid."` FROM `".$table2."` WHERE `vendors_id`=". $rid.")";
            
            //echo $sql;
           // exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    //----------------------------------------------------------------------------------------
    public function findinfo($table,$f, $rid) {
        try {
            $sql    = 'select ' . $f . ' info from ' . $table . ' where id="' . $rid . '"';
            //echo $sql;
            $result = mysqli_query($this->connection, $sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['info'];
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
     
    //----------------------------------------------------------------------------------------
    public function findpageinfo($table,$f, $pid, $sid) {
        try {
            $sql    = 'select ' . $f . ' info from ' . $table . ' where page_id ="' . $pid . '" and site_id ="' . $sid . '"';
            //echo $sql;
            $result = mysqli_query($this->connection, $sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['info'];
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    
    //-------------------------------------------------------------------------------------------
    public function countrow($table) {
        try {
            $sql    = "select count(*) info from ". $table."  WHERE company_id = '".$_SESSION['company_id']. "'  order by id desc";
            // echo $sql;
            // exit;
            $result = mysqli_query($this->connection, $sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['info'];
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    //---------------------------------------------------------------------------------------------
     
    public function finddata($table,$f, $v, $rid) {
        try {
            $sql    = 'select ' . $f . ' info from ' . $table . ' where ' . $v . '="' . $rid . '"';
             //echo $sql;
            // die;
            $result = mysqli_query($this->connection, $sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['info'];
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
     /***********************************Select By Start****************************************/
    public function selectBy($table) {
        
        //$f= Where $f='$v'
        try {
           $sql = "select * from " . $table."  WHERE project_id = '".$_SESSION["school_id"]. "'  order by id desc";
            
            //echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    
    /**********************************Select By End*****************************************/
    //-------------------------------------------------------------------------------------------
    public function countrowcompany($table) {
        try {
            $sql    = "select count(*) info from ". $table."  order by id desc";
            // echo $sql;
            // exit;
            $result = mysqli_query($this->connection, $sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['info'];
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function findAllData($table,$f, $v) {
        try {
            $sql    = "select * from " . $table . " where " . $f . "='" . $v ;
             // echo $sql;
             // exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function displayCurrDate($table,$f) {
        try {
            $sql    = "select * from " . $table . " where " . $f . "=CURDATE()";
             // echo $sql;
             // exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
            
            
        }
    }
    /***************************************************************************/
    public function findAllValue($table) {
        try {
            $sql    = "select * from " . $table;
             // echo $sql;
             // exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
            
            
        }
    }
    //------------------------------------------------
    public function updatestatus($table,$field, $value, $rid) {
        try {
            $sql    = 'UPDATE `' . $table . '` SET `' . $field . '`= "' . $value . '" WHERE id=' . $rid;
            //echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            if ($result) {
                return $result;
            } else {
                return mysqli_error($this->connection);
            }
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function selectAllDataByStatus($table) {
        try {
            $sql = "select * from " . $table."  WHERE project_id = '".$_SESSION['school_id']. "'AND status= 1";
            //echo $sql;exit
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function selectCourseByStatus($table) {
        try {
            $sql = "select * from " . $table." WHERE project_id = '".$_SESSION['cid']. "' AND status= 1";
            //echo $sql;exit
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function FetchData($table,$table1,$p,$f,$v) {
        try {
            $sql = " select ".$table.".".$p." from " . $table. " inner join " .$table1. " on ".$table1.".".$f."=".$table.".".$v." WHERE ".$table.".project_id =".$table1.".project_id AND ".$table.".status = 1";
            //$sql="select sub_menus.sub_menu_name from sub_menus inner join menus on sub_menus.menu_id = menus.id";
            //echo $sql;exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    /***************************************************************************/
    public function selectByin($table,$f,$p) {
        
        //$f= Where $f='$v'
        try {
           $sql = "select * from " . $table."  WHERE ".$f."=".$p;
            //SELECT * FROM `employee` WHERE `id` in(1,2,3,4,5)
            //echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    
}
?>