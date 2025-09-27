// Mobile menu toggle
const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu) {
            mobileMenu.classList.toggle('active');
        }
    });
}

// Close mobile menu button
const mobileMenuClose = document.getElementById('mobileMenuClose');
if (mobileMenuClose) {
    mobileMenuClose.addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu) {
            mobileMenu.classList.remove('active');
        }
    });
}

// Close mobile menu when clicking outside
document.addEventListener('click', function(e) {
    const mobileMenu = document.getElementById('mobileMenu');
    const toggleButton = document.querySelector('.mobile-menu-toggle');
    if (mobileMenu && toggleButton && !mobileMenu.contains(e.target) && !toggleButton.contains(e.target)) {
        mobileMenu.classList.remove('active');
    }
});

// Smooth scrolling for navigation
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const href = this.getAttribute('href');
        if (href && href !== '#') {
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    });
});

// Header scroll effect
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (header) {
        if (window.scrollY > 100) {
            header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
        } else {
            header.style.boxShadow = '0 1px 3px rgba(0,0,0,0.1)';
        }
    }
});

// Menu functionality - cart counter
let cartCount = 0;

// Menu item page functionality
let selectedSize = 'grande';

function selectSize(size) {
    selectedSize = size;
    
    // Update UI
    document.querySelectorAll('.size-option').forEach(option => {
        option.classList.remove('selected');
    });
    event.target.closest('.size-option').classList.add('selected');
    
    // Update price and calories if sizePrices exists
    if (typeof sizePrices !== 'undefined') {
        const sizeData = sizePrices[size];
        const priceDisplay = document.getElementById('priceDisplay');
        const caloriesDisplay = document.getElementById('caloriesDisplay');
        if (priceDisplay && sizeData) {
            priceDisplay.textContent = `₹${sizeData.price}`;
        }
        if (caloriesDisplay && sizeData) {
            caloriesDisplay.textContent = `${sizeData.calories} calories*`;
        }
    }
}

function openCustomize() {
    alert('Customize options would open here - milk type, sweeteners, temperature, etc.');
}

function addToOrder() {
    cartCount++;
    const cartCountElement = document.getElementById('cartCount') || document.querySelector('.cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = cartCount;
    }

    // Add animation to cart
    const cartIcon = document.querySelector('.cart-icon');
    if (cartIcon) {
        cartIcon.style.transform = 'scale(1.2)';
        setTimeout(() => {
            cartIcon.style.transform = 'scale(1)';
        }, 200);
    }

    // Show success message
    const button = event.target;
    const originalText = button.textContent;
    button.textContent = 'Added to Order!';
    button.style.background = '#28a745';

    setTimeout(() => {
        button.textContent = originalText;
        button.style.background = '#b40c25';
    }, 2000);
}

// Feature page functionality
function orderDrink(drinkName) {
    // Add visual feedback
    const card = event.currentTarget;
    card.style.transform = 'translateY(-12px) scale(0.98)';

    setTimeout(() => {
        card.style.transform = 'translateY(-12px) scale(1)';
        alert(`${drinkName} added to your order! 🎃`);
    }, 150);
}

// Animation observer for feature page
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all cards
    document.querySelectorAll('.product-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});