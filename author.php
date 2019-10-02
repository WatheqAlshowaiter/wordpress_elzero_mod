<?php get_header() ?>
<div class="container author-page">
    <div class="columns is-multiline author-meta">
        <div class="column is-12">
            <h1 class="profile-header "> <?php the_author_meta('nickname'); ?> Page</h1>

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
            <ul>
                <li>First Name: <?php the_author_meta('first_name'); ?></li>
                <li>Last Name: <?php the_author_meta('last_name'); ?> </li>
                <li>Nick Name: (<span class="nickname"><?php the_author_meta('nickname'); ?></span>)</li>
            </ul>
            <hr>
            <?php if (get_the_author_meta('description')) : ?>
                <p> <?php the_author_meta('description'); ?></p>
            <?php else : echo "No bio for this user"; ?>
            <?php endif; ?>
        </div>
        <div class="columns">
            <div class="column is-4">Post Count</div>
            <div class="column is-4">Comments Count</div>
            <div class="column is-4">Something for later use</div>
        </div>
    </div> <!-- end column -->
</div> <!-- end continer-->
<?php get_footer(); ?>