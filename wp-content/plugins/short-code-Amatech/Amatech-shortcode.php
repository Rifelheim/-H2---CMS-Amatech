<?php
/**
 * @package Amatech Shortcode
 * @version 1.0
 */
/*
Plugin Name: Amatech Shortcode
Description: Adds a shortcode which allows to recommand products.
Author: Dany LEGUY
Version: 1.0
*/

// ---------------------
ob_start();
// ---------------------

function display_recommandations(){?>
    <!-- Permet de placer des recommendations en short code. -->

    <style>
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

            h3 {
                text-align: center;
                margin-top: 0px;
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

    <?php
        // The Query
        $args = array (
            'post_type' => array('pc_bureau', 'pc_portable'),
            'orderby' => 'rand',
            'posts_per_page' => 3,
        );

        $the_query = new WP_Query( $args );?>
        

        <section ID="content_product">
            <h3>Recommandations de nos produits</h3>
            <section class="produits">
            <?php
                // The Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); 
                        $link = get_permalink()."/?type=".get_post_type();
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
                }?>

            </section>
        </section>

    <?php wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('recommandations', 'display_recommandations');
