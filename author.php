<?php

// =============================================================================
// VIEWS/RENEW/TEMPLATE-BLANK-1.PHP (Container | Header, Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

get_header();
?>
<div class="x-container max width offset">
    <div class="x-main full" role="main">
        <?php
        // Set the Current Author Variable $curauth
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        ?>
        <div class="k1-author author-profile-card page-header">
            <div class="k1-author--photo">
                <?php echo get_avatar($curauth->user_email, '90 '); ?>
            </div>
            <div class="k1-author__info-text">
                <h2><?php echo $curauth->display_name; ?></h2>
                <span class="k1-author__info-text--website">
                    <strong>Website:</strong>
                    <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
                </span>
                <span class="k1-author__info-text--bio">
                    <strong>Bio:</strong> <?php echo $curauth->description; ?>
                </span>
            </div>
        </div>

        <h2>Posts by <?php echo $curauth->display_name; ?>:</h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h3>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                <?php the_title(); ?></a>
        </h3>
        <p class="posted-on">Posted on: <?php the_time('d M Y'); ?></p>

        <?php the_excerpt(); ?>

        <?php endwhile;
        else : ?>
        <p>
            <?php _e('No posts by this author.'); ?>
        </p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>