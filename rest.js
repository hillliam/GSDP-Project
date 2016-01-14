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


