<?php get_header() ?>

<?php // get_search_form(); 
?>

<!-- Same as .rowBootstrap -->
<div class="container">

    <!-- .row in Bootstrap -->
    <div class="columns is-multiline">


        <!-- Here is the posts loop -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!--  Here the loop -->

                <!-- .col in Bootstrap -->
                <div class="column is-6">
                    <div class="main-post">
                        <!-- the_tile(tags before it , tags after it) -->
                        <?php the_title("<h3 class='post-title title'>", "</h3>"); ?>
                    </div>
                </div>
            <?php endwhile;
            else : ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

    </div> <!-- end .columns -->
</div> <!-- end .container-->

<div class="container">
<!-- Same as Bootstrap -->
<div class="columns is-multiline">
<!-- .row in Bootstrap -->
<div class="column is-6">
<!-- .col in Bootstrap -->
<div class="main-post">
<!-- important to add .title class in bulma -->
<h3 class="post-title title">Just A Test Post</h3>
< <span class="post-author"><i class="fi-xnsuxl-user-solid"></i> Watheq, </span> 
                <span class="post-date"><i class="fi-xnsuxl-calendar-solid"></i> 13/13/2013, </span>
                <span class="post-comments"><i class="fi-swslxl-pen"></i> 22 Comments</span>
                <img src="http://placekitten.com/620/300" class="image is-620x300x" alt="Just a cat placehoder">
                <span class="post-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia, cum? Quae atque pariatur quaerat, assumenda et voluptatum culpa hic dicta eveniet nemo doloribus optio. Praesentium nihil accusantium dolor dignissimos reprehenderit.</span>
                <hr>
                <p class="categories"><i class="fi-xnsuxl-label-solid"></i> HTML, CSS, JS</p>
            </div>
        </div>
</div> -->

<?php get_footer(); ?>

L