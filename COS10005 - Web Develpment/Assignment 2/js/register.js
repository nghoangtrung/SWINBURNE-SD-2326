function regValidation() {
    let fname = document.getElementById("Form-Firstname").value;
    let lname = document.getElementById("Form-Lastname").value;
    let pwd1 = document.getElementById("Form-Pwd1").value;
    // var pwd2 = document.getElementById("Form-Pwd2").value;
    let uname = document.getElementById("Form-Uname").value;
    let email = document.getElementById("Form-Email").value;
    let phone = document.getElementById("Form-Phone").value;
    let genm = document.getElementById("Form-Genm").checked;
    let genf = document.getElementById("Form-Genf").checked;
    let gens = document.getElementById("Form-Gens").checked;
    let nation = document.getElementById("Form-Nation").value;
    let icecreamCheck = document.querySelectorAll('.Icecream-Flavour');
    let boxChecked = false;
    let option = Regselection();

    let pwdPattern = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{9,}$/;
    let phonePattern = /^\d{10}$/;
    let emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let specialCharactersRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    let result = true;

    // ***Check firstname***
    if (fname === "") {
        document.getElementById("Form-Firstname-Check-1").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Firstname-Check-1").style.display = "none";
    }

    // ***Check firstname special character***
    if (specialCharactersRegex.test(fname)) {
        document.getElementById("Form-Firstname-Check-2").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Firstname-Check-2").style.display = "none";
    }

    // ***Check lastname***
    if (lname === "") {
        document.getElementById("Form-Lastname-Check-1").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Lastname-Check-1").style.display = "none";
    }

    // ***Check lastname special character***
    if (specialCharactersRegex.test(lname)) {
        document.getElementById("Form-Lastname-Check-2").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Lastname-Check-2").style.display = "none";
    }

    // ***Check username***
    if (uname === "") {
        document.getElementById("Form-Uname-Check").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Uname-Check").style.display = "none";
    }

    // ***Check email or phone***
    if (option === 'Email') {
        document.getElementById("Form-Phone").value = ""
        // ***Check email***
        if (email === "") {
            document.getElementById("Form-Email-Check").style.display = "block";
            result = false;
        } else {
            document.getElementById("Form-Email-Check").style.display = "none";

            if (!email.match(emailPattern)) {
                document.getElementById("Form-Email-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-Email-Check").style.display = "none";
            }
        }
    }

    if (option === 'Phone') {
        document.getElementById("Form-Email").value = ""
        // ***Check phone***
        if (phone === "") {
            document.getElementById("Form-Phone-Check").style.display = "block";
            result = false;
        } else {
            document.getElementById("Form-Phone-Check").style.display = "none";

            if (!phone.match(phonePattern)) {
                document.getElementById("Form-Phone-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-Phone-Check").style.display = "none";
            }
        }
    }

    // ***Check password***
    if (pwd1 === "") {
        document.getElementById("Form-Pwd1-Check-1").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Pwd1-Check-1").style.display = "none";
        if (!pwd1.match(pwdPattern)) {
            document.getElementById("Form-Pwd1-Check-2").style.display = "block";
            result = false;
        } else {
            document.getElementById("Form-Pwd1-Check-2").style.display = "none";
        }
    }

    // ***Check nation options***
    if (nation === "") {
        document.getElementById("Form-Nation-Check").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Nation-Check").style.display = "none";
    }

    // ***Check gender options***
    if (!genm && !genf && !gens) {
        document.getElementById("Form-Gender-Check").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Gender-Check").style.display = "none";
    }

    icecreamCheck.forEach(function(checkbox) {
        if (checkbox.checked) { // Check if the current checkbox is checked
            boxChecked = true;
        }
    });
    
    if (!boxChecked) { // Check if no checkbox is checked
        document.getElementById("Form-Icecream-Check").style.display = "block";
        result = false;
    } else {
        document.getElementById("Form-Icecream-Check").style.display = "none";
    }

    return result;
}

function Regselection() {
    var button = document.querySelector("input[name='Button']:checked").value;
    var emailInput = document.getElementById("Form-Input-Email");
    var phoneInput = document.getElementById("Form-Input-Phone");
    var option = '';

    if (button === 'Email') {
        emailInput.style.display = "block";
        phoneInput.style.display = "none";
        option = 'Email';
    }

    if (button === 'Phone') {
        emailInput.style.display = "none";
        phoneInput.style.display = "block";
        option = 'Phone';
    }

    return (option);
}

function buttonEffect(event) {
    let x = event.clientX - event.target.offsetLeft;
    let y = event.clientY - event.target.offsetTop;

    let ripples = document.createElement("span");
    ripples.style.left = x + "px";
    ripples.style.top = y + "px";
    
    // Append the span element to the button's parent element
    event.target.parentNode.appendChild(ripples);

    // Remove the span element after the animation completes
    setTimeout(function() {
        ripples.remove();
    }, 600); // Adjust the duration as needed
}

function init() {
    var buttons = document.querySelectorAll("input[name='Button']");
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            Regselection();
        });
    });

    // Validating the inputs and submiting the form
    var regForm = document.getElementById("RegForm");
    regForm.onsubmit = regValidation;


    // Add clicking effect for button
    const Submitbutton = document.querySelectorAll('#Form-Submit-Button');
    Submitbutton.forEach(function(button) {
        button.addEventListener('click', buttonEffect);
    });

}

window.onload = init;