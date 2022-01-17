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
		grid-gap: 10px;
	}
	#content_filter > h3 {
		text-align : center;
		margin: 10px 10px 10px 10px;
		font-size: 2em;
	}

	/* Les catégories */
	#category > div {
		display : grid;
		grid-template-columns : 2fr 1fr 2fr;
	}
	#category > div > p {
		text-align : center;
	}
	#category > div > hr {
		position: relative;
		top: -5px;
	}

	/* Les checkbox */

	#category > label {
		display: grid;
		grid-template-columns: 1fr 7fr;
		grid-template-rows: 25px; 
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
	section#content_product > section.produits > div {
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
		width: 80%;
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
</style>


<?php if ( have_posts() ) : ?>

	<!-- La page -->
	<article ID="full_content">
		<!-- Le contenu de la page : Les filtres -->
		
		

		<section ID="content_filter">

		<h3>Filtres</h3>
			<!-- Par prix -->
			<div ID="category">
				<div>
					<hr>
					<p>Prix</p>
					<hr>
				</div>
				<label for="check_prix1">
					<input type="checkbox" id="check_prix1">
					<p>
						Moins de 500 €
					</p>
				</label>
				<label for="check_prix2">
					<input type="checkbox" id="check_prix2">
					<p>
						500 - 1000 €
					</p>
				</label>
				<label for="check_prix3">
					<input type="checkbox" id="check_prix3">
					<p>
						1000 - 1500 €
					</p>
				</label>
				<label for="check_prix4">
					<input type="checkbox" id="check_prix4">
					<p>
						1500 - 2000 €
					</p>
				</label>
				<label for="check_prix5">
					<input type="checkbox" id="check_prix5">
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
					<hr>
				</div>
				<label for="check_system1">
					<input type="checkbox" id="check_system1">
					<p>
						Windows 10
					</p>
				</label>
				<label for="check_system2">
					<input type="checkbox" id="check_system2">
					<p>
						Windows 10 pro
					</p>
				</label>
				<label for="check_system3">
					<input type="checkbox" id="check_system3">
					<p>
						Windows 11
					</p>
				</label>
				<label for="check_system2">
					<input type="checkbox" id="check_system2">
					<p>
						Windows 11 pro
					</p>
				</label>
			</div>
		</section>


		<!-- Le contenu de la page : Les produits -->
		<section ID="content_product">
			<section class="filtres">

			</section>

			<section class="produits">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
					<div>
						<p ID="Nom"><?php the_title(); ?></p>
						<img src="<?php the_post_thumbnail_url(); ?>">
						<div>
							<hr>
							<p ID="Prix"><?php the_field("prix"); ?> €</p>
							<hr>
						</div>
						<p ID="Desc"><?= substr(get_field('description'), 0, 250); ?>...</p>
						<a href="<?php the_permalink(); ?>" ID="Info">En savoir plus</a>
					</div>
				<?php endwhile; ?>
			</section>
		</section>

	</article>
	

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
