<?php get_header(); ?>

<section class="page">
<div class="container">
<div class="row">

<div class="col-lg-8 col-md-8 col-sm-12 col-12">
<?php if(is_home()){ ?>
<div class="memes-loop"><?php require_once("homepage.php");?></div>
<?php }else if(strpos(getUrl(),'/hot/')){	?>
<div class="memes-loop"><?php require_once("hot.php");?></div>
<?php }else if(strpos(getUrl(),'/waiting/')){	?>
<div class="memes-loop"><?php require_once("waiting.php");?></div>
<?php }else if(strpos(getUrl(),'/random/')){	?>
<div class="memes-loop"><?php require_once("random.php");?></div>
<?php }else if(strpos(getUrl(),'/add/')){	?>
<div class="memes-loop"><?php require_once("add.php");?></div>
<?php }else if (is_404()){	?>
<div class="memes-loop"><?php require_once("400.php");?></div>
<?php }	?>
</div>

<?php get_sidebar(); ?>
</div>

</div>
</section>

<?php get_footer(); ?>





