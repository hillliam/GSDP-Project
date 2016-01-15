function delivPrice()
{
    document.getElementById("deliveryc").value = document.getElementById("delivery").value;
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
function disableTank()
{
    if (document.getElementById("tankCheck").checked) {

        $("#tankx").removeAttr("disabled", "disabled");

        $("#tanky").removeAttr("disabled", "disabled");

        $("#tankz").removeAttr("disabled", "disabled");
        $("tankxtype").removeClass("hidden");
        $("#tankbase").removeAttr("disabled", "disabled");
        $("#tankbase").prop("disabled", false);
        $("#tankxtype").prop("disabled", false);
        $("#tankytype").prop("disabled", false);
        $("#tankztype").prop("disabled", false);
        $("#tankside").prop("disabled", false);
    }
    else
    {
        $("#tankx").attr("disabled", "disabled");

        $("#tanky").attr("disabled", "disabled");

        $("#tankz").attr("disabled", "disabled");
        $("tankxtype").attr("disabled", "disabled");
        $("#tankbase").prop("disabled", true);
        $("#tankxtype").prop("disabled", true);
        $("#tankytype").prop("disabled", true);
        $("#tankztype").prop("disabled", true);
        $("#tankside").prop("disabled", true);
    }

}
function disableSump()
{
    if (document.getElementById("SumpCheck").checked) {

        $("#sumpx").removeAttr("disabled", "disabled");

        $("#sumpy").removeAttr("disabled", "disabled");

        $("#sumpz").removeAttr("disabled", "disabled");
        $("#tankbase").prop("disabled", false);
        $("#tankxtype").prop("disabled", false);
        $("#tankytype").prop("disabled", false);
        $("#tankztype").prop("disabled", false);
        $("#tankside").prop("disabled", false);
    }
    else
    {
        $("#sumpx").attr("disabled", "disabled");

        $("#sumpy").attr("disabled", "disabled");

        $("#sumpz").attr("disabled", "disabled");
        $("#sumpbase").prop("disabled", true);
        $("#sumpxtype").prop("disabled", true);
        $("#sumpytype").prop("disabled", true);
        $("#sumpztype").prop("disabled", true);
        $("#sumpside").prop("disabled", true);
    }

}
function options()
{
    if (document.getElementById("tankCheck").checked && document.getElementById("SumpCheck").checked) {
        start();
        sumpstart();
    }
    if (document.getElementById("tankCheck").checked) {
        start();
    }
    else if (document.getElementById("SumpCheck").checked) {
        sumpstart();
    }
    else
    {
        alert("You should select something?");
    }
    var lid = document.getElementById("lidtype").value;
    var cab = document.getElementById("cabinet").value;

}