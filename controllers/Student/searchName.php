<?php

   include('../../models/StudentModel.php');
   
   $student = new StudentModel();

   $rows = $student -> searches('student_idno');
  // echo $rows;//echo json_encode($rows); 
  //return $rows;
  
   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
</head>
<body>
    <?php foreach($rows as $r):  ?>
    <input values="<?php $r['student_givenname'] ?>"/>
    <?php endforeach; ?>
   
</body>
</html>
