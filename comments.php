<?php


if (!comments_open()) :
    echo "Comments disabled";
else :
    ?>
    <h3 class="comments-count"> <?php comments_number('No Comment yet.', '1 Comment', "% Comments"); ?> </h3>
    <ul class="my-comments-list">
        <?php
            $args = array(
                'max_depth' => 3,
                'type' => 'comment',
                //  'per_page' => 1  // number of comments per page 
                'avatar_size' => '55',
                'reverse_top_level' => true // make newer comment appear above older ones 
            );

            wp_list_comments($args);
            ?>
    </ul>
    <hr class="comment-separator">
    <?php
        $comment_form_args = array(
            'title_reply' => "Post Your Comment",
            "title_reply_to" => "Add a replay to [%s]",
            "class_submit" => "button is-link",
            "comment_notes_before" => ''
        );
        comment_form($comment_form_args);   ?>
<?

endif;
