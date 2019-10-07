<?php get_header() ?>

<?php // get_search_form(); 
?>

<!-- Same as .rowBootstrap -->
<div class="container home-page category-page new-cat">

    <!-- Category information section -->
    <div class="columns cat-info ">
        <div class="column">
            <h1 class="title cat-title"><?php single_cat_title(); ?></h1>
        </div>
        <div class="column">
            <div class="cat-desc"><?php echo category_description(); ?></div>
        </div>
        <div class="column">
            <div class="cat-stats">
                <span> special design</span>
            </div>
        </div>



    </div>

    <!-- .row in Bootstrap -->
    <div class="columns is-multiline">

        <div class="column is-9">

            <!-- Here is the posts loop -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!--  Here the loop -->

                    <!-- .col in Bootstrap -->

                    <div class="main-post">
                        <div class="columns">

                            <div class="column is-5 post-img">
                                <!-- post thunmbnail with link to the post -->
                                <a href="<?php permalink_link(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('large', ["class" => "image is-620x300x", "alt" => "place holder image", "title" => "post image"]); ?>
                                </a>
                            </div>
                            <div class="column is-7 post-text" >
                                <h3 class="post-title title">
                                    <a href="<?php permalink_link(); ?> " rel="bookmark" title="Permenant to <? the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <!-- post author  -->
                                <span class="post-author"><i class="fi-xnsuxl-user-solid"></i><?php the_author_posts_link() ?>, </span>
                                <span class="post-date"><i class="fi-xnsuxl-calendar-solid"></i> <?php the_time('d -  m - Y'); ?>, </span>

                                <span class="post-comments"><i class="fi-swslxl-pen"></i> <?php comments_popup_link('No Comment', "one commnet", "% Comments", "comment-url", "Comment disabled") ?></span>

                                <div class="post-content">

                                    <?php the_excerpt(); ?>
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

                        </div>
                    </div>
                <?php endwhile;
                else : ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>

        <div class="column is-3 sidebar-cat">

        </div>
    </div> <!-- end .columns -->
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

    <div class="number-pagination">
        <?php echo  watheq_number_pagination(); ?>
    </div>
</div> <!-- end .container-->



<?php get_footer(); ?>