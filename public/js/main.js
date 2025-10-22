/**
 * CyberUI - Main JavaScript
 * Handles all interactive elements
 */

document.addEventListener('DOMContentLoaded', function() {

    // =================================================================
    // Mobile Navigation Toggle
    // =================================================================
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');

            // Animate hamburger icon
            const spans = navToggle.querySelectorAll('span');
            if (navMenu.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!navToggle.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('active');
                const spans = navToggle.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
    }

    // =================================================================
    // Carousel Functionality
    // =================================================================
    const carouselContainer = document.getElementById('carouselContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const indicators = document.querySelectorAll('.indicator');

    if (carouselContainer) {
        const slides = carouselContainer.querySelectorAll('.carousel-slide');
        let currentSlide = 0;
        let autoplayInterval;

        function showSlide(index) {
            // Remove active class from all slides and indicators
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));

            // Add active class to current slide and indicator
            if (slides[index]) {
                slides[index].classList.add('active');
                if (indicators[index]) {
                    indicators[index].classList.add('active');
                }
            }
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        function startAutoplay() {
            autoplayInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoplay() {
            clearInterval(autoplayInterval);
        }

        // Event listeners
        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                stopAutoplay();
                prevSlide();
                startAutoplay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                stopAutoplay();
                nextSlide();
                startAutoplay();
            });
        }

        // Indicator click events
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function() {
                stopAutoplay();
                currentSlide = index;
                showSlide(currentSlide);
                startAutoplay();
            });
        });

        // Pause autoplay on hover
        carouselContainer.addEventListener('mouseenter', stopAutoplay);
        carouselContainer.addEventListener('mouseleave', startAutoplay);

        // Start autoplay
        startAutoplay();
    }

    // =================================================================
    // Horizontal Scroll for Articles
    // =================================================================
    const articlesScroll = document.getElementById('articlesScroll');
    const articlesScrollLeft = document.getElementById('articlesScrollLeft');
    const articlesScrollRight = document.getElementById('articlesScrollRight');

    if (articlesScroll && articlesScrollLeft && articlesScrollRight) {
        articlesScrollLeft.addEventListener('click', function() {
            articlesScroll.scrollBy({
                left: -400,
                behavior: 'smooth'
            });
        });

        articlesScrollRight.addEventListener('click', function() {
            articlesScroll.scrollBy({
                left: 400,
                behavior: 'smooth'
            });
        });

        // Show/hide scroll buttons based on scroll position
        function updateScrollButtons() {
            const scrollLeft = articlesScroll.scrollLeft;
            const maxScroll = articlesScroll.scrollWidth - articlesScroll.clientWidth;

            articlesScrollLeft.style.opacity = scrollLeft > 0 ? '1' : '0.3';
            articlesScrollLeft.style.pointerEvents = scrollLeft > 0 ? 'auto' : 'none';

            articlesScrollRight.style.opacity = scrollLeft < maxScroll ? '1' : '0.3';
            articlesScrollRight.style.pointerEvents = scrollLeft < maxScroll ? 'auto' : 'none';
        }

        articlesScroll.addEventListener('scroll', updateScrollButtons);
        updateScrollButtons();
    }

    // =================================================================
    // Horizontal Scroll for Alerts
    // =================================================================
    const alertesScroll = document.getElementById('alertesScroll');
    const alertesScrollLeft = document.getElementById('alertesScrollLeft');
    const alertesScrollRight = document.getElementById('alertesScrollRight');

    if (alertesScroll && alertesScrollLeft && alertesScrollRight) {
        alertesScrollLeft.addEventListener('click', function() {
            alertesScroll.scrollBy({
                left: -400,
                behavior: 'smooth'
            });
        });

        alertesScrollRight.addEventListener('click', function() {
            alertesScroll.scrollBy({
                left: 400,
                behavior: 'smooth'
            });
        });

        // Show/hide scroll buttons based on scroll position
        function updateAlertScrollButtons() {
            const scrollLeft = alertesScroll.scrollLeft;
            const maxScroll = alertesScroll.scrollWidth - alertesScroll.clientWidth;

            alertesScrollLeft.style.opacity = scrollLeft > 0 ? '1' : '0.3';
            alertesScrollLeft.style.pointerEvents = scrollLeft > 0 ? 'auto' : 'none';

            alertesScrollRight.style.opacity = scrollLeft < maxScroll ? '1' : '0.3';
            alertesScrollRight.style.pointerEvents = scrollLeft < maxScroll ? 'auto' : 'none';
        }

        alertesScroll.addEventListener('scroll', updateAlertScrollButtons);
        updateAlertScrollButtons();
    }

    // =================================================================
    // Smooth Scroll for Anchor Links
    // =================================================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // =================================================================
    // Form Validation
    // =================================================================
    const incidentForm = document.querySelector('.incident-form');

    if (incidentForm) {
        incidentForm.addEventListener('submit', function(e) {
            // Get all required fields
            const requiredFields = incidentForm.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                // Remove any existing error styling
                field.style.borderColor = 'rgba(255, 255, 255, 0.1)';

                // Check if field is empty
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = 'var(--danger-color)';

                    // Scroll to first invalid field
                    if (isValid === false) {
                        field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });

            // If form is not valid, prevent submission
            if (!isValid) {
                e.preventDefault();

                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-error';
                errorDiv.style.background = 'rgba(255, 56, 96, 0.1)';
                errorDiv.style.borderLeft = '4px solid var(--danger-color)';
                errorDiv.style.padding = '1rem';
                errorDiv.style.marginBottom = '1rem';
                errorDiv.style.borderRadius = 'var(--border-radius)';
                errorDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> Veuillez remplir tous les champs obligatoires.';

                // Remove any existing error messages
                const existingError = incidentForm.querySelector('.alert-error');
                if (existingError) {
                    existingError.remove();
                }

                incidentForm.insertBefore(errorDiv, incidentForm.firstChild);

                // Remove error message after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            }
        });

        // Real-time validation
        const formFields = incidentForm.querySelectorAll('input, select, textarea');
        formFields.forEach(field => {
            field.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value.trim()) {
                    this.style.borderColor = 'var(--danger-color)';
                } else {
                    this.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                }
            });

            field.addEventListener('input', function() {
                if (this.hasAttribute('required') && this.value.trim()) {
                    this.style.borderColor = 'var(--success-color)';
                }
            });
        });
    }

    // =================================================================
    // Animate Elements on Scroll
    // =================================================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements
    const animateElements = document.querySelectorAll('.item-card, .action-card, .doc-card, .contact-item');
    animateElements.forEach(el => {
        el.style.opacity = '0';
        observer.observe(el);
    });

    // =================================================================
    // Search Form Enhancement
    // =================================================================
    const searchInputs = document.querySelectorAll('.search-box input');

    searchInputs.forEach(input => {
        // Clear button
        const clearBtn = document.createElement('button');
        clearBtn.innerHTML = '<i class="fas fa-times"></i>';
        clearBtn.style.cssText = `
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 1rem;
            padding: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        `;

        if (input.parentElement) {
            input.parentElement.style.position = 'relative';
            input.parentElement.appendChild(clearBtn);
        }

        // Show clear button when there's text
        input.addEventListener('input', function() {
            if (this.value.length > 0) {
                clearBtn.style.opacity = '1';
            } else {
                clearBtn.style.opacity = '0';
            }
        });

        // Clear input when clicking clear button
        clearBtn.addEventListener('click', function(e) {
            e.preventDefault();
            input.value = '';
            clearBtn.style.opacity = '0';
            input.focus();
        });

        // Initial check
        if (input.value.length > 0) {
            clearBtn.style.opacity = '1';
        }
    });

    // =================================================================
    // Progress Bar Animation
    // =================================================================
    const progressBars = document.querySelectorAll('.progress-fill');

    const progressObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressFill = entry.target;
                const targetWidth = progressFill.style.width;
                progressFill.style.width = '0%';

                setTimeout(() => {
                    progressFill.style.width = targetWidth;
                }, 100);

                progressObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    progressBars.forEach(bar => {
        progressObserver.observe(bar);
    });

    // =================================================================
    // Auto-hide Alert Messages
    // =================================================================
    const alerts = document.querySelectorAll('.alert');

    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s ease';

            setTimeout(() => {
                alert.style.display = 'none';
            }, 500);
        }, 5000);
    });

    // =================================================================
    // Dropdown Menu for Mobile
    // =================================================================
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const dropdown = this.closest('.dropdown');
                const menu = dropdown.querySelector('.dropdown-menu');

                // Toggle menu visibility
                if (menu.style.opacity === '1') {
                    menu.style.opacity = '0';
                    menu.style.visibility = 'hidden';
                } else {
                    // Close other dropdowns
                    document.querySelectorAll('.dropdown-menu').forEach(m => {
                        m.style.opacity = '0';
                        m.style.visibility = 'hidden';
                    });

                    menu.style.opacity = '1';
                    menu.style.visibility = 'visible';
                }
            }
        });
    });

    // =================================================================
    // Loading State for Forms
    // =================================================================
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
                submitBtn.disabled = true;

                // Re-enable after 5 seconds in case of error
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            }
        });
    });

    // =================================================================
    // Keyboard Navigation for Carousel
    // =================================================================
    if (carouselContainer) {
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft' && prevBtn) {
                prevBtn.click();
            } else if (e.key === 'ArrowRight' && nextBtn) {
                nextBtn.click();
            }
        });
    }

    // =================================================================
    // Console Welcome Message
    // =================================================================
    console.log('%cCyberUI - Modern Cybersecurity Website Template', 'color: #0066ff; font-size: 16px; font-weight: bold;');
    console.log('%cProtecting the digital world, one line of code at a time.', 'color: #00d4ff; font-size: 12px;');
});
