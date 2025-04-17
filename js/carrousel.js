(function(){
    console.log('carrousel.js');
  
    // Sélection des radios et des slides
    const radios = document.querySelectorAll('.hero__radio__input');
    const slides = document.querySelectorAll('.hero__carrousel');
    console.log('Nombre de radios :', radios.length, '– Nombre de slides :', slides.length);
  
    let currentIndex = 0;
    const total = slides.length;
  
    /**
     * Affiche la slide d'indice idx et coche la radio correspondante.
     * @param {number} idx
     */
    function showSlide(idx) {
      // Coche la bonne radio
      radios[idx].checked = true;
  
      // Masque toutes les slides
      slides.forEach(slide => slide.classList.remove('hero__carrousel--active'));
  
      // Affiche la slide idx
      slides[idx].classList.add('hero__carrousel--active');
    }
  
    // Initialisation si on a au moins une slide
    if (total > 0) {
      showSlide(0);
  
      // Défilement automatique toutes les 5 secondes
      setInterval(() => {
        currentIndex = (currentIndex + 1) % total;
        showSlide(currentIndex);
      }, 5000);
  
      // Navigation manuelle via les radios
      radios.forEach((radio, idx) => {
        radio.addEventListener('change', () => {
          currentIndex = idx;
          showSlide(idx);
        });
      });
    } else {
      console.warn('Aucune slide trouvée pour le carrousel.');
    }
  })();