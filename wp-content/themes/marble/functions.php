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

}

//pour que la fonction soit appelée, on doit dire à Wordpress à quel moment on souhaite qu'il l'appelle
//On utilise pour cela un "hook" (ameçon)
//add_action( <nomDeLAction>, <nomDeNotreFonctionADeclencher>);
add_action( 'after_setup_theme', 'marble_theme_support' );
