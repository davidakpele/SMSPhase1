RecoverMaticNo = () => {
    $(document).ready(($) => {
        //hide messages
        $("#RecovererrorMessage").hide();
        //on submit
        $('#__RecoverMercyCollegeStudentMatricNo').submit((e) => {
            e.preventDefault();
            let UsernameTextBox = $("input#MatricNoRecoverTextbox").val();
            if (UsernameTextBox == "") {
                $("#RecovererrorMessage").fadeIn().text("Please enter your matric no.");
                $("input#MatricNoRecoverTextbox").focus();
                return false;
            }
            const Plug = { "MatricNo": UsernameTextBox };
            let RouteUserDateToPhp = JSON.stringify(Plug);
            $.ajax({
                type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                data: RouteUserDateToPhp,// our data object
                url: 'http://localhost/Student/PageController/StudentRetrieveMatricNumberAPIsPortal',// the url where we want to POST
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
                // user is logged in successfully in the back-end
                $("#RecovererrorMessage").fadeIn().text(response.message);
            }).fail((xhr, error) => {
                $("#RecovererrorMessage").fadeIn().text('Oops...Server is down! error');
            });
        });
    });
}
$(document).ready(($) => {
    //hide messages
    $("#errorMessage").hide();
    //on submit
    $('#__LoginMercyCollegeStudent').submit((e) => {
        e.preventDefault();
        let Username = $("input#Roll__No").val();
        let Password = $("input#Password").val();
        if (Username == "") {
            $("#errorMessage").fadeIn().text("Please enter your matric Number or Application Number");
            $("input#Roll__No").focus();
            return false;
        } if (Password == "") {
            $("#errorMessage").fadeIn().text("Please enter your password");
            $("input#Password").focus();
            return false;
        }
        const JavascriptHookPlgin = { "Username": Username, "Password": Password };
        let RouteUserDateToPhp = JSON.stringify(JavascriptHookPlgin);
        $.ajax({
            type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            data: RouteUserDateToPhp, // our data object
            url: 'http://localhost/Student/PageController/StudentLoginAPIsPortal',// the url where we want to POST
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
            //user is logged in successfully in the back-end
            $("#errorMessage").fadeIn().text(response.message, response.status);
            if (response.status == '200') {
                $.jGrowl("Successfully Login.!", { header: 'Access Granted' });
                let delay = 100;
                setTimeout(function () { window.location.reload(1); }, delay);
            }
        }).fail((xhr, error) => {
            $("#errorMessage").fadeIn().text('Oops...Server is down! error');
        });
    });
});
// Here ajax function and is responsible for Admin Login Processing
$(document).ready(($) => {
    //hide messages
    $("#AdminLoginerrorMessage").hide();
    //on submit
    $('#__AdminBoxText').submit((x) => {
        x.preventDefault();
        x.stopImmediatePropagation();
        let Username = $("input#username").val();
        let Password = $("input#password").val();
        if (Username == "") {
            $("#AdminLoginerrorMessage").fadeIn().text("Please enter your username");
            $("input#username").focus();
            return false;
        } if (Password == "") {
            $("#AdminLoginerrorMessage").fadeIn().text("Please enter your password");
            $("input#password").focus();
            return false;
        }
        const Jx = { "Username": Username, "Password": Password };
        let roll = JSON.stringify(Jx);
        $.ajax({
            type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            data: roll, // our data object
            url: $('#__AdminBoxText')[0].action,// the url where we want to POST
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
            //user is logged in successfully in the back-end
            $("#AdminLoginerrorMessage").fadeIn().text(response.message, response.status);
            if (response.status == '0390ad4cd33025f6b401dfbedd4d239d90d157c9224bfa22308085d563cd') {
                $.jGrowl("Successfully Login.!", { header: 'Access Granted' });
                let delay = 1000;
                setTimeout(function () { window.location.reload(1); }, delay);
            }
        }).fail((xhr, error) => {
            $("#AdminLoginerrorMessage").fadeIn().text('Oops...Server is down! error');
        });
    });
});

/**
 * Admin Login pROCESSing ENDs HERE
 * 
 * =====================================================
 * 
 * This Below here is responsible for Management Login process
 */
$(document).ready(($) => {
    //hide messages
    $("#ManagementLoginerrorMessage").hide();
    //on submit
    $('#__ManagementBoxText').submit((x) => {
        x.preventDefault();
        let Accesscode = $("input#Accesscode").val();
        let Password = $("input#password").val();
        if (Accesscode == "") {
            $("#ManagementLoginerrorMessage").fadeIn().text("Please Enter Your Access Code Number.");
            Accesscode.className += " invalid-feedback";
            $("input#Accesscode").focus();
            return false;
        }
        if (Password == "") {
            $("#ManagementLoginerrorMessage").fadeIn().text("Please Enter Your Password.");
            $("input#password").focus();
            return false;
        }
        let rememberMeCheck = document.querySelector('#rememberMe');
        if (rememberMeCheck.checked) {
            let a = rememberMeCheck.value = 'Yes:Checked';
        } else {
            let a = rememberMeCheck.value = '';
        }
        const Jx = { "ManagementLoginAccesscode": Accesscode, "ManagementLoginPassword": Password, "RememberMe": rememberMeCheck.value };
        let ManagementLoginStringifyProcess = JSON.stringify(Jx);
        $.ajax({
            type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            data: ManagementLoginStringifyProcess, // our data object
            url: 'http://localhost/Student/PageController/LoginManagement',// the url where we want to POST
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
            //user is logged in successfully in the back-end
            $("#ManagementLoginerrorMessage").fadeIn().text(response.message, response.status);
            if (response.status) {
                setTimeout(() => {
                    window.location.reload(true);
                }, 0);
            } else {
                return false;
            }
        }).fail((xhr, error) => {
            $("#ManagementLoginerrorMessage").fadeIn().text('Oops...Server is down! error');
        });
    });
});

/**
 * Management Login processing Ends HERE
 * 
 * =====================================================
 * 
 * 
 * 
 */

RetrieveMatricNoFun = () => {
    $(document).ready(($) => {
        //hide messages
        $("#RetrieveMatricNoerrorMessage").hide();
        //on submit
        $('#__RecoverMercyCollegeStudentMatricNo').submit((e) => {
            e.preventDefault();
            let ApplicatioNo = $("input#ApplicatioNo").val();
            let Surname = $("input#Surname").val();
            let DateOfBirthBox = $("input#DateOfBirthBox").val();
            if (ApplicatioNo == "") {
                $("#RetrieveMatricNoerrorMessage").fadeIn().text("Please enter your Applicaction No/UTME Registration No");
                $("input#ApplicatioNo").focus();
                return false;
            } if (Surname == "") {
                $("#RetrieveMatricNoerrorMessage").fadeIn().text("Please enter your Surname");
                $("input#Surname").focus();
                return false;
            } if (DateOfBirthBox == "") {
                $("#RetrieveMatricNoerrorMessage").fadeIn().text("Please enter your Date Of birth");
                $("input#DateOfBirthBox").focus();
                return false;
            }
            const Clonedata = { "ApplicatioNo": ApplicatioNo, "Surname": Surname, "DateOfBirthBox": DateOfBirthBox };
            let RouteUserDateToPhp = JSON.stringify(Clonedata);
            $.ajax({
                type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                data: RouteUserDateToPhp,// our data object
                url: 'http://localhost/Student/PageController/RetrieveMatricNumberAPIsPortal',//the url where we want to POST
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
                // user is logged in successfully in the back-end
                $("#RetrieveMatricNoerrorMessage").fadeIn().text(response.message);
            }).fail((xhr, error) => {
                $("#RetrieveMatricNoerrorMessage").fadeIn().text('Oops...Server is down! error');
            });
        });
    });
}

ParentLoginAjax = () => {
    $(document).ready(($) => {
        //hide messages
        $("#errorMessage").hide();
        //on submit
        $('#__ParentViewStarPageMercyCollegeStudentMatricNo').submit((e) => {
            e.preventDefault();
            let Username = $("input#UsernameTextBox").val().trim();
            let Password = $("input#PasswordTextBox").val().trim();
            if (Username == "") {
                $("#errorMessage").fadeIn().text("Please enter your child matric number");
                $("input#UsernameTextBox").focus();
                return false;
            } if (Password == "") {
                $("#errorMessage").fadeIn().text("Please enter your password");
                $("input#PasswordTextBox").focus();
                return false;
            }
            const ClipDate = { "Username": Username, "Password": Password };
            let RouteUserDateToPhp = JSON.stringify(ClipDate);
            $.ajax({
                type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                data: RouteUserDateToPhp,// our data object
                url: 'http://localhost/Student/PageController/StudentLoginAPIsPortal',// the url where we want to POST
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
                // user is logged in successfully in the back-end
                $("#errorMessage").fadeIn().text(response.message);
            }).fail((xhr, error) => {
                $("#errorMessage").fadeIn().text('Oops...Server is down! error');
            });
        });
    });
}

$(document).ready(($) => {
    //hide messages
    $("#error").hide();
    $("#messagediv").hide();
    //on submit
    $('#ZoomSetUp').submit((e) => {
        e.preventDefault();
        $("#error").hide();
        const btn = document.querySelector('#ZoomSetUp');
        let link = $("input#ZoomLink").val();
        if (link == "") {
            $("#error").fadeIn().text(`Connect To Your Network To Access Zoom API Link.`);
            $("input#ZoomLink").focus();
            return false;
        }
        let ZoomTopic = $("input#inputToPIC").val();
        if (ZoomTopic == "") {
            $("#error").fadeIn().text("Please Enter The Zoom Topic");
            $("input#inputToPIC").focus();
            return false;
        }
        let DayMonthYear = $("input#inputDayMonthDateYear").val();
        if (DayMonthYear == "") {
            $("#error").fadeIn().text("Please Set The Day Month and Year.");
            $("input#inputDayMonthDateYear").focus();
            return false;
        }
        let inputTime = $("input#inputTime").val();
        if (inputTime == "") {
            $("#error").fadeIn().text("Please Set The Time Frame");
            $("input#inputTime").focus();
            return false;
        }
        let inputHours = $("input#inputHours").val();
        if (inputHours == "") {
            $("#error").fadeIn().text("Please Set The Hour Duration Of it.");
            $("input#inputHours").focus();
            return false;
        }
        let inputMinute = $("input#inputMinute").val();
        if (inputMinute == "") {
            $("#error").fadeIn().text("Please Set The Minute Duration Of it.");
            $("input#inputMinute").focus();
            return false;
        }
        let inputTimeZone = $("select#inputTimeZone").val();
        if (inputTimeZone == "") {
            $("#error").fadeIn().text("Please Set The Time Zone Of The Call.");
            $("select#inputTimeZone").focus();
            return false;
        }
        let selectedOption = $("input[type='radio'][name='betalfakturavalg']:checked").val();
        if (!$("input[name='betalfakturavalg']").is(':checked')) {
            $("#error").fadeIn().text(`You haven't select Your Meeting ID Type`);
            $("input#IdType").focus();
            return false;
        }
        let SecurityPassword = $("input#SecurityPassword").val();
        if (SecurityPassword == "") {
            $("#error").fadeIn().text("Please Set The Access Code..It Is The Password.");
            $("input#SecurityPassword").focus();
            return false;
        }
        const ZoomWrapper = {
            "Call Topic": ZoomTopic,
            "Call CalendarSet": DayMonthYear,
            "Call Time": inputTime,
            "Call Hour": inputHours,
            "Call Minute": inputMinute,
            "Time Zone": inputTimeZone,
            "Call ID TYPE": selectedOption,
            "APILink": link,
            "Password": SecurityPassword
        };
        let RouteUserDateToPhp = JSON.stringify(ZoomWrapper);
        $.ajax({
            type: 'POST',// define the type of HTTP verb we want to use (POST for our form)
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            data: RouteUserDateToPhp,// our data object
            url: "http://localhost/Student/PagesController/ZoomAPIs",// the url where we want to POST
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
            if (response.status == '200OK') {
                $("#ZoomSetUp").fadeOut();
                $("#flex").fadeIn().html(response.Successmessage);
                $("#messagediv").fadeIn().html();
            } else {
                $("#error").fadeIn().text(response.message);
            }
        }).fail((xhr, error) => {
            $("#error").fadeIn().text('Oops...Server is down! error');
        });
    });
});
// 
$(document).ready(() => {
    $("#Zoom__myBtn").click(() => {
        $("#Zoom__modalForm").modal();
    });
});
// newFunction();
// function newFunction() {
//     document.getElementById("copyButton").addEventListener("click", () => {
//         copyToClipboard(document.getElementById("copyTarget"));
//     });
// }

function copyToClipboard(elem) {
    // create hidden text element, if it doesn't already exist
    let targetId = "_hiddenCopyText_";
    let isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    let origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            let target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    let currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);

    // copy the selection
    let succeed;
    try {
        succeed = document.execCommand("copy");
        alert('Link Successfully Copied.');
    } catch (e) {
        succeed = false;
        alert('Sorry.., Something went wrong..!');
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}

$(document).ready(function () {
    $("input[name='betalfakturavalg']").change(function () {
        $("#results").val($("input[name='betalfakturavalg']:checked").val());
    });
});

// $(document).ready(function () {
//     $('#myTable').DataTable();
// });

