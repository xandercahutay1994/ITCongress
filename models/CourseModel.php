<?php
    include('db/DBHelper.php');
    class CourseModel extends DBHelper{
    private $table = "tbl_course";
    private $fields = array(
        'course_id',
        'course_code',
        'course_name'
        );

        //constructor
        function __construct()                            { DBHelper:: __construct();}
        function addCourse($data)                         { return  DBHelper :: register($this->table,$this->fields,$data);}
        function getAllCourse()                           { return  DBHelper :: getAllRecords($this->table);}
        function getCourse($field,$data)                  { return  DBHelper :: getRecord($this->table,$field,$data);}
        function deleteCourse($field,$id)                 { return DBHelper :: deleteRecord($this->table,$field,$id);}
        function edit($fields,$data,$field_id,$ref_id)    { return DBHelper :: updateRecord($this->table,$fields,$data,$field_id,$ref_id);}   
        function getStudentCourse($field,$ref_id)         { return  DBHelper :: getAllStudentCourse($this->table,$field,$ref_id);} 

    }//end of class

?>