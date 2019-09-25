<?php get_header() ?>

<?php // get_search_form(); 
?>

<!-- Same as .rowBootstrap -->
<div class="container">

    <!-- .row in Bootstrap -->


    <!-- Here is the posts loop -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!--  Here the loop -->

            <!-- .col in Bootstrap -->
            <div class="main-post single-post">
                <!-- the_tile(tags before it , tags after it) -->
                <!-- the_permalink(): give the link of the post  -->
                <!-- title: give tooltip to the post the_title_attribute() -->
                <h3 class="post-title title">
                    <a href="<?php permalink_link(); ?> " rel="bookmark" title="Permenant to <? the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <!-- post author  -->
                <span class="post-author"><i class="fi-xnsuxl-user-solid"></i><?php the_author_posts_link() ?>, </span>
                <span class="post-date"><i class="fi-xnsuxl-calendar-solid"></i> <?php the_time('d -  m - Y'); ?>, </span>
                <span class="post-date"><i class="fi-xnsuxl-calendar-solid"></i> <?php the_time('d -  m - Y'); ?>, </span>
                <span class="post-comments"><i class="fi-swslxl-pen"></i> <?php comments_popup_link('No Comment', "one commnet", "% Comments", "comment-url", "Comment disabled") ?></span>
                <!-- post thunmbnail with link to the post -->
                <a href="<?php permalink_link(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('large', ["class" => "image is-620x300x", "alt" => "place holder image", "title" => "post image"]); ?>
                </a>
                <div class="post-content">
                    <!-- the_content() uses <!\-- more --\> tag-->
                    <?php //the_content('Continue reading >>'); 
                            ?>
                    <?php the_content(); ?>
                </div>
                <hr>
                <p class="post-categories"><i class="fi-xnsuxl-label-solid"></i><?php the_category(', ') ?></p>
                <!-- tags native function -->
                <p class="post-tags">
                    <?php
                            if (has_tag()) {
                                the_tags();
                            } else {
                                echo "<i>there is no tags in this post</i>";
                            }
                            ?>
                </p>
            </div>
        <?php endwhile;
        else : ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    <div class="is-clearfix">

    </div>
    <div class="columns">
        <div class="column">
            <div class="post-pagination">
                <?php
                if (get_previous_posts_link()) {
                    previous_posts_link('<i class="fi-xwslxl-chevron-wide" area-hidden="true"></i>Prev');
                } else {
                    echo "<span class='prev-span'>Prev</span>";
                }

                if (get_next_posts_link()) {
                    next_posts_link('Next<i class="fi-xwsrxl-chevron-wide" area-hidden="true"></i>');
                } else {
                    echo "<span class='next-span'>Next</span>";
                }

                ?>
            </div> <!-- end .post-pagination -->

        </div><!-- end .column -->
    </div><!-- end .columns -->
</div> <!-- end .container-->



<?php get_footer(); ?>