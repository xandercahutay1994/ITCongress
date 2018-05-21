<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <link rel="stylesheet" type="text/css" href="toastr-master/toastr.css" />
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="toastr-master/toastr.min.js"></script>
    <!-- <script type="text/javascript" src="toastr-master/toastr.js"></script> -->
    <!-- <script type="text/javascript" src="bootstrap-growl-master/jquery.bootstrap-growl.js"></script>
    <script type="text/javascript" src="bootstrap-growl-master/jquery.bootstrap-growl.min.js"></script>
         -->
</head>
<body>

    <input type="submit" id="click" value="Click">


    <script>
        $('#click').click(function(){
             toastr.success('Success','Nofitication',{        
           "timeout":'1000'
            })
        });
    </script>   
</body>
 
</html>