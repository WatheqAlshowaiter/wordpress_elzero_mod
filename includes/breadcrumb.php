<?php
$all_cats = get_the_category(); // get all info about the categories of this posts

?>
<div class="  breadcrumb-holder">
    <div class="container ">
        <div class="breadcrumb">
            <ol class="">
                <li class=""> <a href="<?php echo get_home_url(); ?>" target="_blank">
                        <?php bloginfo('name'); ?>
                    </a></li>
                <li class=""> <a href="<?php echo esc_url(get_category_link($all_cats[0]->term_id)); ?>" target="_blank">
                        <?php echo esc_html($all_cats[0]->name);  ?>
                    </a></li>
                <li class="is-active"><a> Current </a></li>
            </ol>
        </div>
    </div>  

</div>