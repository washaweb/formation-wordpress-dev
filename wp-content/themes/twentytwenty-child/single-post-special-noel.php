<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			//je change l'appel d'inclusion du template_part pour le personnaliser

			//get_template_part( 'template-parts/content', 'special-noel' );
			//va inclure le fichier 'template-parts/content-special-noel.php'
			//c'est à peu près la même chose que
			//include('template-parts/content-special-noel.php');
			//content-special-noel est une copie du fichier source (dossier parent) content.php
			//que l'on a personnalisée
			get_template_part( 'template-parts/content-special-noel' );

			//get_template_part( 'template-parts/content', get_post_type() );

		}
	}
	?>
</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>

