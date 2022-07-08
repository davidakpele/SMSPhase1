 $(document).ready(($) => {
        //hide messages
    $("#error").hide();
    $("#messagediv").hide();
    $("#AppRegistration").show();
    //on submit
    $('#AppRegistration').submit((e) => {
        e.preventDefault();
        $("#error").hide();
        $("#messagediv").hide();
        //validate the  now
        let StudentIdNo = $("#___NewStudentIdNo").val();
        if (StudentIdNo == "") {
            $("#error").fadeIn().text("Sorry...! Your ID Number Fail To Generate.");
            $("#Application__Type").focus();
            return false;
        }
        let EnrollmentNo = $("#EnrollmentNumber").val();
        if (EnrollmentNo == "") {
            $("#error").fadeIn().text("Sorry...! Your Enrollment Number Fail To Generate.");
            $("#EnrollmentNumber").focus();
            return false;
        }
        let App = $("select#Application__Type").val();
        if (App == "") {
            $("#error").fadeIn().text("Select Your Application Type.");
            $("select#Application__Type").focus();
            return false;
        }
        let Dpt = $("select#Department__Type").val();
        if (Dpt == "") {
            $("#error").fadeIn().text("Select Your Course Type.");
            $("select#Department__Type").focus();
            return false;
        }
        let Prg = $("#Program").val();
        if (Prg == "") {
            $("#error").fadeIn().text("Select Your Program For This Course.");
            $("#Program").focus();
            return false;
        }
        let Nin = $("#nin").val();
        if (Nin == "") {
            $("#error").fadeIn().text("Please Enter Your National Identification Number [NIN].");
            $("#nin").focus();
            return false;
        }
        let Ety = $("#EtyLevel").val();
        if (Ety == "") {
            $("#error").fadeIn().text("Select Your Entry Level.");
            $("#EtyLevel").focus();
            return false;
        }
        // Personal Data validation
        let su = $("#surname").val();
        if (su == "") {
            $("#error").fadeIn().text("Please Enter Your Surname.");
            $("#surname").focus();
            return false;
        }
        let othername = $("#othername").val();
        if (othername == "") {
            $("#error").fadeIn().text("Please Enter Your Othername.");
            $("#othername").focus();
            return false;
        }
        if (su == othername) {
            $("#error").fadeIn().text(
                "Unaccepted Data.. Please Surname can't be the same with your Othername.");
            $("#othername").focus();
            return false;
        }
        let Dob = $("#Date__of__birth").val();
        if (Dob == "") {
            $("#error").fadeIn().text("Please Provide Your Date Of Birth");
            $("#Date__of__birth").focus();
            return false;
        }
        let Gn = $("#gender").val();
        if (Gn == "") {
            $("#error").fadeIn().text("Please Select Your Gender.");
            $("#gender").focus();
            return false;
        }
        let email = $("#email").val();
        if (email == "") {
            $("#error").fadeIn().text("Please Enter Your Email Address.");
            $("#email").focus();
            return false;
        } else if (!Validemailfilter.test(email)) {
            $("#error").fadeIn().text(
                "Invaid Email Address..! Please Enter A Valid Email Address.");
            $("#email").focus();
            return false;
        } else if (!emailblockReg.test(email)) {
            $("#error").fadeIn().text(
                "Sorry..!! yahoo.com or hotmail.com is not allow, Please Use Another Email Address."
            );
            $("#email").focus();
            return false;
        }
        const HMACSHA256 = (stringToSign, secret) => "not_implemented";
        // The header typically consists of two parts: 
        // the type of the token, which is JWT, and the signing algorithm being used, 
        // such as HMAC SHA256 or RSA.
        const header = {
            "alg": "HS256",
            "typ": "JWT",
            "kid": "vpaas-magic-cookie-1fc542a3e4414a44b2611668195e2bfe/4f4910"
        }
        const encodedHeaders = btoa(JSON.stringify(header));
        // The second part of the token is the payload, which contains the claims.
        // Claims are statements about an entity (typically, the user) and 
        // additional data. There are three types of claims: 
        // registered, public, and private claims.
        const claims = {
            "role": "Student"
        }
        const encodedPlayload = btoa(JSON.stringify(claims));
        // create the signature part you have to take the encoded header, 
        // the encoded payload, a secret, the algorithm specified in the header, 
        // and sign that.
        const signature = HMACSHA256(`${encodedHeaders}.${encodedPlayload}`, "mysecret");
        const encodedSignature = btoa(signature);
        const jwt = `${encodedHeaders}.${encodedPlayload}.${encodedSignature}`
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({
                Email: email,
                JwtApi: jwt
            }), // our data object
            url: base_url+"PagesController/isExistStudentEmail", // the url where we want to POST
            processData: false,
            encode: true,
            crossOrigin: true,
            async: true,
            crossDomain: true,
            headers: {
                'Access-Control-Allow-Methods': '*',
                "Access-Control-Allow-Credentials": true,
                "Access-Control-Allow-Headers": "Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization",
                "Access-Control-Allow-Origin": "*",
                "Control-Allow-Origin": "*",
                "cache-control": "no-cache",
                'Content-Type': 'application/json'
            },
        }).then((response) => {
            if (response.status == '200') {
                $("#error").fadeIn().text(response.message);
                $("#email").focus();
                return false;
            } else {
                return;
            }
        }).fail((xhr, error) => {
            $("#error").fadeIn().text(
                "Sorry..! you can't continue this Application. we are unable to verify you Data."
            );
        });
        let rel = $("#relationship").val();
        if (rel == "") {
            $("#error").fadeIn().text("Please Select Your Relationship Status.");
            $("#relationship").focus();
            return false;
        }
        let tel = $("#mobile").val();
        if (tel == "") {
            $("#error").fadeIn().text("Please Enter Your Mobile Number.");
            $("#mobile").focus();
            return false;
        }
        let sec = $("#session").val();
        if (sec == "") {
            $("#error").fadeIn().text("Please Enter Your Mobile Number.");
            $("#session").focus();
            return false;
        }
        const Plug = {
            "JwtApi": jwt,
            "NewStudentId": StudentIdNo,
            "EnrollmentNumber": EnrollmentNo,
            "Application": App,
            "Program": Prg,
            "Department": Dpt,
            "Entry Level": Ety,
            "National Identification Number": Nin,
            "Othername": othername,
            "Surname": su,
            "Gender": Gn,
            "Date of birth": Dob,
            "Relationship Status": rel,
            "Student Email": email,
            "Session": sec,
            "Telephone Number": tel,
        };
        let RouteUserDateToPhp = JSON.stringify(Plug);
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            data: RouteUserDateToPhp, // our data object
            url: base_url+"PagesController/ProcessNewStudentOnline", // the url where we want to POST
            processData: false,
            encode: true,
            crossOrigin: true,
            async: true,
            crossDomain: true,
            headers: {
                'Access-Control-Allow-Methods': '*',
                "Access-Control-Allow-Credentials": true,
                "Access-Control-Allow-Headers": "Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization",
                "Access-Control-Allow-Origin": "*",
                "Control-Allow-Origin": "*",
                "cache-control": "no-cache",
                'Content-Type': 'application/json'
            },
        }).then((response) => {
            if (response.status == 3) {
                $("#AppRegistration").fadeOut();
                $("#messagediv").fadeIn().html(response.Successmessage);

            } else {
                $("#error").fadeIn().text(response.message);
            }
        }).fail((xhr, error) => {
            $("#error").fadeIn().text('Oops...Server is down! error');
        });
    });
 });

   $(document).ready(($) => {
        //hide messages
        $("#errorMessage").hide();
        $("#success").hide();
        $("#payment__validate").hide();
        //on submit
        $('#InitiateOnlinePayment').submit((e) => {
            e.preventDefault();
            let ref = $("input#RefNo").val();
            if (ref == "") {
                $("#errorMessage").fadeIn().text("Please Enter Your Reference Number.");
                $("input#RefNo").css('border-color', 'red');
                $("input#RefNo").focus();
                return false;
            }
            const Plug = { "ReferenceNumber": ref };
            let RouteUserDateToPhp = JSON.stringify(Plug);
            $.ajax({
                type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                data: RouteUserDateToPhp,// our data object
                url: base_url+'PageController/InitiateOnlinePaymentController',// the url where we want to POST
                processData: false,
                encode: true,
                crossOrigin: true,
                async: true,
                crossDomain: true,
                headers: {
                    'Access-Control-Allow-Methods': '*',
                    "Access-Control-Allow-Credentials": true,
                    "Access-Control-Allow-Headers": "Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization",
                    "Access-Control-Allow-Origin": "*",
                    "Control-Allow-Origin": "*",
                    "cache-control": "no-cache",
                    'Content-Type': 'application/json'
                },
            }).then((response) => {
                if (response.status == 200) {
                    const loading = document.querySelector('.loading');
                    $("#errorMessage").remove();
                    $("body").css('background', '#fff');
                    $("#payment__validate").show();
                    $("input#RefNo").css('border-color', 'green');
                    $("#success").fadeIn().text(response.message);
                    setTimeout(() => {
                    loading.style.opacity = "0";
                    window.location.reload(1);
                    }, 2000);
                }else{
                    $("input#RefNo").css('border-color', 'red');
                    $("#errorMessage").fadeIn().text(response.message);
                }
            }).fail((xhr, error) => {
                $("#errorMessage").fadeIn().text('Oops...Server is down! error');
            });
        });
    });