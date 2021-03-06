function sumpstart()
{
    $("#sresults").removeClass("hidden");
    $("#oresults").removeClass("hidden");
    var sumplength = eval(getslength());
    var sumpwidth = eval(getswidth());
    var sumpheight = eval(getshight());

    var sumpside = 4;
    var sumpbase = 12;

    var sidesPos = 1;
    var basepos = 0;
    if (sumpheight > 17 && sumpheight <= 27) {
        sidesPos = 2;
    }
    else if (sumpheight > 27 && sumpheight <= 30) {
        sidesPos = 3;
    }
    else if (sumpheight > 30)
    {
        for (var i = 30; i < sumpheight; i += 6)
        {
            sidesPos += 1;
            if (sidesPos == 7)
            {
                i = sumpheight;
            }
        }
    }
    if (eval(sglassarray[sidesPos].Thickness) >= 20) {
        basepos += 1;
    }
    if (sumpheight > 24) {
        sumpbase = 20;
    }

    sumpside = eval(sglassarray[sidesPos].Thickness);
    document.getElementById("sside").value = sumpbase;
    document.getElementById("sbase").value = sumpside;
    while (eval(sglassarray[basepos].Thickness) != sumpbase && sglassarray.length < basepos)
    {
        basepos++;
    }
    var sumpPricesPerSqM = (eval(sglassarray[basepos].Price) / 1000000);
    var sumpPricesPerSqmSide = (eval(sglassarray[sidesPos].Price) / 1000000);

    var sumpFrontWidth = Math.ceil((sumpheight * 2.54) * 10) - sumpbase;
    var sumpFrontLength = Math.ceil((sumplength * 2.54) * 10);
    var sumpSideLength = Math.ceil((sumpwidth * 2.54) * 10) - ((sumpside * 2) + 2);
    var sumpBaseWidth = Math.ceil((sumpwidth * 2.54) * 10);

    var sumpSidesCost = ((sumpSideLength * sumpFrontWidth) * sumpPricesPerSqmSide);
    var sumpBaseCost = ((sumpFrontLength * sumpBaseWidth) * sumpPricesPerSqM);
    var sumpFrontCost = ((sumpFrontWidth * sumpFrontLength) * sumpPricesPerSqmSide);

    var sumpSilliconBracing = (sumpSidesCost + sumpFrontCost + sumpBaseCost) / 3;

    var sumpFrontWeight = ((((sumpFrontLength * sumpFrontWidth) / 10000) * (sumpside * 2.5)) / 100);
    var sumpSideWeight = ((((sumpSideLength * sumpFrontWidth) / 10000) * (sumpside * 2.5)) / 100);
    var sumpBaseWeight = ((((((sumplength * 2.54) * 10) * ((sumpwidth * 2.54) * 10)) / 10000) * (sumpbase * 2.5)) / 100);
    var sumpWeight = sumpFrontWeight + sumpSideWeight + sumpBaseWeight;

    var sumpEnergyCharge = (sumpWeight * energyChargeRate);
    var sumpBuildTimeCharge = (sumplength + sumpwidth + sumpheight) / 1.2;

    var sumpTotalCharge = (sumpEnergyCharge + sumpFrontCost + sumpSidesCost + sumpBaseCost + sumpSilliconBracing);
    var sumpMarkUpFit = sumpTotalCharge * markUpPercentage;

    var sumpShopEarns = (sumpTotalCharge + sumpBuildTimeCharge + sumpMarkUpFit) * tradeMarkUpPercentage;
    var sumpRetailCost = (sumpShopEarns + sumpMarkUpFit + sumpBuildTimeCharge + sumpTotalCharge);
    document.getElementById("sglassw").value = sumpWeight.toFixed(2);
    document.getElementById("stotalw").value = (((sumpWeight) + (sumpWeight * 0.1)) + 7).toFixed(2);

    var gallons = ((sumplength / 12) * (sumpheight / 12) * (sumpwidth / 12)) * 6.25;
    document.getElementById("sgallonsw").value = gallons.toFixed(2);
    var afterDisplacement = gallons - (gallons * 0.1);
    document.getElementById("sdisplacment").value = afterDisplacement.toFixed(2);
    calculatesstat(afterDisplacement);
    var weight = (gallons * 4.55) + (((sumpWeight) + (sumpWeight * 0.1)) + 7);
    document.getElementById("stotalww").value = weight.toFixed(2);
    document.getElementById("totalsc").value = sumpRetailCost.toFixed(2);
}
function start()
{
    $("#results").removeClass("hidden");
    var length = eval(getlength());
    var width = eval(getwidth());
    var height = eval(gethight());
    var side = 4;
    var base = 12;

    var sidesPos = 1;
    var basepos = 0;
    if (height > 17 && height <= 27) {
        sidesPos = 3;
    }
    else if (height > 27 && height <= 30) {
        sidesPos = 4;
    }
    else if (height > 30)
    {
        for (var i = 30; i < height; i += 6)
        {
            sidesPos += 1;
            if (sidesPos == 7)
            {
                i = height;
            }
        }
    }
    if (eval(glassarray[sidesPos].Thickness) >= 20) {
        basepos += 1;
    }
    if (height > 24) {
        base = 20;
    }

    side = eval(glassarray[sidesPos].Thickness);
    document.getElementById("side").value = base;
    document.getElementById("base").value = side;
    while (eval(glassarray[basepos].Thickness) != base && glassarray.length < basepos)
    {
        basepos++;
    }

    /*glass sizes base cost = if (tank base == 6){
     (glassSizesBaseLength * glassSizesBaseWidth) * ((GlasspricePersqm/1000)/1000)
     } else if (tank base == 8){
     (glassSizesBaseLength * glassSizesBaseWidth) * ((glassPricesPerSqM/1000)/1000)
     (continue ad infintum based on tank base = glass size which defines the glass price perSqM) */

    var glassPricesPerSqM = (eval(glassarray[basepos].Price) / 1000000);
    var glassPricesPerSqmSide = (eval(glassarray[sidesPos].Price) / 1000000);

//if (base == 6 || base == 8) //FIXME: scot
    //{
    //    glassSizesBaseCost = (glassSizesBaseLength * glassBaseWidth) * ((glassPricesPerSqM / 1000) / 1000);
    //}
    //Glass sizes Front/back length = roundup (tank length * 2.54) * 10

    /*Glass Sizes front/back width = if (length = X){
     (Tank height - X ) *2.54 * 10
     } (changes, lots of vars)*/
    var glassFrontWidth = Math.ceil((height * 2.54) * 10) - base;
    var glassSideLength = Math.ceil((width * 2.54) * 10) - ((side * 2) + 2);
    var glassFrontLength = Math.ceil((length * 2.54) * 10);
    var glassBaseWidth = Math.ceil((width * 2.54) * 10);

    var glassSidesCost = ((glassSideLength * glassFrontWidth) * glassPricesPerSqmSide) * 2;
    var glassBaseCost = (glassFrontLength * glassBaseWidth) * glassPricesPerSqM;
    var glassFrontCost = ((glassFrontWidth * glassFrontLength) * glassPricesPerSqmSide) * 2;
    var sidePlatesLowIron = (glassSidesCost * 0.47) / 1.2;
 
    var frontWeight = ((((glassFrontLength * glassFrontWidth) / 10000) * (side * 2.5)) / 100);
    var sideWeight = ((((glassSideLength * glassFrontWidth) / 10000) * (side * 2.5)) / 100);
    var baseWeight = ((((((length * 2.54) * 10) * ((width * 2.54) * 10)) / 10000) * (base * 2.5)) / 100);
    var glassWeight = frontWeight + sideWeight + baseWeight;

    /*glass Sizes front/back cost = if (thickness  = X){
     (front back width *  front back length) * (GlassPricesPerSqm/1000/1000) 
     }y = glassPricesPerSqM
     */

    var glassPriceLowIronFront = (glassFrontCost * 0.47) / 1.2;
    var glassSilliconBracing = (glassSidesCost + glassFrontCost + glassBaseCost) / 3;
    document.getElementById("lowf").value = glassPriceLowIronFront;
    var energyCharge = (glassWeight * energyChargeRate);

    var buildTimeCharge = (length + width + height) / 1.2;


    var totalCharge = (energyCharge + glassFrontCost + glassSidesCost + glassBaseCost + glassSilliconBracing);

    var markUpFit = totalCharge * markUpPercentage;
    var tradeMarkUp = totalCharge * tradeMarkUpPercentage;

    var markUpTotal = markUpPercentage + tradeMarkUpPercentage;
    var shopEarns = (totalCharge + buildTimeCharge + markUpFit) * tradeMarkUpPercentage;

    var retailCost = (shopEarns + markUpFit + buildTimeCharge + totalCharge)

    // YOOOO RIGHT HERE//

    var topBottomRails = Math.ceil((length * 2.54) * 10 + 5);
    var topBottomRailsQty = 5;
    var leftRightRails = Math.ceil((width * 2.54) * 10 + 5);
    var leftRightRailsQty = 5;

    var legs = 730;
    var legsQuantity = length / 9;

    var sumpRails = leftRightRails;
    var sumpRailsQty = legsQuantity;

    var total50x25 = (topBottomRails * topBottomRailsQty) + (leftRightRails * leftRightRailsQty);
    var total25x25 = (legs * legsQuantity) + (sumpRails * sumpRailsQty);
    var frontBackGlassX2 = (Math.ceil(length * 2.54) * 10) * (Math.ceil(height * 2.540 * 10));
    var sidesGlassX2 = (((Math.ceil(width * 2.54) * 10) - side * 2) - 10) * (Math.ceil(height * 2.54) * 10);
    var baseGlassX2 = (((Math.ceil(width * 2.54) * 10) - side * 2) - 10) * ((((Math.ceil(length * 2.54) * 10) - side * 2) - 10) / 2)
    document.getElementById("cutf").value = frontBackGlassX2;
    document.getElementById("cuts").value = sidesGlassX2;
    document.getElementById("cutb").value = baseGlassX2;
    document.getElementById("t5").value = total50x25;
    document.getElementById("t2").value = total25x25;
    var glassSidePlatesCost = (length * width) * glassPricesPerSqM;
    
    document.getElementById("lows").value = glassSidePlatesCost;

    var frameTotalMetal = ((length * width) / 14);
    var frameTBBoards = ((length * width) / 45);
    var framePowder = ((length * width) / 44);
    var frameFeet = ((length * width) / 54);
    var frameBuildTime = 120;
    var total = frameTotalMetal + frameTBBoards + framePowder + frameFeet + frameBuildTime;

    var frameTradeMarkUp = 0.25;
    var frameFitMarkUp = 0.40;
    var MetalFrame = (total * frameTradeMarkUp) + (total * frameFitMarkUp) + total;
    document.getElementById("totalmframe").value = MetalFrame.toFixed(2);
    document.getElementById("totalwframe").value = woodcab(length, width, height, 2).toFixed(2);
    document.getElementById("glassw").value = glassWeight.toFixed(2);
    document.getElementById("totalw").value = (((glassWeight) + (glassWeight * 0.1)) + 7).toFixed(2);

    var gallons = ((length / 12) * (height / 12) * (width / 12)) * 6.25;
    document.getElementById("gallonsw").value = gallons.toFixed(2);
    var afterDisplacement = gallons - (gallons * 0.1);
    document.getElementById("displacment").value = afterDisplacement.toFixed(2);
    calculatestat(afterDisplacement);
    var weight = (gallons * 4.55) + (((glassWeight) + (glassWeight * 0.1)) + 7);
    document.getElementById("totalww").value = weight.toFixed(2);

    var MarkUpCombined = markUpTotal;
    var glassSizeSiliconBracingCost = 4.50;
    var glassSizeEnergyCharge = 4.50;
    var GlassBracesSiliconEnergyCharge = glassSidesCost + glassFrontCost + glassBaseCost + glassSizeSiliconBracingCost + glassSizeEnergyCharge;
    document.getElementById("gengg").value = GlassBracesSiliconEnergyCharge.toFixed(2);
    document.getElementById("totalc").value = retailCost.toFixed(2);
    document.getElementById("cw").value = cladwood(length, width, height, 2);
    document.getElementById("cg").value = clasgloss(length, width, height, 2);
}
function calculatestat(afterDisplacement)
{
    document.getElementById("LiveRock").value = (afterDisplacement / 1.7).toFixed(2);
    document.getElementById("fishStocking").value = (afterDisplacement / 4).toFixed(2);
    document.getElementById("turboSnail").value = (afterDisplacement / 2).toFixed(2);
    document.getElementById("hermet").value = (afterDisplacement / 4).toFixed(2);
    document.getElementById("Lighting").value = (afterDisplacement * 4).toFixed(2);
}
function calculatesstat(afterDisplacement)
{
    document.getElementById("sLiveRock").value = (afterDisplacement / 1.7).toFixed(2);
    document.getElementById("sfishStocking").value = (afterDisplacement / 4).toFixed(2);
    document.getElementById("sturboSnail").value = (afterDisplacement / 2).toFixed(2);
    document.getElementById("shermet").value = (afterDisplacement / 4).toFixed(2);
    document.getElementById("sLighting").value = (afterDisplacement * 4).toFixed(2);
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