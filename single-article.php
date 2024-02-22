<?php
get_header();
global $post;
?>
<div class="container news_section news-con">
    <div class="row  p-0">
        <div class="col-md-12 news-detail-head">
            <div class="content">

                <a href="">
                    <h1><?= $post->post_title; ?></h1>
                </a>

                <p>
                    <?= $post->post_content; ?>
                </p>

                <span>BY <strong><?php the_author_meta('display_name', $post->post_author); ?></strong> - <?= get_the_date("M  d, Y", $post->ID); ?></span>

                <div class="news-img"><img src="<?= the_post_thumbnail_url($post->ID) ?>" alt="" class="img-fluid w-100"></div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12 ">
            <div class="content">
                <!-- <div class="news-img"><img src="./assets/images/News-hero.png" alt="" class="img-fluid "></div> -->
                <div class="news-details-info">
                    <?= $post->excerpt; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 sport_1 heading_parent">
            <h3>Related Posts</h3>
            <a href="<?= site_url() ?>/articles">View All</a>
        </div>
        <div class="col-sm-12 art-bar sport_1 ">

            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <?php
    //get the taxonomy terms of custom post type
    $customTaxonomyTerms = wp_get_object_terms($post->ID, 'category', array('fields' => 'ids'));
    // print_r($customTaxonomyTerms);
    // exit;
    //query arguments
    $args = array(
        'post_type' => 'article',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $customTaxonomyTerms
            )
        ),
        'post__not_in' => array($post->ID),
    );

    //the query
    $relatedPosts = new WP_Query($args);
    //loop through query
    if ($relatedPosts->have_posts()) { ?>
        <div class="row news_card">
            <?php
            while ($relatedPosts->have_posts()) {
                $relatedPosts->the_post();
                $post_link = get_the_permalink($post->ID);
            ?>

                <div class="col-md-4 ">
                    <div class="content">
                        <?php $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                        <a href="<?= $post_link; ?>">
                            <img src="<?= $image; ?>" class="img-fluid" />
                            <h3><?= the_title(); ?></h3>
                        </a>
                        <span>BY <small><?php the_author(); ?></small> - <?php the_date(); ?></span>
                        <p>
                            <?= $post->post_content; ?>
                        </p>
                    </div>
                </div>

            <?php } ?>

        </div>

    <?php
    } else { ?>
        <div>No Related Posts Found</div>
    <?php   }

    //restore original post data
    wp_reset_postdata();

    ?>
</div>
<!-- NEws Section end -->

<?php get_footer(); ?>