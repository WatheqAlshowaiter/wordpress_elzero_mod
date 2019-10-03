<?php get_header() ?>
<div class="container author-page">
    <h1 class="profile-header"> <?php the_author_meta('nickname'); ?> Page</h1>

    <div class="columns is-multiline author-meta">

        <div class="column is-12">

        </div>
        <div class="column is-3">
            <?php
            $avatar_img_args = array(
                "class" => "image has-image-centered"
            );
            ?>
            <?php echo get_avatar(get_the_author_meta('id'), "196", '', "Author Avatar Picture", $avatar_img_args) ?>
        </div>
        <div class="column is-9 author-info">
            <ul class="author-names">
                <li><span>First Name: </span><?php the_author_meta('first_name'); ?></li>
                <li><span>Last Name: </span><?php the_author_meta('last_name'); ?> </li>
                <li><span>Nick Name: </span> (<span class="nickname"><?php the_author_meta('nickname'); ?></span>)</li>
            </ul>
            <hr>
            <?php if (get_the_author_meta('description')) : ?>
                <p> <?php the_author_meta('description'); ?></p>
            <?php else : echo "No bio for this user"; ?>
            <?php endif; ?>
        </div>

    </div> <!-- end column -->
    <div class="columns author-stats">
        <div class="column is-3">
            <div class="stats">
                Post Count <span><?php echo count_user_posts(get_the_author_meta('id')) ?></span>
            </div>
        </div>
        <div class="column is-3">
            <div class="stats">
                Comments Count<span><?php

                                    $get_comments_args = array(
                                        'user_id' => get_the_author_meta('id'),
                                        'count'  => true
                                    );
                                    echo get_comments($get_comments_args);
                                    ?></span>
            </div>
        </div>
        <div class="column is-3">
            <div class="stats">
                Something for later use<span>0</span>
            </div>
        </div>
        <div class="column is-3">
            <div class="stats">
                Something for later use<span>0</span>
            </div>
        </div>
    </div>
    <div class="columns is-multiline">


        <!-- Here is the posts loop -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!--  Here the loop -->

                <!-- .col in Bootstrap -->
                <div class="column is-2">

                    <a href="<?php permalink_link(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('large', ["class" => "image is-620x300x", "alt" => "place holder image", "title" => "post image"]); ?>
                    </a>
                </div>
                <div class="column is-10">
                    <h3 class="post-title ">
                        <a href="<?php permalink_link(); ?> " rel="bookmark" title="Permenant to <? the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <!-- post author  -->
                    <span class="post-date"><i class="fi-xnsuxl-calendar-solid"></i> <?php the_time('d -  m - Y'); ?>, </span>
                    <span class="post-comments"><i class="fi-swslxl-pen"></i> <?php comments_popup_link('No Comment', "one commnet", "% Comments", "comment-url", "Comment disabled") ?></span>
                    <!-- post thunmbnail with link to the post -->

                    <div class="post-content">
                        <!-- the_content() uses <!\-- more --\> tag-->
                        <?php //the_content('Continue reading >>'); 
                                ?>
                        <?php the_excerpt(); ?>
                    </div>
                    <!-- tags native function -->

                </div>
            <?php endwhile;
            else : ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div> <!-- end .columns -->
    <div class="is-clearfix">

    </div>
</div> <!-- end continer-->
<?php get_footer(); ?>