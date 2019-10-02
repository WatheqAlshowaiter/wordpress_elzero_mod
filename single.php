<?php get_header() ?>

<?php // get_search_form(); 
?>

<!-- Same as .rowBootstrap -->
<div class="container post-page">

    <!-- .row in Bootstrap -->


    <!-- Here is the posts loop -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!--  Here the loop -->
            <!-- .col in Bootstrap -->
            <div class="main-post single-post">
                <!-- To edit post directly for authorize people -->
                <?php edit_post_link('Edit <i class="fi-xnsuxl-edit-solid"></i>'); ?>

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
    <hr class="comment-separator">


    <div class="columns is-multiline">
        <div class="column is-2">
            <?php
            $avatar_img_args = array(
                "class" => "image has-image-centered"
            );
            ?>
            <?php echo get_avatar(get_the_author_meta('id'), "80", '', "Author Avatar Picture", $avatar_img_args) ?>

        </div>
        <div class="column is-10 author-info">
            <h4>
                <?php the_author_meta('first_name'); ?>
                <?php the_author_meta('last_name'); ?>
                ( <span class="nickname"><?php the_author_meta('nickname'); ?></span> )
            </h4>

            <?php if (get_the_author_meta('description')) : ?>
                <p> <?php the_author_meta('description'); ?></p>
            <?php else : echo "No bio for this user"; ?>
            <?php endif; ?>

        </div>
        <div class="author-infos column is-4">
            <p class="author-stats">
                <i class="fi-xnsuxl-label-solid"></i>
                User Posts: <span class="post-count"> <?php echo count_user_posts(get_the_author_meta('id')); ?></span>
            </p>
            <p>
                <i class="fi-xnsuxl-user-solid"></i>
                User Link: <span class=""> <?php the_author_posts_link(); ?></span>

            </p>
        </div>


    </div>

    <div class="columns">
        <div class="column">

            <div class="post-pagination">
                <?php
                if (get_previous_post_link()) {
                    // the last args for make next/prev posts only from the samw taxonimy (category for example)
                    previous_post_link('%link', '<i class="fi-xwslxl-chevron-wide" area-hidden="true"></i> %title: Previous Article', true, '', 'category');
                } else {
                    echo "<span class='prev-span'>Previous Article</span>";
                }

                if (get_next_post_link()) {
                    // the last args for make next/prev posts only from the samw taxonimy (category for example)
                    next_post_link('%link', 'Next Article: %title<i class="fi-xwsrxl-chevron-wide" area-hidden="true"></i>', true, '', 'category');
                } else {
                    echo "<span class='next-span'>Next Article</span>";
                }


                ?>
            </div> <!-- end .post-pagination -->

        </div><!-- end .column -->


    </div><!-- end .columns -->
    <hr class="comment-separator">

    <?php comments_template(); ?>
</div> <!-- end .container-->



<?php get_footer(); ?>