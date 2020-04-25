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
	 * 
	 * Voir le codex: https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/** 
	 * ajout des formats d'images utilisées dans notre thème 
	 * 
	 * Voir le codex: https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	//add_image_size( 'identifiant-format-image', $width, $height, $crop );
	add_image_size( 'front-page-thumb', 380, 270, true );
	add_image_size( 'single-page-thumb', 840, 260, true );
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


/**
 * Enregistrer des custom post types et des custom post taxonomies
 * 
 * de nouveaux contenus personnalisés peuvent être ajoutés à l'interface de Wordpress
 * voir https://wordpress.org/support/article/post-types/
 * et le générateur en ligne: https://generatewp.com/post-type/
 * 
 * 
 * WARNING: dès qu'on créer / modifie un custom post type, il faut regénérer les permaliens de Wordpress
 * -> Réglages -> permaliens -> Enregistrer les modifications
 * 
 */

 /**
 * Crée un nouveau type de contenu appelé "project".
 */
function marble_project_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'Projects', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Project', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Projects', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Project', 'textdomain' ),
        'new_item'              => __( 'New Project', 'textdomain' ),
        'edit_item'             => __( 'Edit Project', 'textdomain' ),
        'view_item'             => __( 'View Project', 'textdomain' ),
        'all_items'             => __( 'All Projects', 'textdomain' ),
        'search_items'          => __( 'Search Projects', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Projects:', 'textdomain' ),
        'not_found'             => __( 'No Projects found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Projects found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'project' ),
        'capability_type'    => 'post', //<--- droit d'accès
        'has_archive'        => true,
        'hierarchical'       => false, //ressemble à une page (hiérarchique) ou un post (pas hiérarchique, mais daté)
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'project', $args );
}
 
add_action( 'init', 'marble_project_custom_post_type' );