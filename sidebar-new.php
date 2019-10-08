<!-- 
    Get Category Comments Count 
 -->
<?php
$comments_args = array("status" => 'approve');
$comments_count = 0; // start from zero
$all_comments = get_comments($comments_count); // get all commments 

// loop through all comments 
foreach ($all_comments as $comment) {
    // get the post id 
    $post_id = $comment->comment_post_ID;
    if (!in_category('new', $post_id)) {
        continue;
    }
    $comments_count++; // counter 
}


// get posts count 

$cat = get_queried_object(); // get category obj info
$post_count = $cat->count;

?>


<div class="sidebar-new">
    <div class="widget">
        <h3 class="widget-title">widget title</h3>
        <div class="widget-content">
            <ul>
                <li>
                    <span>Comments Count:</span> <?php echo $comments_count; ?>
                </li>
                <li>
                    <span>Posts Count:</span> <?php echo $post_count ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Latest 3 (Posts) Articles</h3>
        <div class="widget-content">
            <?php

            $posts_args = array(
                'posts_per_page' => 3,
                'cat' => 4 // it should get it manually!
            );

            $query = new WP_Query($posts_args);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    ?>
                    <li>
                        <a target="_blank" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </li>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>

        </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Hot Topics By Comment Count</h3>
        <div class="widget-content">
            <?php

            $posts_hots_args = array(
                'posts_per_page' => 1,
                'orderby' => 'comment_count'
            );

            $query_hots = new WP_Query($posts_hots_args);

            if ($query_hots->have_posts()) :
                while ($query_hots->have_posts()) :
                    $query_hots->the_post();
                    ?>
                    <ul class="">
                        <li>
                            <a target="_blank" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </li>
                        <hr>
                        <span> has <?php comments_popup_link("No Comments", "1 Comment", "% Comments"); ?> comments</span>

                    </ul>

            <?php
                endwhile;
            endif;

            wp_reset_postdata();

            ?>


        </div>
    </div>
</div>