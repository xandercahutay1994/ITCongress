<?php
    include('../../models/StudentModel.php');
    $student = new StudentModel();
    $rows = json_encode($student -> getAllStudent());
    echo $rows;//echo json_encode($rows); 
    return $rows;
    
    
   
    
?>
