<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <header id="header">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="header-content">
    				<?php  
    				$logo_type = get_field('logo_type', 'options');
    				if($logo_type){
    					$logo_image = get_field('site_logo_image', 'options');
    					echo '<a class="site-logo image" href="#"><img src="'. $logo_image .'" alt="Logo"></a>';
    				} else {
						$logo_text = get_field('site_logo_text', 'options');
    					echo '<a class="site-logo" href="#"><h1>'. $logo_text .'</h1></a>';
    				}
    				?>
    					
    					<div class="menu-icon" id="toggle">
    						<div class="icon_bar top"></div>
    						<div class="icon_bar middle"></div>
    						<div class="icon_bar bottom"></div>
    					</div>
    					<div class="overlay" id="overlay">
						<?php  
							$args = array(
								'theme_location' 	=> 'main-menu',
								'container'			=> 'nav',
								'container_class'	=> 'overlay-menu'
							);
							wp_nav_menu( $args );
						?>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </header>