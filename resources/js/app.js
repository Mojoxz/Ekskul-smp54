// resources/js/app.js
import './bootstrap';
import 'flowbite';

// Simple JavaScript untuk interaksi
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('[class*="bg-green-100"], [class*="bg-red-100"]');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
});

// public/js/app.js - Enhanced Functionality

class SMPApp {
    constructor() {
        this.init();
    }

    init() {
        this.setupBackToTop();
        this.setupLazyLoading();
        this.setupToastNotifications();
        this.setupFormValidation();
        this.setupImageLightbox();
        this.setupScrollAnimations();
        this.setupSearchFunctionality();
        this.setupPreloader();
    }

    // Back to Top Button
    setupBackToTop() {
        const backToTopBtn = document.createElement('div');
        backToTopBtn.className = 'back-to-top';
        backToTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
        document.body.appendChild(backToTopBtn);

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Lazy Loading for Images
    setupLazyLoading() {
        const images = document.querySelectorAll('img[data-src]');
        
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });

        images.forEach(img => {
            img.classList.add('lazy');
            imageObserver.observe(img);
        });
    }

    // Toast Notifications
    setupToastNotifications() {
        window.showToast = (message, type = 'info', duration = 3000) => {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${this.getToastIcon(type)} mr-3"></i>
                    <span>${message}</span>
                    <button class="ml-4 text-gray-500 hover:text-gray-700" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;

            document.body.appendChild(toast);

            // Show toast
            setTimeout(() => toast.classList.add('show'), 100);

            // Hide toast after duration
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        };
    }

    getToastIcon(type) {
        const icons = {
            'success': 'check-circle',
            'error': 'exclamation-circle',
            'warning': 'exclamation-triangle',
            'info': 'info-circle'
        };
        return icons[type] || 'info-circle';
    }

    // Form Validation
    setupFormValidation() {
        const forms = document.querySelectorAll('form[data-validate]');
        
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                if (!this.validateForm(form)) {
                    e.preventDefault();
                    showToast('Please fill in all required fields correctly', 'error');
                }
            });

            // Real-time validation
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('blur', () => {
                    this.validateField(input);
                });
            });
        });
    }

    validateForm(form) {
        const inputs = form.querySelectorAll('[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!this.validateField(input)) {
                isValid = false;
            }
        });

        return isValid;
    }

    validateField(field) {
        const value = field.value.trim();
        const type = field.type;
        let isValid = true;
        let message = '';

        // Required validation
        if (field.hasAttribute('required') && !value) {
            isValid = false;
            message = 'This field is required';
        }

        // Email validation
        if (type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                message = 'Please enter a valid email address';
            }
        }

        // Phone validation
        if (field.name === 'phone' && value) {
            const phoneRegex = /^(\+62|62|0)[0-9]{9,13}$/;
            if (!phoneRegex.test(value)) {
                isValid = false;
                message = 'Please enter a valid phone number';
            }
        }

        // Update field appearance
        this.updateFieldValidation(field, isValid, message);
        return isValid;
    }

    updateFieldValidation(field, isValid, message) {
        const errorElement = field.parentElement.querySelector('.field-error');
        
        if (isValid) {
            field.classList.remove('border-red-500');
            field.classList.add('border-green-500');
            if (errorElement) errorElement.remove();
        } else {
            field.classList.remove('border-green-500');
            field.classList.add('border-red-500');
            
            if (!errorElement) {
                const error = document.createElement('p');
                error.className = 'field-error text-red-500 text-sm mt-1';
                error.textContent = message;
                field.parentElement.appendChild(error);
            } else {
                errorElement.textContent = message;
            }
        }
    }

    // Image Lightbox
    setupImageLightbox() {
        const lightboxImages = document.querySelectorAll('[data-lightbox]');
        
        if (lightboxImages.length === 0) return;

        // Create lightbox element
        const lightbox = document.createElement('div');
        lightbox.className = 'lightbox';
        lightbox.innerHTML = `
            <span class="close">&times;</span>
            <img src="" alt="">
        `;
        document.body.appendChild(lightbox);

        const lightboxImg = lightbox.querySelector('img');
        const closeBtn = lightbox.querySelector('.close');

        lightboxImages.forEach(img => {
            img.addEventListener('click', () => {
                lightboxImg.src = img.src;
                lightboxImg.alt = img.alt;
                lightbox.classList.add('active');
            });
        });

        closeBtn.addEventListener('click', () => {
            lightbox.classList.remove('active');
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });
    }

    // Scroll Animations
    setupScrollAnimations() {
        const animatedElements = document.querySelectorAll('[data-animate]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const animation = element.dataset.animate;
                    element.classList.add(animation);
                    observer.unobserve(element);
                }
            });
        }, {
            threshold: 0.1
        });

        animatedElements.forEach(el => {
            observer.observe(el);
        });
    }

    // Search Functionality
    setupSearchFunctionality() {
        const searchInputs = document.querySelectorAll('[data-search]');
        
        searchInputs.forEach(input => {
            const target = input.dataset.search;
            const searchableElements = document.querySelectorAll(`[data-searchable="${target}"]`);
            
            input.addEventListener('input', (e) => {
                const query = e.target.value.toLowerCase();
                
                searchableElements.forEach(element => {
                    const text = element.textContent.toLowerCase();
                    if (text.includes(query)) {
                        element.style.display = '';
                        element.classList.add('highlight-search');
                    } else {
                        element.style.display = 'none';
                        element.classList.remove('highlight-search');
                    }
                });
            });
        });
    }

    // Preloader
    setupPreloader() {
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.remove();
                }, 500);
            }
        });
    }
}

// Utility Functions
const utils = {
    // Debounce function
    debounce: (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    // Throttle function
    throttle: (func, limit) => {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },

    // Format date
    formatDate: (date, options = {}) => {
        const defaultOptions = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        return new Date(date).toLocaleDateString('id-ID', { ...defaultOptions, ...options });
    },

    // Copy to clipboard
    copyToClipboard: async (text) => {
        try {
            await navigator.clipboard.writeText(text);
            showToast('Copied to clipboard!', 'success');
        } catch (err) {
            console.error('Failed to copy: ', err);
            showToast('Failed to copy to clipboard', 'error');
        }
    },

    // Generate random ID
    generateId: () => {
        return Math.random().toString(36).substr(2, 9);
    },

    // Smooth scroll to element
    scrollToElement: (element, offset = 0) => {
        const targetPosition = element.offsetTop - offset;
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
    },

    // Check if element is in viewport
    isInViewport: (element) => {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
};

// Enhanced Loading States
class LoadingStates {
    static showButtonLoading(button) {
        button.classList.add('btn-loading');
        button.disabled = true;
    }

    static hideButtonLoading(button) {
        button.classList.remove('btn-loading');
        button.disabled = false;
    }

    static showPageLoading() {
        const loader = document.createElement('div');
        loader.id = 'page-loader';
        loader.className = 'fixed inset-0 bg-white bg-opacity-90 flex items-center justify-center z-50';
        loader.innerHTML = '<div class="loading-spinner"></div>';
        document.body.appendChild(loader);
    }

    static hidePageLoading() {
        const loader = document.getElementById('page-loader');
        if (loader) loader.remove();
    }
}

// Initialize app when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new SMPApp();
});

// Export for use in other scripts
window.SMPApp = SMPApp;
window.utils = utils;
window.LoadingStates = LoadingStates;
