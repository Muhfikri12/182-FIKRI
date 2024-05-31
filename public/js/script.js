document.addEventListener("DOMContentLoaded", (event) => {
    const today = new Date();
    const day = today.getDate();
    const month = today.getMonth() + 1;
    const year = today.getFullYear();
    const formattedDate = `${day}/${month}/${year}`;
    document.getElementById("today-date").innerText = formattedDate;
});

function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");
    const timeString = `${hours}:${minutes}:${seconds}`;

    document.getElementById("clock").textContent = timeString;
}

setInterval(updateClock, 1000);

updateClock();

function transaction() {
    document
        .getElementById("id_cashier")
        .addEventListener("change", function () {
            var selectElement = document.getElementById("id_cashier");
            var selectedOption =
                selectElement.options[selectElement.selectedIndex];
            var cashierNameInput = document.getElementById("cashier_name");
            cashierNameInput.value = selectedOption.text;
        });

    document
        .getElementById("submit-btn")
        .addEventListener("click", function () {
            var selectElement = document.getElementById("id_cashier");
            var selectedOption =
                selectElement.options[selectElement.selectedIndex];
            var cashierNameInput = document.getElementById("cashier_name");
            cashierNameInput.value = selectedOption.text;
            let formData = new FormData(
                document.getElementById("transaction-form")
            );
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/submit", true);
            xhr.setRequestHeader(
                "X-CSRF-TOKEN",
                document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content")
            );

            xhr.onload = function () {
                if (xhr.status === 200) {
                    let data = JSON.parse(xhr.responseText);
                    let detailTable = document.getElementById("detail-table");
                    let outstanding = 0;

                    console.log(data);

                    if (data.pay_method === "lunas") {
                        outstanding = 0;
                    } else {
                        outstanding = data.total;
                    }

                    detailTable.innerHTML = `
                    <tr><td>Nama Pelanggan</td><td>: ${
                        data.customer_name
                    }</td></tr>
                    <tr><td>Nama Admin</td><td>: ${data.cashier_name}</td></tr>
                    <tr><td>Alamat</td><td>: ${data.address}</td></tr>
                    <tr><td>Nomor Handphone</td><td>: ${
                        data.phone_number
                    }</td></tr>
                    <tr><td>Jenis Pelayanan</td><td>: ${data.services}</td></tr>
                    <tr><td>Harga</td><td>: ${data.price}</td></tr>
                    <tr><td>Quantity</td><td>: ${data.quantity} Kg</td></tr>
                    <tr><td>Total</td><td>: ${data.total}</td></tr>
                    <tr><td>Jenis Pembayaran</td><td>: ${
                        data.pay_method
                    }</td></tr>
                    <tr><td>Total Uang</td><td>: ${data.money}</td></tr>
                    <tr><td>Total Kembalian</td><td>: ${
                        data.money - data.total
                    }</td></tr>
                    <tr><td>Sisa Pembayaran</td><td>: ${outstanding}</td></tr>

                `;
                }
            };

            xhr.send(formData);
        });
}

transaction();

document.getElementById("id_cashier").addEventListener("change", function () {
    var selectElement = document.getElementById("id_cashier");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var cashierNameInput = document.getElementById("cashier_name");
    cashierNameInput.value = selectedOption.text;
});

const servicesSelect = document.getElementById("services");
const priceInput = document.getElementById("price");
const paymentInput = document.getElementById("pay_method");
const quantityInput = document.getElementById("quantity");
const totalInput = document.getElementById("total");
const outstandingPaymentInput = document.getElementById("outstanding-payment");

const servicePrices = {
    express: 10000,
    oneday: 8000,
    regular: 5000,
};

servicesSelect.addEventListener("change", updatePriceAndTotal);
quantityInput.addEventListener("input", calculateTotal);
paymentInput.addEventListener("change", calculateOutstandingPayment);

function updatePriceAndTotal() {
    const selectedService = servicesSelect.value;
    const price = servicePrices[selectedService];
    priceInput.value = price;
    calculateTotal();
}

function calculateTotal() {
    const price = parseFloat(priceInput.value) || 0;
    const quantity = parseFloat(quantityInput.value) || 0;
    const total = price * quantity;
    totalInput.value = total;
    calculateOutstandingPayment();
}

function calculateOutstandingPayment() {
    const paymentMethod = paymentInput.value;
    const total = parseFloat(totalInput.value) || 0;
    let outstandingPayment = 0;

    console.log(total);

    if (paymentMethod === "lunas") {
        outstandingPayment = 0;
    } else if (paymentMethod === "take-and-pay") {
        outstandingPayment = total;
    }

    outstandingPaymentInput.value = outstandingPayment;
}

updatePriceAndTotal();

document.addEventListener("DOMContentLoaded", function () {
    console.log("Document loaded");
    setTimeout(function () {
        var flashMessage = document.getElementById("flash-message");
        if (flashMessage) {
            console.log("Hiding flash message");
            flashMessage.style.display = "none";
        }
    }, 1000); // 5000 milliseconds = 5 seconds
});

// automatis kalkulasi data pengeluaran

// function calculateTotal(input) {
//     // Temukan baris yang berisi input saat ini
//     var row = input.parentNode.parentNode;

//     // Dapatkan nilai dari input quantity dan price di baris ini
//     var quantity = row.querySelector('input[name="items_quantity[]"]').value;
//     var price = row.querySelector('input[name="items_price[]"]').value;

//     // Hitung totalnya
//     var total = quantity * price;

//     // Perbarui nilai input total di baris ini
//     row.querySelector('input[name="items_total[]"]').value = total;
// }

// calculateTotal();
