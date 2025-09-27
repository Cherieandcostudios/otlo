// Authentication JavaScript for Laravel Forms
document.addEventListener('DOMContentLoaded', function() {
    initPasswordToggles();
    initFormSubmissions();
});

// Password Toggle Functionality
function initPasswordToggles() {
    const passwordToggles = document.querySelectorAll('.password-toggle');
    
    passwordToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const input = this.parentElement.querySelector('input');
            const icon = this.querySelector('span');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = '🙈';
            } else {
                input.type = 'password';
                icon.textContent = '👁️';
            }
        });
    });
}

// Form Submissions
function initFormSubmissions() {
    const signinForm = document.getElementById('signinForm');
    const joinForm = document.getElementById('joinForm');
    
    if (signinForm) {
        signinForm.addEventListener('submit', handleFormSubmit);
    }
    
    if (joinForm) {
        joinForm.addEventListener('submit', handleFormSubmit);
    }
}

function handleFormSubmit(e) {
    const form = e.target;
    const submitBtn = form.querySelector('.auth-submit-btn');
    
    // Show loading state
    showLoadingState(submitBtn);
    
    // Clear previous errors
    clearFormErrors(form);
    
    // Let the form submit normally to Laravel
    // The loading state will be cleared when the page reloads or redirects
}

function showLoadingState(button) {
    button.classList.add('loading');
    button.disabled = true;
    button.textContent = 'Processing...';
}

function clearFormErrors(form) {
    const errorMessages = form.querySelectorAll('.error-message');
    errorMessages.forEach(error => {
        if (!error.classList.contains('server-error')) {
            error.remove();
        }
    });
    
    const inputs = form.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.classList.remove('error', 'success');
    });
}

// Success message display (for when redirected back with success)
function showSuccessMessage(message) {
    const successDiv = document.createElement('div');
    successDiv.className = 'success-message';
    successDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #10b981;
        color: white;
        padding: 16px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        z-index: 1000;
        font-weight: 500;
        max-width: 400px;
        animation: slideInRight 0.3s ease-out;
    `;
    successDiv.textContent = message;
    
    document.body.appendChild(successDiv);
    
    setTimeout(() => {
        successDiv.style.animation = 'slideOutRight 0.3s ease-out';
        setTimeout(() => {
            if (successDiv.parentNode) {
                successDiv.parentNode.removeChild(successDiv);
            }
        }, 300);
    }, 5000);
}

// Add CSS animations
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
    
    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    
    .form-input.error {
        border-color: #ef4444;
    }
    
    .auth-submit-btn.loading {
        opacity: 0.7;
        cursor: not-allowed;
    }
`;
document.head.appendChild(style);