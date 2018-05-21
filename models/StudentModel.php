<?php

    include('db/DBHelper.php');
    class StudentModel extends DBHelper{
        private $table = "tbl_student";
        private $fields = array(
            'student_id',
            'student_idno',
            'student_familyname',
            'student_givenname',
            'student_course_id',
            'student_level',
            'student_tshirt',
            'student_ticket',
            'student_attended',
            'student_card_code',
            'student_tshirt_size'
        );

        //constructor
        function __construct()                             { DBHelper:: __construct();}
        function addStudent($data)                         { return  DBHelper :: register($this->table,$this->fields,$data);}
        function getAllStudent()                           { return  DBHelper :: getAllRecords($this->table);}
        function getStudent($field,$data)                  { return  DBHelper :: getRecord($this->table,$field,$data);}
        function deleteStudent($field,$id)                 { return DBHelper :: deleteRecord($this->table,$field,$id);}
        function edit($fields,$data,$field_id,$ref_id)     { return DBHelper :: updateRecord($this->table,$fields,$data,$field_id,$ref_id);}
        function searchName()                              { return  DBHelper :: search($this->table);}
        function courseCode($field_id,$ref_id)             { return  DBHelper :: joinToGetCourseCode($this->table,$field_id,$ref_id);}
        function deleteForeignPayment($field,$id)          { return DBHelper :: deleteForeignRecord($field,$id);}
    }//end of class     

?>