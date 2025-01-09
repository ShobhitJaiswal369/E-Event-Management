document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const outputContainer = document.createElement('div');
    document.body.appendChild(outputContainer); // Append the output container to the body

    const updateSelectedServices = () => {
        outputContainer.innerHTML = ''; // Clear previous output
        checkboxes.forEach(checkbox => {
            const price = checkbox.checked ? parseInt(checkbox.getAttribute('data-price')) : 0;
            const serviceLabel = document.querySelector(`label[for="${checkbox.id}"]`).innerText;

            // Display the service and its price if the checkbox is checked
            if (checkbox.checked) {
                const serviceInfo = document.createElement('p');
                serviceInfo.innerText = `Service: ${serviceLabel}, Price: ${price} K`;
                outputContainer.appendChild(serviceInfo);
            } else {
                // Display the unselected service with price set to 0
                const unselectedServiceInfo = document.createElement('p');
                unselectedServiceInfo.innerText = `Service: ${serviceLabel}, Price: 0 K`;
                outputContainer.appendChild(unselectedServiceInfo);
            }
        });
    };

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedServices);
    });

    // Initialize the display on page load
    updateSelectedServices();
});
