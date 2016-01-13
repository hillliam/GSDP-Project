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
                code = code.replace(/\s/g, '');
                $.getJSON("support/location.php?postcode=" + code, fillme);
            }
            function fillme(result)
            {
                if (result.country != "United Kingdom")
                {
                    alert("delivary not avalible");
                }
                else
                {
                    document.getElementById("customera1").value = result.street;
                    //document.getElementById("customera2").value = result.;
                    document.getElementById("customert").value = result.town;
                    document.getElementById("customerr").value = result.city;
                }
            }
            function getadressfrompostcode()
            {
                var postcode = document.getElementById("customera").value;
                getafrompostode(postcode.replace(/\s/g, ''));
            }
            function start()
            {
                $("#results").removeClass("hidden");
                var length = document.getElementById("tankx").value;
                var lengthtype = document.getElementById("tankxtype").value;
                if (lengthtype != "inches")
                {
                    if (lengthtype == "cm")
                    {
                        length = convertToCentimetresToInches(length);
                    }
                    else
                    {
                        length = convertToMilimetresToInches(length);
                    }
                }
                var width = document.getElementById("tanky").value;
                var widthtype = document.getElementById("tankytype").value;
                if (widthtype != "inches")
                {
                    if (widthtype == "cm")
                    {
                        width = convertToCentimetresToInches(width);
                    }
                    else
                    {
                        width = convertToMilimetresToInches(width);
                    }
                }
                var height = document.getElementById("tankz").value;
                var heighttype = document.getElementById("tankztype").value;
                if (heighttype != "inches")
                {
                    if (heighttype == "cm")
                    {
                        height = convertToCentimetresToInches(height);
                    }
                    else
                    {
                        height = convertToMilimetresToInches(height);
                    }
                }
                var base = document.getElementById("tankbase").value;
                var side = document.getElementById("tankside").value;
                getprice(side);
                var sidePlatesCost = result;
                var sidePlatesLowIron = (glassSidesCost * 0.47) / 1.2;
                getprice(base);
                var baseCost = result;
                var frontBackCost = sidePlatesCost * 2;

                var glassBaseWidth = Math.ceil((width * 2.54) * 10);
                /*glass sizes base cost = if (tank base == 6){
                 (glassSizesBaseLength * glassSizesBaseWidth) * ((GlasspricePersqm/1000)/1000)
                 } else if (tank base == 8){
                 (glassSizesBaseLength * glassSizesBaseWidth) * ((glassPricesPerSqM/1000)/1000)
                 (continue ad infintum based on tank base = glass size which defines the glass price perSqM) */

                getprice(base);
                var glassPricesPerSqM = result;
                getprice(side);
                var glassPricesPerSqmSide = result;
                
                var glassSidesCost = ((glassSideLength * glassFrontWidth) * glassPricesPerSqmSide)*2;
                var glassBaseCost = (glassFrontLength * glassBaseWidth) * glassPricesPerSqM;
                var glassFrontCost = ((glassFrontWidth * glassFrontLength) * glassPricesPerSqmSide)*2;
                //if (base == 6 || base == 8) //FIXME: scot
                //{
                //    glassSizesBaseCost = (glassSizesBaseLength * glassBaseWidth) * ((glassPricesPerSqM / 1000) / 1000);
                //}
                //Glass sizes Front/back length = roundup (tank length * 2.54) * 10
                var glassFrontLength = Math.ceil((length * 2.54) * 10);
                /*Glass Sizes front/back width = if (length = X){
                 (Tank height - X ) *2.54 * 10
                 } (changes, lots of vars)*/
                var userWidth = width;
                var glassFrontWidth = Math.ceil((height*2.54)*10) - base;
                /*glass Sizes front/back cost = if (thickness  = X){
                 (front back width *  front back length) * (GlassPricesPerSqm/1000/1000) 
                 }y = glassPricesPerSqM
                 */

                var glassPriceLowIronFront = (glassFrontCost * 0.47)/1.2;
                var glassSilliconBracing = (glassSidesCost + glassFrontCost + glassBaseCost) / 3;

                var sideLength = height - (side * 2 - 2);
                var sideWidth = userWidth * 2;
                var energyChargeRate = 0.28;

                var energyCharge = (glassWeight * energyChargeRate);

                var buildTimeCharge = (length + width + height) / 1.2;

                var markUpPercentage = 0.41;
                var tradeMarkUpPercentage = 0.25;

                var markUpFit = (glassSidesCost + glassFrontCost + glassBaseCost + glassSilliconBracing) * markUpPercentage;
                var tradeMarkUp = (glassSidesCost + glassFrontCost + glassBaseCost + glassSilliconBracing) * tradeMarkUpPercentage;

                var markUpTotal = markUpFit + tradeMarkUp;
                var shopEarns = (markUpFit + buildTimeCharge + glassSidesCost + glassSilliconBracing + glassPricesPerSqM + energyCharge) * tradeMarkUp;
                
                
                
                // YOOOO RIGHT HERE//
                
                
                
                var topBottomRails = Math.ceil((length * 2.54) * 10 + 5);
                var topBottomRailsQty = 5;
                var leftRightRails = Math.ceil((width * 2.54) * 10 + 5);
                var leftRightRailsQty = 5;

                var legs = 730;
                var legsQuantity = length / 9;

                var sumpRails = leftRightRails;
                var sumpRailsQty = legsQuantity;
                
                var glassSideLength = ((width*2.54)*10)- ((side*2)+2);

                var total50x25 = (topBottomRails * topBottomRailsQty) + (leftRightRails * leftRightRailsQty);
                var total25x25 = (legs * legsQuantity) + (sumpRails * sumpRailsQty);
                var frontBackGlassX2 = (Math.ceil(length * 2.54) * 10) * (Math.ceil(height * 2.540 * 10));
                var sidesGlassX2 = (((Math.ceil(width * 2.54) * 10) - side * 2) - 10) * (Math.ceil(height * 2.54) * 10);
                var baseGlassX2 = (((Math.ceil(width * 2.54) * 10) - side * 2) - 10) * ((((Math.ceil(length * 2.54) * 10) - side * 2) - 10) / 2)
                var frontWeight = ((((glassFrontLength * glassFrontWidth)/10000) * (side * 2.5)) / 100);
                var sideWeight = ((((glassSideLength * glassFrontWidth) / 10000) * (side * 2.5)) / 100);
                var baseWeight = ((((((length*2.54)*10) * ((width*2.54)*10)) / 10000) * (base * 2.5)) / 100);
                var glassWeight = frontWeight + sideWeight + baseWeight;
                var glassSidePlatesCost = (length * width) * glassPricesPerSqM;
                var total = ((length * width) / 14) + ((length * width) / 45) + ((length * width) / 44) + ((length * width) / 54) + 3.5 * 6.50;

                var frameTradeMarkUp;
                var frameFitMarkUp;
                var MetalFrame = (total * frameTradeMarkUp) + (total * frameFitMarkUp) + total;

                document.getElementById("glassw").value = glassWeight;
                document.getElementById("totalw").value = ((glassWeight) + (glassWeight * 0.1)) + 7;

                var gallons = ((length / 12) * (height / 12) * (width / 12)) * 6.25;
                document.getElementById("gallonsw").value = gallons;
                var afterDisplacement = gallons - (gallons * 0.1);
                document.getElementById("displacment").value = afterDisplacement;
                calculatestat(afterDisplacement);
                document.getElementById("totalww").value = (gallons * 4.55) + (((glassWeight) + (glassWeight * 0.1)) + 7);

                var MarkUpCombined = markUpTotal;
                var glassSizeSiliconBracingCost =4.50;
                var glassSizeEnergyCharge = 4.50;
                var GlassBracesSiliconEnergyCharge = glassSidesCost + glassFrontCost + glassBaseCost + glassSizeSiliconBracingCost + glassSizeEnergyCharge;
                document.getElementById("totalc").value = MarkUpCombined + GlassBracesSiliconEnergyCharge + buildTimeCharge + shopEarns;
                document.getElementById("totalsc").value = (MarkUpCombined) + (GlassBracesSiliconEnergyCharge) + (buildTimeCharge / 2) + (shopEarns / 2);
            }
            function calculatestat(afterDisplacement)
            {
                document.getElementById("LiveRock").value = (afterDisplacement / 1.7);
                document.getElementById("fishStocking").value = afterDisplacement / 4;
                document.getElementById("turboSnail").value = afterDisplacement / 2;
                document.getElementById("hermet").value = afterDisplacement / 4;
                document.getElementById("Lighting").value = afterDisplacement * 4;
            }
            function cladwood(length, width, glossBoards)
            {
                return (length * width / glossBoards) * 21;
            }
            function clasgloss(length, width, woodBoards)
            {
                return (length * width / woodBoards) * 14;
            }
            function acryliccab(length, width, acrylic)
            {
                return (length * width) / acrylic * 65;
            }
            function glosscab(length, width, woodboards)
            {
                return (length * width) / woodboards * 41;
            }
            function woodcab(length, width, woodboards)
            {
                return (length * width) / woodboards * 27;
            }
            function WoodLid(length, width, woodBoard)
            {
                var pelmetWoodLid = (length * width) / woodBoard * 7;
                var pelmetWoodLidSump = pelmetWoodLid * 0.5;
            }
            function GlossLid(length, width, glossBoards)
            {
                var PelmetGlossLid = (length * width) / glossBoards * 11;
                var pelmetGlossLidSump = PelmetGlossLid * 0.5;
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
            <p>Use of tank for: <select class="center-block selectpicker" id="lifesystem">
                    <option value="tropical">Tropical</option>
                    <option value="marine">Marine</option>
                    <option value="cold water">Cold water</option>
                </select>
            </p>
            <div id="tankm" class="container bg-warning">
                <p>Tank length:<input class="" type="number" id="tankx">
                    <select class="selectpicker" id="tankxtype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches">inches</option>
                    </select></p>
                <p>Tank width:<input class="" type="number" id="tanky"> <select class="selectpicker" id="tankytype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches">inches</option>
                    </select></p>
                <p>Tank height:<input class="" type="number" id="tankz"> <select class="selectpicker" id="tankztype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches">inches</option>
                    </select></p>
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
                <p>Sump length:<input class="text-muted" type="number" id="sumpx"><select class="selectpicker" id="sumpxtype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches">inches</option>
                    </select></p>
                <p>Sump width:<input class="" type="number" id="sumpy"><select class="selectpicker" id="sumpytype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches">inches</option>
                    </select></p>
                <p>Sump height:<input class="" type="number" id="sumpz"><select class="selectpicker" id="sumpztype">
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                        <option value="inches">inches</option>
                    </select></p>
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
                <option value="none">None</option>       
                <?php
                    $arrays = query("select Type from FrameOptions");
                    foreach ($arrays as $it):
                        print "<option value=\"" . $it["Type"] . "\">" . $it["Type"] . "</option>";
                    endforeach;
                    ?>
                </select></p>
            <p>Sump lid: <select class="center-block  selectpicker" id="slidtype">
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
        </div>
        <div id="results" class="container hidden bg-warning">
            <p>After displacment (Kg):<input class="" type="number" id="displacment"></p>
            <p>Amount of Rock (Kg):<input class="" type="number" id="LiveRock"></p>
            <p>Fish Stocking (Inches): <input class="" type="number" id="fishStocking"><select class="selectpicker" id="tankbase">
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                    <option value="inches">inches</option>
                </select></p>
            <p>Turbo Snails to keep tank clean (Kg):<input class="" type="number" id="turboSnail"></p>
            <p>Hermets in Tank (Kg):<input class="" type="number" id="hermet"></p>
            <p>Lighting Amount (Watts):<input class="" type="number" id="Lighting"></p>
            <p>Glass weight (Kg):<input class="" type="number" id="glassw"></p>
            <p>Total weight (Kg):<input class="" type="number" id="totalw"></p>
            <p>Gallons of water it can hold:<input class="" type="number" id="gallonsw"></p>
            <p>Total weight including water (Kg):<input class="" type="number" id="totalww"></p>
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
