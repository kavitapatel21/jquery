<?php
/*
Template Name: multi-slider
Template Post Type: post, page, my-post-type;
*/
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<style>
    button {
        margin: 0;
        padding: 0;
        background: none;
        border: none;
        border-radius: 0;
        outline: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .slide-arrow {
        position: absolute;
        top: 50%;
        margin-top: -15px;
    }

    .prev-arrow {
        left: -40px;
        width: 0;
        height: 0;
        border-left: 0 solid transparent;
        border-right: 15px solid #113463;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
    }

    .next-arrow {
        right: -40px;
        width: 0;
        height: 0;
        border-right: 0 solid transparent;
        border-left: 15px solid #113463;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
    }

    .carousel-image {
        width: 100%;
        height: auto;
    }

    .page {
        width: 100%;
        margin: 0 auto;
    }

    .slideshow {
        width: 640px;
        height: 360px;
        position: relative;
        text-align: center;
        line-height: 750px;
        padding-bottom: 30px
    }

    .slideshow input[type=radio] {
        font-size: .75em;
        width: 1em;
        height: 1em;
        display: inline-block;
        position: relative;
        z-index: 99;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: #ccc;
        border-radius: 1em;
        transition: .3s ease-out background, .3s ease-out transform
    }

    .slideshow input[type=radio]:checked {
        background: #999;
        outline: none;
        -webkit-transform: scale(1.3);
        -moz-transform: scale(1.3);
        transform: scale(1.3)
    }

    .slideshow .slideshow-item {
        width: 640px;
        height: 360px;
        line-height: 1.5;
        position: absolute;
        top: 0;
        opacity: 0;
        transition: .3s ease-out opacity
    }

    .slideshow .slideshow-item label {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 50%;
        display: none;
        z-index: 88;
        cursor: pointer;
        color: transparent;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .slideshow .slideshow-item label:after {
        display: block;
        content: '\25B6';
        font-size: 2em;
        color: #fff;
        position: absolute;
        top: 50%;
        right: 10px;
        margin-top: -.5em
    }

    .slideshow .slideshow-item label.previous {
        left: 0;
        display: block
    }

    .slideshow .slideshow-item label.previous:after {
        -webkit-transform: scaleX(-1);
        -moz-transform: scaleX(-1);
        transform: scaleX(-1);
        right: auto;
        left: 10px
    }

    .slideshow .slideshow-item label.next {
        left: 50%;
        display: block
    }

    .slideshow input[type=radio]:checked+.slideshow-item {
        opacity: 1
    }
</style>

<div class="page">
    <div class="carousel">
        <div class="slideshow">

            <?php
            $args = array(
                'post_type' => 'dynamic-multi-slider',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order'    => 'ASC',
            );
            $query = new WP_Query($args);
            $a = 1;
            while ($query->have_posts()) : $query->the_post();
            ?>
                <input type="radio" name="slide" id="item-<?php echo $a; ?>" checked="checked">
                <div class="slideshow-item">
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                    <a href="<?php echo $url; ?>" class="carousel-link">
                        <img src="<?php echo $url; ?>" alt="" class="carousel-image">
                        <!--<label for="item-3" class="previous">Go to slide 3</label>
                        <label for="item-2" class="next">Go to slide 2</label>-->
                    </a>
                </div>
            <?php
                $a++;
            endwhile; ?>
        </div>
    </div>
</div>

<script>
    $('.carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
    });

    $('.carousel').magnificPopup({
        delegate: '.carousel-link',
        gallery: {
            enabled: true
        },
        type: 'image',
    });
</script>