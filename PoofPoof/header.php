<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory'); ?>/img/favicon.png" />
<title><?php bloginfo('name'); ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css" type="text/css" />
<?php wp_head(); ?>
</head>
<body>
<header>
<div class="container">
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-12">
<div class="logo"><a href="<?php echo esc_url(home_url()); ?>" title="logo" alt="logo"><img class="lg" src="<?php echo get_bloginfo('template_directory'); ?>/img/logo.png" alt="logo"/></a><div class="mobile-icon"><i class="fas fa-ellipsis-v" onclick="toggle_it('mobile');"></i></div></div>

</div>
<div class="col-lg-10 col-md-10 col-sm-12 col-12">
<div class="menu" id="mobile">
<?php
$menu_name = 'header-menu';
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<ul>
    <?php
    $count = 0;
    $submenu = false;

    foreach( $menuitems as $item ):
        // set up title and url
        $title = $item->title;
        $link = $item->url;

        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):

        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;
    ?>
	
	<li>
        <a href="<?php echo $link; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
            <span><?php echo $title; ?></span> 
        </a>
    <?php endif; ?>
	<?php if ( $parent_id == $item->menu_item_parent ): ?>
	<?php if ( !$submenu ): $submenu = true; ?>
            <ul>
            <?php endif; ?>
			 <li >
                    <a href="<?php echo $link; ?>" ><?php echo $title; ?></a>
                </li>
				
				 <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
            </ul>
            <?php $submenu = false; endif; ?>

        <?php endif; ?>
		<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    </li>                           
    <?php $submenu = false; endif; ?>

<?php $count++; endforeach; ?>

  </ul>
</div>
</div>
</div>
</div>
</header>