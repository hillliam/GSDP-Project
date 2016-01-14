function validatethicness()
{
    var x = document.getElementById("tankx").value;
    var y = document.getElementById("tanky").value;
    var z = document.getElementById("tankz").value;
    var base = document.getElementById("tankbase").value;
    var side = document.getElementById("tankside").value;
    var area = x * y;
    getbaseprice(base);
    alert("unsafe thickness");
}
function delivPrice()
{
    document.getElementById("deliveryc").value = document.getElementById("delivery").value;
}
function validatesthicness()
{
    var x = document.getElementById("tankx").value;
    var y = document.getElementById("tanky").value;
    var z = document.getElementById("tankz").value;
    var base = document.getElementById("tankbase").value;
    var side = document.getElementById("tankside").value;
    getsideprice(side);
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
    getSprice(base);
    alert("unsafe thickness");
}
function validatesumpsthicness()
{
    var x = document.getElementById("sumpx").value;
    var y = document.getElementById("sumpy").value;
    var z = document.getElementById("sumpz").value;
    var base = document.getElementById("sumpbase").value;
    var side = document.getElementById("sumpside").value;
    getSsideprice(side);
    alert("unsafe thickness");
}

function getlength()
{
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
    return length;
}
function getslength()
{
    var sumplength = document.getElementById("sumpx").value;
    var sumplengthtype = document.getElementById("sumpxtype").value;
    if (sumplengthtype != "inches")
    {
        if (sumplengthtype == "cm")
        {
            sumplength = convertToCentimetresToInches(sumplength);
        }
        else
        {
            sumplength = convertToMilimetresToInches(sumplength);
        }
    }
    return sumplength;
}
function getwidth()
{
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
    return width;
}
function getswidth()
{
    var sumpwidth = document.getElementById("sumpy").value;
    var sumpwidthtype = document.getElementById("sumpytype").value;
    if (sumpwidthtype != "inches")
    {
        if (sumpwidthtype == "cm")
        {
            sumpwidth = convertToCentimetresToInches(sumpwidth);
        }
        else
        {
            sumpwidth = convertToMilimetresToInches(sumpwidth);
        }
    }
    return sumpwidth;
}
function gethight()
{
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
    return height;
}
function getshight()
{
    var sumpheight = document.getElementById("sumpz").value;
    var sumpheighttype = document.getElementById("sumpztype").value;
    if (sumpheighttype != "inches")
    {
        if (sumpheighttype == "cm")
        {
            sumpheight = convertToCentimetresToInches(sumpheight);
        }
        else
        {
            sumpheight = convertToMilimetresToInches(sumpheight);
        }
    }
    return sumpheight;
}
function updatestocking()
{
    var sumpheight = document.getElementById("fishStocking").value;
    var sumpheighttype = document.getElementById("fishbase").value;
    if (sumpheighttype != "inches")
    {
        if (sumpheighttype == "cm")
        {
            sumpheight = convertToCentimetresToInches(sumpheight);
        }
        else
        {
            sumpheight = convertToMilimetresToInches(sumpheight);
        }
    }
    document.getElementById("fishStocking").value = sumpheight;
}