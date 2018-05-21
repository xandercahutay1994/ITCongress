<?php
    include('../../models/UserModel.php');
    $user = new UserModel();
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $ok = $user -> getUser('user_id',$user_id);   
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>EDIT USER</title>
    <link href="../../css/w3.css" rel="stylesheet"/>    
</head>
<body>
    <form method="POST">
        <div style="width:600px;margin-top:100px;margin-left:500px" class="w3-container w3-card-2 w3-grey w3-round">
            <center><h3> VIEW USER </h3></center>             
            </br>
            <?php 
            foreach($ok as $record){                
            ?>             
                <table>
                    <tr>
                        <td><label style="width:170px;margin-left:70px"> Fullname </label></td>
                        <td> <input type="text" disabled style="width:270px;margin-left:30px" name="fullname" class="w3-input w3-round w3-sand" value="<?php echo $record['user_fullname']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px">Email </label></td>
                        <td> <input type="text" disabled style="width:270px;margin-left:30px" class="w3-input w3-round w3-sand" name="email" value="<?php echo $record['user_email']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px">Password </label></td>
                        <td><input type="password" disabled style="width:270px;margin-left:30px" class="w3-input w3-round w3-sand" name="password" value="<?php echo $record['user_password']; ?>"/></td>
                    </tr>
                </table>
                </br>
                </br>
                <center><a href="http://localhost/itcongress/views/UserView.php"><img src="../../img/back.png" width="80px"></img></a></center>
                </br>
            <?php }?>
        </div>
    </form>
</body>
</html>
    