let testSlide = document.querySelectorAll('.Item'); // Access the testimonials
let dots = document.querySelectorAll('.Indicators-Dot'); // Access the indicators
var counter = 0;

function switchTest(currentTest){
    currentTest.classList.add('active');
    var testId = currentTest.getAttribute('data-index');
    if(testId > counter){
        testSlide[counter].style.animation = 'next1 0.5s ease-in forwards';
        counter = testId;
        testSlide[counter].style.animation = 'next2 0.5s ease-in forwards';
    }
    else if(testId == counter){return;}
    else{
        testSlide[counter].style.animation = 'prev1 0.5s ease-in forwards';
        counter = testId;
        testSlide[counter].style.animation = 'prev2 0.5s ease-in forwards';
    }
    indicators();
}

function slideNext(){
    testSlide[counter].style.animation = 'next1 0.5s ease-in forwards';
    if(counter >= testSlide.length - 1){
        counter = 0;
    }
    else{
        counter++;
    }
    testSlide[counter].style.animation = 'next2 0.5s ease-in forwards';
    indicators();
}
function autoSliding(){
    deleteInterval = setInterval(timer, 4000);
    function timer(){
        slideNext();
        indicators();
    }
}

// Add and remove active class from the indicators
function indicators(){
    for(i = 0; i < dots.length; i++){
        dots[i].className = dots[i].className.replace(' active', '');
    }
    dots[counter].className += ' active';
}

function navBar() {
    var offsetY = window.scrollY;
    // Calculate viewport height
    var viewportHeight = window.innerHeight;
    var header = document.querySelector("header");
    var navLinks = document.querySelectorAll("nav a:not(#Nav-Home)"); // Exclude the home link
    var navLinksHome = document.getElementById('Nav-Home');
    var navCheck = document.getElementById('Nav-Check');
    var cartIcon = document.querySelector(".Nav-Cart i");

    if (offsetY < viewportHeight * 0.8) {
        header.style.background = "transparent";
        navCheck.style.color ="white";

        navLinks.forEach(function(link) {
            link.style.color = "white";
            link.style.background = "#0d3396";

            link.addEventListener('mouseenter', function() {
                this.style.color = '#0d3396';
                this.style.background = 'white';
            });
            link.addEventListener('mouseleave', function() {
                this.style.color = 'white';
                this.style.background = '#0d3396';
            });
        });

        navLinksHome.style.color = "#0d3396";
        navLinksHome.style.background = "white";

        cartIcon.style.color = "white";
        document.querySelector('.Nav-Logo img').src = "./images/Logo.png";
    } else if (offsetY >= viewportHeight * 0.8) {
        header.style.background = "white";
        navCheck.style.color ="#0d3396";

        navLinks.forEach(function(link) {
            link.style.color = "#0d3396";
            link.style.background = "transparent";
            link.addEventListener('mouseenter', function() {
                this.style.color = 'white';
                this.style.background = '#0d3396';
            });
            link.addEventListener('mouseleave', function() {
                this.style.color = '#0d3396';
                this.style.background = 'white';
            });
        });

        navLinksHome.style.color = "white";
        navLinksHome.style.background = "#0d3396";

        cartIcon.style.color = "#0d3396";
        document.querySelector('.Nav-Logo img').src = "./images/Logo-2.png";
    }
}


function buttonSelection() {
    let product = document.querySelector("#Product-Content"); // Selecting the first element with class Product-Content
    let flavour = document.querySelector("#Flavour-Content"); // Selecting the first element with class Flavour-Content
    let button = document.querySelector('input[name="Button"]:checked').value;

    if (button == "Product") {
        product.style.display = "grid";
        flavour.style.display = "none";
        document.getElementById("Flavour-Title").style.display = "none";
        document.getElementById("Product-Title").style.display = "block";
    }

    if (button == "Flavour") {
        product.style.display = "none";
        flavour.style.display = "flex";
        document.getElementById("Flavour-Title").style.display = "block";
        document.getElementById("Product-Title").style.display = "none";
    }
}

function historyAnimation() {
    var offsetY = window.scrollY;
    var viewportHeight = window.innerHeight;

    if (offsetY > viewportHeight * 0.4) {
        var container = document.querySelectorAll(".History-Container");
        var line = document.querySelector(".History-Timeline");
        
        container.forEach(function(link) {
            link.classList.add("History-Container-Active");
        });
        line.classList.add("History-Timeline-Active");
    } else {
        var container = document.querySelectorAll(".History-Container");
        var line = document.querySelector(".History-Timeline");
        
        container.forEach(function(link) {
            link.classList.remove("History-Container-Active");
        });
        line.classList.remove("History-Timeline-Active");
    }
}

function locationSelections() {
    const locationSelection = document.querySelectorAll('.Location-Selection');

    locationSelection.forEach((selection, index) => {
        selection.addEventListener('click', () => {
            locationSelection.forEach((sel) => {
                sel.classList.remove('Active');
            });
            
            selection.classList.add('Active');

            var locationAddress = selection.id;
            var background = document.getElementById("Location-Content");
            var map = document.getElementById("Location-Map");

            switch (locationAddress) {
                case "Location-Thu-Khoa-Huan":
                    background.style.background = "#0d3396"
                    background.style.color = "white"
                    map.href = "https://www.google.com/maps/place/Pizza+4P's+Ben+Thanh/@10.773361,106.6927464,17z/data=!3m1!4b1!4m6!3m5!1s0x31752f7998588b7d:0x8f43f3d4a8472384!8m2!3d10.773361!4d106.6976173!16s%2Fg%2F11k1lbvf9v?entry=ttu"
                    break;
                case "Location-Le-Thanh-Ton":
                    background.style.background = "#2f68f8"
                    background.style.color = "white"
                    map.href = "https://www.google.com/maps/place/Pizza+4P%E2%80%99s+L%C3%AA+Th%C3%A1nh+T%C3%B4n/@10.7818738,106.6860853,15z/data=!4m10!1m2!2m1!1sPizza+4P's!3m6!1s0x31752f4937cb401d:0x985b0267c61f8139!8m2!3d10.7818738!4d106.7051397!15sCgpQaXp6YSA0UCdzIgOIAQFaDCIKcGl6emEgNHAnc5IBEHBpenphX3Jlc3RhdXJhbnTgAQA!16s%2Fg%2F11c1qb2jtn?entry=ttu"
                    break;
                case "Location-Vo-Van-Kiet":
                    background.style.background = "#FDF0D1"
                    background.style.color = "#6b4651"
                    map.href = "https://www.google.com/maps/place/Pizza+4P%E2%80%99s+V%C3%B5+V%C4%83n+Ki%E1%BB%87t/@10.7551092,106.6723203,15z/data=!4m10!1m2!2m1!1sPizza+4P's!3m6!1s0x31752f50232239cb:0x6d311cc56af0adef!8m2!3d10.7551082!4d106.6876645!15sCgpQaXp6YSA0UCdzIgOIAQFaDCIKcGl6emEgNHAnc5IBEHBpenphX3Jlc3RhdXJhbnTgAQA!16s%2Fg%2F11fgm61kfy?entry=ttu"
                    break;
                case "Location-Hai-Ba-Trung":
                    background.style.background = "#FFF5E4"
                    background.style.color = "#6b4651"
                    map.href = "https://www.google.com/maps/place/Pizza+4P's+Hai+B%C3%A0+Tr%C6%B0ng/@10.7830429,106.6779183,15z/data=!4m10!1m2!2m1!1sPizza+4P's!3m6!1s0x31752f3689d6e90b:0xfed9192a456fc218!8m2!3d10.7830429!4d106.6969727!15sCgpQaXp6YSA0UCdzIgOIAQFaDCIKcGl6emEgNHAnc5IBEHBpenphX3Jlc3RhdXJhbnTgAQA!16s%2Fg%2F11f30hwc20?entry=ttu"
                    break;
            }

            const imageContainer = document.getElementById('Location-Image');
            const imageWidth = imageContainer.offsetWidth;
            imageContainer.style.transform = `translateX(-${index * imageWidth}px)`;
        });
    });
}

function pause(){
    clearInterval(deleteInterval);
}

function init() {
    //Scrolling effect for nav bar
    navBar();

    //Select menu
    var menuSelection = document.querySelectorAll('input[name="Button"]');
    menuSelection.forEach(function(button) {
        button.addEventListener("click", buttonSelection);
    });

    // Add event listener for scroll events
    window.addEventListener("scroll", function() {
        navBar();
        historyAnimation();
    });
    
    locationSelections();
    // Get all location selections
    const container = document.querySelector('.Client-Indicators');
    container.addEventListener('mouseover', pause);
    container.addEventListener('mouseout', autoSliding);

    autoSliding();

}

window.onload = init;
