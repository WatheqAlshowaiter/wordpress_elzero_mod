<?php get_header() ?>

<?php get_search_form(); ?>
<h1>this is my Header One </h1>

<?php
// full documentation in wordpress.org/bloginfo 
// bloginfo('description'); // and a lot of things
bloginfo('name');

?>
<? get_sidebar(); ?>
<?php get_footer(); ?>