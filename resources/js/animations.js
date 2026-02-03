// Lightweight animation helpers: IntersectionObserver to reveal elements on scroll
// Elements: add class `animate-on-scroll` for scroll reveal, or `animate-on-load` for page-load reveal
// Optionally add `data-anim-delay="100"` (milliseconds) to stagger

function applyInView(el, delay = 0) {
    const run = () => {
        // Remove initial hidden classes and add visible classes
        el.classList.remove('opacity-0', 'translate-y-6', 'scale-95');
        el.classList.add('opacity-100', 'translate-y-0', 'scale-100');
        el.classList.add('in-view');
    };

    if (delay > 0) {
        setTimeout(run, delay);
    } else {
        run();
    }
}

function initScrollAnimations() {
    const opts = {
        root: null,
        rootMargin: '0px 0px -10% 0px',
        threshold: 0.15,
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const el = entry.target;
            const delay = parseInt(el.dataset.animDelay || 0, 10);
            if (entry.isIntersecting) {
                // Debug: log which element is entering view
                console.debug('[animations] in-view:', el, 'delay:', delay);
                applyInView(el, delay);
                observer.unobserve(el);
            }
        });
    }, opts);

    const nodes = document.querySelectorAll('.animate-on-scroll');
    console.debug('[animations] initScrollAnimations, targets:', nodes.length);

    nodes.forEach(el => {
        // Ensure initial hidden state
        el.classList.add('opacity-0', 'translate-y-6', 'scale-95');
        observer.observe(el);
    });
}

function initLoadAnimations() {
    document.querySelectorAll('.animate-on-load').forEach(el => {
        const delay = parseInt(el.dataset.animDelay || 0, 10);
        applyInView(el, delay);
    });
}

function initAnimations() {
    if (typeof window === 'undefined') return;

    initScrollAnimations();
    initLoadAnimations();

    // expose helpers
    window.animateIn = (el, delay = 0) => applyInView(el, delay);
}

// Auto-init on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAnimations);
} else {
    initAnimations();
}

export default initAnimations;
