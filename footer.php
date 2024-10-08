<div class="lightbox"></div> <!-- On a juste besoin d'ajouter ça ! -->


    <footer class="site__footer">
        <?php 
            wp_nav_menu( 
                array( 
                    'theme_location' => 'footer',
                    'container' => false, // To avoid having a div around
                    'menu_class' => 'site__footer__menu' // My custom class
                )
            ); 
        ?>
    </footer>

  <?php wp_footer(); ?>
</body>
</html>