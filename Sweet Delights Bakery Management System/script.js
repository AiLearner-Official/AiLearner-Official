document.querySelectorAll(".cart").forEach(cart => {
  cart.addEventListener("click", () => {
    alert(" item added to cart");
  });
});


window.addEventListener("load", () => {

  const img = document.getElementById("aboutImg");

  const images = [
    "shope.jpeg",
    " interior.jpeg",
    "cacke 1.jpeg",
    "cacke 2.jpeg"
  ];

  let index = 0;

  function changeImage() {
    img.style.opacity = 0;

    setTimeout(() => {
      index = (index + 1) % images.length;
      img.src = images[index];
      img.style.opacity = 1;
    }, 500);
  }

  setInterval(changeImage, 2500); // every 2.5 seconds
});





// script.js
function addToCart(itemName) {
    // send itemName to PHP via AJAX to store in session
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: 'item=' + encodeURIComponent(itemName)
    })
    .then(response => response.text())
    .then(data => alert(data));
}






