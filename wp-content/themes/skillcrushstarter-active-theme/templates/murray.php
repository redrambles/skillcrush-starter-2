<?php 
/*
 * Template name: Murray
 */
get_header(); 
$murray_hero = esc_html( get_post_meta( get_the_ID(), 'murray_hero', true ) );
$murray_1 = esc_html( get_post_meta( get_the_ID(), 'murray_1', true ) ); 
$murray_2 = esc_html( get_post_meta( get_the_ID(), 'murray_2', true ) ); 
$murray_3 = esc_html( get_post_meta( get_the_ID(), 'murray_3', true ) ); 
$murray_4 = esc_html( get_post_meta( get_the_ID(), 'murray_4', true ) ); 
$murray_5 = esc_html( get_post_meta( get_the_ID(), 'murray_5', true ) ); 
$murray_6 = esc_html( get_post_meta( get_the_ID(), 'murray_6', true ) ); 
$murray_7 = esc_html( get_post_meta( get_the_ID(), 'murray_7', true ) ); 
$murray_8 = esc_html( get_post_meta( get_the_ID(), 'murray_8', true ) ); 
$murray_9 = esc_html( get_post_meta( get_the_ID(), 'murray_9', true ) ); 
$murray_10 = esc_html( get_post_meta( get_the_ID(), 'murray_10', true ) ); 
$murray_11 = esc_html( get_post_meta( get_the_ID(), 'murray_11', true ) ); 
$murray_12 = esc_html( get_post_meta( get_the_ID(), 'murray_12', true ) ); 
$video = esc_html( get_post_meta( get_the_ID(), 'video_url', true ) ); 
$video_placeholder = esc_html( get_post_meta( get_the_ID(), 'video_placeholder_image', true ) ); 
$sidebar_text = ( get_post_meta( get_the_ID(), 'sidebar_text', true ) );
?>


<section id="hero" class="hero">
	<div class="hero-image-container round"><img src="<?php echo $murray_hero; ?>" alt="I ❤ cats"></div>
	<h1>Welcome to the first <br> <a href="https://www.facebook.com/groups/wpfrontenddevs/">WordPress Front End Developers'</a> Challenge</h1>
</section>

<section id="many-murrays">
	<ul class="murrays">
		<li class="murray" style="background-image: url(<?php echo $murray_1; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Mill Burray</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_2; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Bill Murray</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_3; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Burl Millay</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_4; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Mile Burry</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_5; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Doctor Venkman</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_6; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Bill Murray</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_7; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Mull Berry</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_8; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Garfield</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_9; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Bull Merry</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_10; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Rum Miley</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_11; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Mirr Bubbly</span></li>
		<li class="murray" style="background-image: url(<?php echo $murray_12; ?>);">
			<span class="murray-inner"></span><span class="murray-name">Bill Murray</span></li>
	</ul>
</section>

<section id="video">
	<div class="video-container" data-video="<iframe src='<?php echo $video; ?>' frameborder='0' allowfullscreen></iframe>" style="background-image: url(<?php echo $video_placeholder; ?>);">
		<button class="video-play">Play the video</button>
	</div>
</section>

<section id="text">
	<div class="header">
		<div class="inner-header">
      <?php echo $sidebar_text; ?>
		</div>
	</div>
	<div class="long-text">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    <?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>