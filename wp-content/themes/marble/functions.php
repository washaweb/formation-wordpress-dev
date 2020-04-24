<?php


/**
 * Déclaration des fonctionnalités à activer pour notre thème
 * On peut aussi mettre des personnalisation de tailles d'image
 * Et d'autre personnalisations... (voir le thème twentytwenty pour un exemple plus complet)
 * 
 * Chaque fonction doit commencer par le nom du thème pour s'assurer que le nom de la fonction est bien unique
 * (namespace)
 */
function marble_theme_support() {
    /*
	 * Dit à WordPressde prendre en charge la création de la balise title
	 * Ça permet la prise en charge de plugins de SEO
     * Si vous l'activez, pensez à supprimer la balise title dans header.php
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Ajoute le support des balises HTML dans Wordpress
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
    );
    
    /**
     * Déclarer de nouveaux menus dans notre thème
     */
    register_nav_menus( array(
        'primary_menu' => 'Menu principal',
        'footer_menu'  => 'Menu du pied de page',
	) );


	/**
	 * Support des images à la une (featured images)
	 */
	add_theme_support( 'post-thumbnails' );

	/** 
	 * ajout des formats d'images utilisées dans notre thème 
	 */
	//add_image_size( 'identifiant-format-image', $width, $height, $crop );
	add_image_size( 'front-page-thumb', 380, 270, true );
	// À chaque fois qu'on modifie les formats d'images, il faut regénérer les mignatures avec le plugin "regenerate-thumbnails"

}

//pour que la fonction soit appelée, on doit dire à Wordpress à quel moment on souhaite qu'il l'appelle
//On utilise pour cela un "hook" (ameçon)
//add_action( <nomDeLAction>, <nomDeNotreFonctionADeclencher>);
add_action( 'after_setup_theme', 'marble_theme_support' );


/**
 * Fonction d'enregistrement des zones de widgets
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function marble_sidebar_registration() {

	// Footer
	register_sidebar( array(
		'name'        => 'Footer',          //Le nom affiché dans le dashboard
		'id'          => 'footer-sidebar',  //L'identifiant unique de la sidebar
		'description' => 'Zone de widgets du pied de page', //description
		//des informations pour le rendu html des widgets dans cette sidebar

		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="col widget %2$s">',
		'after_widget'  => '</div>',
	) );
	
	// Sidebar principale
	register_sidebar( array(
		'name'        => 'Sidebar',          //Le nom affiché dans le dashboard
		'id'          => 'main-sidebar',  //L'identifiant unique de la sidebar
		'description' => 'Zone de widgets de la sidebar', //description
		//des informations pour le rendu html des widgets dans cette sidebar

		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="aside-widget widget %2$s">',
		'after_widget'  => '</div>',
	) );
}

add_action( 'widgets_init', 'marble_sidebar_registration' );