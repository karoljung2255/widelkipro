let cart = [];

function manageCart(productId) {
  const index = cart.indexOf(productId);
  if (index === -1) {
    cart.push(productId);
    updateButton(productId, 'Usun z koszyka');
  } else {
    cart.splice(index, 1);
    updateButton(productId, 'Dodaj do koszyka');
  }
  updateCartFile();
}

function updateButton(productId, text) {
  const button = document.querySelector(`[onclick="manageCart(${productId})"]`);
  if (button) {
    button.textContent = text;
  }
}

function updateCartFile() {
  localStorage.setItem('cartItems', JSON.stringify(cart));
}

window.onload = function () {
  const storedCart = localStorage.getItem('cartItems');
  if (storedCart) {
    cart = JSON.parse(storedCart);
    cart.forEach(productId => {
      updateButton(productId, 'Usun z koszyka');
    });
  }
};