document.addEventListener('DOMContentLoaded', () => {
    console.log("destination.js chargé après DOMContentLoaded");
  
    const domaine = window.location.origin + '/4w4-voyage';
    const pays = [
      "France", "États-Unis", "Canada", "Argentine", "Chili",
      "Belgique", "Maroc", "Mexique", "Japon", "Italie",
      "Islande", "Chine", "Grèce", "Suisse"
    ];
  
    const menuPays        = document.getElementById("menu-pays");
    const destinationList = document.querySelector(".destination__list");
  
    if (!menuPays) {
      console.error("❌ Le conteneur #menu-pays est introuvable dans le DOM.");
      return;
    }
  
    // Génère dynamiquement les boutons pour chaque pays
    menuPays.innerHTML = '';
    pays.forEach((nomPays, index) => {
      const btn = document.createElement("button");
      btn.classList.add("categorie__ul__li");
      if (index === 0) btn.classList.add("active");
      btn.textContent = nomPays;
      btn.dataset.country = nomPays;
      menuPays.appendChild(btn);
    });
  
    // Active les événements de clic
    function parcourir_bouton() {
      const buttons = menuPays.querySelectorAll(".categorie__ul__li");
      buttons.forEach(btn => {
        btn.addEventListener("click", () => {
          buttons.forEach(b => b.classList.remove("active"));
          btn.classList.add("active");
          fetchArticles(btn.dataset.country);
        });
      });
    }
  
    // Fonction pour récupérer les articles
    function fetchArticles(filtre) {
      const isCategory = Number.isInteger(parseInt(filtre));
      const param      = isCategory
        ? `categories=${filtre}`
        : `search=${encodeURIComponent(filtre)}`;
      const url = `${domaine}/wp-json/wp/v2/posts?${param}`;
  
      destinationList.innerHTML = '<p class="loader">Chargement…</p>';
  
      fetch(url)
        .then(res => res.json())
        .then(data => {
          destinationList.innerHTML = '';
          if (data.length > 0) {
            data.forEach(article => {
              const articleEl = document.createElement("div");
              articleEl.classList.add("destination__item");
  
              const titreWrapper = document.createElement("div");
              titreWrapper.classList.add("destination__title-wrapper");
  
              const h3 = document.createElement("h3");
              h3.textContent = article.title.rendered;
              h3.classList.add("destination__titre");
  
              const boutonToggle = document.createElement("button");
              boutonToggle.textContent = "...";
              boutonToggle.classList.add("destination__toggle-button");
  
              const extrait = document.createElement("div");
              extrait.classList.add("destination__texte");
              extrait.innerHTML = article.excerpt.rendered;
              extrait.style.display = "none";
  
              const lien = document.createElement("a");
              lien.href = article.link;
              lien.textContent = "Lire plus";
              lien.style.display = "none";
  
              titreWrapper.appendChild(h3);
              titreWrapper.appendChild(boutonToggle);
              articleEl.appendChild(titreWrapper);
              articleEl.appendChild(extrait);
              articleEl.appendChild(lien);
  
              boutonToggle.addEventListener("click", () => {
                const visible = extrait.style.display === "block";
                extrait.style.display = visible ? "none" : "block";
                lien.style.display    = visible ? "none" : "inline";
                boutonToggle.textContent = visible ? "..." : "Masquer";
              });
  
              destinationList.appendChild(articleEl);
            });
          } else {
            destinationList.innerHTML = "<p>Aucune destination trouvée.</p>";
          }
        })
        .catch(err => {
          console.error("Erreur API:", err);
          destinationList.innerHTML = "<p>Erreur lors du chargement des destinations.</p>";
        });
    }
  
    // Initialisation
    fetchArticles("France");
    parcourir_bouton();
  });
  