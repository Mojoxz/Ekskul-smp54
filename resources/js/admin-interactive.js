// public/js/admin-interactive.js

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive features
    initSidebar();
    initDashboardStats();
    initNotifications();
    initTimeUpdater();
    initAnimations();
    initTooltips();
});

// Sidebar functionality
function initSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const sidebarLinks = document.querySelectorAll('.sidebar-link');

    // Mobile sidebar controls
    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        overlay.classList.add('opacity-100');
        document.body.classList.add('overflow-hidden');
        
        // Add slide animation
        setTimeout(() => {
            sidebar.classList.add('shadow-2xl');
        }, 100);
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('shadow-2xl');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Event listeners
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', (e) => {
            e.preventDefault();
            openSidebar();
        });
    }
    
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

    // Close sidebar with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && window.innerWidth < 1024) {
            closeSidebar();
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            closeSidebar();
        }
    });

    // Add active state to current page
    sidebarLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });
}

// Dashboard statistics with animations
function initDashboardStats() {
    const statsCards = document.querySelectorAll('.stats-card');
    
    // Add hover effects and click handlers
    statsCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Animate numbers counting up
    const numberElements = document.querySelectorAll('.count-up');
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumber(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    numberElements.forEach(element => {
        observer.observe(element);
    });
}

// Animate numbers counting up
function animateNumber(element) {
    const finalNumber = parseInt(element.textContent);
    const duration = 2000; // 2 seconds
    const startTime = Date.now();
    
    function update() {
        const elapsed = Date.now() - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function for smooth animation
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const currentNumber = Math.floor(finalNumber * easeOutQuart);
        
        element.textContent = currentNumber;
        
        if (progress < 1) {
            requestAnimationFrame(update);
        } else {
            element.textContent = finalNumber;
        }
    }
    
    element.textContent = '0';
    update();
}

// Notifications system
function initNotifications() {
    const notificationButton = document.querySelector('.notification-btn');
    
    if (notificationButton) {
        notificationButton.addEventListener('click', function() {
            showNotificationDropdown();
        });
    }
    
    // Simulate real-time notifications
    setInterval(() => {
        updateNotificationBadge();
    }, 30000); // Check every 30 seconds
}

function showNotificationDropdown() {
    // Create notification dropdown
    const dropdown = document.createElement('div');
    dropdown.className = 'absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 z-50';
    dropdown.innerHTML = `
        <div class="p-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-800">Notifikasi</h3>
        </div>
        <div class="max-h-64 overflow-y-auto">
            <div class="p-3 hover:bg-gray-50 border-b border-gray-100">
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Siswa baru mendaftar</p>
                        <p class="text-xs text-gray-500">5 menit yang lalu</p>
                    </div>
                </div>
            </div>
            <div class="p-3 hover:bg-gray-50 border-b border-gray-100">
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Presensi berhasil diverifikasi</p>
                        <p class="text-xs text-gray-500">15 menit yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 text-center border-t border-gray-200">
            <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Lihat semua notifikasi</a>
        </div>
    `;
    
    // Position and show dropdown
    const button = document.querySelector('.notification-btn');
    button.parentElement.style.position = 'relative';
    button.parentElement.appendChild(dropdown);
    
    // Close dropdown when clicking outside
    setTimeout(() => {
        document.addEventListener('click', function closeDropdown(e) {
            if (!dropdown.contains(e.target) && e.target !== button) {
                dropdown.remove();
                document.removeEventListener('click', closeDropdown);
            }
        });
    }, 100);
}

function updateNotificationBadge() {
    const badge = document.querySelector('.notification-badge');
    if (badge) {
        const currentCount = parseInt(badge.textContent) || 0;
        const newCount = currentCount + Math.floor(Math.random() * 3);
        badge.textContent = newCount;
        
        if (newCount > 0) {
            badge.style.display = 'block';
            badge.classList.add('animate-pulse');
        }
    }
}

// Time updater
function initTimeUpdater() {
    function updateTime() {
        const now = new Date();
        const options = {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        };
        const timeString = now.toLocaleTimeString('id-ID', options);
        
        const timeElement = document.getElementById('current-time');
        if (timeElement) {
            timeElement.textContent = timeString;
        }
        
        // Update date
        const dateElement = document.getElementById('current-date');
        if (dateElement) {
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            dateElement.textContent = now.toLocaleDateString('id-ID', dateOptions);
        }
    }

    updateTime();
    setInterval(updateTime, 1000);
}

// Animation utilities
function initAnimations() {
    // Staggered animation for cards
    const cards = document.querySelectorAll('.animate-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('fade-in-up');
    });

    // Floating elements
    const floatingElements = document.querySelectorAll('.floating');
    floatingElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.5}s`;
    });

    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
                scrollObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.scroll-animate').forEach(element => {
        scrollObserver.observe(element);
    });
}

// Tooltip initialization
function initTooltips() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    
    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', showTooltip);
        element.addEventListener('mouseleave', hideTooltip);
    });
}

function showTooltip(event) {
    const element = event.target;
    const tooltipText = element.getAttribute('data-tooltip');
    
    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip absolute z-50 px-2 py-1 text-xs text-white bg-gray-800 rounded shadow-lg';
    tooltip.textContent = tooltipText;
    tooltip.id = 'tooltip';
    
    document.body.appendChild(tooltip);
    
    const rect = element.getBoundingClientRect();
    tooltip.style.left = `${rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2)}px`;
    tooltip.style.top = `${rect.top - tooltip.offsetHeight - 8}px`;
    
    setTimeout(() => {
        tooltip.style.opacity = '1';
        tooltip.style.transform = 'translateY(0)';
    }, 10);
}

function hideTooltip() {
    const tooltip = document.getElementById('tooltip');
    if (tooltip) {
        tooltip.remove();
    }
}

// Utility functions
function showAlert(message, type = 'info') {
    const alert = document.createElement('div');
    alert.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm transform transition-all duration-300 translate-x-full`;
    
    const colors = {
        success: 'bg-green-500 text-white',
        error: 'bg-red-500 text-white',
        warning: 'bg-yellow-500 text-white',
        info: 'bg-blue-500 text-white'
    };
    
    alert.className += ` ${colors[type] || colors.info}`;
    alert.innerHTML = `
        <div class="flex items-center justify-between">
            <span>${message}</span>
            <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    document.body.appendChild(alert);
    
    // Slide in
    setTimeout(() => {
        alert.classList.remove('translate-x-full');
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        alert.classList.add('translate-x-full');
        setTimeout(() => alert.remove(), 300);
    }, 5000);
}

// Export functions for global use
window.AdminPanel = {
    showAlert,
    updateNotificationBadge,
    animateNumber
};