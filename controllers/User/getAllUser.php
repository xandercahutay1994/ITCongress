<?php
    include('../../models/UserModel.php');
    $user = new UserModel();
    $rows = json_encode($user -> getAllUser());
    echo $rows;//echo json_encode($rows); 
    return $rows;
   
   







    


    
?>