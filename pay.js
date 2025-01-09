// pay.js
document.getElementById('payment-method').addEventListener('change', function() {
    const method = this.value;
    const fields = document.querySelectorAll('.payment-fields');
    
    // Hide all fields
    fields.forEach(field => field.style.display = 'none');
    
    // Show relevant fields based on selected payment method
    if (method === 'credit-card') {
        document.getElementById('credit-card-fields').style.display = 'block';
    } else if (method === 'paypal') {
        document.getElementById('paypal-fields').style.display = 'block';
    } else if (method === 'bank-transfer') {
        document.getElementById('bank-transfer-fields').style.display = 'block';
    } else if (method === 'digital-wallet') {
        document.getElementById('digital-wallet-fields').style.display = 'block';
    } else if (method === 'upi') {
        document.getElementById('upi-fields').style.display = 'block';
    } else if (method === 'net-banking') {
        document.getElementById('net-banking-fields').style.display = 'block';
    }
});

// Handle form submission
document.getElementById('payment-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const method = document.getElementById('payment-method').value;
    let message = '';

    if (method === 'credit-card') {
        // Validate and process credit card information
        message = 'Payment Done successfully!';
    } else if (method === 'paypal') {
        // Redirect to PayPal or show message
        message = 'Payment Done successfully!';
    } else if (method === 'bank-transfer') {
        // Validate and process bank transfer information
        message = 'Payment Done successfully!';
    } else if (method === 'digital-wallet') {
        // Validate and process digital wallet information
        message = 'Payment Done successfully!';
    } else if (method === 'upi') {
        // Validate and process UPI information
        message = 'Payment Done successfully!';
    } else if (method === 'net-banking') {
        // Validate and process net banking information
        message = 'Payment Done successfully!';
    } else {
        message = 'Please select a payment method.';
    }

    document.getElementById('message').textContent = message;
    document.getElementById('message').style.color = 'green';
});
