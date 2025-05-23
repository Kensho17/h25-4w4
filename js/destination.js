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
                            el.classList.toggle('visible');
                        });
                    });
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des articles:', error));
    }
    
}
 
 
)();
 