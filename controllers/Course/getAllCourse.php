<?php
    include('../../models/CourseModel.php');
    $course = new CourseModel();
    $rows = json_encode($course -> getAllCourse());
    echo $rows;//echo json_encode($rows); 
   // print_r($rows);
    return $rows;
   
  
    


    
?>