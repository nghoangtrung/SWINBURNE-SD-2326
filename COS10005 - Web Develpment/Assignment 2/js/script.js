var cartButton = document.querySelector(".fa-solid.fa-cart-shopping");
var navButton = document.querySelector('.fa-solid.fa-bars');
var maxItems = 10; // Define maxItems here
let orderNavigation = document.querySelector("#Nav-Order");
let storedItems = JSON.parse(localStorage.getItem("cartItems")) || [];

// ======================== HANDLE EVENTS ============================ //
function addEvents() {
    let addButton = document.querySelectorAll(".Add-Cart");
    addButton.forEach(function(button) {
        button.addEventListener("click", addCartItem);
    });

    let cartRemove = document.querySelectorAll(".cart-remove");
    cartRemove.forEach((btn) => {
      btn.addEventListener("click", removeCartItem);
    });

    if (storedItems.length == 0) {
        orderNavigation.href = "#";
        orderNavigation.style.opacity = "0.8";
    } else {
        orderNavigation.href = "order.html";
        orderNavigation.style.opacity = "1";
    }

    if (document.title === "Sweet Life Order") {
        orderAlert();
    }
}
// =================================================================== //


// ====================== EVENTS' FUNCTIONS ========================== //
function addCartItem() {
    let product = this.parentElement;
    let title = product.querySelector(".product-title").innerHTML;
    let price = product.querySelector(".product-price").innerHTML;
    let imgSrc = product.querySelector(".product-img").src;
    let quantity = 1;
    let index;

    if (storedItems.length > 0) {
        index = storedItems[storedItems.length - 1].index + 1;
    } else {
        index = 0;
    }
  
    let newToAdd = {
      index,
      title,
      price,
      imgSrc,
    };
  
    if (storedItems.find((el) => el.title == newToAdd.title)) {
        alert("This item is already in the cart!");
        return;
    }
    
    if (storedItems.length >= maxItems) {
        alert("Maximum items limit reached in the cart (10 items).");
        return;
    } else {
        storedItems.push(newToAdd);
    }

    localStorage.setItem("cartItems", JSON.stringify(storedItems));
  
    renderCartItems();
    update();
}

function removeCartItem() {
    this.parentElement.remove();
    const titleToRemove = this.parentElement.querySelector(".cart-product-title").innerHTML;
    storedItems = storedItems.filter((element) => element.title !== titleToRemove);
    localStorage.setItem("cartItems", JSON.stringify(storedItems));
    update();
}

function renderCartItems() {
    const cartContent = document.querySelector(".Cart-Content");
    cartContent.innerHTML = '';
    storedItems.forEach(item => {
        const cartBoxElement = slidingCartBoxComponent(item.index, item.title, item.price, item.imgSrc);
        const newNode = document.createElement("div");
        newNode.innerHTML = cartBoxElement;
        cartContent.appendChild(newNode);
    });
    update();
}


// =================================================================== //

function updateCartItemCount() {
    const cartItemCountElement = document.querySelector(".quantity");
    cartItemCountElement.textContent = storedItems.length;

    const cartItemCountSummary = document.querySelector("#Items-Quanity");
    if(document.title == "Sweet Life Order") {
        const cartItemCountSummary = document.querySelector("#Items-Quanity");
        cartItemCountSummary.textContent = storedItems.length;
    }
}


// ========================= ORDER PAGE FUNCTION ===================== //
function renderCartItemsOrder() {
    const cartContent = document.querySelector("#Order-Cart-List");
    cartContent.innerHTML = '';
    storedItems.forEach(item => {
        const cartBoxElement = CartBoxComponent(item.title, item.price, item.imgSrc);
        const newNode = document.createElement("div");
        newNode.innerHTML = cartBoxElement;
        cartContent.appendChild(newNode);
    });
    update();
}

function orderAlert() {
    let overlayOrder = document.querySelector(".Overlay") 
    if (storedItems.length === 0) {
        overlayOrder.style.display = "block";
    } else {
        overlayOrder.style.display = "none";
    }
}

function updateTotal() {
    const totalElement = document.querySelector("#Sub-Total-Price");
    const totalPrice = document.querySelector(".Total p")
    let subTotal = 0;
    storedItems.forEach((item) => {
      let price = parseFloat(item.price.replace("$", ""));
      subTotal += price;
    });
    subTotal = subTotal.toFixed(2);
    total = (subTotal * 1.08).toFixed(2);
    totalElement.innerHTML = "$" + subTotal;
    totalPrice.innerHTML = "$" + total;
}


// =================================================================== //

// ========================== HTML Adding ============================ //
function slidingCartBoxComponent(index, title, price, imgSrc) {
    return `
    <div class="sliding-cart-box">

        <img src=${imgSrc} alt="" class="sliding-cart-img">
        <div class="sliding-detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
        </div>
        <!-- REMOVE CART  -->
        <i class="fa-solid fa-xmark cart-remove"></i>
    </div>`;
}

function CartBoxComponent(title, price, imgSrc) {
    return `
      <div class="cart-box">
          <img src=${imgSrc} alt="" class="cart-img">
          <div class="detail-box">
              <div class="cart-product-title">${title}</div>
              <div class="cart-price">${price}</div>
          </div>
          <!-- REMOVE CART  -->
          <i class="fa-solid fa-xmark cart-remove"></i>
      </div>`;
}

function renderEmptyCartMessage() {
    return `
    <div class="Alert-Box">
        <div class="Alert-Title">Your cart is empty</div>
    </div>`;
}
// =================================================================== //

function update() {
    addEvents();
    updateCartItemCount();
    if (document.title === "Sweet Life Order") {
        updateTotal();
    }

    if (storedItems.length === 0) {
        const cartContent = document.querySelector(".Cart-Content");
        cartContent.innerHTML = renderEmptyCartMessage(); // Display the alert in the cart content
    }
}

function toggleOrderList() {
    let orderList = document.getElementById("Order-List");

    orderList.classList.toggle("hidden");
}

function toggleNavList() {
    let navList = document.querySelector('nav');

    navList.classList.toggle("Nav-Active-Slide");
}



// ======================== MAIN FUNCTION ============================ //
function main() {
    if (document.title === "Homepage" || document.title === "Sweet Life Registration" || document.title === "Sweet Life Features") {
        renderCartItems();
        if (storedItems.length == 0) {
            orderNavigation.href = "#";
            orderNavigation.style.opacity = "0.5";
        } else {
            orderNavigation.href = "order.html";
            orderNavigation.style.opacity = "1";
        }
    
        if (document.title === "Sweet Life Order") {
            orderAlert();
        }
    } else if (document.title === "Sweet Life Order") {
        renderCartItemsOrder();
    }

// Select the navigation button

    cartButton.addEventListener("click", toggleOrderList);
    navButton.addEventListener("click", toggleNavList);
    
update();
}
// =================================================================== //

main();
