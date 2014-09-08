<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title><?php wp_title(); ?><?php bloginfo('name'); ?></title>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
		
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/responsiveslides.min.js"></script>
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

<div class="container-fluid header">
	<hr/>
	<div class="container">
		<div class="row">
			<div class="col-md-2 logo">
				<a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri(); ?>/images/euro-poultry-logo.svg" width="140" height="85"/></a>
			</div>
			<div class="col-md-10 navigation">
				<div class="secondary">
				<?php $languages = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str');?>
					<select class="form-control language" onchange="document.location.href=this.options[this.selectedIndex].value;">
						<?php foreach($languages as $language):?>
						<?php $language_code = $language['language_code'];?>
							<option <?php if($language['active'] == 1) { echo 'selected="selected"'; }?> value="<?php echo $language['url'];?>"><?php echo strtoupper($language_code);?></option>
						<?php endforeach;?>
					</select>
					<input type="text" placeholder="<?php the_field('tekst_i_sogefelt', 'options');?>" class="form-control search">
				</div>
				<div class="primary">
				
						<?php 
						wp_nav_menu( array(
							'theme_location'  	=> 'main-menu',
							'menu'            	=> 'Primære menu',
							'menu_class'      	=> 'nav nav-pills',
							'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
							'walker' 			=> new Custom_Nav_Walker )); 
						?>

						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
