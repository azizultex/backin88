<?php 
/*
	Template Name: Homepage
*/
?>

<?php get_header(); ?>

<div class="home-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home-content-wrap">
                	<ul class="rap-board-list">
					<?php 
					$args = array(
						'post_type' => 'rapper',
						'posts_per_page' => -1,
					);
					$loop = new WP_Query($args);
					if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();

						$image = get_field('rapper_image');
						$audio = get_field('rapper_audio');
					?>
                    	<li class="rapper" data-toggle="tooltip" data-audio="<?php echo $audio; ?>" title="<?php the_title(); ?>"><img src="<?php echo $image; ?>" alt=""></li>
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