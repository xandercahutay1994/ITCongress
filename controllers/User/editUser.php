<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>EDIT USER</title>
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>
    <link href="../../css/w3.css" rel="stylesheet"/>    
</head>
<?php
    include('../../models/UserModel.php');
    $user = new UserModel();
    $message="";
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $ok = $user -> getUser('user_id',$user_id);   
        if(isset($_POST['update'])){
            $fname = $_POST['fullname'];
            $email = $_POST['email'];
            $pword = $_POST['password'];
            if($fname == "" || $email == "" || $pword == "")
            {
                echo "<span id='low'></span>";
                echo "<script>toastr.error('Fill all fields please.....Error Updating User!');</script>";
                echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/controllers/User/editUser.php?user_id=$user_id';},1500);</script>";    
            }else{
                $oka = $user -> edit(array("user_fullname","user_email","user_password"),array($fname,$email,$pword),'user_id',$user_id);
                echo "<span id='low'></span>";
                echo "<script>toastr.success('User Updated!');</script>";
                echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/UserView.php';},1500);</script>";          
            } 
        }
    }
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/UserView.php';</script>";
    }
?>
<body>
    <form method="POST">
        <div style="width:600px;margin-top:100px;margin-left:500px;background-image:url('../../img/it23.jpg');" class="w3-container w3-khaki w3-card-2 w3-round">
            <center><h2 class="w3-text-white"> EDIT USER </h2></center>             
            </br>
            <?php 
                foreach($ok as $record){                
            ?>             
                <table>
                    <tr>
                        <td><label style="width:170px;margin-left:70px" class="w3-text-white"> Fullname </label></td>
                        <td> <input type="text" style="width:270px;margin-left:30px" name="fullname" class="w3-input w3-sand w3-round-medium" value="<?php echo $record['user_fullname']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px" class="w3-text-white">Email </label></td>
                        <td> <input type="text" style="width:270px;margin-left:30px" class="w3-input w3-sand w3-round-medium" name="email" value="<?php echo $record['user_email']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px" class="w3-text-white">Password </label></td>
                        <td><input type="password" style="width:270px;margin-left:30px" class="w3-input w3-sand w3-round-medium" name="password" value="<?php echo $record['user_password']; ?>"/></td>
                    </tr>
                </table>
                </br>
                </br>
            <?php }?>        
                <div class="w3-center">
                    <button type="submit" name="update" class="w3-btn w3-green w3-round w3-hover-grey"> Update </button>
                    &nbsp &nbsp<button type="submit" name="cancel" class="w3-btn w3-red w3-round w3-hover-grey"> Cancel </button>
                </div>
                </br>
        </div> 
    </form>
</body>
</html>
    