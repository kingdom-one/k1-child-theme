<?php  get_header(); ?>
<div class="x-container max width offset">
    <div class="<?php x_main_content_class(); ?>" role="main">
        <header class="search__header">
            <h1 class="search__headline">You searched for "<?php echo get_search_query()?>"</h1>
            <?php if (!have_posts()) : ?>
            <h3 class="search__subheadline">Your search did not have any results.</h3>
        </header>
        <div class="try-again">
            <h2>Want to try again?</h2>
            <?php get_search_form(  ); ?>
        </div>
        <?php else : ?>
        <h3 class="search__subheadline">Here's what we found:</h3>
        </header>
        <?php while (have_posts()) : the_post();?>
        <div class="search">
            <div class="row search__result">
                <div class="col search__result--img">
                    <?php the_post_thumbnail('medium');?>
                </div>
                <div class="col search__result--content">
                    <a class="search__result--title" href="<?php the_permalink()?>">
                        <?php the_title( );?>
                    </a>
                    <span class="search__result--excerpt"><?php the_excerpt();?></span>
                </div>
            </div>
        </div>
        <?php endwhile;?>
        <?php endif;?>
    </div>
</div>
<?php get_footer(); ?>