<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>    
</head>
    <?php
    include('../../models/UserModel.php');
    $user = new UserModel();
    $message = "Error deleting";
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $ok = $user -> deleteUser('user_id',$user_id);
        echo "<span id='low'></span>";
        echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/UserView.php';},500);</script>";
        echo "<script>toastr.success('Deleted Successfully!');</script>";  
    }
?>
    
</html>