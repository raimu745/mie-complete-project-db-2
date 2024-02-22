<?php
/* Template Name: Article */
get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$article = array(
    'posts_per_page' => 6,
    'paged' => $paged,
    'offset' => 0,
    'category' => '',
    'category_name' => 'article',
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'article',
    'post_status' => 'publish',
    'suppress_filters' => true,
);
// $article_result = get_posts($article);
$article_result = new WP_Query($article);
// echo"<pre>";
// print_r($article_result);
// exit;
?>
<style>
    .news_section .news-detail-head .content .gl-cart-btn .gl-input {
        padding-right: 5px;
        width: 42%;
    }

    .menu_bar_parent {
        margin-bottom: 0px;
    }
</style>
<div class="new-title">
    <div class="title-head">
        <h1>Article</h1>
    </div>
</div>
<div class="container news_section news-con">
    <div class="row  p-0">
        <div class="col-md-12 news-detail-head pb-0">
            <div class="content">
                <form id="filter_form" novalidate="novalidate">
                    <div class="gl-cart-btn">
                        <div class="gl-input">
                            <input type="text" placeholder="Article Title" id="title" name="title" spellcheck="false" data-ms-editor="true">
                        </div>
                        <div class="gl-input">
                            <input type="text" placeholder="Author" id="team" name="author" spellcheck="false" data-ms-editor="true">
                        </div>

                        <div class="gl-btn filter_btn">
                            <button type="submit" name="submit" value="submit">Filter</button>
                            <!-- <input type="submit" name="filter" value="Filter"> -->
                            <!-- <a href="">Filter</a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row news_card" id="data_append">

        <?php
        if ($article_result->have_posts()) :
            foreach ($article_result->posts as $key => $data) :

                $team_member_img = wp_get_attachment_url(get_post_thumbnail_id($data->ID));
                $team_member_meta = get_post_meta($data->ID);
        ?>
                <div class="col-md-4 ">

                    <div class="content">
                        <a href="<?php the_permalink($data->ID); ?>">
                            <?php if (isset($team_member_img)) { ?>
                                <img src="<?= $team_member_img ?>" alt="" class="img-fluid">
                            <?php } ?>
                            <h3><?= $data->post_title; ?></h3>
                        </a>
                        <span>BY <small> <?php the_author_meta('display_name', $data->post_author); ?></small> - <?= get_the_date("M d, y", $data->ID) ?></span>
                        <p> <?= $data->post_content; ?> </p>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h5>No <Datag></Datag>
            </h5>
        <?php endif ?>
    </div>
    <div class="loader_content">
        <img src="<?= get_template_directory_uri() ?>/assets/images/software_loading.gif" style="height: 30px; width:30px" class="mt-2">
    </div>

</div>

<!-- NEws Section end -->
<!-- pagination start -->

<div class="pagination">
    <div class="container pl-lg-0 pr-lg-0">
        <div class="pagination-info">
            <?php
            if (function_exists("pagination")) {
                pagination($article_result->max_num_pages);
            }
            ?>

        </div>
    </div>
</div>
<!-- pagination end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $("#filter_form").validate({
        rules: {
            article: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            author: {
                required: true,
                minlength: 3,
                maxlength: 20
            },


        },
        messages: {
            sport: {
                required: "Please Enter Title",
                minlength: "Enter Atleast 3 Chracter",
                maxlength: "Maximan 20 charaters allowed"
            },
            team: {
                required: "Please Enter Author Name",
                minlength: "Enter Atleast 3 Chracter",
                maxlength: "Maximan 20 charaters allowed"
            },

        },
        submitHandler: function(form, e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?= get_template_directory_uri(); ?>/article-filter.php',
                data: $('#filter_form').serialize(),
                beforeSend: function() {
                    $(".loader_content").css("visibility", "visible");
                },
                complete: function() {
                    $(".loader_content").css("visibility", "hidden");
                },
                success: function(data) {
                    console.log(data);
                    $("#data_append").html(data);

                },
            });
        },
    });
</script>

<?php get_footer() ?>