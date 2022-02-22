<?php

// =============================================================================
// K1 Custom: Candidate Presentation to Churches
// -----------------------------------------------------------------------------
// Based on Pro Theme Page-Tempate 4 (No Container | Header, Footer)
// =============================================================================

get_header();
$name = get_the_title();
?>
<div class="x-main full" role="main">
    <section class="church">
        <header class="hero">
            <span class="hero--subheadline">Welcome to Your</span>
            <h1 class="hero--headline">Candidate Dashboard</h1>
        </header>
        <?php
        /** If "The " exists in a church's name, strip it out.
         * @param string $str The name of the church (e.g. The Flipside Church)
         * @return string the stripped name of the church (Flipside Church) or the original string.
         */
        function article_exists($str) {
            $article = "The ";
            if (strpos($str, $article) === 0) {
                $str = substr($str, 4);
                return $str;
            } else {
                return $str;
            }
        }

        /** 
         * Mutates name to remove "Protected: " and checks if article exists.
         * @param string $n The name of the church (e.g. Protected: Southwest Church)
         * @return  string the mutated name of the church (e.g. Southwest Church)
         */
        function churchName($n) {
            $protected = "Protected: ";
            if (strpos($n, $protected) === false) {
                echo article_exists($n);
            } else {
                $church = substr($n, 11);
                echo article_exists($church);
            }
        };
        // Display Password Protected Content
        $post = get_the_ID();
        if (!post_password_required($post)) :
        ?>
        <section class="candidates">
            <div class="row intro">
                <h2 class="intro--headline">Well hey there <span><?php churchName($name); ?>!</span>
                </h2>
                <p class="thanks">
                    Thank you so much for choosing to partner with Kingdom One! It is an honor to be searching for your
                    next
                    great hire. <br />We’ve got some candidates below to share with you!
                </p>
            </div>
            <?php if (get_the_content()) : ?>
            <div class="row wp-content--candidates">
                <?php the_content(); ?>
            </div>
        </section>
        <?php else : ?>
        <?php
                    $relatedChurches = new WP_Query(array(
                        'post_type'      => 'candidate',
                        'posts_per_page' => -1,
                        'meta_query'     => array(array(
                            'key'     => 'related_church',
                            'compare' => 'LIKE',
                            'value'   => '"' . get_the_id() . '"',
                        )),
                    ));
                    while ($relatedChurches->have_posts()) : $relatedChurches->the_post();
            ?>
        <div class="row candidate">
            <div class="candidate__headshot">
                <?php the_post_thumbnail('medium') ?>
            </div>
            <div class="candidate__display">
                <h3 class="candidate__display--name">
                    Meet <span><?php the_title(); ?></span>
                </h3>
                <p class="candidate__display--summary">
                    <?php $summary = get_field('summary');
                            echo !$summary ? '' : $summary; ?>
                </p>
                <a href="<?php the_permalink() ?>" class="candidate__display--see-more">See more</a>
            </div>
        </div>
        <?php endwhile ?>
    </section>
    <?php endif ?>
    <?php else : ?>
    <div class="password-protection"><?php echo get_the_password_form(); ?></div>
    </section>
</div>

<?php
        endif;
        get_footer();
?>