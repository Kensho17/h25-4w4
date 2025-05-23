(function(){
    console.log("carrousel.js");

    const heroRadios = document.querySelectorAll(".hero__radio__input");
    const carrousels = document.querySelectorAll(".hero__carrousel");
    let current = 0;
    const total = carrousels.length;

    const titre = document.querySelector(".hero__titre");
    const description = document.querySelector(".hero__description");

    function restartAnimations() {
        [titre, description].forEach(el => {
            el.classList.remove("anim-active");
            void el.offsetWidth; // Force le reflow pour relancer l'animation
            el.classList.add("anim-active");
        });
    }

    function switchCarousel(index) {
        carrousels[current].classList.remove("active");
        current = index;
        carrousels[current].classList.add("active");
        if (heroRadios[current]) {
            heroRadios[current].checked = true;
        }
        restartAnimations();
    }

    let interval;
    function startInterval() {
        if (interval) clearInterval(interval);
        interval = setInterval(() => {
            switchCarousel((current + 1) % total);
        }, 5000);
    }

    startInterval();

    heroRadios.forEach((radio, index) => {
        radio.addEventListener("click", () => {
            switchCarousel(index);
            startInterval();
        });
    });

    // Lancer l’animation au chargement
    restartAnimations();
})();
