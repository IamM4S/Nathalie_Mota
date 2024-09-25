<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body>
    <header class="site__header">
        <nav class="logo__nav">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Nathalie-Mota.png" alt="Logo">
            </a>
        </nav>
        <nav class="links__nav">
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
    </header>
