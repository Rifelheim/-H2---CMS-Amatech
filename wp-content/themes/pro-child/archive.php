<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package WordPress
 * @subpackage Themeco pro
 * @since Themeco pro 1.0
 */

get_header();
?>

<style>
	article#full_content {
		display: grid;
		grid-template-columns: 1fr 3fr;
	}

	/* ========== Les filtres ========== */
		#content_filter {
			background-color: #FFF;
			box-shadow: 0px 0px 5px 3px rgba(0, 0, 0, .05);
			padding : 20px;
			margin : 20px;
			display: grid;
			align-content: start;
			grid-gap: 0px;
		}
		#content_filter > h3 {
			text-align : center;
			margin: 10px 10px 10px 10px;
			font-size: 2em;
		}

		/* Les catégories */
		#category > div > p {
			position: relative;
			top: -5px;
			color: #272727;
			font-size: 1.2em;
			font-weight: 600;
		}

		/* Les checkbox */
		#category > label {
			display: grid;
			grid-template-columns: 1fr 7fr;
			grid-template-rows: 25px;
			position: relative;
			top: -25px;
		}

		a#category {
			font-size: 20px;
			font-weight: 500;			
		}

		.current_filters {
			text-align: center;
			line-height: 100%;
			margin: 10px;
		}


	/* ========== Les produits ========== */
		/* Le fond */
		section#content_product {
			background-color: #FFF;
			box-shadow: 0px 0px 5px 3px rgba(0, 0, 0, .05);
			padding : 20px;
			margin : 20px;
		}
		section#content_product > section.produits {
			display: grid;
			grid-template-columns: 1fr 1fr 1fr;
		}
		section#content_product > section.produits > div{
			margin: 20px;
			box-shadow: 0px 0px 5px 3px rgba(0, 0, 0, .05);
			padding: 20px;
			display: grid;
			align-content: space-between;
		}


		/* Caractéristiques des produits. */
		#Nom, #Prix {
			text-align: center;
			color: #272727;
			font-weight: bold;
			font-size: 1.7em;
		}
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
			max-height: 200px;
		}
		#Prix {
			text-align: center;
			color: #272727;
			font-weight: bold;
			font-size: 20px;
			margin: 0px;
		}
		#Desc {

		}
		#Info {
			position: relative;
			bottom: 0px;
		}

		#submit {
			border: none;
			background-color: #FFF;
			box-shadow: none;
			text-shadow: none;
			color: #F00;
			padding: 0px;
			font-size: 20px;
			font-weight: 500;
		}
</style>

<script type="text/javascript">

	function valid_check() {
		// Filtre les prix en fonction de ce qu'on a coché sur le site.

		// Le lien avec toutes les combinaisons.
		let link_suffix = "?type=<?=get_post_type();?>";

		// Le type d'utilisation
		for ( i = 1 ; i < 4 ; i++ ){
			check = document.querySelector('#check_use'+ String(i));
			if (check.checked == true) {
				link_suffix = link_suffix + "&genre=" + check.value;
			}
		}
		// Le prix
		for ( i = 1 ; i < 6 ; i++ ){
			check = document.querySelector('#check_prix'+ String(i));
			if (check.checked == true) {
				link_suffix = link_suffix + "&prix=" + check.value;
			}
		}
		
		final_link = window.location.href.split("?");
		window.open(String(final_link[0]+link_suffix));

		// alert(final_link[0]+link_suffix);

	}

</script>


<?php if ( have_posts() ) : ?>

	<!-- La page -->
	<article ID="full_content">
		
		<!-- Le contenu de la page : Les filtres -->
		<section ID="content_filter">

		<h3>Filtres</h3>
			
			<form method="post">
				<!-- Par usage -->
				<div ID="category">
					<div>
						<hr>
						<p>Usage</p>
					</div>
					<label for="check_use1">
						<input type="checkbox" ID="check_use1" value="maison">
						<p>
							Pour la maison
						</p>
					</label>
					<label for="check_use2">
						<input type="checkbox" ID="check_use2" value="travail">
						<p>
							Pour le travail
						</p>
					</label>
					<label for="check_use3">
						<input type="checkbox" ID="check_use3" value="etudes">
						<p>
							Pour les étudiants
						</p>
					</label>
				</div>

				<!-- Par prix -->
				<div ID="category">
					<div>
						<hr>
						<p>Prix</p>
					</div>
					<label for="check_prix1">
						<input type="checkbox" ID="check_prix1" value=500>
						<p>
							Moins de 500 €
						</p>
					</label>
					<label for="check_prix2">
						<input type="checkbox" ID="check_prix2" value=1000>
						<p>
							moins de 1000 €
						</p>
					</label>
					<label for="check_prix3">
						<input type="checkbox" ID="check_prix3" value=1500>
						<p>
							moins de 1500 €
						</p>
					</label>
					<label for="check_prix4">
						<input type="checkbox" ID="check_prix4" value=2000>
						<p>
							moins de 2000 €
						</p>
					</label>
					<label for="check_prix5">
						<input type="checkbox" ID="check_prix5" value=99999>
						<p>
							Plus de 2000 €
						</p>
					</label>
				</div>

				<!-- Par Système d'exploitation -->
				<div ID="category">
					<div>
						<hr>
						<p>Système d'exploitation</p>
					</div>
					<label for="check_system1">
						<input type="checkbox" ID="check_system1">
						<p>
							Windows 10
						</p>
					</label>
					<label for="check_system2">
						<input type="checkbox" ID="check_system2">
						<p>
							Windows 10 pro
						</p>
					</label>
					<label for="check_system3">
						<input type="checkbox" ID="check_system3">
						<p>
							Windows 11
						</p>
					</label>
					<label for="check_system2">
						<input type="checkbox" ID="check_system2">
						<p>
							Windows 11 pro
						</p>
					</label>
				</div>

				<!-- Par processeur -->
				<div ID="category">
					<div>
						<hr>
						<p>Processeur</p>
					</div>
					<label for="check_CPU1">
						<input type="checkbox" ID="check_CPU1">
						<p>
							Intel® Pentium®
						</p>
					</label>
					<label for="check_CPU2">
						<input type="checkbox" ID="check_CPU2">
						<p>
							Intel® Celeron®
						</p>
					</label>
					<label for="check_CPU3">
						<input type="checkbox" ID="check_CPU3">
						<p>
							Intel® Core™ i3
						</p>
					</label>
					<label for="check_CPU4">
						<input type="checkbox" ID="check_CPU4">
						<p>
							Intel® Core™ i5
						</p>
					</label>
					<label for="check_CPU5">
						<input type="checkbox" ID="check_CPU5">
						<p>
							Intel® Core™ i7
						</p>
					</label>
					<label for="check_CPU6">
						<input type="checkbox" ID="check_CPU6">
						<p>
							AMD Ryzen™ 3
						</p>
					</label>
					<label for="check_CPU7">
						<input type="checkbox" ID="check_CPU7">
						<p>
							AMD Ryzen™ 5	
						</p>
					</label>
					<label for="check_CPU8">
						<input type="checkbox" ID="check_CPU8">
						<p>
							AMD Ryzen™ 7	
						</p>
					</label>
					
				</div>

				<!-- Par Mémoire (RAM) -->
				<div ID="category">
					<div>
						<hr>
						<p>Mémoire (RAM)</p>
					</div>
					<label for="check_RAM1">
						<input type="checkbox" ID="check_RAM1">
						<p>
							RAM 4 Go
						</p>
					</label>
					<label for="check_RAM2">
						<input type="checkbox" ID="check_RAM2">
						<p>
							RAM 8 Go
						</p>
					</label>
					<label for="check_RAM3">
						<input type="checkbox" ID="check_RAM3">
						<p>
							RAM 16 Go
						</p>
					</label>
				</div>

				<input type="submit" value="Valider" ID="submit" onclick="valid_check()"> 

			</form>

		</section>

		<!-- Le contenu de la page : Les produits -->
		<section ID="content_product">
			<section class="filtres">

			</section>

			
				<!-- Gestion des queries -->
				
				<?php	
					// The Query
					$args = array (
						'post_type' => $_GET['type'] ?? get_post_type(),
						'orderby' => 'meta_value_num',
						'meta_key' => 'prix',
						'order' => 'ASC',
						'meta_query' => array(
							array(
								'key'     => 'prix',
								'value'   => $_GET['prix'] ?? 1000000,
								'compare' => '<',
								'type' 	  => 'NUMERIC',
							),
						),
						'tax_query' => array(
							array(
								'taxonomy' => 'genre',
								'field' => 'slug',
								'terms' => $_GET['genre']??"maison",
							),
						),
					);
				
					$the_query = new WP_Query( $args );

					?>
					<p class="current_filters">Les filtres appliqués</p>
					<p class="current_filters"><?= "Usage : ".$_GET['genre']." || Prix en dessous de : ".$_GET['prix']." € || Système d'exploitation :  || Processeur :  || Mémoire :";?> </p>

					<section class="produits">
					<?php
				
					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							$link = get_permalink()."?type=".get_post_type(); 
							?>
							<div>
								<p ID="Nom"><?php the_title(); ?></p>
								<img src="<?php the_post_thumbnail_url(); ?>">
								<div>
									<hr>
									<p ID="Prix"><?php the_field("prix"); ?> €</p>
									<hr>
								</div>
								<p ID="Desc"><?= substr(get_field('description'), 0, 250); ?>...</p>
								<a href="<?=$link?>" ID="Info">En savoir plus</a>
							</div>
							
							<?php
						}
					}
				
				?>
			</section>
		</section>

	</article>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>


