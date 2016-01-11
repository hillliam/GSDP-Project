<?php
require "support/constants.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | fit filtration</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
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
            function start()
            {
                var length = document.getElementById("tankx").value;
                var width = document.getElementById("tanky").value;
                var height = document.getElementById("tankz").value;
                var base = document.getElementById("tankbase").value;
                var side = document.getElementById("tankside").value;
                
                var sidePlatesCost = document.getItem("sidePlatesCost");
                var sidePlatesLowIron = (sidePlatesCost*0.47)/1.2;

                var baseCost = document.getItem("baseCost");
                var frontBackCost = document.getItem("frontBackCost");
                var sidePlatesCost = document.getItem("sidePlatescost");
                var glassSizes = Math.round(((length * 2.54)*10));
                var glassBaseWidth = Math.round((width*2.54)*10);
/*glass sizes base cost = if (tank base == 6){
(glassSizesBaseLength * glassSizesBaseWidth) * ((GlasspricePersqm/1000)/1000)
} else if (tank base == 8){
(glassSizesBaseLength * glassSizesBaseWidth) * ((glassPricesPerSqM/1000)/1000)
(continue ad infintum based on tank base = glass size which defines the glass price perSqM) */
                var glassSizesBaseCost;
                var glassPricesPerSqM = (document.getitem("glassPricesPerSqM");
                if ( base == 6 || base == 8)
                {
                    glassSizesBaseCost = (glassSizesBaseLength * glassBaseWidth) * (glasspricePersqm/1000)/1000);
                }
//Glass sizes Front/back length = roundup (tank length * 2.54) * 10
                var glassFrontLength = Math.roundup((length*2.54)*10);
/*Glass Sizes front/back width = if (length = X){
(Tank height - X	) *2.54 * 10
} (changes, lots of vars)*/
                var userWidth = width;
                var glassFrontWidth = 559 - base; 
                var length;
/*glass Sizes front/back cost = if (thickness  = X){
(front back width *  front back length) * (GlassPricesPerSqm/1000/1000) 
}y = glassPricesPerSqM
*/
                glassFrontCost
                var glassPricesPerSqM = thickness
                glassFrontCost = glassFrontWidth * glassFrontLength ;
                var glassPriceLowIronFront = front * 0.47;
                var glassSilliconBracing = (baseCost + frontBackCost + sidePlatesCost)/3;

                var sides = document.getItem("sides");
                var frontBackLength = document.getItem("frontBackLength");
                var frontBackWidth = document.getItem("frontBackWidth");
                var sideLength = document.getItem("sideLength");
                var sideWidth = document.getItem("sideWidth");
                var energyChargeRate = document.getItem("energyChargeRate");

                var energyBase = ((((length * width)/10000) * (base*2.5)) / 100);
                var energyFrontBack = ((((frontBackLength*frontBackWidth)/10000)*(sides*2.5))/100);
                var energySides = ((((sideLength*sideWidth)/10000)*(sides*2.5))/100)

                var energyCharge = ((energyBase + energyFrontBack + energySides) * energyChargeRate);
                var energyChargeRate = document.getItem("energyChargeRate");

                var buildTimeCharge = (length + width + height) / 1.2;

                var markUpPercentage = document.getItem("markUpPercentage")

                var markUpFit = (glassSizeBaseCost + GlassSizeFrontBackCost + glassSizeSiliconBracing + glassSizeSidePlateCost) * markUpPercentage;
                var tradeMarkUp = document.getItem("tradeMarkUp")
 
                var markUpTotal = markUpFit + tradeMarkUp;
                var shopEarns = (markUpFit + buildTimeCharge + (glassSizesBaseCost + glassSizesFrontBackCost + glassSizeSidePlates +glassSiliconBracing + energyCharge) * tradeMarkUp; 
                var topBottomRails = ceil((length*2.54)*10+5);
                var topBottomRailsQty = 5;
                var leftRightRails = ceil((width*2.54)*10+5);
                var leftRightRailsQty = 5;
 
                var legs = 730;
                var legsQuantity = length/9;

                var sumpRails = leftRightRails;
                var sumpRailsQty = legsQty;

                var 50x25total = (topBottomRails*topBottomRailsQty)+(leftRightRails * leftRightRailsQty);
                var 25x25total = (legs*legsQuantity)+(sumpRails*sumpRailsQty);
                var frontBackGlassX2 = (ceil(length * 2.54)*10) * (ceil(height*2.540*10));
                var sidesGlassX2 = (((ceil(width*2.54)*10)-sides*2) - 10) * (ceil(height*2.54)*10);
                var baseGlassX2 = (((ceil(width*2.54)*10)-sides*2)-10) * ((((ceil(length*2.54)*10)-sides*2)-10)/2)

                var glassSidePlatesCost = (sidePlatesLength * sidePlatesWidth) ;
                var LowIronFront = frontBackLowIron;
                var LowIronSide = glassCuttingSidePlatesLowIron;
                var total = ((Length * width) / 14) + ((length * width) / 45) + ((length * width) / 44) + ((length * width) / 54) + 3.5 * 6.50;
                var MetalFrame = (total * TradeMarkUp) + (total * fitMarkUp) + total;
                var CladdedGloss = (length * width / glossBoards) * 21;
                var claddedWood = (length * width / woodBoards) * 14;
                var cabinetAllGloss = (lenght * width) / woodboards * 41;
                var cabinetAllAcrylic = (length * width) / acrylic * 65;
                document.getElementById("glassw").value = ((((baseLength * baseWidth) / 10000) * (base * 2.5)) / 100) + ((((front / backlength * (front + back + width)) / 10000) * (sides * 2.5)) / 100) + ((((sideplateslength * sideplateswidth) / 10000) * (sides * 2.5)) / 100);
                document.getElementById("totalw").value = ((glassWeight) + (glassWeight * 0.1)) * 7;
                var gallons = ((length / 12) * (height / 12) * (width / 12)) * 6.25;
                document.getElementById("gallonsw").value = gallons;
                var afterDisplacement = ((length / 12) + (height / 12) + (width / 12)) * 6.25 - (((length / 12) + (height / 12) + (width / 12)) * 6.25 * 0.1);
                calculatestat(afterDisplacement);
                document.getElementById("totalww").value = gallons * 4.55 + weightKilos;
                var energyCharge = glassWeight * energyChargeAmount;
                var MarkUpCombined = markUpFitOnly;
                var GlassBracesSiliconEnergyCharge = glassSizeBaseCost + glassSizeFrontBackCost + GlassSizeSidePlatesCost + glassSizeSiliconBracingCost + glassSizeEnergyCharge;
                var BuildTimeCharge = GlassSizeBuildTimeCharge;
                var ShopEarns = GlassSizeShopEarns;
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
    <body>
        <!-- 
            This inserts the template_header PHP page right here and 
            runs any PHP code inside it
        -->
        <div id="mesure">
            <p>use of tank for <select id="lifesystem" onChange="">
                    <option value="tropical">tropical</option>
                    <option value="marine">marine</option>
                    <option value="cold water">cold water</option>
                </select>
            </p>
            <div id="tankm">
                <p>tank length<input type="number" id="tankx"></p>
                <p> tank width<input type="number" id="tanky"></p>
                <p>tank height<input type="number" id="tankz"></p>
                <p>base glass thickness <select id="tankbase" onChange="validatethicness()">
                        <?php
                        $arrays = query("select Thickness from GlassPrices");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it . "\"" . $it . "</option>";
                        endforeach;
                        ?>
                    </select></p>
                <p>side glass thickness<select id="tankside" onChange="validatesthicness()">
                        <?php
                        $arrays = query("select Thickness from GlassPrices");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it . "\"" . $it . "</option>";
                        endforeach;
                        ?>
                    </select></p>
            </div>
            <div id="sumpm">
                <p>sump length<input type="number" id="sumpx"></p>
                <p>sump width<input type="number" id="sumpy"></p>
                <p>sump height<input type="number" id="sumpz">
                <p>base glass thickness<select id="sumpbase" onChange="validatesumpthicness()">
                        <?php
                        $arrays = query("select Thickness from GlassPrices");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it . "\"" . $it . "</option>";
                        endforeach;
                        ?>
                    </select></p>
                <p>side glass thickness<select id="sumpside" onChange="validatesumpsthicness()">
                        <?php
                        $arrays = query("select Thickness from GlassPrices");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it . "\"" . $it . "</option>";
                        endforeach;
                        ?>
                    </select></p>
            </div>
            <p><button id="calculate" onclick="start();"></button></p>
        </div>
        <div id="options" >
            <p>tank lid<select id="lidtype">
                        <?php
                        $arrays = query("select Type from FrameOptions");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it . "\"" . $it . "</option>";
                        endforeach;
                        ?>
                </select></p>
            <p>sump lid<select id="slidtype">
                        <?php
                        $arrays = query("select Type from FrameOptions");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it . "\"" . $it . "</option>";
                        endforeach;
                        ?>
                </select></p>
            <p>cabinet under tank<select id="cabinet">
                        <?php
                        $arrays = query("select Type from FrameOptions");
                        foreach ($arrays as $it):
                            print "<option value=\"" . $it . "\"" . $it . "</option>";
                        endforeach;
                        ?>
                </select></p>
        </div>
        <div id="results">
            <p>amount of Rock<input type="number" id="LiveRock"></p>
            <p>fish Stocking<input type="number" id="fishStocking"></p>
            <p>turbo Snails to keep tank clean<input type="number" id="turboSnail"></p>
            <p>hermets in tank<input type="number" id="hermet"></p>
            <p>lighting amount<input type="number" id="Lighting"></p>
            <p>glass weight<input type="number" id="glassw"></p>
            <p>total weight<input type="number" id="totalw"></p>
            <p>gallons of water it can hold<input type="number" id="gallonsw"></p>
            <p>total weight including water<input type="number" id="totalww"></p>
            <p>total cost of tank<input type="number" id="totalc"></p>
            <p>total cost of sump<input type="number" id="totalsc"></p>
        </div>
        <hr/>
    </body>
</html>
