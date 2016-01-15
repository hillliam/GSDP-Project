<?php
require "support/constants.php";
//phpinfo();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | fit filtration</title>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="conversion.js"></script>
        <script src="rest.js"></script>
        <script src="validation.js"></script>
        <script src="calculate.js"></script>
        <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.0.2/css/hover-min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.0.2/css/hover-min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
        <style type="text/css">
            .p {
                font-family: Arial, Helvetica, sans-serif;
                font-size: large;
                font-weight: bold;
                color: #000;
                background-color: #CCC;
            }
        </style>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
        <script>
            var markUpPercentage = <?php print Fit_Mark_up; ?>;
            var tradeMarkUpPercentage = <?php print Trade_Mark_up; ?>;
            var energyChargeRate = <?php print energyChargeRate; ?>;
            function login()
            {
                if (document.getElementById("user").value == "ping" && document.getElementById("pass").value == "pong")
                {
                    window.location.href = 'admin.php?g=1';
                }
                else
                {
                    alert("invalid login");
                    
                }
            }
        </script>
    </head>
    <body class="jumbotron">
        <nav>
            <h1 class="jumbotron text-center">login</h1>
        </nav>
        <!-- 
            This inserts the template_header PHP page right here and 
            runs any PHP code inside it
        -->
        <div id="login" class="container bg-warning">
            <form></form>
                <p>user name:<input class="center-block" type="text" id="user"></p>
                <p>password:<input class="center-block" type="password" id="pass"></p>
                <p><button class="btn hvr-grow btn-info center-block" value="order" onclick="login();">login</button></p>
            </form>
        </div>
        <hr/>
    </body>
</html>
