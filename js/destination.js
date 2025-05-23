document.addEventListener('DOMContentLoaded', () => {
    console.log("destination.js chargé après DOMContentLoaded");
  
    // 1) Récupérer la base REST API depuis tpApi.root
    const baseUrl = (window.tpApi && tpApi.root)
      ? tpApi.root            // ex. "https://monsite.local/4w4-voyage/wp-json/"
      : window.location.origin.replace(/\/$/, '') + '/wp-json/';
  
    // 2) Liste des pays
    const pays = [
      "France", "États-Unis", "Canada", "Argentine", "Chili",
      "Belgique", "Maroc", "Mexique", "Japon", "Italie",
      "Islande", "Chine", "Grèce", "Suisse"
    ];
  
    // 3) Sélecteurs
    const menuPays        = document.getElementById("menu-pays");
    const destinationList = document.querySelector(".destination__list");
  
    if (!menuPays || !destinationList) {
      console.error("❌ Éléments DOM manquants pour destination.js");
      return;
    }
  
    // 4) Génération des boutons dynamiques
    menuPays.innerHTML = '';
    pays.forEach((nomPays, index) => {
      const btn = document.createElement("button");
      btn.classList.add("categorie__ul__li");
      if (index === 0) btn.classList.add("active");
      btn.textContent = nomPays;
      btn.dataset.query = nomPays;
      menuPays.appendChild(btn);
    });
  
    // 5) Attachement des événements de clic
    function parcourir_bouton() {
      const buttons = menuPays.querySelectorAll(".categorie__ul__li");
      buttons.forEach(btn => {
        btn.addEventListener('click', () => {
          buttons.forEach(b => b.classList.remove("active"));
          btn.classList.add("active");
          fetchArticles(btn.dataset.query);
        });
      });
    }
  
    // 6) Fonction de récupération et affichage des articles
    function fetchArticles(filtre) {
      const isCategory = Number.isInteger(parseInt(filtre, 10));
      const param      = isCategory
        ? `categories=${filtre}`
        : `search=${encodeURIComponent(filtre)}`;
  
      const url = `${baseUrl}wp/v2/posts?${param}`;
      destinationList.innerHTML = '<p class="loader">Chargement…</p>';
  
      fetch(url, {
        headers: {
          'X-WP-Nonce': (window.tpApi && tpApi.nonce) || ''
        }
      })
      .then(res => {
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const ct = res.headers.get('Content-Type') || '';
        if (!ct.includes('application/json')) {
          throw new Error('Réponse non JSON : ' + ct);
        }
        return res.json();
      })
      .then(data => {
        destinationList.innerHTML = '';
        if (!Array.isArray(data) || data.length === 0) {
          destinationList.innerHTML = '<p>Aucune destination trouvée.</p>';
          return;
        }
        data.forEach(post => {
          const articleEl = document.createElement("div");
          articleEl.classList.add("destination__item");
  
          const titreWrapper = document.createElement("div");
          titreWrapper.classList.add("destination__title-wrapper");
  
          const h3 = document.createElement("h3");
          h3.textContent = post.title.rendered;
          h3.classList.add("destination__titre");
  
          const boutonToggle = document.createElement("button");
          boutonToggle.textContent = "...";
          boutonToggle.classList.add("destination__toggle-button");
  
          const extrait = document.createElement("div");
          extrait.classList.add("destination__texte");
          extrait.innerHTML = post.excerpt.rendered;
          extrait.style.display = "none";
  
          const lien = document.createElement("a");
          lien.href = post.link;
          lien.textContent = "Lire plus";
          lien.style.display = "none";
  
          titreWrapper.appendChild(h3);
          titreWrapper.appendChild(boutonToggle);
          articleEl.appendChild(titreWrapper);
          articleEl.appendChild(extrait);
          articleEl.appendChild(lien);
  
          boutonToggle.addEventListener('click', () => {
            const visible = extrait.style.display === "block";
            extrait.style.display = visible ? "none" : "block";
            lien.style.display    = visible ? "none" : "inline";
            boutonToggle.textContent = visible ? "..." : "Masquer";
          });
  
          destinationList.appendChild(articleEl);
        });
      })
      .catch(err => {
        console.error("Erreur API:", err);
        destinationList.innerHTML = '<p>Erreur lors du chargement des destinations.</p>';
      });
    }
  
    // 7) Initialisation
    fetchArticles("France");
    parcourir_bouton();
  });

  (function() {
    console.log("vive Javascript");
 
    let categoryId = 3; // Remplacez par l'ID de la catégorie souhaitée
    const domaine = window.location.href;
    let apiUrl = `${domaine}/wp-json/wp/v2/posts?categories=${categoryId}`;
    const categorie__ul__li = document.querySelectorAll(".categorie__ul__li");
    console.log("categorie__ul__li.length", categorie__ul__li.length);
    categorie__ul__li.forEach(li => {
        li.addEventListener("click", function() {
            console.log(li.dataset.id);
            categoryId = li.dataset.id;
            apiUrl = `${domaine}/wp-json/wp/v2/posts?categories=${categoryId}`;
             mon_fetch(apiUrl);
        });
    });
           
 
    function mon_fetch(apiUrl) {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const destinationList = document.querySelector('.destination__list');
                destinationList.innerHTML = ''; 
                data.forEach(article => {
                    const articleElement = document.createElement('div');
                    articleElement.innerHTML = `
                        <h3 class="TitreArticleCategorie">${article.title.rendered}</h3>
                        <div class="descriptionArticleCategorie">${article.excerpt.rendered}</div>
                        <a class="descriptionArticleCategorie" href="${article.link}">Lire plus</a>
                    `;
                    destinationList.appendChild(articleElement);
                });
    
                const titreElements = document.getElementsByClassName('TitreArticleCategorie');
                Array.from(titreElements).forEach(titre => {
                    titre.addEventListener('click', function () {
                        let descriptionElements = [];
                        let sibling = titre.nextElementSibling;
    
                        while (sibling) {
                            if (sibling.classList.contains('descriptionArticleCategorie')) {
                                descriptionElements.push(sibling);
                            }
                            sibling = sibling.nextElementSibling;
                        }
    
                        descriptionElements.forEach(el => {
                            el.classList.toggle('active');
                        });
                    });
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des articles:', error));
    }
    
}
 
 
)();
  