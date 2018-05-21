<!doctype html>
<html>
    <head>
        <title> IT CONGRESS 2018 </title>
        <meta charset="utf-8"/>
        <link href = "../css/w3.css" rel="stylesheet"/>
        <script type="text/javascript" src="../js/angular.min.js"></script>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="w3-container" ng-app="app" ng-controller="ctrl">
            <h3> USER MANAGEMENT </h3>
            <span class="w3-right"><?php if(isset($message)){echo $message;}?></span>
            <div class="w3- tab w3-teal">
                <a href="UserView.php" class="w3-button">HOME</a>
                <a href="StudentView.php" class="w3-button">STUDENT</a>
                <a href="CourseView.php" class="w3-button">COURSE</a>
                <a href="PaymentView.php" class="w3-button">PAYMENT</a>
                <a href="ReportView.php" class="w3-button" >REPORT </a>
            </div>
            </br>
            <!-- <button onclick="document.getElementById('user').style.display='block'" name="add" > +ADD </button> -->
            <a href="../views/user/UserAdd.php" class="w3-button w3-round w3-large w3-blue">+ADD </a>
            <input type="text" ng-model="search" placeholder="SEARCH.." class="w3-padding w3-right"/> 
            </br></br>
            <table class="w3-table w3-responsive w3-striped w3-card-2 w3-bordered" >
                <tr>
                    <th class="w3-large w3-center" ng-repeat="h in header"> {{h}} </th>
                </tr>
                <tr ng-repeat="u in users | orderBy : 'user_fullname' | filter : search">
                    <td class="w3-center">{{u.user_id}}</td>
                    <td class="w3-center">{{u.user_fullname | uppercase}}</td>
                    <td class="w3-center">{{u.user_email}}</td>
                    <td class="w3-center">  <a href="../controllers/User/getUser.php?user_id={{u.user_id}}"> <img src="../img/view.png" width="28px" hspace="10" class="w3-image"></img></a>
                    <a href="../controllers/User/editUser.php?user_id={{u.user_id}}"><img src="../img/edit.png" width="28px" class="w3-image"></img></a>
                    <a href="../controllers/User/deleteUser.php?user_id={{u.user_id}}" onclick="return confirm('Are you sure');"><img src="../img/trash.png" width="28px"  hspace="" class="w3-image"></img></a></td>
                </tr>
            </table>
        </div>
        <script type="text/javascript">
            var app = angular.module("app",[]);
            app.controller("ctrl",function($http,$scope){
                $scope.header = ["USER ID","USER FULLNAME","USER EMAIL","ACTION"];
                $http({
                    url : 'http://localhost/itcongress/controllers/User/getAllUser.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.users = response.data;
            //      $scope.max = Math.min.apply(Math.$scope.data.map(function(users){return users.user_id;}));
                });
            });
        </script>
    </body>
</html>