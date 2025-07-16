// Variables globales
let menuVisible = false;

document.addEventListener('DOMContentLoaded', function() {
    const menuMobile = document.querySelector(".menu-mobile");
    const menuNav = document.querySelector(".menu nav ul");

    // Función para alternar el menú móvil
    function toggleMenu() {
        menuVisible = !menuVisible;
        menuNav.style.display = menuVisible ? 'flex' : 'none';
        menuMobile.classList.toggle('active');
        
        // Añadir/remover clase para animación
        if (menuVisible) {
            setTimeout(() => menuNav.classList.add('active'), 10);
        } else {
            menuNav.classList.remove('active');
        }
    }

    // Event listeners
    if (menuMobile) {
        menuMobile.addEventListener("click", toggleMenu);
    }

    // Cerrar menú al hacer click fuera
    document.addEventListener('click', function(e) {
        if (menuVisible && 
            !menuNav.contains(e.target) && 
            !menuMobile.contains(e.target)) {
            toggleMenu();
        }
    });

    // Ajustar menú en resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            menuNav.style.display = 'flex';
            menuVisible = false;
            menuMobile.classList.remove('active');
        } else if (!menuVisible) {
            menuNav.style.display = 'none';
        }
    });

    // Inicializar carrusel si existe
    const carouselContainer = document.querySelector('.carousel-container');
    if (carouselContainer) {
        new Carousel(carouselContainer);
    }
});

// Función para seleccionar opciones del menú
function seleccionar(link) {
    if (!link) return;
    
    document.querySelectorAll(".menu nav ul a").forEach(a => {
        a.classList.remove("seleccionado");
    });
    
    link.classList.add("seleccionado");

    // Cerrar menú móvil si está abierto
    if (window.innerWidth <= 768 && menuVisible) {
        document.querySelector(".menu-mobile").click();
    }
}


// Cerrar menú al hacer click fuera
document.addEventListener('click', function(e) {
    const menuNav = document.querySelector(".menu nav ul");
    const menuMobile = document.querySelector(".menu-mobile");
    
    if (window.innerWidth <= 768 && 
        menuNav.style.display === 'flex' && 
        !menuNav.contains(e.target) && 
        !menuMobile.contains(e.target)) {
        menuNav.style.display = 'none';
    }
});

// Ajustar menú en cambio de tamaño de ventana
window.addEventListener('resize', function() {
    const menuNav = document.querySelector(".menu nav ul");
    if (window.innerWidth > 768) {
        menuNav.style.display = 'flex';
    } else {
        menuNav.style.display = 'none';
    }
});

// Clase Carousel
class Carousel {
    constructor(container) {
        this.container = container;
        this.slides = Array.from(container.querySelectorAll('.carousel-slide'));
        this.totalSlides = this.slides.length;
        this.currentSlide = 0;
        this.autoplayInterval = null;
        this.autoplayDelay = 5000;
        this.isTransitioning = false;

        this.init();
    }

    init() {
        this.createControls();
        this.showSlide(0);
        this.startAutoplay();
        this.setupEventListeners();
    }

    createControls() {
        // Crear botones de navegación
        const prevButton = document.createElement('button');
        prevButton.className = 'carousel-button prev';
        prevButton.innerHTML = '<svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>';
        prevButton.addEventListener('click', () => this.prevSlide());

        const nextButton = document.createElement('button');
        nextButton.className = 'carousel-button next';
        nextButton.innerHTML = '<svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>';
        nextButton.addEventListener('click', () => this.nextSlide());

        // Crear indicadores
        const dotsContainer = document.createElement('div');
        dotsContainer.className = 'carousel-controls';
        
        for (let i = 0; i < this.totalSlides; i++) {
            const dot = document.createElement('div');
            dot.className = 'carousel-dot';
            dot.addEventListener('click', () => this.showSlide(i));
            dotsContainer.appendChild(dot);
        }

        this.container.appendChild(prevButton);
        this.container.appendChild(nextButton);
        this.container.appendChild(dotsContainer);
    }

    setupEventListeners() {
        // Eventos de mouse
        this.container.addEventListener('mouseenter', () => this.stopAutoplay());
        this.container.addEventListener('mouseleave', () => this.startAutoplay());
        
        // Eventos táctiles
        let touchStartX = 0;
        let touchEndX = 0;
        
        this.container.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        
        this.container.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe(touchStartX, touchEndX);
        }, { passive: true });
    }

    showSlide(index) {
        if (this.isTransitioning) return;
        this.isTransitioning = true;

        this.slides.forEach(slide => slide.classList.remove('active'));
        const dots = this.container.querySelectorAll('.carousel-dot');
        dots.forEach(dot => dot.classList.remove('active'));
        
        dots[index].classList.add('active');
        this.slides[index].classList.add('active');
        this.currentSlide = index;

        setTimeout(() => {
            this.isTransitioning = false;
        }, 500);
    }

    nextSlide() {
        if (this.isTransitioning) return;
        const next = (this.currentSlide + 1) % this.totalSlides;
        this.showSlide(next);
    }

    prevSlide() {
        if (this.isTransitioning) return;
        const prev = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.showSlide(prev);
    }

    startAutoplay() {
        if (this.autoplayInterval) return;
        this.autoplayInterval = setInterval(() => this.nextSlide(), this.autoplayDelay);
    }

    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
            this.autoplayInterval = null;
        }
    }

    handleSwipe(startX, endX) {
        const diff = startX - endX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                this.nextSlide();
            } else {
                this.prevSlide();
            }
        }
    }
}

