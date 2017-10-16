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