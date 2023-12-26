function validate_phonenumber(inputtxt)
{
    var phoneno = /^\d{10}$/;
    if (inputtxt.value.match(phoneno))
    {
        $("#error_phone_length_request").addClass('hidden');
        return true;
    } else
    {
        $("#error_phone_length_request").removeClass('hidden');
        return false;
    }
}
function validate_allLetter(inputtxt)
{
    var letters = /^[A-Za-z ]+$/;
    if (inputtxt.value.match(letters))
    {
        $("#error_only_alphabets_request").addClass('hidden');
        return true;
    } else
    {
        $("#error_only_alphabets_request").removeClass('hidden');
        //alert('Please input alphabet characters only');
        return false;
    }
}

function validate_email(inputText)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.value.match(mailformat))
    {
        $("#error_email_invalid").addClass('hidden');
        return true;
    } else
    {
        $("#error_email_invalid").removeClass('hidden');
        //alert("You have entered an invalid email address!");
        return false;
    }
}




//password visible
function visible_password() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        $("#show_password").addClass('mdi-eye');
        $("#show_password").removeClass('mdi-eye-off');
    } else {
        x.type = "password";
        $("#show_password").addClass('mdi-eye-off');
        $("#show_password").removeClass('mdi-eye');
    }
}
//password visible
function visible_cpassword() {
    var y = document.getElementById("cpassword");
    if (y.type === "password") {
        y.type = "text";
        $("#show_cpassword").addClass('mdi-eye');
        $("#show_cpassword").removeClass('mdi-eye-off');
    } else {
        y.type = "password";
        $("#show_cpassword").addClass('mdi-eye-off');
        $("#show_cpassword").removeClass('mdi-eye');
    }
}

(function () {
    const listenOnDiv = function (div) {
        const input = div.querySelector("input");
        const onBlur = function () {
            div.classList.remove("active");
            if (input.value.trim() === "") {
                div.classList.remove("passive");
                return;
            }
            div.classList.add("passive");
        };

        div.addEventListener("click", () => input.focus());
        input.addEventListener("focus", function () {
            div.classList.remove("passive");
            div.classList.add("active");
        });
        input.addEventListener("change", onBlur);
        input.addEventListener("blur", onBlur);
    };
    /* Code Starts here */
    const inputInitialise = function () {
        const borders = document.querySelector(".borders");
        Array.from(document.querySelectorAll("div.input")).forEach(function (div) {
            const cloneBorder = borders.cloneNode(true);
            const firstChild = div.querySelector(".content");
            cloneBorder.classList.remove("template");
            div.insertBefore(cloneBorder, firstChild);
            listenOnDiv(div);
            div.classList.add("activated");
        });
    };

    window.addEventListener("DOMContentLoaded", function () {
        inputInitialise();
    });
})();
$(document).ready(function () {
    $('#f_name, #email, #phone, #password, #cpassword').on('keyup', function () {
        if ($('#f_name').val() !== "" && $('#email').val() !== "" && $('#phone').val() !== "" && $('#password').val() !== "" && $('#error_phone_length_request').hasClass('hidden') && $('#error_only_alphabets_request').hasClass('hidden')) {
            if ($('#password').val() === $('#cpassword').val()) {
                $("#pass_confirm").removeClass('hidden');
                $("#pass_nt_confirm").addClass('hidden');
                $('#create_ac_btn').removeAttr("disabled");
            } else {
                $("#pass_confirm").addClass('hidden');
                $("#pass_nt_confirm").removeClass('hidden');
                $('#create_ac_btn').attr("disabled", "");
            }
        } else {
            $('#create_ac_btn').attr("disabled", "");
        }
    });
});
// MDB Lightbox Init
$(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});
