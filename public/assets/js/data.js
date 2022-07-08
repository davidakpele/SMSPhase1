//please dont mess with the code here
    $(document).ready(function($) {
        $("#Application__Type").change(function() {
            let ___ApplicationType = $("#Application__Type").val();
            const JavascriptHook = {
                "DataId": ___ApplicationType
            };
            let StringData = JSON.stringify(JavascriptHook);
            const Url = base_url+'PageController/RenderRequirementData'; // the url where we want to POST
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                dataType: 'JSON', //the type of data we are sending is json
                contentType: "application/json; charset=utf-8",
                data: StringData, // our data object
                url: Url, //the post destination
                processData: false, //false because the preprocessor are not trigger
                encode: true, //turn on json encoding
                crossOrigin: true, // true because we are sending data with ajax as json format to php
                async: true, //because we are expecting long data so we set the whole data  Asynchronous with means configuring our Ajax code
                crossDomain: true, //just in case we host the site
                headers: {
                    'Access-Control-Allow-Methods': '*',
                    "Access-Control-Allow-Credentials": true,
                    "Access-Control-Allow-Headers": "Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization",
                    "Access-Control-Allow-Origin": "*",
                    "Control-Allow-Origin": "*",
                    "cache-control": "no-cache",
                    'Content-Type': 'application/json'
                },
            }).done(function(response) {
                Responed = response.result;
                $('#Department__Type').empty();
                Responed.forEach(function(CallRecieve) {
                    $('#Department__Type').append('<option value="' + CallRecieve
                        .Child_id + '">' + CallRecieve.Child_name + '</option>')
                });
            }).fail((xhr, status, error) => {
                console.log('Oops...', 'Something went wrong with ajax !', 'error');
            });
        });
    });

    
//please dont mess with the code here
$(document).ready(function ($) {
    $("#App").change(function () {
        let ___ApplicationType = $("#App").val();
        const JavascriptHook =
            { "DataId": ___ApplicationType };
        let StringData = JSON.stringify(JavascriptHook);
        const Url = base_url+'PageController/RenderRequirementData'; // the url where we want to POST
        $.ajax({
            type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
            dataType: 'JSON',//the type of data we are sending is json
            contentType: "application/json; charset=utf-8",
            data: StringData,// our data object
            url: Url,//the post destination
            processData: false,//false because the preprocessor are not trigger
            encode: true,//turn on json encoding
            crossOrigin: true,// true because we are sending data with ajax as json format to php
            async: true, //because we are expecting long data so we set the whole data  Asynchronous with means configuring our Ajax code
            crossDomain: true, //just in case we host the site
            headers: 
                {
                    'Access-Control-Allow-Methods': '*',
                    "Access-Control-Allow-Credentials": true,
                    "Access-Control-Allow-Headers": "Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization",
                    "Access-Control-Allow-Origin": "*",
                    "Control-Allow-Origin": "*",
                    "cache-control": "no-cache",
                    'Content-Type': 'application/json'
                },
        }).done(function (response) {
            // This is to clear all existing data that display in the requirement box
            $('#RequirementDiv').empty();
            // ---
            if (response.Status == 2001) {
                Respone = response.result;
                $('#Program__Type').empty();
                Respone.forEach(function (CallRecieve) {
                    $('#Program__Type').append('<option value="' + CallRecieve.Child_id + '">' + CallRecieve.Child_name + '</option>')
                });
            }
        }).fail((xhr, status, error) => {
            console.log('Oops...', 'Something went wrong with ajax !', 'error');
        });
    });
});

$(document).ready(function ($) {
    $("#Program__Type").change(function () {
        let val1 = $("#Program__Type").val();
        let val2 = $("#App").val();
        const JavascriptHook =
            { "RestAPIDataId": val1, "ProgramId": val2,  };
        let StringData = JSON.stringify(JavascriptHook);
        const Url = base_url+'PagesController/RenderProgrammeList';
        $.ajax({
            type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            data: StringData,// our data object
            url: Url, // the url where we want to POST
            processData: false,
            encode: true,
            crossOrigin: true,
            async: true,
            crossDomain: true,
            headers:
                {
                    'Access-Control-Allow-Methods': '*',
                    "Access-Control-Allow-Credentials": true,
                    "Access-Control-Allow-Headers": "Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization",
                    "Access-Control-Allow-Origin": "*",
                    "Control-Allow-Origin": "*",
                    "cache-control": "no-cache",
                    'Content-Type': 'application/json'
                },
        }).done(function (response) {
            $('#RequirementDiv').empty();
            if (response.Status == 2001) {
                if (val2 == 1) {
                    Response = response.result;
                    Response.forEach(function (Fetch) {
                        $('#RequirementDiv').append('<h2 class="h-1" style="font-size: 18px">'
                        + Fetch.Child_name +
                        '</h2><br><h2>PROGRAMME OUTLINE:</h2><font size="3"><br /> <br /><h2>DURATION:</h2>'
                        + Fetch.Duration +
                        '<br /> <br /></font> <h3 class="h-1">' + Fetch.headerone + '</h3><br /><font size="2.5">' + Fetch.Subtext + ''
                        + Fetch.UTME )
                    });
                }else if (val2 == 2) {
                    Response = response.result;
                    Response.forEach(function (Fetch) {
                        $('#RequirementDiv').append('<h2 class="h-1" style="font-size: 18px">'
                        + Fetch.Child_name +
                        '</h2><br><h2>PROGRAMME OUTLINE:</h2><font size="3"><br /> <br /><h2>DURATION:</h2>'
                        + Fetch.Duration +
                        '<br /><br /></font> <h3 class="h-1">'
                        + Fetch.headerone +'</h3><br /><font size="2.5">'
                        + Fetch.Subtext +'<br /></font><br />'
                        + Fetch.UTME +'')
                    });
                } else if (val2 == 3) {
                    Response = response.result;
                    Response.forEach(function (Fetch) {
                        $('#RequirementDiv').append('<h2 class="h-1" style="font-size: 18px">'
                        + Fetch.Child_name +
                        '</h2><br><h2>PROGRAMME OUTLINE:</h2><font size="3"><br /> <br /><h2>DURATION:</h2>'
                        + Fetch.Duration +
                        '<br /> <br /></font> <h3 class="h-1">' + Fetch.headerone + '</h3><br /><font size="2.5">' + Fetch.Subtext + ' <br /></font><br /><h2>UTME</h2>'
                        + Fetch.UTME +
                        '</font><br /><br /><div><b>AND</b></div><br /><h2>WASSCE</h2>' + Fetch.WASSCE + '</font><br /> <br /><div><b>OR</b></div><br /><h2>NECO SSCE</h2>'
                        + Fetch.NECO_SSCE +
                        '<br /><br /><div><b>OR</b></div><br /> <h2>IGCSE</h2>' + Fetch.IGCSE + ' </font><br /><br />')
                    });
                }
            }
        }).fail((xhr, status, error) => {
            console.log('Oops...', 'Something went wrong with ajax...!', 'error');
        });
    });
}); 