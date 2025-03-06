<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">
        <div class="piedpage__s1__externe">
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav",
                    "container_class" => "piedpage__s1__externe"
                )); ?>
            </div>
            <div class="piedpage__s1__adresse">
 
                <div class="piedpage__s1__adresse__recherche">
                    <h3>Adresse et recherche</h3>
                    3800, Sherbrooke est, Montréal, Québec, Canada, H1X 2A2 <br>
                    Tel: (514) 254-7131
                    <?php get_search_form();   ?>
                </div>
            </div>
            <div class="piedpage__s1__description">
                <h3>Mission du club</h3>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci magni nihil iusto obcaecati doloribus? Illo vero accusamus nemo perspiciatis rerum repellendus, aut fugiat est a, magni recusandae laborum optio quibusdam.
            </div>
        </section>
        <section class="piedpage__s2">
                <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=paypal&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=000000" width="20" height="20">
        </section>
        <section class="piedpage__s3">
        </section>
 
 
    </div>
</footer>
<?php wp_footer() ?>