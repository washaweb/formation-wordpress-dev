    </main>
	<!-- ./main -->
	
	<?php 
		// Les conditional tags permettent de répondre true ou false à une certaine condition :
		//ici la section #section-testimony ne sera affichée que sur la page d'accueil du site
		//car la fonction ----- permet de savoir en fonction de la page affichée si c'est la page d'accueil ou non (true/false)
		//liste de tous les templates tags :
		//https://codex.wordpress.org/Template_Tags

	//si je suis sur la page d'accueil... affiche la section
	if( is_front_page() ): 
	?>
		<section id="section-testimony">
			<blockquote class="wrapper">
				<?php 
				//si l'utilisateur est connecté...
				if( is_user_logged_in() ): 
					

					// récupère les données de l'utilisateur courant

					$user = wp_get_current_user();
					
					//on peut voir toutes les données en débug
					// echo '<pre>';
					// var_dump($user);
					// echo '</pre>';
					?>
					<!-- affiche une phrase de bienvenue -->
					<p>Bienvenue sur mon super site <strong><?= $user->user_nicename; ?> </strong> !</p>
				<?php 
					//sinon... affiche le texte par défaut
					else: ?>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque voluptatum, quibusdam temporibus voluptas repudiandae hic maiores eligendi repellendus, accusamus nobis laboriosam</p>
				<?php endif; ?>
			</blockquote>
		</section>
		<!-- ./testimony -->
	<?php endif; ?>

	<footer class="main-footer">
		<div class="wrapper">
			<div class="container" style="padding-bottom: 40px">

				<?php 
					// affiche la sidebar que l'on a déclaré dans le fichier functions.php
					dynamic_sidebar( 'footer-sidebar' ); 
					
				?>
				<!-- <div class="col">
					<h4>Get in Touch</h4>
					<ul>
						<li class="plan">Moonshine Street No: 14/05<br>
							Light City, Jupiter
						</li>
						<li class="tel">
							0247 541 65 87
						</li>
						<li class="message">
							<a href="mailto:support@longwave.com" title="Ecrire à support@longwave.com">support@longwave.com</a>
						</li>
					</ul>
				</div>

				<div class="col">
					<h4>Twitter</h4>
					<ul class="twitter-list">
						<li>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam autem assumend
						</li>
						<li>
							Vitae ullam ipsam rem ratione sit facere ut. Natus voluptates fugiat quaerat
						</li>
						<li>
							Sapiente perferendis quis consequatur exercitationem sed facilis.
						</li>
					</ul>
				</div>


				<div class="col">
					<h4>Popular posts</h4>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam autem assumend
					</p>
					<p>
						Vitae ullam ipsam rem ratione sit facere ut. Natus voluptates fugiat quaerat
					</p>
					<p>
						Sapiente perferendis quis consequatur exercitationem sed facilis.
					</p>
				</div>


				<div class="col">
					<h4>About us</h4>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. A cupiditate, doloremque recusandae pariatur tempora placeat? Commodi, non
					</p>
					<p>
						Fugit dolore delectus placeat veritatis autem consequuntur sit consequatur sint dolorum? Voluptates, ipsum.
					</p>
				</div> -->


			</div>
			<!-- ./container -->

			<hr />
			
			<div class="footer-copyrights-menu">
				<p class="copyrights">
					&copy; 2016 Marble. All rights reserved. Theme by elemis.
				</p>
				<!-- ./copyrights -->

				<?php
					//génère le menu du pied de page 'footer_menu'
					wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); 
				?>
			</div>
		</div>
	</footer>
	<!-- ./main-footer -->
    
    <?php
        // permet à Wordpress de mettre ses propres scripts et codes dans notre template
        wp_footer();
    ?>
</body>
</html>