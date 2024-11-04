<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vending Machine</title>
    <style>
        .inline-elements {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Vending Machine</h1>
    
    <form id="vendingForm">
        <fieldset>
            <legend>Products</legend>
            <label><input type="checkbox" id="coke" value="coke"> Coke (₱15)</label><br>
            <label><input type="checkbox" id="sprite" value="sprite"> Sprite (₱15)</label><br>
            <label><input type="checkbox" id="royal" value="royal"> Royal (₱20)</label><br>
            <label><input type="checkbox" id="pepsi" value="pepsi"> Pepsi (₱20)</label><br>
            <label><input type="checkbox" id="mountainDew" value="mountainDew"> Mountain Dew (₱20)</label><br>
        </fieldset>

        <fieldset>
            <legend>Options</legend>
            <div class="inline-elements">
                <label for="size">Select Size:</label>
                <select id="size">
                    <option value="regular">Regular</option>
                    <option value="upsize">Upsize (+₱5)</option>
                    <option value="jumbo">Jumbo (+₱10)</option>
                </select>

                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" min="0" value="0" onchange="validateQuantity()">

                <button type="button" onclick="checkout()">Checkout</button>
            </div>
        </fieldset>
        <hr>
    </form>

    <div id="summary"></div>

    <script>
        function validateQuantity() {
            const quantityInput = document.getElementById('quantity');
            // Ensure quantity is not less than 0
            if (quantityInput.value < 0) {
                quantityInput.value = 0;
            }
        }

        function checkout() {
            // Product prices
            const prices = {
                coke: 15,
                sprite: 15,
                royal: 20,
                pepsi: 20,
                mountainDew: 20
            };

            // Clear previous purchase summary to avoid duplicate entries
            const summary = document.getElementById('summary');
            summary.innerHTML = '';

            // Get selected size and calculate size adjustment
            const size = document.getElementById('size').value;
            let sizeAdjustment = 0;
            if (size === "upsize") {
                sizeAdjustment = 5;
            } else if (size === "jumbo") {
                sizeAdjustment = 10;
            }

            // Get quantity from input field
            const quantity = parseInt(document.getElementById('quantity').value) || 0;

            // Check if quantity is zero and display a message
            if (quantity === 0) {
                summary.innerHTML = 'You must select a quantity before checking out.<hr>';
                return; // Stop further execution
            }

            // Initialize total amounts and purchase details
            let totalAmount = 0;  // Reset total amount for each checkout
            let totalItems = 0;   // Reset total items for each checkout
            let purchaseDetails = '';
            let itemsCheckedOut = false;

            // Check products and calculate total amounts
            if (document.getElementById('coke').checked) {
                const amount = (quantity * prices.coke) + (quantity * sizeAdjustment);
                totalAmount += amount;
                totalItems += quantity;
                purchaseDetails += `${quantity} piece${quantity !== 1 ? 's' : ''} of ${size} Coke amounting to ₱${amount}<br>`;
                itemsCheckedOut = true;
            }
            if (document.getElementById('sprite').checked) {
                const amount = (quantity * prices.sprite) + (quantity * sizeAdjustment);
                totalAmount += amount;
                totalItems += quantity;
                purchaseDetails += `${quantity} piece${quantity !== 1 ? 's' : ''} of ${size} Sprite amounting to ₱${amount}<br>`;
                itemsCheckedOut = true;
            }
            if (document.getElementById('royal').checked) {
                const amount = (quantity * prices.royal) + (quantity * sizeAdjustment);
                totalAmount += amount;
                totalItems += quantity;
                purchaseDetails += `${quantity} piece${quantity !== 1 ? 's' : ''} of ${size} Royal amounting to ₱${amount}<br>`;
                itemsCheckedOut = true;
            }
            if (document.getElementById('pepsi').checked) {
                const amount = (quantity * prices.pepsi) + (quantity * sizeAdjustment);
                totalAmount += amount;
                totalItems += quantity;
                purchaseDetails += `${quantity} piece${quantity !== 1 ? 's' : ''} of ${size} Pepsi amounting to ₱${amount}<br>`;
                itemsCheckedOut = true;
            }
            if (document.getElementById('mountainDew').checked) {
                const amount = (quantity * prices.mountainDew) + (quantity * sizeAdjustment);
                totalAmount += amount;
                totalItems += quantity;
                purchaseDetails += `${quantity} piece${quantity !== 1 ? 's' : ''} of ${size} Mountain Dew amounting to ₱${amount}<br>`;
                itemsCheckedOut = true;
            }

            // Display summary only if items were checked out
            if (itemsCheckedOut) {
                summary.innerHTML = `
                    <h3>Purchase Summary</h3>
                    ${purchaseDetails}
                    <strong>Total Items: ${totalItems}</strong><br>
                    <strong>Total Amount: ₱${totalAmount}</strong>
                `;
            } else {
                summary.innerHTML = 'No items selected.';
            }

            // Clear input fields after checkout
            document.getElementById('vendingForm').reset();
        }
    </script>
</body>
</html>
