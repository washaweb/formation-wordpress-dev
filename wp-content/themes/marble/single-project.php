<?php 
	//inclus le fichier header.php
	get_header(); 
?>
		<section class="content">
			<div class="wrapper">

                <div class="row">

                    <article class="col-contenu">
                        <?php
                            /**
                             * Template single-project qui permet d'afficher un custom-post de type 'project'
                             */
                            if ( have_posts() ) : 
                                while ( have_posts() ) :
                                    the_post();
                                    ?>
                                    <div class="post-hentry">

                                        <h1>
                                            <?php the_title(); //fait l'affichage du titre dans la page ?>
                                        </h1>
                                        <?php 
                                            //affiche l'image du post
                                            the_post_thumbnail( 'large' );
                                        ?>

                                        <!--
                                            Avec https://www.advancedcustomfields.com 
                                            on peut créer très facilement des custom fields 

                                        -->
                                        <p>CLient: <?php the_field('client'); ?></p>
                                        <p>Date de réalisation: <?php the_field('date_de_realisation'); ?></p>
                                        <p>Type de projet: <?php the_field('type_de_projet'); ?></p>
                                    </div>		
                                <?php
                                endwhile;
                            endif;
                        ?>
                    </article><!-- ./col-contenu -->

                </div><!-- ./row -->
			</div><!-- ./wrapper -->
		</section>
		<!-- ./jumbotron -->
<?php 
	//inclus le fichier footer.php
	get_footer(); 
?>