<section class="form__formulaire">
    <div class="formulaire">
        <form action="votre_script_de_traitement.php" method="POST">
            <!-- Champ Nom -->
            <div class="form__reponse">
                <label for="nom">Nom :</label><br>
                <input
                    type="text"
                    class="formulaire__input"
                    name="nom"
                    id="nom"
                    placeholder="Écrivez votre nom"
                    required
                ><br>
            </div>

            <!-- Champ Prénom -->
            <div class="form__reponse">
                <label for="prenom">Prénom :</label><br>
                <input
                    type="text"
                    class="formulaire__input"
                    name="prenom"
                    id="prenom"
                    placeholder="Écrivez votre prénom"
                    required
                ><br>
            </div>

            <!-- Champ Courriel -->
            <div class="form__reponse">
                <label for="courriel">Courriel :</label><br>
                <input
                    type="email"
                    class="formulaire__input"
                    name="courriel"
                    id="courriel"
                    placeholder="Écrivez votre courriel"
                    required
                ><br>
            </div>

            <!-- Champ Téléphone -->
            <div class="form__reponse">
                <label for="telephone">Téléphone :</label><br>
                <input
                    type="tel"
                    class="formulaire__input"
                    name="telephone"
                    id="telephone"
                    placeholder="Écrivez votre téléphone"
                    required
                ><br>
            </div>

            <!-- Bouton d'envoi -->
            <button type="submit" class="formulaire__button">S'inscrire</button>
        </form>
    </div>
</section>
