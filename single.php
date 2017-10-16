<?php get_header(); if(have_posts()) : while(have_posts())  : the_post(); ?> 

    <div class="single-content-area">
        <div class="container">
            <div class="row">
                               
                <div class="col-md-12">
                    <div class="internal-content-wrap">
                       <h2 class="internal-page-title"><?php the_title(); ?></h2>
                       <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; endif; get_footer(); ?>