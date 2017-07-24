<?php

class Query {
     private static $__instance = null;
     protected $__con;
     
        const DB_TYPE = 'mysql';
        const DB_HOST = 'localhost';
        const DB_NAME = 'ikigami_CRUD';
        const DB_USER = 'root';
        const DB_PASS = '';
        const GET_DB = 'crud';
        const GET_DB_LOG = 'user';
              

     function __construct() {
         try{
             $this->__con = new PDO(self::DB_TYPE.':host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
         } 
         catch (PDOException $ex) {
             die($ex->getMessage());
         }
     }

     public static function __getInstance(){
         if(!isset(self::$__instance)){
             self::$__instance = new Query();
         }
         return self::$__instance;
     }
     public function __rowCount($table,$column = array(),$operation = null){
            if(count($column)){
                $y = 1;
                $values = '';
                foreach($column as $column_data  => $column_info){
                    if($y < count($column)){
                       $values .= ' '. $column_data .' =  ? '. $operation . ' ';
                    }
                    else{
                        $values .=  ' '.$column_data . ' = ?';
                    }
                    $y++;
                }
                $sql = "SELECT * FROM $table WHERE $values";
                $query = $this->__con->prepare($sql);
                $x = 1;
                foreach ($column as $keys => $col_info){
                   $query->bindValue($x,$col_info);
                   $x++;
                }
                if($query->execute()){
                    return (int)$query->rowCount();
                }
            }
            else{
              $sql =  "SELECT * FROM $table";
              $query = $this->__con->prepare($sql);
              $query->execute();
              return (int)$query->rowCount();
            } 
	}
	public function __getInfo($table,$column = array(),$operation = null){
             if($column){
                    $y = 1;
                    $values = '';
                    foreach($column as $column_data  => $column_info){
                        if($y < count($column)){
                            $values .= ' '. $column_data .' =  ? '. $operation . ' ';
                        }
                        else{
                            $values .=  ' '.$column_data . ' = ?';
                        }
                        $y++;
                    }
                    $sql = "SELECT * FROM $table WHERE $values";
                    $query = $this->__con->prepare($sql);
                    $x = 1;
                    foreach ($column as $keys => $col_info){
                       $query->bindValue($x,$col_info);
                       $x++;
                    }
                    if($query->execute()){
                        return $query->fetchAll();
                    }
             }
             else{
                    $sql =  "SELECT * FROM $table";
                    $query = $this->__con->prepare($sql);
                    $query->execute();
                    return $query->fetchAll();
              }
	}
        public function __searchData($table,$column = array(),$operation = null){
            if(count($column)){
                $a = 1;
                $values = '';
                $column_info = array_keys($column);
                $array_to_push = array();
                $where = 'WHERE';
                 foreach($column_info as $column_data){
                    if($a < count($column)){
                        $values .= $column_data.' LIKE ? '. $operation . ' ';
                    }
                    else{
                        $values .= $column_data.' LIKE ?';
                    }
                    $a++;
                }
                $sql = "SELECT * FROM {$table} WHERE {$values} ";
                $query = $this->__con->prepare($sql);
                foreach($column as $column_info => $column_data){
                    $column_data_search = "%".$column_data."%";
                    array_push($array_to_push, $column_data_search);
                } 
                $query->execute($array_to_push);                   
                return $query->fetchAll();
            }
            return false;
        }
        public function __searchRow($table,$column = array(),$operation = null){
            if(count($column)){
                $a = 1;
                $values = '';
                $column_info = array_keys($column);
                $array_to_push = array();
                $where = 'WHERE';
                 foreach($column_info as $column_data){
                    if($a < count($column)){
                        $values .= $column_data.' LIKE ? '. $operation . ' ';
                    }
                    else{
                        $values .= $column_data.' LIKE ?';
                    }
                    $a++;
                }
                $sql = "SELECT * FROM {$table} WHERE {$values} ";
                $query = $this->__con->prepare($sql);
                foreach($column as $column_info => $column_data){
                    $column_data_search = "%".$column_data."%";
                    array_push($array_to_push, $column_data_search);
                } 
                $query->execute($array_to_push);                   
                return $query->rowCount();
            }
            return false;
        }
        
        
	public function __insertData($table,$info = array()){
             $x = 1;
            if(count($info)){
                $keys = array_keys($info);
                $values = '';
                foreach($info as $information) {
                    $values .= '?';
                    if($x < count($info)){   
                        $values .= ', ';
                    }
                    $x++;  
                }
                $data = "(".implode(',', $keys).")";
                $sql = "INSERT into {$table} {$data} VALUES ({$values})";
                $query = $this->__con->prepare($sql);
                $q = 1;
                foreach($info as $information => $data){
                  $query->bindValue($q, $data);
                  $q++;
                }
                if($query->execute()){
                   return true;
                }
                else{
                   return $sql;
                }  
            }
            return false;
        }
	public function __updateData($table,$prev_data,$prev_col,$info = array()){
            if(count($info)){
                $column = array_keys($info);
                $set = '';
                $x = 1;
                $y = 1;
                foreach($column as $data){
                    $set .= " {$data} = ? ";
                    if($x < count($info)){
                        $set .= ', ';
                    }
                    $x++;
                }    
                $sql = "UPDATE {$table} SET ".$set. "WHERE {$prev_col} = ? ";
                $query = $this->__con->prepare($sql);
                foreach($info as $i => $data){
                     $query->bindValue($y, $data);
                     $y++;
                }
                $query->bindValue(count($info) + 1, $prev_data);
                if($query->execute()){
                     return true; 
                  }
            }
            else{
                
            }
            
	}
	public function __deleteData($table,$id,$columnid){
            $sql = "DELETE FROM {$table} WHERE {$columnid} = :data";
            $query = $this->__con->prepare($sql);
            $query->execute(array(
                ':data' => $id
            ));
            if($query){
                return true;
            }
            else{
                return false;
            }
           
	}
}
