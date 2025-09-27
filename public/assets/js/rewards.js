// Rewards Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize the page
    initializePage();
    setupEventListeners();
    animateOnScroll();
});

// Global variables
let userPoints = 1250;
let rewardsClaimed = 8;

// Initialize page
function initializePage() {
    updatePointsDisplay();
    updateRewardButtons();
    setupMobileNavigation();
}

// Setup all event listeners
function setupEventListeners() {
    // Mobile navigation toggle - using existing theme selectors
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.add('active');
        });
    }
    
    if (mobileMenuClose && mobileMenu) {
        mobileMenuClose.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
        });
    }
    
    // Close mobile nav when clicking on a link
    const mobileNavLinks = document.querySelectorAll('.mobile-menu a');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (mobileMenu) {
                mobileMenu.classList.remove('active');
            }
        });
    });
    
    // Close modal when clicking outside
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    }
    
    // Smooth scroll for CTA button
    const ctaButton = document.querySelector('.cta-button');
    if (ctaButton) {
        ctaButton.addEventListener('click', function() {
            scrollToSection('rewards');
        });
    }
}

// Mobile Navigation Functions
function setupMobileNavigation() {
    const mobileMenu = document.querySelector('.mobile-menu');
    
    // Ensure mobile nav is closed on page load
    if (mobileMenu) {
        mobileMenu.classList.remove('active');
    }
}

function closeMobileNav() {
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (mobileMenu) {
        mobileMenu.classList.remove('active');
    }
}

// Points and Rewards Functions
function updatePointsDisplay() {
    const pointsElements = document.querySelectorAll('#userPoints, #currentPoints');
    pointsElements.forEach(element => {
        if (element) {
            animateNumber(element, userPoints);
        }
    });
    
    const rewardsElement = document.getElementById('rewardsClaimed');
    if (rewardsElement) {
        animateNumber(rewardsElement, rewardsClaimed);
    }
}

function updateRewardButtons() {
    const rewardCards = document.querySelectorAll('.reward-card');
    
    rewardCards.forEach(card => {
        const requiredPoints = parseInt(card.dataset.points);
        const redeemButton = card.querySelector('.redeem-btn');
        
        if (redeemButton) {
            if (userPoints < requiredPoints) {
                redeemButton.disabled = true;
                redeemButton.textContent = `Need ${requiredPoints - userPoints} more points`;
                redeemButton.style.background = '#ccc';
            } else {
                redeemButton.disabled = false;
                redeemButton.textContent = 'Redeem Now';
                redeemButton.style.background = '';
            }
        }
    });
}

function redeemReward(pointsCost, rewardName) {
    if (userPoints < pointsCost) {
        showNotification('Insufficient points!', 'error');
        return;
    }
    
    // Show loading state
    const rewardCard = event.target.closest('.reward-card');
    rewardCard.classList.add('loading');
    
    // Simulate API call delay
    setTimeout(() => {
        // Deduct points
        userPoints -= pointsCost;
        rewardsClaimed += 1;
        
        // Update displays
        updatePointsDisplay();
        updateRewardButtons();
        updateProgressBar();
        
        // Show success modal
        showSuccessModal(rewardName, pointsCost);
        
        // Mark card as redeemed temporarily
        rewardCard.classList.remove('loading');
        rewardCard.classList.add('redeemed');
        
        // Remove redeemed state after 3 seconds
        setTimeout(() => {
            rewardCard.classList.remove('redeemed');
        }, 3000);
        
        // Save to localStorage
        saveUserData();
        
    }, 1500); // Simulate network delay
}

function updateProgressBar() {
    const progressFill = document.querySelector('.progress-fill');
    const progressText = document.querySelector('.progress-section p');
    
    if (progressFill && progressText) {
        // Calculate progress towards next 200 point reward (cappuccino)
        const targetPoints = Math.ceil(userPoints / 200) * 200;
        const pointsNeeded = targetPoints - userPoints;
        const progress = ((200 - pointsNeeded) / 200) * 100;
        
        progressFill.style.width = `${progress}%`;
        
        if (pointsNeeded > 0) {
            progressText.textContent = `${pointsNeeded} more points to unlock a free cappuccino!`;
        } else {
            progressText.textContent = 'You can redeem a free cappuccino now!';
        }
    }
}

// Modal Functions
function showSuccessModal(rewardName, pointsCost) {
    const modal = document.getElementById('successModal');
    const rewardMessage = document.getElementById('rewardMessage');
    
    if (modal && rewardMessage) {
        rewardMessage.textContent = `You've successfully redeemed ${rewardName} for ${pointsCost} points!`;
        modal.style.display = 'block';
        
        // Add animation class
        const modalContent = modal.querySelector('.modal-content');
        modalContent.classList.add('fade-in');
        
        // Auto close after 5 seconds
        setTimeout(() => {
            closeModal();
        }, 5000);
    }
}

function closeModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.style.display = 'none';
        const modalContent = modal.querySelector('.modal-content');
        modalContent.classList.remove('fade-in');
    }
}

// Utility Functions
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        const headerHeight = document.querySelector('.header').offsetHeight;
        const sectionTop = section.offsetTop - headerHeight - 20;
        
        window.scrollTo({
            top: sectionTop,
            behavior: 'smooth'
        });
    }
}

function animateNumber(element, targetNumber) {
    const startNumber = 0;
    const duration = 1000; // 1 second
    const stepTime = 50;
    const steps = duration / stepTime;
    const increment = (targetNumber - startNumber) / steps;
    
    let currentNumber = startNumber;
    const timer = setInterval(() => {
        currentNumber += increment;
        if (currentNumber >= targetNumber) {
            currentNumber = targetNumber;
            clearInterval(timer);
        }
        element.textContent = Math.floor(currentNumber).toLocaleString();
    }, stepTime);
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'error' ? '#FF6347' : '#228B22'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        z-index: 3000;
        animation: slideInRight 0.3s ease;
    `;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Animation on Scroll
function animateOnScroll() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    // Observe elements to animate
    const elementsToAnimate = document.querySelectorAll('.step, .reward-card, .status-card');
    elementsToAnimate.forEach(element => {
        observer.observe(element);
    });
}

// Data Persistence
function saveUserData() {
    const userData = {
        points: userPoints,
        rewardsClaimed: rewardsClaimed,
        lastUpdated: new Date().toISOString()
    };
    
    try {
        localStorage.setItem('cafeRewardsData', JSON.stringify(userData));
    } catch (error) {
        console.warn('Could not save data to localStorage:', error);
    }
}

function loadUserData() {
    try {
        const savedData = localStorage.getItem('cafeRewardsData');
        if (savedData) {
            const userData = JSON.parse(savedData);
            userPoints = userData.points || 1250;
            rewardsClaimed = userData.rewardsClaimed || 8;
        }
    } catch (error) {
        console.warn('Could not load data from localStorage:', error);
    }
}

// Header scroll effect
function setupHeaderScroll() {
    const header = document.querySelector('.header');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 100) {
            header.style.background = 'rgba(255, 255, 255, 0.95)';
            header.style.backdropFilter = 'blur(10px)';
        } else {
            header.style.background = '#ffffff';
            header.style.backdropFilter = 'none';
        }
        
        // Hide header when scrolling down, show when scrolling up
        if (scrollTop > lastScrollTop && scrollTop > 200) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
    });
}

// Reward card hover effects
function setupRewardCardEffects() {
    const rewardCards = document.querySelectorAll('.reward-card');
    
    rewardCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            // Add subtle tilt effect
            this.style.transform = 'translateY(-8px) rotateX(5deg)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) rotateX(0)';
        });
    });
}

// Keyboard navigation support
function setupKeyboardNavigation() {
    document.addEventListener('keydown', function(event) {
        // Close modal with Escape key
        if (event.key === 'Escape') {
            closeModal();
            closeMobileNav();
        }
        
        // Navigate with arrow keys in rewards grid
        if (event.key === 'ArrowDown' || event.key === 'ArrowUp' || 
            event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
            handleGridNavigation(event);
        }
    });
}

function handleGridNavigation(event) {
    const focusedElement = document.activeElement;
    if (focusedElement.classList.contains('redeem-btn')) {
        event.preventDefault();
        const rewardCards = Array.from(document.querySelectorAll('.reward-card'));
        const currentCard = focusedElement.closest('.reward-card');
        const currentIndex = rewardCards.indexOf(currentCard);
        
        let newIndex = currentIndex;
        const columns = window.innerWidth > 768 ? 3 : 1;
        
        switch (event.key) {
            case 'ArrowLeft':
                newIndex = Math.max(0, currentIndex - 1);
                break;
            case 'ArrowRight':
                newIndex = Math.min(rewardCards.length - 1, currentIndex + 1);
                break;
            case 'ArrowUp':
                newIndex = Math.max(0, currentIndex - columns);
                break;
            case 'ArrowDown':
                newIndex = Math.min(rewardCards.length - 1, currentIndex + columns);
                break;
        }
        
        if (newIndex !== currentIndex) {
            const newButton = rewardCards[newIndex].querySelector('.redeem-btn');
            newButton.focus();
        }
    }
}

// Initialize additional features when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadUserData();
    setupHeaderScroll();
    setupRewardCardEffects();
    setupKeyboardNavigation();
    updateProgressBar();
});

// Handle window resize
window.addEventListener('resize', function() {
    closeMobileNav();
    updateRewardButtons();
});

// Add CSS animations dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Export functions for global access
window.redeemReward = redeemReward;
window.scrollToSection = scrollToSection;
window.closeModal = closeModal;