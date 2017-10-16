<?php get_header(); ?>

<div class="blog-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="internal-content-wrap">
                    <?php 
                    while(have_posts()) : the_post();
                        
                    endwhile;
                    ?>
                </div>
            </div>
                       
        </div>
    </div>
</div>


<?php get_footer(); ?>