<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <meta charset="utf-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link href="../../css/w3.css" rel="stylesheet"/>
    <!-- <script src="main.js"></script> -->
</head>
<body>
<form method="POST" action="http://localhost/itcongress/controllers/User/registerUser.php">
    <div style="width:600px;margin-top:100px;margin-left:500px;background-image:url('../../img/it15.png');" class="w3-container w3-card-2 w3-round">
        <br>
        <center><img src="../../img/it10.png" width="130" /></center>
            </br>
            <table>
                <tr>
                    <td><label style="width:170px;margin-left:50px" class="w3-text-white">Full Name </label></td>
                    <td><input type="text" style="width:370px;margin-left:30px" class="w3-input w3-sand w3-round-medium" id="fullname" name="fullname" placeholder="Fullname..."/></td>
                </tr>
                <tr>
                    <td><label style="width:170px;margin-left:50px"  class="w3-text-white"class="w3-text-white">Email </label></td>
                    <td> <input type="text" style="width:370px;margin-left:30px" class="w3-input w3-sand w3-round-medium" name="email" placeholder="Email..."/></td>
                </tr>
                <tr>
                    <td><label style="width:170px;margin-left:50px" class="w3-text-white">Password </label></td>
                    <td><input type="password" style="width:370px;margin-left:30px" class="w3-input w3-sand w3-round-medium" name="password" placeholder="Password..."/></td>
                </tr>
            </table>
            </br>
            </br>
                <div class="w3-center">
                    <button type="submit" id="register" name="register" class="w3-btn w3-green w3-round w3-hover-grey"> Register </button>
                    &nbsp &nbsp<button type="submit" name="cancel" class="w3-btn w3-red w3-round w3-hover-grey"> Cancel </button>
                </div>
            </br>
    </div>
</form>
      
</body>
</html>