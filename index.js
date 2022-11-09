//hien thi chi tiet san pham
function showdetail(ten, gia, hinh, mota, sizeL, sizeXL) {
  var L = Number(sizeL);
  var XL = Number(sizeXL);
  var size = document.getElementById("size");
  document.getElementById("detail5").style.display = "block";
  document.getElementById("ten").innerHTML = ten;
  document.getElementById("gia1").innerHTML = gia;
  document.getElementById("hinh").src = hinh;
  document.getElementById("mota").innerHTML = mota;
  if (size.value === "L") {
    document.getElementById("sl").innerHTML = L;
  } else {
    document.getElementById("sl").innerHTML = XL;
  }
  size.addEventListener("change", function () {
    var value = document.getElementById("size").value;
    if (value === "L") {
      document.getElementById("sl").innerHTML = L;
      if (L <= 0) {
        document.getElementById("addtoc").disabled = true;
      } else {
        document.getElementById("addtoc").disabled = false;
      }
    } else {
      document.getElementById("sl").innerHTML = XL;
      if (XL <= 0) {
        document.getElementById("addtoc").disabled = true;
      } else {
        document.getElementById("addtoc").disabled = false;
      }
    }
  });
  if (size.value === "L") {
    document.getElementById("sl").innerHTML = L;
    if (L <= 0) {
      document.getElementById("addtoc").disabled = true;
    } else {
      document.getElementById("addtoc").disabled = false;
    }
  } else {
    document.getElementById("sl").innerHTML = XL;
    if (XL <= 0) {
      document.getElementById("addtoc").disabled = true;
    } else {
      document.getElementById("addtoc").disabled = false;
    }
  }
}
/*function xoacart() {
  var remove_cart = document.getElementsByClassName("btn-danger");
  for (var i = 0; i < remove_cart.length; i++) {
    var button = remove_cart[i]
    button.addEventListener("click", function () {
      var button_remove = event.target
      button_remove.parentElement.parentElement.remove()
    })
  }
}*/
//cap nhat gio hang
function updatecart() {
  var cart_item = document.getElementsByClassName("cart-items")[0];
  var cart_rows = cart_item.getElementsByClassName("cart-row");
  var cart_title = cart_item.getElementsByClassName("cart-item-title");
  if(cart_title.length == 0){
    document.getElementById("noneproduct").style.display = "block";
    document.getElementById("noneproduct").innerText = "Please choose your product";
  }
  var total = 0;
  for (var i = 0; i < cart_rows.length; i++) {
    var cart_row = cart_rows[i];
    var price_item = cart_row.getElementsByClassName("cart-price")[0];
    var quantity_item = cart_row.getElementsByClassName(
      "cart-quantity-input"
    )[0];
    var price = parseFloat(price_item.innerText); // chuyển một chuổi string sang number để tính tổng tiền.
    var quantity = quantity_item.value; // lấy giá trị trong thẻ input
    total = total + price * quantity;
  }

  document.getElementsByClassName("cart-total-price")[0].innerText = total;
  // Thay đổi text = total trong .cart-total-price. Chỉ có một .cart-total-price nên mình sử dụng [0]
}
/*var quantity_input = document.getElementsByClassName("cart-quantity-input");
for (var i = 0; i < quantity_input.length; i++) {
  var input = quantity_input[i];
  input.addEventListener("change", function (event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
      input.value = 1;
    }
    updatecart()
  })
}*/
// Thêm vào giỏ
/*var add_cart = document.getElementsByClassName("btn-cart");
for (var i = 0; i < add_cart.length; i++) {
  var add = add_cart[i];
  add.addEventListener("click", function (event) {

    var button = event.target;
    var product = button.parentElement.parentElement;
    var img = product.parentElement.getElementsByClassName("img-prd")[0].src
    var title = product.getElementsByClassName("content-product-h3")[0].innerText
    var price = product.getElementsByClassName("price")[0].innerText
    addItemToCart(title, price, img)
    // Khi thêm sản phẩm vào giỏ hàng thì sẽ hiển thị modal
    modal.style.display = "block";

    updatecart()
  })
}*/
// Thêm vào giỏ
function addItemToCart(title, price, img, soluong, size) {
  document.getElementById("noneproduct").style.display = "none";
  var cartRow = document.createElement("div");
  cartRow.classList.add("cart-row");
  cartRow.classList.add("w3-row");
  cartRow.classList.add("w3-border");
  var cartItems = document.getElementsByClassName("cart-items")[0];
  var cart_title = cartItems.getElementsByClassName("cart-item-title");
  var cartSize = document.getElementsByClassName("size");
  for (var i = 0; i < cart_title.length; i++) {
    if (cart_title[i].innerText == title && cartSize[i].innerText == size) {
      alert("This product has already in cart");
      return;
    }
  }

  alert("Add successfully");
  xulygiohang(title, price, img, cart_title.length + 1, soluong, size);
  var cartRowContents = `
<div class="cart-item cart-column w3-col s4 w3-center" >
  <img class="cart-item-image w3-row w3-margin-top w3-image" style="border-radius: 10%;"  src="${img}"   width="100" height="100">
  <span class="cart-item-title w3-row">${title}</span>
</div>
<span class="cart-price cart-column w3-center w3-col s2" style="margin-top: 50px">${price}</span>
<span class="size cart-column w3-col s3 w3-center" style="margin-top: 50px">${size}</span>
<div class="cart-quantity cart-column w3-col s2 w3-center" style="margin-top: 50px">
  <input class="w3-input w3-border w3-center cart-quantity-input w3-light-gray" style="width: 75%" type="number" value="1" max="${soluong}" >
</div>
<i class="w3-button fa fa-trash-o w3-col s1 btn btn-danger w3-bar-item" style="margin-top: 55px;padding-right:5px" type="button" onclick=""></i>`;
  cartRow.innerHTML = cartRowContents;
  cartItems.append(cartRow);
  cartRow
    .getElementsByClassName("btn-danger")[0]
    .addEventListener("click", function () {
      var button_remove = event.target;
      button_remove.parentElement.remove();
      xulyxoasanpham(title, size);
      updatecart();
    });
  cartRow
    .getElementsByClassName("cart-quantity-input")[0]
    .addEventListener("change", function (event) {
      var input = event.target;
      if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
      }
      var slg = Number(soluong);
      if (input.value > slg) {
        input.value = slg;
        alert("Max quanity of this product is: " + soluong);
      }
      updatecart();
    });
  updatecart();
}
//tai lai gio hang khi reload trang
function reload(title, price, img, soluong, size) {
  document.getElementById("noneproduct").style.display = "none";
  var cartRow = document.createElement("div");
  cartRow.classList.add("cart-row");
  cartRow.classList.add("w3-row");
  cartRow.classList.add("w3-border");
  var cartItems = document.getElementsByClassName("cart-items")[0];
  var cart_title = cartItems.getElementsByClassName("cart-item-title");
  var cartSize = document.getElementsByClassName("size");
  for (var i = 0; i < cart_title.length; i++) {
    if (cart_title[i].innerText == title && cartSize[i].innerText == size) {
      alert("This product has already in cart");
      return;
    }
  }
  xulygiohang(title, price, img, cart_title.length + 1, soluong, size);
  var cartRowContents = `
  <div class="cart-item cart-column w3-col s4 w3-center" >
  <img class="cart-item-image w3-row w3-margin-top w3-image" style="border-radius: 10%;"  src="${img}"   width="100" height="100">
  <span class="cart-item-title w3-row">${title}</span>
</div>
<span class="cart-price cart-column w3-center w3-col s2" style="margin-top: 50px">${price}</span>
<span class="size cart-column w3-col s3 w3-center" style="margin-top: 50px">${size}</span>
<div class="cart-quantity cart-column w3-col s2 w3-center" style="margin-top: 50px">
  <input class="w3-input w3-border w3-center cart-quantity-input w3-light-gray" style="width: 75%" type="number" value="1" max="${soluong}" >
</div>
<i class="w3-button fa fa-trash-o w3-col s1 btn btn-danger w3-bar-item" style="margin-top: 55px;padding-right:5px" type="button" onclick=""></i>`;
  cartRow.innerHTML = cartRowContents;
  cartItems.append(cartRow);
  cartRow
    .getElementsByClassName("btn-danger")[0]
    .addEventListener("click", function () {
      var button_remove = event.target;
      button_remove.parentElement.remove();
      xulyxoasanpham(title, size);
      updatecart();
    });
  cartRow
    .getElementsByClassName("cart-quantity-input")[0]
    .addEventListener("change", function (event) {
      var input = event.target;
      if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
      }
      var slg = Number(soluong);
      if (input.value > slg) {
        input.value = slg;
        alert("Max quanity of this product is: " + soluong);
      }
      updatecart();
    });
  updatecart();
}
//hàm xử lý sau khi bấm Buy
function thanhtoan(gia) {
  if (gia == 0 || gia == "") {
    alert("Please choose your items to buy");
    return;
  }
  HOATOC = 0;
  GHN = 0;
  document.getElementById("checkout").style.display = "block";
  var delivery = document.getElementById("delivery").value;
  gia = document.getElementById("price").innerText;
  var deliveryCost = 0;
  if (delivery === "hoatoc") {
    // gia = parseInt(gia) + 30;
    deliveryCost = 30;
    document.getElementById("delivery_price").innerHTML = 30;
  } else if (delivery === "ghn") {
    // gia = parseInt(gia) + 7;
    deliveryCost = 7;
    document.getElementById("delivery_price").innerHTML = 7;
  } else {
    gia = document.getElementById("price").innerText;
  }
  total = parseInt(gia) + deliveryCost;
  document.getElementById("price1").innerHTML = total;
  var value = document.getElementById("delivery");
  value.addEventListener("change", function () {
    gia = document.getElementById("price").innerText;
    var value = document.getElementById("delivery").value;
    var deliveryCost = 0;
    if (value === "hoatoc") {
      // gia = parseInt(gia) + 30;
      deliveryCost = 30;
      document.getElementById("delivery_price").innerHTML = 30;
    } else if (value === "ghn") {
      // gia = parseInt(gia) + 7;
      deliveryCost = 7;
      document.getElementById("delivery_price").innerHTML = 7;
    } else {
      gia = document.getElementById("price").innerText;
    }
    // document.getElementById("price1").innerHTML = gia + deliveryCost;
    total = parseInt(gia) + deliveryCost;
    document.getElementById("price1").innerHTML = total;
    return gia + deliveryCost;
  });
}
//hàm xử lý thanh toán, tạo đơn hàng và chi tiết hóa đơn
function xulythanhtoan(user, payment) {
  var cartItems = document.getElementsByClassName("cart-items")[0];
  var gia = document.getElementById("price1").innerHTML;
  var soluongSP = cartItems.getElementsByClassName("cart-item-title").length;
  var diachi = document.getElementById("useraddress5").value;
  var size = document.getElementsByClassName("size");
  var hoten = document.getElementById("name5").value;
  var sdt = document.getElementById("phone5").value;
  var voucher = document.getElementById("magiam5").value;

  if (diachi == "") {
    alert("Please type your address");
    return;
  }
  var cartItems = document.getElementsByClassName("cart-items")[0];
  var cart_title = cartItems.getElementsByClassName("cart-item-title");
  var sanpham = "";
  for (var i = 0; i < cart_title.length; i++) {
    sanpham = sanpham + "&ten" + i + "=" + cart_title[i].innerHTML;
    sanpham =
      sanpham +
      "&hinhanh" +
      i +
      "=" +
      cartItems.getElementsByClassName("cart-item-image")[i].src;
    sanpham =
      sanpham +
      "&soluong" +
      i +
      "=" +
      cartItems.getElementsByClassName("cart-quantity-input")[i].value;
    sanpham =
      sanpham +
      "&gia" +
      i +
      "=" +
      cartItems.getElementsByClassName("cart-price")[i].innerText;
    sanpham = sanpham + "&size" + i + "=" + size[i].innerText;
  }

  alert("Buy successfully !");
  document.getElementById("checkout").style.display = "none";
  document.getElementById("shoppingcart").style.display = "none";
  window.location.href =
    "process/thanhtoan.php?totalprice=" +
    gia +
    "&soluongSP=" +
    soluongSP +
    "&userKH=" +
    user +
    "&Hoten=" +
    hoten +
    "&sdt=" +
    sdt +
    "&thanhtoan=" +
    payment +
    "&diachi=" +
    diachi +
    "&magiam=" +
    voucher +
    sanpham;
}
//hàm lưu các thông số của sản phẩm thêm vào giỏ hàng
function xulygiohang(title, price, img, soluong, soluongtonkho, size) {
  var xmlhttp;
  var sizeproduct = "&size=" + size;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    }
  };
  xmlhttp.open(
    "GET",
    "process/giohang.php?ten=" +
      title +
      "&gia=" +
      price +
      "&hinhanh=" +
      img +
      "&soluongSP=" +
      soluong +
      "&soluongtonkho=" +
      soluongtonkho +
      sizeproduct,
    true
  );
  xmlhttp.send();
}
//hàm xử lý xóa sản phẩm
function xulyxoasanpham(ten, size) {
  var xmlhttp;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    }
  };
  xmlhttp.open(
    "GET",
    "process/giohang.php?tenxoa=" + ten + "&sizexoa=" + size,
    true
  );
  xmlhttp.send();
}

function kiemTraDuLieu(mangUsername, mangMail) {
  if (document.signup.psw1.value.length < 6) {
    alert("Weak password(At least 6 character)");
    return false;
  }
  if (document.signup.psw1.value != document.signup.repsw.value) {
    alert("Password and Confirm Password has to duplicate");
    return false;
  }
  for (let i = 0; i < mangMail.length; i++) {
    if (document.signup.useremail.value ==mangMail[i]) {
      alert("Email has existed");
      return false;
    }
  }
}
