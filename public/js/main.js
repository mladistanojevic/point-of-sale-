let PRODUCTS = [];
let ITEMS = [];
let CHANGE;

function get_all() {
  let ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function (e) {
    if (ajax.readyState == 4 && ajax.status == 200) {
      handle_res(ajax.responseText);
    }
  });

  ajax.open("GET", "http://localhost/pos/api/getAll", true);
  ajax.send();
}

function get_data(search) {
  let form_data = new FormData();
  form_data.append("search", search.trim());
  let ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function (e) {
    if (ajax.readyState == 4 && ajax.status == 200) {
      handle_res(ajax.responseText);
    }
  });

  ajax.open("POST", "http://localhost/pos/api/search", true);
  ajax.send(form_data);
}

function handle_res(res) {
  if (res != "") {
    let results = JSON.parse(res);

    let outputDiv = document.querySelector(".js-products");
    let str = "";

    PRODUCTS = results;

    for (let i = 0; i < results.length; i++) {
      str += `
          <div class="card m-2 mx-auto border-0" style="min-width: 200px;max-width: 200px;">
          <a href="#">
              <img id=${i} src="http://localhost/pos/public/${results[i].image}" class="w-100 rounded border">
          </a>
          <div class="p-4">
              <div class="text-muted">${results[i].description}</div>
              <div style="font-size:20px" class=""><b>$${results[i].amount}</b></div>
          </div>
      </div>
          `;
    }
    outputDiv.innerHTML = str;
  } else {
    PRODUCTS = [];
  }
}

function add_item(e) {
  let id = e.target.getAttribute("id");

  for (let i = 0; i < ITEMS.length; i++) {
    if (ITEMS[i].product_id == PRODUCTS[id].product_id) {
      ITEMS[i].qty += 1;
      refresh_items_display();
      return;
    }
  }

  let temp = PRODUCTS[id];
  temp.qty = 1;
  ITEMS.push(temp);

  refresh_items_display();
}

function refresh_items_display() {
  let items_count = document.querySelector(".js-items-count");
  items_count.innerHTML = ITEMS.length;

  let items_div = document.querySelector(".js-items");
  let str = "";
  let grand_total = 0;
  let total_div = document.querySelector(".js-total");
  for (let i = 0; i < ITEMS.length; i++) {
    grand_total += ITEMS[i].amount * ITEMS[i].qty;
    str += `
    <tr>
    <td style="width:110px"><img src="http://localhost/pos/public/${ITEMS[i].image}" class="rounded border" style="width:100px;height:100px"></td>
    <td class="text-primary">
    ${ITEMS[i].description}

        <div class="input-group my-3" style="max-width:150px">
            <span index=${i} onclick="change_qty('down',event);" class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus text-primary"></i></span>
            <input index=${i} onblur="change_qty('input',event);" type="text" class="form-control text-primary" placeholder="1" value="${ITEMS[i].qty}">
            <span index=${i} onclick="change_qty('up',event);" class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus text-primary"></i></span>
        </div>

    </td>
    <td style="font-size:20px">
    <b>$${ITEMS[i].amount}</b>
    <button onclick="clear_item(${i});" class="btn btn-sm btn-danger float-right"><i class="fas fa-times"></i></button>
    </td>
</tr>
    `;
  }
  items_div.innerHTML = str;
  total_div.innerHTML = grand_total;
}

function clear_all() {
  if (!confirm("Are you sure you want to clear all items in the list?")) return;
  ITEMS = [];
  refresh_items_display();
}

function clear_item(index) {
  ITEMS.splice(index, 1);
  refresh_items_display();
}

function change_qty(direction, e) {
  let index = e.currentTarget.getAttribute("index");
  if (direction == "up") {
    ITEMS[index].qty += 1;
  } else if (direction == "down") {
    ITEMS[index].qty -= 1;
  } else {
    ITEMS[index].qty = parseInt(e.target.value);
  }

  if (ITEMS[index].qty < 1) {
    ITEMS[index].qty = 1;
  }

  refresh_items_display();
}

function show_modal(e) {
  let btnModal = document.querySelector("#btnModal");
  if (ITEMS.length == 0) {
    alert("Please add items in the cart!");
  } else {
    btnModal.setAttribute("data-toggle", "modal");
    btnModal.setAttribute("data-target", "#exampleModal");
  }
}

function reset_paid_amount() {
  let total = parseFloat(document.querySelector(".js-total").innerHTML);
  CHANGE =
    parseFloat(document.querySelector(".js-amount-paid-input").value) - total;
  document.querySelector(".js-amount-paid-input").value = "";
  let change = document.querySelector(".js-change-amount");
  CHANGE = CHANGE.toFixed(2);
  //Send cart data to db
  let ajax = new XMLHttpRequest();
  let form_data = new FormData();

  form_data.append("items", JSON.stringify(ITEMS));
  ajax.addEventListener("readystatechange", function (e) {
    if (ajax.readyState == 4 && ajax.status == 200) {
      console.log(ajax.responseText);
    }
  });
  ajax.open("POST", "http://localhost/pos/api/cartItems", true);
  ajax.send(form_data);

  if (CHANGE < 0) {
    change.innerHTML = "Not enough money";
  } else {
    change.innerHTML = CHANGE;
  }
}

function empty_cart() {
  ITEMS = [];
  refresh_items_display();
}

get_all();
