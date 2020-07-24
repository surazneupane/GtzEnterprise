const btnAddToCart = document.getElementById("btnAddToCart");
const cartItems = document.getElementById("cartItems");

btnAddToCart.addEventListener("click", addToCart);

let item = Number.parseInt(cartItems.textContent);

const sendHttpRequest = (method, url) => {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.onload = () => {
      if (xhr.status >= 400) {
        reject(xhr.response);
      } else {
        resolve(xhr.response);
      }
    };
    xhr.onerror = () => {

      reject("Something went wrong!!!");
    };
    xhr.send();
  });
};

function addToCart(e) {
  e.preventDefault();
  const href = e.target.href;
  console.log(e.target);
  sendHttpRequest("GET", href)
    .then((responseData) => {
      console.log(responseData);
      cartItems.textContent = responseData;
    })
    .catch((err) => {
      console.log(err);
    });
}
