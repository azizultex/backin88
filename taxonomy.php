<?php 
/*
	Template Name: Homepage
*/
?>

<?php get_header(); ?>

<div class="archive-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="archive-content-wrap">
                	<ul class="rap-board-list">
					<?php 
                    $obj = get_queried_object();
                    $tax_slug = $obj->slug;
                    $args = array(
                        'post_type' => 'rapper',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'rapper_type',
                                'field'    => 'slug',
                                'terms'    => $tax_slug,
                            ),
                        ),
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC'

                    );
                    $loop = new WP_Query($args);

					if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();

						$post_id = get_field('stock_featured_images');
                        $image = get_the_post_thumbnail($post_id[0], 'full');
						$audio = get_field('rapper_audio');
                        $desc = get_field('rapper_description');
                        $title = get_the_title();
					?>
                    	<li class="rapper" data-toggle="tooltip" data-audio="<?php echo $audio; ?>" title="<?php echo $desc ? $desc : $title; ?>"><?php echo $image; ?></li>
                    <?php  
                    	endwhile;
                    else : ?>
                    	<h1>Opps! No Rapper Found</h1>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
                       
        </div>
    </div>
</div>


<?php get_footer(); ?>