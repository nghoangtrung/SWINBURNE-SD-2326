
function orderValidation() {
    let delAddress = document.getElementById("Order-Form-Delivey-Address").value;
    let billingCheckbox = document.querySelector('input[name="Order-Form-Address-Check"]');
    let phone = document.getElementById("Order-Form-Phone").value;
    let email = document.getElementById("Order-Form-Email").value;
    let postcode = document.getElementById("Order-Form-Postcode").value;

    let visacreditNum = document.getElementById("Form-Visa-CreNum").value;
    let visaExpDate = document.getElementById("Form-Visa-ExDate").value;
    let visacvc = document.getElementById("Form-Visa-CVC").value;

    let mastercreditNum = document.getElementById("Form-Mastercard-CreNum").value;
    let masterExpDate = document.getElementById("Form-Mastercard-ExDate").value;
    let mastercvc = document.getElementById("Form-Mastercard-CVC").value;

    let ameexpcreditNum = document.getElementById("Form-American-Express-CreNum").value;
    let ameexpExpDate = document.getElementById("Form-American-Express-ExDate").value;
    let ameexpcvc = document.getElementById("Form-American-Express-CVC").value;

    let pick_up_location = document.querySelectorAll("input[name='Pick-up-location']");
    let isPickUpLocationChecked = false;

    let deliveryOption = Orderselection();
    let paymentOption = paymentToggle();
    let paymentMethod = paymentMethodToggle();

    let result = true;
    let creditNumPattern = /^\d{16}$/;
    let ameexpcreditNumPattern = /^\d{15}$/;
    let expDatePattern = /^(0[1-9]|1[0-2])\/\d{2}$/;
    let cvcPattern = /^\d{3}$/;
    let phonePattern = /^\d{10}$/;
    let postcodePattern = /^\d{4}$/;
    let emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


    if (deliveryOption === "Delivery") {
    // ***Check delivery address input***
        if (delAddress === "") {
            document.getElementById("Order-Form-Del-Address-Check").style.display = "block";
            result = false;
        } else {
            document.getElementById("Order-Form-Del-Address-Check").style.display = "none";
        }

    // ***Check billing address input***
        if (billingCheckbox.checked) {
            document.getElementById("Order-Form-Billing-Address").value = delAddress;
        } else {
            let bilAddress = document.getElementById("Order-Form-Billing-Address").value;
            if (bilAddress === "") {
                document.getElementById("Order-Form-Bil-Address-Check-1").style.display = "block";
                result = false;
            } else {
                document.getElementById("Order-Form-Bil-Address-Check-1").style.display = "none";
            }
        }
    // ***Check phone input***
        if (phone === "") {
            document.getElementById("Order-Form-Phone-Check").style.display = "block";
            result = false;
        } else {
            document.getElementById("Order-Form-Phone-Check").style.display = "none";

            if (!phone.match(phonePattern)) {
                document.getElementById("Order-Form-Phone-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Order-Form-Phone-Check").style.display = "none";
            }
        }
    // ***Check postcode input***
        if (postcode === "") {
            document.getElementById("Order-Form-Postcode-Check").style.display = "block";
            result = false;
        } else {
            document.getElementById("Order-Form-Postcode-Check").style.display = "none";

            if (!postcode.match(postcodePattern)) {
                document.getElementById("Order-Form-Postcode-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Order-Form-Postcode-Check").style.display = "none";
            }
        }
    // ***Check email input***
        if (email === "") {
            document.getElementById("Order-Form-Email-Check").style.display = "block";
            result = false;
        } else {
            document.getElementById("Order-Form-Email-Check").style.display = "none";

            if (!email.match(emailPattern)) {
                document.getElementById("Order-Form-Email-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Order-Form-Email-Check").style.display = "none";
            }
        }
    } else if (deliveryOption === "Pick Up") {
        pick_up_location.forEach(function(location) {
            if (location.checked) {
                isPickUpLocationChecked = true;
            }
        });
        
        if (!isPickUpLocationChecked) {
            document.getElementById("Order-Form-Pick-up-location-Check").style.display = "block";
            result = false;
        } else {
            document.getElementById("Order-Form-Pick-up-location-Check").style.display = "none";
        }
    }

    if (paymentOption === "Online") {
        if (paymentMethod === "Visa") {
            if (visacreditNum === "") {
                document.getElementById("Form-Visa-CreNum-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-Visa-CreNum-Check").style.display = "none";
    
                if (!visacreditNum.match(creditNumPattern)) {
                    document.getElementById("Form-Visa-CreNum-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-Visa-CreNum-Check").style.display = "none";
                }
            }
    
            if (visaExpDate === "") {
                document.getElementById("Form-Visa-ExDate-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-Visa-ExDate-Check").style.display = "none";
    
                if (!visaExpDate.match(expDatePattern)) {
                    document.getElementById("Form-VisaExDate-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-Visa-ExDate-Check").style.display = "none";
                }
            }
    
            if (visacvc === "") {
                document.getElementById("Form-Visa-CVC-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-Visa-CVC-Check").style.display = "none";
    
                if (!visacvc.match(cvcPattern)) {
                    document.getElementById("Form-Visa-CVC-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-Visa-CVC-Check").style.display = "none";
                }
            }
        } else if (paymentMethod === "Mastercard") {
            if (mastercreditNum === "") {
                document.getElementById("Form-Mastercard-CreNum-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-Mastercard-CreNum-Check").style.display = "none";
    
                if (!mastercreditNum.match(creditNumPattern)) {
                    document.getElementById("Form-Mastercard-CreNum-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-Mastercard-CreNum-Check").style.display = "none";
                }
            }
    
            if (masterExpDate === "") {
                document.getElementById("Form-Mastercard-ExDate-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-Mastercard-ExDate-Check").style.display = "none";
    
                if (!masterExpDate.match(expDatePattern)) {
                    document.getElementById("Form-Mastercard-ExDate-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-Mastercard-ExDate-Check").style.display = "none";
                }
            }
    
            if (mastercvc === "") {
                document.getElementById("Form-Mastercard-CVC-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-Mastercard-CVC-Check").style.display = "none";
    
                if (!mastercvc.match(cvcPattern)) {
                    document.getElementById("Form-Mastercard-CVC-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-Mastercard-CVC-Check").style.display = "none";
                }
            }
        } else if (paymentMethod === "American Express") {
            if (ameexpcreditNum === "") {
                document.getElementById("Form-American-Express-CreNum-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-American-Express-CreNum-Check").style.display = "none";
    
                if (!ameexpcreditNum.match(ameexpcreditNumPattern)) {
                    document.getElementById("Form-American-Express-CreNum-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-American-Express-CreNum-Check").style.display = "none";
                }
            }
    
            if (ameexpExpDate === "") {
                document.getElementById("Form-American-Express-ExDate-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-American-Express-ExDate-Check").style.display = "none";
    
                if (!ameexpExpDate.match(expDatePattern)) {
                    document.getElementById("Form-American-Express-ExDate-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-American-Express-ExDate-Check").style.display = "none";
                }
            }
    
            if (ameexpcvc === "") {
                document.getElementById("Form-American-Express-CVC-Check").style.display = "block";
                result = false;
            } else {
                document.getElementById("Form-American-Express-CVC-Check").style.display = "none";
    
                if (!ameexpcvc.match(cvcPattern)) {
                    document.getElementById("Form-American-Express-CVC-Check").style.display = "block";
                    result = false;
                } else {
                    document.getElementById("Form-American-Express-CVC-Check").style.display = "none";
                }
            }
        }        
    } 

    return result;
}

function Orderselection() {
    let pickup = document.getElementById("Form-Pickup-Sel");
    let delivery = document.getElementById("Form-Delivery-Sel");
    let button = document.querySelector("input[name='Button']:checked").value; // Select the checked radio button
    let option = "";

    if ( button === 'Delivery') { // Check if button exists and its value is 'Delivery'
        pickup.style.display = "none";
        delivery.style.display = "block";
        document.getElementById("Location-Title").innerHTML = "Delivering to:";
        document.getElementById("Location").innerHTML = "";
        option= "Delivery";
    }

    if (button === 'Pick Up') { // Check if button exists and its value is 'Pick Up'
        pickup.style.display = "block";
        delivery.style.display = "none";
        document.getElementById("Location-Title").innerHTML = "Pick up at:";
        document.getElementById("Location").innerHTML = "";
        option = "Pick Up";
    }

    return option;
}

var typingTimer; // Timer identifier
var doneTypingInterval = 1500; // 1.5 seconds

function location_address() {
    clearTimeout(typingTimer);
    let location = document.getElementById("Order-Form-Delivey-Address").value;
    let address = document.getElementById("Location");
    typingTimer = setTimeout(function() {
        address.innerHTML = location;
    }, doneTypingInterval);
}

function pick_up_location_sel() {
    var pick_up_location = document.querySelectorAll("input[name='Pick-up-location']");

    pick_up_location.forEach(function(location) {
        location.addEventListener('change', function() {
            // Remove the "Location-Active" class from all parent elements
            pick_up_location.forEach(function(element) {
                element.parentElement.classList.remove("Location-Active");
            });
            
            // Add the "Location-Active" class to the parent of the selected location
            this.parentElement.classList.add("Location-Active");

            var address = this.getAttribute("data-address");

            // Update the address display
            document.getElementById("Location").innerHTML =  address;
        });
    });
}

function paymentToggle() {
    let button = document.querySelector("input[name='Payment']:checked").value; // Select the checked radio button
    let paymentMethod = document.getElementById("Online-Payment-Method");
    let paymentForm = document.getElementById("Form-Payment-Online");
    let option = "";


    if (button === "Online") {
        paymentForm.style.display = "block";
        paymentMethod.style.display = "block";
        option = "Online";
    }

    if (button === "Pick Up") {
        paymentForm.style.display = "none";
        paymentMethod.style.display = "none";
        option = "Cash";
    }

    return option;
}

function paymentMethodToggle() {
    let button = document.querySelector("input[name='Online-Payment']:checked").value; // Select the checked radio button
    let visaMethod = document.getElementById("Form-Visa-Payment-Online");
    let mastercardMethod = document.getElementById("Form-Mastercard-Payment-Online");
    let ameexpMethod = document.getElementById("Form-American-Express-Payment-Online");
    let formCheck = document.getElementsByClassName("Form-Check");
    let option = "";


    if (button === "Visa") {
        visaMethod.style.display = "block";
        mastercardMethod.style.display = "none";
        ameexpMethod.style.display = "none";
        option = "Visa";
    } else if (button === "Mastercard") {
        visaMethod.style.display = "none";
        mastercardMethod.style.display = "block";
        ameexpMethod.style.display = "none";
        option = "Mastercard";
    } else if (button === "American Express") {
        visaMethod.style.display = "none";
        mastercardMethod.style.display = "none";
        ameexpMethod.style.display = "block";
        option = "American Express";
    }

    return option;
}

function bilCheckbox() {
    var billingCheckbox = document.querySelector('input[name="Order-Form-Address-Check"]');
    let delAddress = document.getElementById("Order-Form-Delivey-Address").value;

    function updateBillingAddress() {
        if (billingCheckbox.checked && delAddress !== "") {
            document.getElementById('Order-Form-Billing-Address').value = delAddress;
        }
    }

    billingCheckbox.addEventListener('change', function() {
        if (this.checked && delAddress === "") {
            document.getElementById("Order-Form-Bil-Address-Check-2").style.display = "block";
            this.checked = false;
        } else {
            document.getElementById("Order-Form-Bil-Address-Check-2").style.display = "none";
            updateBillingAddress();
        }
    });

    document.getElementById("Order-Form-Delivey-Address").addEventListener('input', function() {
        delAddress = this.value;
        updateBillingAddress();
    });
}

function buttonEffect(event) {
    let x = event.clientX - event.target.offsetLeft;
    let y = event.clientY - event.target.offsetTop;

    let ripples = document.createElement("span");
    ripples.style.left = x + "px";
    ripples.style.top = y + "px";
    
    event.target.appendChild(ripples);

    setTimeout(function() {
        ripples.remove();
    }, 600);
}

function init() {
    var orderButton = document.querySelectorAll("input[name='Button']");
    var paymentButton = document.querySelectorAll("input[name='Payment']");
    var paymentMethodButton = document.querySelectorAll("input[name='Online-Payment']");
    const buttons = document.querySelectorAll('#Place-Order-Button');

    // Choose delivery method
    orderButton.forEach(function(button) {
        button.addEventListener('click', function() {
            Orderselection();
        });
    });

    // Choose payment method
    paymentButton.forEach(function(button) {
        button.addEventListener('click', function() {
            paymentToggle();
        });
    });

    // Choose online payment method
    paymentMethodButton.forEach(function(button) {
        button.addEventListener('click', function() {
            paymentMethodToggle();
        });
    });

    // Show the input of delivery address in the Order Summary part.
    document.getElementById("Order-Form-Delivey-Address").addEventListener('input', location_address);

    pick_up_location_sel();

    // Checking if the delivery address has input or not.
    // Set the value of delivery address to billing address.
    bilCheckbox();

    // Submiiting the form and clear all item in storage as well
    document.getElementById("Place-Order-Button").addEventListener("click", function(event) {
        event.preventDefault();
        let isValid = orderValidation();
        if (isValid) {
            localStorage.clear();
            document.getElementById("OrderForm").submit();
        }
    });

    // Cancel button will clear all items and move back to homepage
    let cancelButton = document.getElementById('Cancel-Button');
    cancelButton.addEventListener("click", function() {
        localStorage.clear();
    })

    // Add clicking effect for button
    buttons.forEach(function(button) {
        button.addEventListener('click', buttonEffect);
    });
}

window.onload = init;