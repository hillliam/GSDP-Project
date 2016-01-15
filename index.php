<?php
require "support/constants.php";
//phpinfo();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | Fit Filtration</title>
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
            getallprice();
            getsallprice();
        </script>
    </head>
    <body class="jumbotron">
        <nav>
            <h1 class="jumbotron text-center">Tank Estimation Software</h1>
        </nav>
        <!-- 
            This inserts the template_header PHP page right here and 
            runs any PHP code inside it
        -->
        <div id="mesure" class="container bg-warning">
            <p>Use of tank for: <select class="center-block selectpicker" id="lifesystem">
                    <option value="tropical">Tropical</option>
                    <option value="marine">Marine</option>
                    <option value="cold water">Cold water</option>
                </select>
            </p>
            <div id="tankm" class="container bg-warning">
                <input type="checkbox" id = "tankCheck" checked onChange="disableTank();"> I would like a tank<br>
                <p>Tank length:<input class="" type="number" id="tankx">
                    <select class="selectpicker" id="tankxtype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches" selected>inches</option>
                    </select></p>
                <p>Tank width:<input class="" type="number" id="tanky"> <select class="selectpicker" id="tankytype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches" selected>inches</option>
                    </select></p>
                <p>Tank height:<input class="" type="number" id="tankz"> <select class="selectpicker" id="tankztype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches" selected>inches</option>
                    </select></p>
                <p>Base glass thickness: <input class="" type="number" readonly="" id="side"></p>
                <p>Side glass thickness: <input class="" type="number" readonly="" id="base"></p>
            </div>
            <div id="sumpm" class="container bg-warning">
                <input type="checkbox" id = "SumpCheck" checked onChange="disableSump();"> I would like a sump<br>
                <p>Sump length:<input class="text-muted" type="number" id="sumpx"><select class="selectpicker" id="sumpxtype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches" selected>inches</option>
                    </select></p>
                <p>Sump width:<input class="" type="number" id="sumpy"><select class="selectpicker" id="sumpytype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches" selected>inches</option>
                    </select></p>
                <p>Sump height:<input class="" type="number" id="sumpz"><select class="selectpicker" id="sumpztype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches" selected="">inches</option>
                    </select></p>
                <p>Base glass thickness: <input class="" type="number" readonly="" id="sside"></p>
                <p>Side glass thickness: <input class="" type="number" readonly="" id="sbase"></p>
            </div>
            <p><button class="btn hvr-grow btn-success center-block" value="calculate" id="calculate" onclick="options();"><i class="fa fa-calculator fa-2x"></i> Calculate!</button></p>
        </div>
        <div id="options" class="container bg-warning">
            <p>low iron front: <input class="" type="checkbox" readonly="" id="lowf"></p>
            <p>low iron side: <input class="" type="checkbox" readonly="" id="lows"></p>
            <p>Tank lid: <select class="center-block selectpicker" id="lidtype">
                    <option value="none">None</option>       
                    <?php
                    $arrays = query("select Type from FrameOptions");
                    foreach ($arrays as $it):
                        print "<option value=\"" . $it["Type"] . "\">" . $it["Type"] . "</option>";
                    endforeach;
                    ?>
                </select></p>
            <p>Cabinet under tank: <select class="center-block selectpicker" id="cabinet">
                    <option value="none">None</option>       
                    <?php
                    $arrays = query("select Type from FrameOptions");
                    foreach ($arrays as $it):
                        print "<option value=\"" . $it["Type"] . "\">" . $it["Type"] . "</option>";
                    endforeach;
                    ?>
                </select></p>
            <p>frame type: <select class="center-block selectpicker" id="mattype"> 
                    <option value="wood" selected="">wood</option>
                    <option value="metal">metal</option>
                </select>
            </p>
        </div>
        <div id="results" class="container hidden bg-warning">
            <h2>tank mesurments</h2>
            <p>After displacment (Kg):<input class="" type="number" id="displacment"></p>
            <p>Amount of Rock (Kg):<input class="" type="number" id="LiveRock"></p>
            <p>Fish Stocking (Inches): <input class="" type="number" id="fishStocking"><select value="inches" class="selectpicker" id="fishbase" onchange="updatestocking();">
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                    <option value="inches" selected="">inches</option>
                </select></p>
            <p>Turbo Snails to keep tank clean (Kg):<input class="" type="number" id="turboSnail"></p>
            <p>Hermets in Tank (Kg):<input class="" type="number" id="hermet"></p>
            <p>Lighting Amount (Watts):<input class="" type="number" id="Lighting"></p>
            <p>Glass weight (Kg):<input class="" type="number" id="glassw"></p>
            <p>Total weight (Kg):<input class="" type="number" id="totalw"></p>
            <p>Gallons of water it can hold:<input class="" type="number" id="gallonsw"></p>
            <p>Total weight including water (Kg):<input class="" type="number" id="totalww"></p>
            <p>Total cost of tank:<input class="center-block" type="number" id="totalc"></p>
        </div>
        <div id="sresults" class="container hidden bg-warning">
            <h2>sump mesurments</h2>
            <p>After displacment (Kg):<input class="" type="number" id="sdisplacment"></p>
            <p>Amount of Rock (Kg):<input class="" type="number" id="sLiveRock"></p>
            <p>Fish Stocking (Inches): <input class="" type="number" id="sfishStocking"><select value="inches" class="selectpicker" id="fishbase" onchange="updatestocking();">
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                    <option value="inches" selected="">inches</option>
                </select></p>
            <p>Turbo Snails to keep tank clean (Kg):<input class="" type="number" id="sturboSnail"></p>
            <p>Hermets in Tank (Kg):<input class="" type="number" id="shermet"></p>
            <p>Lighting Amount (Watts):<input class="" type="number" id="sLighting"></p>
            <p>Glass weight (Kg):<input class="" type="number" id="sglassw"></p>
            <p>Total weight (Kg):<input class="" type="number" id="stotalw"></p>
            <p>Gallons of water it can hold:<input class="" type="number" id="sgallonsw"></p>
            <p>Total weight including water (Kg):<input class="" type="number" id="stotalww"></p>
            <p>Total cost of sump:<input class="center-block" type="number" id="totalsc"></p>
        </div>
        <div id="oresults" class="container hidden bg-warning">
            <h2>option prices</h2>
            <p>lid price £:<input class="" type="number" id="totallc"></p>
            <p>cabinet under the tank price £:<input class="center-block" type="number" id="totalcab"></p>
            <p>wood frame price £:<input class="center-block" type="number" id="totalframe"></p>
            <p>metal frame price £:<input class="center-block" type="number" id="totalmframe"></p>
        </div>
        <div id="delivary" class="container bg-warning">
            <p>Select the post code nearest to you:<select class="center-block selectpicker" id="delivary">
                    <?php
                    $arrays = query("select Postcode from Delivery");
                    foreach ($arrays as $it):
                        print "<option value=\"" . $it["Postcode"] . "\">" . $it["Postcode"] . "</option>";
                    endforeach;
                    ?>
                </select></p>
            <p>House number:<input class="center-block" type="number" id="housenum"></p>
            <p>Postcode to deliver to:<input class="center-block" type="text" id="customera"></p>
            <p><button class="btn hvr-grow btn-info center-block" value="get adress from postcode" onclick="getadressfrompostcode();"><i class="fa fa-home fa-2x"></i>Get address from postcode</button></p>
            <p>Address line 1:<input class="center-block" type="text" id="customera1"></p>
            <p>Address line 2:<input class="center-block" type="text" id="customera2"></p>
            <p>Town:<input class="center-block" type="text" id="customert"></p>
            <p>Region:<input class="center-block" type="text" id="customerr"></p>
            <p>Telephone number:<input class="center-block" type="tel" id="housepon"></p>
            <p><button class="btn hvr-grow btn-info center-block" value="order" onclick="placeorder();"><i class="fa fa-money"></i>place order</button></p>
        </div>
        <hr/>
    </body>
</html>
