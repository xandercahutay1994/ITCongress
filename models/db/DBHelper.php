<?php
    //abstraction
    class DBHelper{
        //properties
        private $hostname = '127.0.0.1';
        private $username = 'root';
        private $password = "";
        private $dbname = 'itcongress';
        private $conn;

        //constructor
        function __construct(){
            try{            
                $this->conn=new PDO("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
        }
        function register($table,$fields,$data){
            $ok = false;
            $flds = implode(',',$fields);
            $q = array();
            foreach($data as $d)$q[]="?"; 
            $plc = implode(',',$q);
            if(count($fields) == count($data)){
                try{
                    $stmt=$this->conn-> prepare("INSERT INTO $table($flds) VALUES($plc)");
                    $ok=$stmt->execute($data);
                }catch(PDOException $e){
                   echo $e->getMessage();
                } 
            }else echo "Fields and data didn't match"; 
            return $ok;
        }
        function getAllRecords($table){
            $rows;
            $sql = "SELECT * FROM $table";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
        function editRecord($table,$fields,$data,$field_id,$ref_id){
            $fld = implode("=?",$fields)."=?"; 
            $sql = "UPDATE $table SET $fld WHERE $field_id = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $ok=$stmt->execute(array($data));
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
       }
       function getRecord($table,$field_id,$ref_id){
            $rows;
            $sql = "SELECT * FROM $table WHERE $field_id=?";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }    
         function getAllStudentCourse($table,$field_id,$ref_id){
            // $sql = "SELECT tbl_course.course_code,tbl_course.course_id FROM tbl_course JOIN $table ON tbl_course.course_id = $table.$field_id WHERE tbl_course.course_id = $ref_id";
            $rows;
            $sql = "SELECT tbl_student.student_idno,tbl_student.student_level,tbl_student.student_givenname,tbl_student.student_familyname FROM tbl_student JOIN $table ON tbl_student.student_course_id = $table.$field_id WHERE tbl_student.student_course_id = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }    
       function updateRecord($table,$fields,$data,$field_id,$ref_id){
            $oka= false;
            $fld=implode("=?,",$fields)."=?";
            $sql="UPDATE $table SET $fld WHERE $field_id=$ref_id";
            try{
                $stmt=$this->conn->prepare($sql);
                $oka=$stmt->execute($data);
            }catch(PDOException $e){ echo $e->getMessage();}
                return $oka;
        }
        function getMaxId($table,$field){
            $rows;
            $sql = "SELECT max($field)+1 as max_id FROM $table";
            try{   
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($field));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
        function deleteRecord($table,$field_id,$ref_id){
            $ok = false;
            $get = "";
            $sql = "DELETE FROM $table WHERE $field_id=?";
            try{
                $stmt = $this->conn->prepare($sql);
                $ok = $stmt -> execute(array($ref_id));
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $ok;
        }
        function search($table){
            $sql = "SELECT * FROM $table";
            try{   
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
        function searchID($table,$field_id,$ref_id){
            $sql = "SELECT * FROM $table WHERE $field_id = $ref_id";
            try{   
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
        function searchGivenname($table,$field_id){
            $rows;
            $sql = "SELECT $field_id FROM $table";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($field_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
        function joinToGetCourseCode($table,$field_id,$ref_id){
            $rows;
            $sql = "SELECT tbl_course.course_code,tbl_course.course_id FROM tbl_course JOIN $table ON tbl_course.course_id = $table.$field_id WHERE tbl_course.course_id = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
        function joinToGetIdNum($table,$field_id,$ref_id){
            $rows;
            $sql = "SELECT tbl_student.student_idno,tbl_student.student_id FROM tbl_student JOIN $table ON tbl_student.student_id = $table.$field_id WHERE tbl_student.student_id = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
        function updateCertainRecords($fields,$data,$field_id,$ref_id){
            $oka= false;
            $fld=implode("=?,",$fields)."=?";
            $sql="UPDATE tbl_student SET $fld WHERE $field_id=$ref_id";
            try{
                $stmt=$this->conn->prepare($sql);
                $oka=$stmt->execute($data);
            }catch(PDOException $e){ echo $e->getMessage();}
                return $oka;
        }
        function deleteForeignRecord($field_id,$ref_id){
            $ok = false;
            $get = "";
            $sql = "DELETE FROM tbl_payment WHERE $field_id=?";
            try{
                $stmt = $this->conn->prepare($sql);
                $ok = $stmt -> execute(array($ref_id));
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $ok;
        }
    }
?>
