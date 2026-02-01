var bar = document.getElementById('bar');
var close = document.getElementById('close');
var nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', function() {
        nav.classList.add('active');
    });
}
if (close) {
    close.addEventListener('click', function() {
        nav.classList.remove('active');
    });
}

function getCart() {
    var cart = localStorage.getItem('cart');
    return cart ? JSON.parse(cart) : [];
}
function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
}
function updateCartCount() {
    var cart = getCart();
    var total = 0;
    for (var i = 0; i < cart.length; i++) total += cart[i].qty || 1;
    var countEl = document.getElementById('cart-count');
    var countMob = document.getElementById('cart-count-mob');
    if (countEl) countEl.textContent = total;
    if (countMob) countMob.textContent = total;
}
document.addEventListener('click', function(e) {
    if (e.target.closest && e.target.closest('.add-cart')) {
        var pro = e.target.closest('.pro');
        if (!pro) return;
        var name = pro.getAttribute('data-pro-name');
        var price = pro.getAttribute('data-pro-price');
        var img = pro.getAttribute('data-pro-img');
        if (!name || !price) return;
        var cart = getCart();
        var found = false;
        for (var i = 0; i < cart.length; i++) {
            if (cart[i].name === name) {
                cart[i].qty = (cart[i].qty || 1) + 1;
                found = true;
                break;
            }
        }
        if (!found) cart.push({ name: name, price: price, img: img || '', qty: 1 });
        saveCart(cart);
        updateCartCount();
        alert('Shtuar ne shporte!');
    }
});
updateCartCount();

var addDetailBtn = document.getElementById('add-to-cart-detail');
if (addDetailBtn) {
    addDetailBtn.addEventListener('click', function() {
        var cart = getCart();
        var found = false;
        for (var i = 0; i < cart.length; i++) {
            if (cart[i].name === 'Butta Drop Body Cream') {
                cart[i].qty = (cart[i].qty || 1) + 1;
                found = true;
                break;
            }
        }
        if (!found) cart.push({ name: 'Butta Drop Body Cream', price: '39.90', img: './images/skincare/skincare1.webp', qty: 1 });
        saveCart(cart);
        updateCartCount();
        alert('Shtuar ne shporte!');
    });
}

// contact form
var contactForm = document.getElementById('contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var ok = true;
        var name = document.getElementById('contact-name');
        var email = document.getElementById('contact-email');
        var message = document.getElementById('contact-message');
        var nameErr = document.getElementById('contact-name-error');
        var emailErr = document.getElementById('contact-email-error');
        var msgErr = document.getElementById('contact-message-error');

        nameErr.textContent = '';
        emailErr.textContent = '';
        msgErr.textContent = '';

        if (!name.value.trim()) {
            nameErr.textContent = 'Vendosni emrin.';
            ok = false;
        } else if (name.value.trim().length < 3) {
            nameErr.textContent = 'Te pakten 3 shkronja.';
            ok = false;
        }
        if (!email.value.trim()) {
            emailErr.textContent = 'Vendosni email.';
            ok = false;
        } else if (email.value.indexOf('@') === -1) {
            emailErr.textContent = 'Email i pavlefshem.';
            ok = false;
        }
        if (!message.value.trim()) {
            msgErr.textContent = 'Shkruani mesazhin.';
            ok = false;
        } else if (message.value.trim().length < 10) {
            msgErr.textContent = 'Mesazhi shume i shkurt.';
            ok = false;
        }
        if (ok) {
            alert('Faleminderit! Do ju pergjigjemi.');
            contactForm.reset();
        }
    });
}

var loginForm = document.getElementById('login-form');
if (loginForm) {
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var ok = true;
        var email = document.getElementById('login-email');
        var password = document.getElementById('login-password');
        var emailErr = document.getElementById('login-email-error');
        var passErr = document.getElementById('login-password-error');

        emailErr.textContent = '';
        passErr.textContent = '';
        if (!email.value.trim()) {
            emailErr.textContent = 'Vendosni email.';
            ok = false;
        } else if (email.value.indexOf('@') === -1) {
            emailErr.textContent = 'Email i pavlefshem.';
            ok = false;
        }
        if (!password.value) {
            passErr.textContent = 'Vendosni fjalekalimin.';
            ok = false;
        } else if (password.value.length < 6) {
            passErr.textContent = 'Min 6 karaktere.';
            ok = false;
        }
        if (ok) {
            alert('Hyrja u krye.');
            loginForm.reset();
        }
    });
}

var registerForm = document.getElementById('register-form');
if (registerForm) {
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var ok = true;
        var name = document.getElementById('register-name');
        var email = document.getElementById('register-email');
        var password = document.getElementById('register-password');
        var password2 = document.getElementById('register-password-confirm');
        var nameErr = document.getElementById('register-name-error');
        var emailErr = document.getElementById('register-email-error');
        var passErr = document.getElementById('register-password-error');
        var pass2Err = document.getElementById('register-password-confirm-error');

        nameErr.textContent = '';
        emailErr.textContent = '';
        passErr.textContent = '';
        pass2Err.textContent = '';

        if (!name.value.trim()) {
            nameErr.textContent = 'Vendosni emrin.';
            ok = false;
        } else if (name.value.trim().length < 3) {
            nameErr.textContent = 'Te pakten 3 shkronja.';
            ok = false;
        }
        if (!email.value.trim()) {
            emailErr.textContent = 'Vendosni email.';
            ok = false;
        } else if (email.value.indexOf('@') === -1) {
            emailErr.textContent = 'Email i pavlefshem.';
            ok = false;
        }
        if (!password.value) {
            passErr.textContent = 'Vendosni fjalekalimin.';
            ok = false;
        } else if (password.value.length < 6) {
            passErr.textContent = 'Min 6 karaktere.';
            ok = false;
        }
        if (password.value !== password2.value) {
            pass2Err.textContent = 'Fjalekalimet nuk perputhen.';
            ok = false;
        }
        if (ok) {
            alert('U regjistruat. Tani mund te hyni.');
            registerForm.reset();
        }
    });
}
