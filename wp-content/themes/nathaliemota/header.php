<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
<div id="page" class="header">
<img class="img-header" src="<?php echo get_template_directory_uri() . '/assets/logo.png'; ?> " alt="logo Nathalie Mota">
<nav class="nav-bar">
<?php
    wp_nav_menu( array(
        'theme_location' => 'primary-menu', // Changez en fonction de votre emplacement de menu
        'menu_class'     => 'main-menu',
        'container'      => false,
    ) );
    ?>
</nav>
</div>


<div id="burger" class="burger-div">
    <div class="top-div-burger">
    <img class="img-burger" src="<?php echo get_template_directory_uri() . '/assets/logo.png'; ?> " alt="logo Nathalie Mota">
        <a id="closeBtn" class="close-burger" href="#">
            <img class="img-close" src="<?php echo get_template_directory_uri() . '/assets/icon-close-menu.png'; ?> " alt="Croix de fermeture de menu">  
        </a>
    </div>
    <nav>
    <?php
    wp_nav_menu( array(
        'theme_location' => 'burger-menu', // Changez en fonction de votre emplacement de menu
        'menu_class'     => 'burger',
        'container'      => false,
    ) );
    ?>
    </nav>
</div>

<a id="openBtn" class="open-burger" href="#">
    <span class="burger-icon">
        <span></span>
        <span></span>
        <span></span>
    </span>
</a>


</header>