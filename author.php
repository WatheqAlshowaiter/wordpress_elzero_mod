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
    <!-- <div class="columns is-multiline posts-show"> -->


    <!-- Here is the posts loop -->

    <!-- WP Query  -->
    <?php
    $author_posts_num = 5;
    $author_all_posts = count_user_posts(get_the_author_meta('id'));
    $author_posts_args = array(
        'author' => get_the_author_meta('id'),
        'posts_per_page' => $author_posts_num // -1 means ALL author posts 
    );
    $author_posts = new   WP_Query($author_posts_args);
    ?>
    <?php if ($author_posts->have_posts()) : ?>
        <!-- count_user_posts(get_the_author_meta('id'))) -->
        <div class="all-posts-header-section">
            <h3 class="all-posts-header"><?php the_author_meta('nickname') ?> Latest [<?php echo $author_posts_num <= $author_all_posts ? $author_posts_num : $author_all_posts ?>] posts </h3>
        </div>
        <? while ($author_posts->have_posts()) : ?>
            <div class="columns is-multiline post-show">
                <? $author_posts->the_post(); ?>
                <!--  Here the loop -->

                <!-- .col in Bootstrap -->
                <div class="column is-2 img-section">
                    <a href="<?php permalink_link(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('thumbnail', ["class" => "image is-620x300x", "alt" => "place holder image", "title" => "post image"]); ?>
                    </a>
                </div>
                <div class="column is-10 text-section">
                    <h3 class="post-title">
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
            </div> <!-- ./post-show -->
        <?php endwhile;
        else : ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    <!-- end ./columns -->
    <div class="is-clearfix"></div>


    <!--  comments of this author -->
    <div class="columns is-multiline author-comments">
        <?php
        $author_comments_per_page = 5; // to change it smoothly when we want 

        $get_comments_args = array(
            'user_id' => get_the_author_meta('id'),
            'count'  => true
        );
        $author_all_comments = get_comments($get_comments_args);

        $author_comments_args = array(
            'user_id' => get_the_author_meta('id'),
            'status' => 'approve',
            'post_status' => 'publish', // not published with (ed)
            'number' => $author_comments_per_page,
            'post_type' => 'post'
        );

        $author_comments = get_comments($author_comments_args); ?>
        <?php
        if ($author_comments) : ?>
            <div class="column is-12 comment-header-section">
                <h3 class="comments-header"><?php the_author_meta('nickname') ?> latest [ <?php echo $author_comments_per_page <= $author_all_comments ? $author_comments_per_page : $author_all_comments; ?> ] comments </h3>
            </div>
            <?php foreach ($author_comments as $comment) : ?>
                <div class=" columns is-multiline comment-listing">

                    <div class="column is-12 comment-title">
                        <a href=    "<?php echo get_permalink($comment->comment_post_ID); ?>">
                            <?php echo get_the_title($comment->comment_post_ID); ?>
                        </a>
                    </div>
                    <div class="column is-12 comment-date">
                    <i class="fi-xnsuxl-calendar-solid"> </i>  <?php echo "Added on ". mysql2date('D d:m:Y', ($comment->comment_date)) ; ?>
                    </div>  
                    <div class="column is-12 comment-content">
                        <?php echo $comment->comment_content; ?>
                    </div>

                </div> <!-- ./comment-listing -->
            <?php endforeach;  ?>
        <?php else :
            echo "There is no commment belong to this user";
        endif;
        ?>
    </div> <!-- ./author-comments -->



</div> <!-- ./continer-->
<?php get_footer(); ?>