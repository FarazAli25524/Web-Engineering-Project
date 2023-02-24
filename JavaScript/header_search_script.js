let searchForm = document.querySelector(".search-form");

document.getElementById("search-btn").onclick = () => {
  searchForm.classList.toggle("active");
};

let searchCart = document.querySelector(".shopping-cart");
document.getElementById("cart-btn").onclick = () => {
  searchCart.classList.toggle("active");
};

document.getElementById("login-btn").onclick = () => {
  window.location.href = "login.php";
};
