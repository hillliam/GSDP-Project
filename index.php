<?php
require "support/constants.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | fit filtration</title>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
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
            var result; // holds the price after getprice(thickness) or getSprice(thickness)
                    var result1; // holds the price after getpolish(thickness) or getSpolish(thickness)
                    function getprice(thickness)
                    {
                    $.getJSON("support/getpricefromg.php?g=" + thickness, updateg);
                    }
            function getSprice(thickness)
            {
            $.getJSON("support/getpricefromg.php?g=" + thickness, updateg);
            }
            function getpolish(thickness)
            {
            $.getJSON("support/getpolishfromg.php?g=" + thickness, updatseg);
            }
            function getSpolish(thickness)
            {
            $.getJSON("support/getpolishfromg.php?g=" + thickness, updatseg);
            }
            function updateg(glass)
            {
            result = glass.Thickness;
            }
            function updatseg(glass)
            {
            result1 = glass.PolishedEdge;
            }
            function getafrompostode(code)
            {
            $.getJSON("http://uk-postcodes.com/postcode/" + code + ".json", fillme);
            }
            function fillme(result)
            {
             //document.getElementById("customera1").value = ;
             //document.getElementById("customera2").value = ;
             //document.getElementById("customert").value = ;
             //document.getElementById("customerr").value = ;
            }
            function getadressfrompostcode()
            {
                var postcode = document.getElementById("customera").value;
                getafrompostode(postcode.replace(/\s/g, ''));
            }
            function start()
            {
            $("results").removeClass("hidden");
       var length = document.getElementById("tankx").value;
                var width = document.getElementById("tanky").value;
                var height = document.getElementById("tankz").value;
                var base = document.getElementById("tankbase").value;
                var side = document.getElementById("tankside").value;
                
                var sidePlatesCost = document.getItem("sidePlatesCost");
                var sidePlatesLowIron = (sidePlatesCost*0.47)/1.2;

                var baseCost = document.getItem("baseCost");
                var frontBackCost = document.getItem("frontBackCost");
    
                var glassSizes = ceil((length * 2.54)*10);
                var glassBaseWidth = ceil((width*2.54)*10);
/*glass sizes base cost = if (tank base == 6){
(glassSizesBaseLength * glassSizesBaseWidth) * ((GlasspricePersqm/1000)/1000)
} else if (tank base == 8){
(glassSizesBaseLength * glassSizesBaseWidth) * ((glassPricesPerSqM/1000)/1000)
(continue ad infintum based on tank base = glass size which defines the glass price perSqM) */
                var glassSizesBaseCost;
    			getprice(base)
                var glassPricesPerSqM = result;
                if ( base == 6 || base == 8)
                {
                    glassSizesBaseCost = (glassSizesBaseLength * glassBaseWidth) * ((glasspricePersqm / 1000)/1000);
                }
//Glass sizes Front/back length = roundup (tank length * 2.54) * 10
                var glassFrontLength = ceil((length*2.54)*10);
/*Glass Sizes front/back width = if (length = X){
(Tank height - X ) *2.54 * 10
} (changes, lots of vars)*/
                var userWidth = width;
                var glassFrontWidth = 559 - base; 
/*glass Sizes front/back cost = if (thickness  = X){
(front back width *  front back length) * (GlassPricesPerSqm/1000/1000) 
}y = glassPricesPerSqM
*/
                var glassFrontCost = glassFrontWidth * glassFrontLength ;
                var glassPriceLowIronFront = front * 0.47;
                var glassSilliconBracing = (baseCost + frontBackCost + sidePlatesCost)/3;

                var sideLength = 557 - (sides * 2)
                var sideWidth = frontBackWidth;
                var energyChargeRate = document.getItem("energyChargeRate");

                var energyBase = ((((length * width)/10000) * (base*2.5)) / 100);
                var energyFrontBack = ((((glassFrontLength*glassFrontWidth)/10000)*(side*2.5))/100);
                var energySides = ((((sideLength*sideWidth)/10000)*(side*2.5))/100)

                var energyCharge = ((energyBase + energyFrontBack + energySides) * energyChargeRate);
               

                var buildTimeCharge = (length + width + height) / 1.2;

                var markUpPercentage = document.getItem("markUpPercentage")
    var tradeMarkUpPercentage

                var markUpFit = (glassSizesBaseCost + GlassSizeFrontBackCost + glassSizeSiliconBracing + glassSizeSidePlateCost) * markUpPercentage;
                var tradeMarkUp = (glassSizesBaseCost + GlassSizeFrontBackCost + glassSizeSiliconBracing + glassSizeSidePlateCost) * tradeMarkUpPercentage
 
                var markUpTotal = markUpFit + tradeMarkUp;
                var shopEarns = (markUpFit + buildTimeCharge + glassSizesBaseCost + glassSizesFrontBackCost + glassSizeSidePlates + glassSiliconBracing + energyCharge) * tradeMarkUp; 
                var topBottomRails = ceil((length*2.54)*10+5);
                var topBottomRailsQty = 5;
                var leftRightRails = ceil((width*2.54)*10+5);
                var leftRightRailsQty = 5;
 
                var legs = 730;
                var legsQuantity = length/9;

                var sumpRails = leftRightRails;
                var sumpRailsQty = legsQty;

                var total50x25 = (topBottomRails*topBottomRailsQty)+(leftRightRails * leftRightRailsQty);
                var total25x25 = (legs*legsQuantity)+(sumpRails*sumpRailsQty);
                var frontBackGlassX2 = (ceil(length * 2.54)*10) * (ceil(height*2.540*10));
                var sidesGlassX2 = (((ceil(width*2.54)*10)-side*2) - 10) * (ceil(height*2.54)*10);
                var baseGlassX2 = (((ceil(width*2.54)*10)-side*2)-10) * ((((ceil(length*2.54)*10)-side*2)-10)/2)

                var glassSidePlatesCost = (sidePlatesLength * sidePlatesWidth) * glassPricesPerSqM;
                var LowIronFront = frontBackLowIron;
                var LowIronSide = glassCuttingSidePlatesLowIron;
                var total = ((Length * width) / 14) + ((length * width) / 45) + ((length * width) / 44) + ((length * width) / 54) + 3.5 * 6.50;
    
    var frameTradeMarkUp;
    var frameFitMarkUp;
                var MetalFrame = (total * frameTradeMarkUp) + (total * frameFitMarkUp) + total;
                var CladdedGloss = (length * width / glossBoards) * 21;
                var claddedWood = (length * width / woodBoards) * 14;
    
                document.getElementById("glassw").value = ((((baseLength * baseWidth) / 10000) * (base * 2.5)) / 100) + ((((front / backlength * (front + back + width))     / 10000) * (side * 2.5)) / 100) + ((((sideplateslength * sideplateswidth) / 10000) * (side * 2.5)) / 100);
                document.getElementById("totalw").value = ((glassWeight) + (glassWeight * 0.1)) * 7;
    
    
                var gallons = ((length / 12) * (height / 12) * (width / 12)) * 6.25;
                document.getElementById("gallonsw").value = gallons;
                var afterDisplacement = ((length / 12) + (height / 12) + (width / 12)) * 6.25 - (((length / 12) + (height / 12) + (width / 12)) * 6.25 * 0.1);
                calculatestat(afterDisplacement);
                document.getElementById("totalww").value = gallons * 4.55 + weightKilos;
    
               // var energyCharge = glassWeight * energyChargeAmount;
                var MarkUpCombined = markUpFitOnly;
                var GlassBracesSiliconEnergyCharge = glassSizesBaseCost + glassSizeFrontBackCost + GlassSizeSidePlatesCost + glassSizeSiliconBracingCost + glassSizeEnergyCharge;
                var BuildTimeCharge = GlassSizeBuildTimeCharge;
                document.getElementById("totalc").value = markUpCombined + GlassBracesSiliconEnergyCharge + BuildTimeCharge + shopEarns;
                document.getElementById("totalsc").value = (markUpCombined) + (glassBracesSiliconEnergyCharge) + (BuildTimeCharge / 2) + (shopEarns / 2);
                            }
                            function calculatestat(afterDisplacement)
                            {
                            document.getElementById("LiveRock").value = (afterDisplacement / 1.7);
                                    document.getElementById("fishStocking").value = afterDisplacement / 4;
                                    document.getElementById("turboSnail").value = afterDisplacement / 2;
                                    document.getElementById("hermet").value = afterDisplacement / 4;
                                    document.getElementById("Lighting").value = afterDisplacement * 4;
                            }
                            function acryliccab(length, width, acrylic)
                            {
                            var cabinetAllAcrylic = (length * width) / acrylic * 65;
                            }
                            function glosscab(length, width, woodboards)
                            {
                            var cabinetAllGloss = (lenght * width) / woodboards * 41;
                            }
                            function woodcab(length, width, woodboards)
                            {
                            var CabinetAllWood = (length * width) / woodboards * 27;
                            }
                            function WoodLid(length, width, woodBoard)
                            {
                            var pelmetWoodLid = (length * width) / woodBoard * 7;
                                    var pelmetWoodLidSump = pelmetWoodLid * 0.5;
                            }
                            function GlossLid(length, width, glossBoards)
                            {
                            var PelmetGlossLid = (length * width) / glossBoards * 11;
                                    var pelmetGlossLidSump = pelmetGlossLid * 0.5;
                            }
                            function validatethicness()
                            {
                            var x = document.getElementById("tankx").value;
                                    var y = document.getElementById("tanky").value;
                                    var z = document.getElementById("tankz").value;
                                    var base = document.getElementById("tankbase").value;
                                    var side = document.getElementById("tankside").value;
                                    var area = x * y;
                                    alert("unsafe thickness");
                            }
                            function validatesthicness()
                            {
                            var x = document.getElementById("tankx").value;
                                    var y = document.getElementById("tanky").value;
                                    var z = document.getElementById("tankz").value;
                                    var base = document.getElementById("tankbase").value;
                                    var side = document.getElementById("tankside").value;
                                    alert("unsafe thickness");
                            }
                            function validatesumpthicness()
                            {
                            var x = document.getElementById("sumpx").value;
                                    var y = document.getElementById("sumpy").value;
                                    var z = document.getElementById("sumpz").value;
                                    var base = document.getElementById("sumpbase").value;
                                    var side = document.getElementById("sumpside").value;
                                    var area = x * y;
                                    alert("unsafe thickness");
                            }
                            function validatesumpsthicness()
                            {
                            var x = document.getElementById("sumpx").value;
                                    var y = document.getElementById("sumpy").value;
                                    var z = document.getElementById("sumpz").value;
                                    var base = document.getElementById("sumpbase").value;
                                    var side = document.getElementById("sumpside").value;
                                    alert("unsafe thickness");
                            }
        </script>
    </head>
    <body class="jumbotron">
    <nav>
    <h1 class="jumbotron text-center">tank estimation software</h1>
    </nav>
        <!-- 
            This inserts the template_header PHP page right here and 
            runs any PHP code inside it
        -->
        <div id="mesure" class="container bg-warning">
            <p>Use of tank for: <select class="center-block dropdown-menu selectpicker" id="lifesystem" onChange="">
                    <option value="tropical">Tropical</option>
                    <option value="marine">Marine</option>
                    <option value="cold water">Cold water</option>
                </select>
            </p>
            <div id="tankm" class="container bg-warning">
                <p>Tank length:<input class="center-block" type="number" id="tankx"></p>
                <p>Tank width:<input class="center-block" type="number" id="tanky"></p>
                <p>Tank height:<input class="center-block" type="number" id="tankz"></p>
                <p>Base glass thickness: <select class="center-block selectpicker" id="tankbase" onChange="validatethicness()">
                        <?php
                        $arrays = query("select Thickness from GlassPrices");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it["Thickness"] . "\">" . $it["Thickness"] . "</option>";
                        endforeach;
                        ?>
                    </select></p>
                <p>Side glass thickness: <select class="center-block selectpicker" id="tankside" onChange="validatesthicness()">
                        <?php
                        $arrays = query("select Thickness from GlassPrices");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it["Thickness"] . "\">" . $it["Thickness"] . "</option>";
                        endforeach;
                        ?>
                    </select></p>
            </div>
            <div id="sumpm" class="container bg-warning">
                <p>Sump length:<input class="center-block text-muted" type="number" id="sumpx"></p>
                <p>Sump width:<input class="center-block" type="number" id="sumpy"></p>
                <p>Sump height:<input class="center-block" type="number" id="sumpz">
                <p>Base glass thickness: <select class="center-block selectpicker" id="sumpbase" onChange="validatesumpthicness()">
                        <?php
                        $arrays = query("select Thickness from GlassPrices");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it["Thickness"] . "\">" . $it["Thickness"] . "</option>";
                        endforeach;
                        ?>
                    </select></p>
                <p>Side glass thickness: <select class="center-block selectpicker" id="sumpside" onChange="validatesumpsthicness()">
                        <?php
                        $arrays = query("select Thickness from GlassPrices");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it["Thickness"] . "\">" . $it["Thickness"] . "</option>";
                        endforeach;
                        ?>
                    </select></p>
            </div>
            <p><button class="btn hvr-grow btn-success center-block" value="calculate" id="calculate" onclick="start();"><i class="fa fa-calculator fa-2x"></i> Calculate!</button></p>
        </div>
        <div id="options" class="container bg-warning">
            <p>Tank lid: <select class="center-block selectpicker" id="lidtype">
                    <?php
                    $arrays = query("select Type from FrameOptions");
                    foreach ($arrays as $it):
                        print "<option value=\"" . $it["Type"] . "\">" . $it["Type"] . "</option>";
                    endforeach;
                    ?>
                </select></p>
            <p>Sump lid: <select class="center-block  selectpicker" id="slidtype">
                    <?php
                    $arrays = query("select Type from FrameOptions");
                    foreach ($arrays as $it):
                        print "<option value=\"" . $it["Type"] . "\">" . $it["Type"] . "</option>";
                    endforeach;
                    ?>
                </select></p>
            <p>Cabinet under tank: <select class="center-block selectpicker" id="cabinet">
                    <?php
                    $arrays = query("select Type from FrameOptions");
                    foreach ($arrays as $it):
                        print "<option value=\"" . $it["Type"] . "\">" . $it["Type"] . "</option>";
                    endforeach;
                    ?>
                </select></p>
        </div>
        <div id="results" class="container hidden bg-warning">
            <p>Amount of Rock (Kg):<input class="center-block" type="number" id="LiveRock"></p>
            <p>Fish Stocking (Inches): <input class="center-block" type="number" id="fishStocking"></p>
            <p>Turbo Snails to keep tank clean (Kg):<input class="center-block" type="number" id="turboSnail"></p>
            <p>Hermets in Tank (Kg):<input class="center-block" type="number" id="hermet"></p>
            <p>Lighting Amount (Watts):<input class="center-block" type="number" id="Lighting"></p>
            <p>Glass weight (Kg):<input class="center-block" type="number" id="glassw"></p>
            <p>Total weight (Kg):<input class="center-block" type="number" id="totalw"></p>
            <p>Gallons of water it can hold:<input class="center-block" type="number" id="gallonsw"></p>
            <p>Total weight including water (Kg):<input class="center-block" type="number" id="totalww"></p>
            <p>Total cost of tank:<input class="center-block" type="number" id="totalc"></p>
            <p>Total cost of sump:<input class="center-block" type="number" id="totalsc"></p>
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
        </div>
        <hr/>
    </body>
</html>
