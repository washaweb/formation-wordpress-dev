<?php 
	//inclus le fichier header.php
	get_header(); 
?>
		<section class="jumbotron">
			<div class="wrapper">
				<h2>We are digital &amp; branding agency based in London.</h2>
				<h3>We love to turn great ideas into beautiful products.</h3>
				<a href="#" class="button">See portfolio</a>
			</div>
		</section>
		<!-- ./jumbotron -->

		
		<section id="section-icons" class="wrapper">
			<div class="container">
				<div class="col">
					<i class="icon lamp"></i>
					<h4>Pellentesque</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				<!-- ./col1 -->
				<div class="col">
					<i class="icon clock"></i>
					<h4>Consectetur</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				<!-- ./col2 -->
				<div class="col">
					<i class="icon flask"></i>
					<h4>Tristiquet</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				<!-- ./col3 -->
				<div class="col">
					<i class="icon ticket"></i>
					<h4>Fermentum</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				<!-- ./col4 -->
			</div>

			<hr />

		</section>
		
		<section id="section-latest-work" class="wrapper">
			<h3>Our latest works</h3>
			<div class="container">
				<article class="col">
					<img src="<?= get_template_directory_uri(); ?>/img/image1.jpg" alt="Business Card">
					<h4>Nobis Business Card</h4>
					<h5>Business Cards, Graphics</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>

				<article class="col">
					<img src="<?= get_template_directory_uri(); ?>/img/image2.jpg" alt="New fun project">
					<h4>New fun project</h4>
					<h5>Webdesign, Application</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>
				
				<article class="col">
					<img src="<?= get_template_directory_uri(); ?>/img/image3.jpg" alt="Passionaries Branding Cover">
					<h4>Passionaries Branding Cover</h4>
					<h5>Branding, Graphic Design</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>
			</div>
		</section>

		<section id="section-latest-news" class="wrapper">
			<h3>Our latest news</h3>
			<div class="container">
				
			<?php 
				/**
				 * Faire une requête personalisée dans WP avec WP_Query() 
				 *	https://developer.wordpress.org/reference/classes/wp_query/
				 */
				//Créer une propriété $args qui sont les arguments de la requête
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3
				);

				// Crée la requête à la base de donnée en passant les arguments dans la classe WP_Query
				//On récupère les résultats dans $the_query
				$the_query = new WP_Query( $args );
				
				
				// On boucle sur les résultats de $the_query
				//si j'ai des résultats...
				if ( $the_query->have_posts() ) :
					
					while ( $the_query->have_posts() ) :
						$the_query->the_post();

						//ici on peut utiliser les templates tags pour afficher les données de chaque post de la query.
						
						?>
						<article class="col">
							<!-- 
								On utilise un format d'image personalisé: 'front-page-thumb', voir dans functions.php 
								on a utilisé add_image_size() pour le créer.
							-->
							<?php the_post_thumbnail( 'front-page-thumb' ); ?>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<h5><?php the_category(', '); ?></h5>
							<?php the_excerpt(); ?>
						</article>
						<?php
					endwhile;
					
				//sinon...
				else :
					// no posts found
				endif;

				/* rétablir les données/paramètres de la boucle principale 
					à mettre OBLIGATOIREMENT une fois qu'on a fini de traiter 
					notre boucle personnalisée */
				wp_reset_postdata();
			?>

				

			</div>
		</section>
<?php 
	//inclus le fichier footer.php
	get_footer(); 
?>