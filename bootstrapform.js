
function validate() {
    var form = document.forms["emailForm"];

    var fname = form.fname;
    var lname = form.lname;
    var email = form.email;
    var message = form.message;

    var complete = true;

    if (fname.value == "") {
        fname.classList.add("is-invalid");
        fname.classList.remove("is-valid");
        complete = false
    } else {
        fname.classList.add("is-valid");
        fname.classList.remove("is-invalid");
    }

    if (lname.value == "") {
        lname.classList.add("is-invalid");
        lname.classList.remove("is-valid");
        complete = false
    } else {
        lname.classList.add("is-valid");
        lname.classList.remove("is-invalid");
    }

    if (email.value == "")  {
        email.classList.add("is-invalid");
        email.classList.remove("is-valid");
        complete = false
    } else {
        email.classList.add("is-valid");
        email.classList.remove("is-invalid");
    }

    if (message.value == "") {
        message.classList.add("is-invalid");
        message.classList.remove("is-valid");
        complete = false;
    } else {
        message.classList.add("is-valid");
        message.classList.remove("is-invalid");
    }

    if (complete) {
        document.forms["emailForm"].submit();
    }

}

function validate_entry(name) {
    var form = document.forms["emailForm"];
    var input = form[name];
    if (input.value == "") {
        input.classList.add("is-invalid");
        input.classList.remove("is-valid");
    } else {
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
    }
}
