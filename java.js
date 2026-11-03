const header = document.querySelector("header");

window.addEventListener("scroll", function () {
    header.classList.toggle("stricky", this.window.scrollY > 0);
})

let menu = document.querySelector('#menu-icon');
let navmenu = document.querySelector('.navmenu');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navmenu.classList.toggle('open');
}

const cart = [];

function updateCartDisplay() {
    const cartItemsContainer = document.getElementById('cart-items');
    cartItemsContainer.innerHTML = '';

    cart.forEach((item, index) => {
        const listItem = document.createElement('li');
        listItem.textContent = '${item.name} - ₹${item.price}';
        cartItemsContainer.appendChild(listItem);
    });
}


document.addEventListener('DOMContentLoaded', function () {
    console.log("JavaScript is loaded!");

    const header = document.querySelector("header");
    window.addEventListener("scroll", function () {
        header.classList.toggle("sticky", window.scrollY > 0);
    });

    let menu = document.querySelector('#menu-icon');
    let navmenu = document.querySelector('.navmenu');
    if (menu) {
        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navmenu.classList.toggle('open');
        }
    }

    document.querySelectorAll('.cart-btn').forEach(button => {
        button.addEventListener('click', function () {
            console.log("Cart button clicked");
            const productRow = this.closest('.row');
            const productName = productRow.getAttribute('data-product-name');
            const productPrice = productRow.getAttribute('data-product-price');

            console.log("Product:", productName, "Price:", productPrice);

            const product = {
                name: productName,
                price: parseInt(productPrice)
            };

            let cart = [];
            try {
                const existingCart = localStorage.getItem('cart');
                if (existingCart) {
                    cart = JSON.parse(existingCart);
                }
            } catch (e) {
                console.error("Error loading cart:", e);
            }

            cart.push(product);

            try {
                localStorage.setItem('cart', JSON.stringify(cart));
                console.log("Product added to cart successfully");
            } catch (e) {
                console.error("Error saving to cart:", e);
            }

            // alert(`${productName} has been added to cart!`);
            window.location.href = 'cart.php';
        });
    });

    document.querySelectorAll('.view-btn').forEach(button => {
        button.addEventListener('click', function () {
            const productRow = this.closest('.row');
            const productName = productRow.getAttribute('data-product-name');
            const productPrice = productRow.getAttribute('data-product-price');
            //alert(`Product: ${productName}\nPrice: ₹${productPrice}`);
        });
    });
});

function loadCartItems() {
    const cartTableBody = document.getElementById('cartTableBody');
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    cartTableBody.innerHTML = '';

    if (cart.length === 0) {
        cartTableBody.innerHTML = '<tr><td colspan="3" style="color:red;">Your cart is empty.</td></tr>';
    } else {
        cart.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td>₹${item.price}</td>
                <td>
                    <button class="btn btn-danger btn-sm remove-item" onclick="removeItem(${index})">
                        <i class="bi bi-trash"></i>
                    </button>
                    <button class="btn btn-success btn-sm" onclick="buyNow(${index})">
                        <i class="bi bi-bag-fill"></i>
                    </button>
                </td>
            `;
            cartTableBody.appendChild(row);
        });
    }

    updateCartTotal();
}

if (window.location.pathname.includes('cart.php')) {
    console.log("On cart page - setting up load handler");
    document.addEventListener('DOMContentLoaded', loadCartItems);
}

function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (index >= 0 && index < cart.length) {
        cart.splice(index, 1); 
        localStorage.setItem('cart', JSON.stringify(cart)); 
        loadCartItems(); 
    }
}

document.addEventListener('DOMContentLoaded', loadCartItems);

function updateCartTotal() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const total = cart.reduce((sum, item) => sum + item.price, 0);
    document.getElementById('cartTotal').textContent = '₹' + total.toFixed(2);
}

function buyNow(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (index >= 0 && index < cart.length) {
        const item = cart[index];
        // Redirect to buy_now.php with item details
        window.location.href = `order.php?name=${encodeURIComponent(item.name)}&price=${item.price}`;
    }
}