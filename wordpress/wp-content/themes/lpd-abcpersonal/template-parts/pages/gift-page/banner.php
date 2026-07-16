<section class="page-banner-section">
    <div class="container">
        
        <?php 
        if(has_post_thumbnail()){
            ?>
                <div class="thumbnail-wrap">
                <?php 
                the_post_thumbnail('full'); 
                ?>
                </div><?php // .thumbnail-wrap ?>
            <?php 
        } // end if


        $banner_text_1 = get_field('banner_text_1');
        $banner_text_2 = get_field('banner_text_2');
        $book_links = get_field('book_links');
        ?>
        <div class="bottom-wrap">
            <?php 
            // Banner Text 
            if($banner_text_1){
                ?>
                <h1><?php echo $banner_text_1 ?></h1>
                <?php 
            }
            if($banner_text_2){
                ?>
                <h2><?php echo $banner_text_2 ?></h2>
                <?php 
            }

            // Book Links
            if(!empty($book_links)) { 
            ?>
            <div class="book-links-wrapper">
                <div class="row">
                    <?php 
                    $i = 0;
                    foreach($book_links as $bl) { 
                        $title = $bl['title'];
                        $per_session = $bl['per_session'];
                        $text = $bl['text'];
                        $image = $bl['image'];
                        $book_link = $bl['book_link'];
                        $book_button_label = $bl['book_button_label'];
                        $i++;
                        ?>
                        <div class="col-12 col-lg-4">
                            <div class="book-item-wrap">
                                <?php 
                                if($i == 1){
                                    ?>
                                    <img class="holly-elm holly-1" src="<?php echo get_template_directory_uri() ?>/assets/images/holly-transparent-background.png" alt="Holly 1" />
                                    <?php 
                                }
                                if($i == 3){
                                    ?>
                                    <img class="holly-elm holly-3" src="<?php echo get_template_directory_uri() ?>/assets/images/holly-transparent-background.png" alt="Holly 2" />
                                    <?php 
                                }
                                ?>
                                <div class="book-in-wrap">
                                    <div class="t-c-wrap">
                                        <?php 
                                        if($title) {
                                            ?>
                                            <h3 class="t-wrap">
                                                <?php echo $title ?> <span><?php echo ($per_session ? $per_session : 'PER SESSION') ?></span>
                                            </h3><?php // t-wrap ?>
                                            <?php 
                                        }
                                        if($text) {
                                            ?>
                                            <div class="c-wrap">
                                                <?php echo wpautop($text) ?>
                                            </div><?php // .c-wrap ?>
                                            <?php 
                                        }
                                        ?>
                                    </div><?php // .t-c-wrap ?>
                                    <div class="i-b-wrap">
                                        <?php 
                                        if($image) {
                                            ?>
                                            <img src="<?php echo $image ?>" alt="<?php echo $title ?>" />
                                            <?php
                                        } 
                                        if($book_link){
                                            ?>
                                            <div class="button-wrap">
                                                <a class="btn-book" href="<?php echo $book_link ?>" title="<?php echo ($book_button_label ? $book_button_label : 'Book Now') ?>" >
                                                    <?php echo ($book_button_label ? $book_button_label : 'BOOK NOW') ?>
                                                </a>
                                            </div><?php // .button-wrap ?>
                                            <?php 
                                        }
                                        ?>
                                    </div><?php // .i-b-wrap ?>
                                </div><?php // .book-in-wrap ?>
                            </div><?php // .book-item-wrap ?>
                        </div><?php // .col ?>
                    <?php 
                    } // end foreach ?>
                </div><?php // .row ?>
            </div><?php // .book-links-wrapper ?>
            <?php 
            } // end if ?>
        </div><?php // .bottom-wrap ?>
        
    </div><?php // .container ?>

    <script>
        jQuery(document).ready(function(){
            var bodyHeight = jQuery("body").height()-jQuery(window).height();
            window.onscroll = function() {

                //Determine the amount to rotate by.
                var deg = -window.scrollY*(360/bodyHeight) -41;

                jQuery(".holly-elm").css({
                    "transform": "rotate("+deg+"deg)",
                });

            };
        });
    </script>
</section><?php // .page-banner-section ?>