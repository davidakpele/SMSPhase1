$(document).ready(($) => {
    $("#AppRegistration").hide();
    $('#Fatherinfo').submit((e) => {
        $("#error").hide();
        // $("#messagediv").hide();
        e.preventDefault();
        let fid = $('#fid').val();
        let ChildId = $('#ChildId').val();
        let gender = $('#gender').val();
        let Father__first__name = $('#Father__first__name').val();
        let Father__last__name = $('#Father__last__name').val();
        let Father__email__address = $('#Father__email__address').val();
        let Father__address = $('#Father__address').val();
        let DOb = $('#Father__DOB').val();
        let mobile = $('#mobile').val();
        if (fid == "") {
            $("#error").fadeIn().text("Sorry you can't process this form now.*");
            $("#fid").focus();
            return false;
        }
        if (Father__first__name == "") {
            $("#error").fadeIn().text("Please Provide Your Father's First Name.*");
            $("#Father__first__name").focus();
            return false;
        }
        if (Father__last__name == "") {
            $("#error").fadeIn().text("Please Provide Your Father's Last Name.*");
            $("#Father__last__name").focus();
            return false;
        }
        if (Father__email__address == "") {
            $("#error").fadeIn().text("Please Provide Your Father's Email Address.*");
            $("#Father__email__address").focus();
            return false;
        } else if (!Validemailfilter.test(Father__email__address)) {
            $("#error").fadeIn().text(
                "Invaid Email Address..! Please Enter A Valid Email Address.");
            $("#Father__email__address").focus();
            return false;
        } else if (!emailblockReg.test(Father__email__address)) {
            $("#error").fadeIn().text(
                "Sorry..!! yahoo.com or hotmail.com is not allow, Please Use Another Email Address."
            );
            $("#Father__email__address").focus();
            return false;
        }
        if (mobile == "") {
            $("#error").fadeIn().text("Please Provide Your Father's Mobile Number..*");
            $("#mobile").focus();
            return false;
        }
        if (DOb == "") {
            $("#error").fadeIn().text("Please Provide Your Father's Date of Birth.*");
            $("#Father__DOB").focus();
            return false;
        }
        if (Father__address == "") {
            $("#error").fadeIn().text("Please Provide Your Father's Address.*");
            $("#Father__address").focus();
            return false;
        }

        var formdata = new FormData();
        let photo = $("#Father__profile__photo").val();
        let files = $("#Father__profile__photo")[0].files;
        var extension = photo.substr(photo.lastIndexOf('.') + 1).toLowerCase();
        var allowedExtensions = ['jpg', 'jpeg', 'bmp', 'gif', 'png', 'svg'];
        if (files.length == 0) {
            $("#error").fadeIn().html(
                "<span style='margin-left:42px'>Please Select Your Profile Photo.!</span>");
            $("#Father__profile__photo").focus();
            return false;
        } else if (allowedExtensions.indexOf(extension) === -1) {
            $("#error").fadeIn().html(
                "<span style='margin-left:42px'>Invalid file Format. Only <b>" +
                allowedExtensions.join(', ') + "</b> are allowed.</span>");
            $("#Father__profile__photo").focus();
            return false;
        }
        formdata.append('file', files[0]);
        formdata.append('fname', Father__first__name);
        formdata.append('lname', Father__last__name);
        formdata.append('DOB', DOb);
        formdata.append('Gender', gender);
        formdata.append('email', Father__email__address);
        formdata.append('mobile', mobile);
        formdata.append('address', Father__address);
        formdata.append('ChildId', ChildId);
        formdata.append('Fatherid', fid);

        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            data: formdata, // our data object
            url: base_url+"PagesController/registerParentData", // the url where we want to POST
            cache: false,
            dataType: 'text',
            contentType: false,
            processData: false,
            success: function(response) {
                var data_array = $.parseJSON(response);
                //access your data like this:
                var plub = data_array['status'];
                let messg = data_array['message'];
                let errormessg = data_array['errormsg'];
                //continue from here...
                if (plub == 300) {
                    $("#error").fadeIn().text(errormessg);
                    $("#Father__profile__photo").focus();
                    return false;
                } else if (plub == 200) {
                    $("#messagediv").fadeIn().html(messg);
                    $("#Fatherinfo").fadeOut();
                    let delay = 3000;
                    setTimeout(function() {
                        window.location.reload(1);
                    }, delay);
                } else {
                    $("#error").fadeIn().text(messg);
                }
            }
        });
    });
    $('#Motherinfo').submit((e) => {
        e.preventDefault();
        $("#error").hide();
        $("#messagediv").hide();
        let mid = $('#mid').val();
        let ChildId = $('#ChildId').val();
        let gender = $('#mgender').val();

        let Mother__first__name = $('#Mother__first__name').val();
        let Mother__last__name = $('#Mother__last__name').val();
        let Mother__email__address = $('#Mother__email__address').val();
        let Mother__address = $('#Mother__address').val();
        let DOb = $('#Mother__DOB').val();
        let Momobile = $('#mobile_no').val();
        if (mid == "") {
            $("#error").fadeIn().text("Sorry you can't process this form now.*");
            $("#mid").focus();
            return false;
        }
        if (Mother__first__name == "") {
            $("#error").fadeIn().text("Please Provide Your Mother's First Name.*");
            $("#Mother__first__name").focus();
            return false;
        }
        if (Mother__last__name == "") {
            $("#error").fadeIn().text("Please Provide Your Mother's Last Name.*");
            $("#Mother__last__name").focus();
            return false;
        }
        if (Mother__email__address == "") {
            $("#error").fadeIn().text("Please Provide Your Mother's Email Address.*");
            $("#Mother__email__address").focus();
            return false;
        } else if (!Validemailfilter.test(Mother__email__address)) {
            $("#error").fadeIn().text(
                "Invaid Email Address..! Please Enter A Valid Email Address.");
            $("#Mother__email__address").focus();
            return false;
        } else if (!emailblockReg.test(Mother__email__address)) {
            $("#error").fadeIn().text(
                "Sorry..!! yahoo.com or hotmail.com is not allow, Please Use Another Email Address."
            );
            $("#Mother__email__address").focus();
            return false;
        }
        if (Momobile == "") {
            $("#error").fadeIn().text("Please Provide Your Mother's Mobile Number..*");
            $("#mobile_no").focus();
            return false;
        }
        if (DOb == "") {
            $("#error").fadeIn().text("Please Provide Your Mother's Date of Birth.*");
            $("#Mother__DOB").focus();
            return false;
        }
        if (Mother__address == "") {
            $("#error").fadeIn().text("Please Provide Your Mother's Address.*");
            $("#Mother__address").focus();
            return false;
        }
        var formdata = new FormData();
        let photo = $("#Mother__profile__photo").val();
        let files = $("#Mother__profile__photo")[0].files;
        var extension = photo.substr(photo.lastIndexOf('.') + 1).toLowerCase();
        var allowedExtensions = ['jpg', 'jpeg', 'bmp', 'gif', 'png', 'svg'];
        if (files.length == 0) {
            $("#error").fadeIn().html(
                "<span style='margin-left:42px'>Please Select Your Profile Photo.!</span>");
            $("#Mother__profile__photo").focus();
            return false;
        } else if (allowedExtensions.indexOf(extension) === -1) {
            $("#error").fadeIn().html(
                "<span style='margin-left:42px'>Invalid file Format. Only <b>" +
                allowedExtensions.join(', ') + "</b> are allowed.</span>");
            $("#Mother__profile__photo").focus();
            return false;
        }
        formdata.append('file', files[0]);
        formdata.append('fname', Mother__first__name);
        formdata.append('lname', Mother__last__name);
        formdata.append('DOB', DOb);
        formdata.append('Gender', gender);
        formdata.append('email', Mother__email__address);
        formdata.append('mobile', mobile);
        formdata.append('address', Mother__address);
        formdata.append('ChildId', ChildId);
        formdata.append('Fatherid', mid);

        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            data: formdata, // our data object
            url: base_url+"PagesController/registerParentData", // the url where we want to POST
            cache: false,
            dataType: 'text',
            contentType: false,
            processData: false,
            success: function(response) {
                var data_array = $.parseJSON(response);
                //access your data like this:
                var plub = data_array['status'];
                let messg = data_array['message'];
                let errormessg = data_array['errormsg'];
                //continue from here...
                if (plub == 300) {
                    $("#error").fadeIn().text(errormessg);
                    $("#Father__profile__photo").focus();
                    return false;
                } else if (plub == 200) {
                    $("#messagediv").fadeIn().html(messg);
                    $("#Motherinfo").fadeOut();
                    let delay = 3000;
                    setTimeout(function() {
                        window.location.reload(1);
                    }, delay);
                } else {
                    $("#error").fadeIn().text(messg);
                }
            }
        });
    });
});
    
$(document).ready(function() {
    $("select").change(function() {
        $(this).find("option:selected").each(function() {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else {
                $(".box").hide();
            }
        });
    }).change();
});