<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

  <header id="masthead" class="site-header">
    <div class="site-branding">
      <h1>Welcome to Qikidepia</h1>
      <h2> The free sister-encyclopedia that anyone can illustrate.<h2>

    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation">
        <button
          class="menu-toggle"
          type="button"
          aria-controls="menu-main"
          aria-expanded="false"
        >
          <span class="menu-toggle-label"><?php esc_html_e( 'Menu', 'textdomaintomodify' ); ?></span>
          <span class="menu-toggle-icon" aria-hidden="true">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </button>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-main',
            'menu_id'        => 'menu-main',
            'menu_class'     => 'main-menu',
            'container_class' => 'main-menu-container',
          )
        );
        ?>
    </nav><!-- #site-navigation -->
  </header><!-- #masthead -->

  <div id="content" class="site-content">
