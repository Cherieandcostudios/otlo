function toggleCustomerDropdown() {
    const dropdown = document.getElementById('customerDropdown');
    const button = document.querySelector('.customer-name-btn');
    
    dropdown.classList.toggle('show');
    button.classList.toggle('active');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('customerDropdown');
    const button = document.querySelector('.customer-name-btn');
    
    if (dropdown && !event.target.closest('.customer-dropdown')) {
        dropdown.classList.remove('show');
        if (button) button.classList.remove('active');
    }
});