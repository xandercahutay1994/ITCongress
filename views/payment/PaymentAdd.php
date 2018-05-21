<?php
    include('../../models/StudentModel.php');
    $student = new StudentModel();
    $get = $student -> getAllStudent();   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Payment</title>
    <meta charset="utf-8" /> 
    <script type="text/javascript" src="../../js/angular.min.js"></script>
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <link href="../../css/w3.css" rel="stylesheet"/>
</head>
<body>
    <form method="POST" action="http://localhost/itcongress/controllers/Payment/registerPayment.php">
        <div style="width:600px;margin-top:90px;margin-left:500px;background-image:url('../../img/it15.png');" class="w3-container w3-card-2 w3-round" ng-app="app" ng-controller="ctrl">
            <br><center><img src="../../img/it24.png" width="130" /></center>
            </br></br>
            <table class="w3-table">
                <tr>
                    <td><label style="width:170px;margin-left:20px" class="w3-text-white">Student Names </label></td>
                    <td>
                        <select ng-model="selectedId" ng-options="u.student_givenname + ' ' + u.student_familyname | uppercase for u in student" style="width:320px;margin-left:20px" class="w3-input w3-round-medium w3-select"/>
                            <option ng-if="!selectedId" value="" label="Select Name" disabled selected="selected"></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="idno" value="{{selectedId.student_idno}}" style="height:30px;width:150px;margin-left:20px" class="w3-input w3-round-medium" placeholder="ID Number"></td>
                    <td><input type="hidden" name="stud_id" value="{{selectedId.student_id}}" style="height:30px;width:150px;margin-left:20px" class="w3-input w3-round-medium"></td>
                </tr>
                <tr>
                    <td><label style="width:170px;margin-left:60px" class="w3-text-white">Receipt ID  </label></td>
                    <td><input type="number" min="1" maxlength="11" style="width:320px;margin-left:20px" class="w3-input w3-hover-grey w3-round-medium" name="receipt_id" placeholder="Receipt ID..."/></td>
                </tr>
                <tr>
                    <td><label style="width:170px;margin-left:60px" class="w3-text-white">Tshirt </label></td>
                    <td>
                        <input type="text" min="1" style="width:150px;margin-left:20px" class="w3-input w3-hover-grey w3-round-medium" name="tshirt" value="" placeholder="Tshirt Price..."/></td>
                </tr>
                <tr>
                    <td><label style="width:170px;margin-left:60px" class="w3-text-white">Ticket </label></td>
                    <td><input type="text" min="1" style="width:150px;margin-left:20px" class="w3-input w3-round-medium w3-hover-grey" name="ticket" placeholder="Ticket Price..."/></td>
                </tr> 
                    </table>    
                    </br> 
                    <div class="w3-center">
                        <button type="submit" id="register" name="register" class="w3-btn w3-green w3-round w3-hover-grey"> Register </button>
                        &nbsp &nbsp<button type="submit" id="cancel" name="cancel" class="w3-btn w3-red w3-round w3-hover-grey"> Cancel </button>
                    </div>
                </br>
            </table>
        </div>
    </form>
    <script type="text/javascript">
            var app = angular.module("app",[]);
            app.controller("ctrl",function($http,$scope){
                $http({
                    url : 'http://localhost/itcongress/controllers/Student/search.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.student = response.data;
                });
                $http({
                   url : 'http://localhost/itcongress/controllers/Payment/getAllPayment.php',
                   method: 'GET'
                }).then(function(response){
                    $scope.payment = response.data;
                });
                $http({
                   url : 'http://localhost/itcongress/controllers/Payment/getPayment.php?stud',
                   method: 'GET'
                }).then(function(response){
                    $scope.payment = response.data;
                });
            }); 
            $('#cancel').click(function(){
                window.location='http://localhost/itcongress/views/PaymentView.php';
            });
    </script>
</body>
</html> 