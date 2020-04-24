<?php 
	//inclus le fichier header.php
	get_header(); 
?>
		<section class="content">
			<div class="wrapper">

			<?php
				/**
				 * Boucle principale:
				 * the_loop
				 * ------------------
				 */
				//pas besoin de faire la requête sql, car Wordpress
				//le fait déjà à notre place !
				//Tout ce qu'on a à faire, c'est boucler sur les résultats
				//voir https://wordpress.org/search/the_loop

				if ( have_posts() ) : 
					while ( have_posts() ) :
						the_post();
						?>
						<div class="post-hentry">
							<?php
								//permet d'utiliser les templates tags
								//voir les template tags:
								//https://developer.wordpress.org/themes/references/list-of-template-tags/
								
								//affiche le titre du post

								// $title = get_the_title(); //récupère le titre sous forme de variable
								// //plus tard si on veut l'afficher, il faut utiliser echo $title:
								// echo $title . '<br>';
							?>
							
							<!-- titre du post -->

							<?php //EXO 1: si je suis sur la page détail d'un article ou d'une page, afficher: 
								//Voir : https://codex.wordpress.org/Conditional_Tags
								if( is_singular() ) :
							?>
								<h1>
									<?php the_title(); //fait l'affichage du titre dans la page ?>
								</h1>
							<?php else: // sinon, afficher: ?>
								<h1>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); //fait l'affichage du titre dans la page ?>
									</a>
								</h1>
							<?php endif; ?>
							


							<!-- métas -->
							<p>
								<span class="meta-categories">
									<?php the_category( ', ' ); ?>
								</span> - 
								<span class="meta-author">
									Auteur: <?php the_author(); ?>
								</span> - 
								<time class="meta-date">
									<?php echo get_the_date('d/m/Y'); ?>
								</time>
							</p>
							
							<!-- contenu du post -->
							<div class="post-content">

								<?php if( is_singular() ) : 
									//EXO 2: si je suis sur la page détail d'un article ou d'une page, afficher: 
									 	the_content();
									else :
										// sinon, afficher:
										the_excerpt(); 
									endif;
								?>

							</div>
						</div>		
					<?php
					endwhile;
				endif;
			?>
			</div>
		</section>
		<!-- ./jumbotron -->
<?php 
	//inclus le fichier footer.php
	get_footer(); 
?>