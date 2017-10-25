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
					if(have_posts()) : while(have_posts()) : the_post();

						$post_id = get_field('stock_featured_images');
                        $image = get_the_post_thumbnail($post_id[0], 'full');
						$audio = get_field('rapper_audio');
					?>
                    	<li class="rapper" data-toggle="tooltip" data-audio="<?php echo $audio; ?>" title="<?php the_title(); ?>"><?php echo $image; ?></li>
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