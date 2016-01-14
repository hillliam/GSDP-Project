var sidethinknesscost = 1; // holds the price after getprice(thickness) or getSprice(thickness)
var basethinknesscost = 1; // holds the price after getpolish(thickness) or getSpolish(thickness)
var sumpsidethicknesscost = 1;
var sumpbasethicknesscost = 1;
var sidepolishcost = 1;
function getsideprice(thickness)
{
    $.getJSON("support/getpricefromg.php?g=" + thickness, updatesideg);
}
function getbaseprice(thickness)
{
    $.getJSON("support/getpricefromg.php?g=" + thickness, updateg);
}
function getSsideprice(thickness)
{
    $.getJSON("support/getspricefromg.php?g=" + thickness, updatessideg);
}
function getSprice(thickness)
{
    $.getJSON("support/getspricefromg.php?g=" + thickness, updatesg);
}
function getsidepolish(thickness)
{
    $.getJSON("support/getpolishfromg.php?g=" + thickness, updatseg);
}
function updatesideg(glass)
{
    sidethinknesscost = glass[0].Price;
}
function updateg(glass)
{
    basethinknesscost = glass[0].Price;
}
function updatessideg(glass)
{
    sumpsidethinknesscost = glass[0].Price;
}
function updatesg(glass)
{
    sumpbasethinknesscost = glass[0].Price;
}
function updatseg(glass)
{
    result1cost = glass[0].PolishedEdge;
}
function getafrompostode(code)
{
    code = code.replace(/\s/g, '');
    $.getJSON("support/location.php?postcode=" + code, fillme);
}
function remove()
{
    $.getJSON("support/removeorder.php?g=",fillme);
}
function placeorder()
{
    var x = document.getElementById("tankx").value;
    var y = document.getElementById("tanky").value;
    var z = document.getElementById("tankz").value;
    var base = document.getElementById("tankbase").value;
    var side = document.getElementById("tankside").value;
    var sx = document.getElementById("sumpx").value;
    var sy = document.getElementById("sumpy").value;
    var sz = document.getElementById("sumpz").value;
    var sbase = document.getElementById("sumpbase").value;
    var sside = document.getElementById("sumpside").value;
    var lid = document.getElementById("lidtype").value;
    var frame = document.getElementById("cabinet").value;
    alert("support/addorder.php?tankx="+ x + "&tanky=" +y+ "&tankz=" +z+ "&sidethickness=" +side+ "&basethickness=" +base+ "&sumpx=" +sx+ "&sumpy=" +sy+ "&sumpz=" +sz+ "&sumpside=" +sside+ "&sumpbase=" +sbase+ "&lowiron="+ "0" + "&frametype=" + frame + "&lidtype=" + lid);
    $.getJSON("support/addorder.php?tankx="+ x + "&tanky=" +y+ "&tankz=" +z+ "&sidethickness=" +side+ "&basethickness=" +base+ "&sumpx=" +sx+ "&sumpy=" +sy+ "&sumpz=" +sz+ "&sumpside=" +sside+ "&sumpbase=" +sbase+ "&lowiron="+ "0" + "&frametype=" + frame + "&lidtype=" + lid, fillme);
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


