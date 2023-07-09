<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>




<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <section class="top-bar">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url()); ?>">skipper</a>
                </div>

                <div class="menuMobile">
                    <button class="check-button" onclick="openMenuMobile()">
                        <div class="menu-icon">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </button>
                    <nav class="main-menu">
                        <ul class="container_mobile">
                            <button class="clsMobile" onclick="closeMenuMobile()">X</button>
                            <?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 1)); ?>
                        </ul>
                        <div class="logoMobile">
                            <a href="<?php echo esc_url(home_url()); ?>">skipper</a>
                        </div>
                    </nav>

                </div>


                <div class="menuPc">
                    <nav class="main-menu">
                        <ul class="container">
                            <?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 1)); ?>
                        </ul>
                    </nav>
                </div>

                <div class="search-box">
                    <input type="text" id="search-input" placeholder="Buscar Notícia">
                </div>

                <div id="search-results">
                    <!-- resultados da busca -->
                </div>
            </section>
        </header>