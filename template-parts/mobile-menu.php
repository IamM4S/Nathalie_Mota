<span class="mobile-menu-button" id="open-fullscreen-menu-button">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile-menu-icon.png" alt="Icone Menu">
</span>


<!-- Mobile Menu - Header -->
<div id="myMenu" class="header-menu">
    <!-- Mobile menu Content -->
    <div class="mobile-menu-content">
        <div>
        <nav class="logo__nav">
            <span class="mobile-menu-close-button" id="close-fullscreen-menu-button">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile-menu-icon-close.png" alt="Icone Menu Fermature">
            </span>
        </nav>
        </div>
        <div class="mobile-menu-opened" id="mobile-menu-content">
        <nav class="links__nav__mobile">
            <?php 
                wp_nav_menu( 
                    array( 
                        'theme_location' => 'main',
                        'container' => false, // To avoid having a div around
                        'menu_class' => 'site__header__menu' // My custom class           
                    )
                );
            ?>
            <ul>
                <li class="btn-modale"><?php include get_template_directory() . '/template-parts/contact-modal.php';?></li>
            </ul>
        </nav>
        </div>
    </div>
</div>