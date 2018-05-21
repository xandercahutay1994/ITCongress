<?php
    include('db/DBHelper.php');
    class UserModel extends DBHelper{
        private $table = "tbl_user";
        private $fields = array(
            'user_id',
            'user_fullname',
            'user_email',
            'user_password'
        );

        //constructor
        function __construct()                          { DBHelper:: __construct();}
        function addUser($data)                         { return  DBHelper :: register($this->table,$this->fields,$data);}
        function getAllUser()                           { return  DBHelper :: getAllRecords($this->table);}
        function getUser($field,$data)                  { return  DBHelper :: getRecord($this->table,$field,$data);}
        function deleteUser($field,$id)                 { return DBHelper :: deleteRecord($this->table,$field,$id);}
        function edit($fields,$data,$field_id,$ref_id)  { return DBHelper :: updateRecord($this->table,$fields,$data,$field_id,$ref_id);}
      
    }//end of class     

?>