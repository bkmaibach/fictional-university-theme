<?php 
    get_header();
    while(have_posts()) {
        the_post(); ?>
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>);">
            </div>
                <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title() ?></h1>
                <div class="page-banner__intro">
                    <p>DON'T FORGET ABOUT CUSTOM FIELDS!</p>
                </div>
            </div>  
        </div>

        <div class="container container--narrow page-section">

            <?php 
                $ID = get_the_ID();
                $parentID = wp_get_post_parent_id($ID);
                if ($parentID){
                    ?>
                    <div class="metabox metabox--position-up metabox--with-home-link">
                        <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($parentID); ?>"><i class="fa fa-home" 
                        aria-hidden="true"></i> Back to <?php echo get_the_title($parentID); ?></a>
                        <span class="metabox__main"><?php the_title() ?></span></p>
                    </div>
                    <?php
                } 
            ?>

            <?php 
            $getPagesArgs = array(
                'child_of' => $ID
            );
            //This will evaluate to 0 if this page is not a parent of any other pages.
            $isAParent = get_pages($getPagesArgs);
            //If this page has a parent, OR is a parent, then the sidebar will be displayed.
            if ($parentID || $isAParent) {
                ?>
                <div class="page-links">
                    <!-- The following function call works because get_the_titl and get_permalink expect 0 to mean the current page, 
                    so no conditional is needed -->
                <h2 class="page-links__title"><a href="<?php echo get_permalink($parentID); ?>"><?php echo get_the_title($parentID); ?></a></h2>
                <ul class="min-list">
                    <?php
                        if($parentID){
                            $findChildrenOf = $parentID;
                        } else {
                            $findChildrenOf = $ID;
                        }
                        $listArgs = array(
                            'title_li' => NULL,
                            'child_of' => $findChildrenOf,

                        );
                        wp_list_pages($listArgs);
                    ?>
                </ul>
                </div>
                <?php
            } ?>


            <div class="generic-content">
                <?php the_content(); ?>
            </div>
        </div>
    <?php }
    get_footer();
?>