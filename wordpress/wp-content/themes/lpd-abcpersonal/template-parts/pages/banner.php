<section class="page-banner-section wide-mode">
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
        $quick_links = get_field('quick_links');
        ?>
        <div class="bottom-wrap">
            <?php 
            // Banner Text 
            if($banner_text_1 and $banner_text_2){
                ?>
                <h1><span><?php echo $banner_text_1 ?></span> <span><?php echo $banner_text_2 ?></span></h1>
                <?php 
            }

            // Book Links
            if(!empty($quick_links)) { 
            ?>
            <div class="quick-links-wrapper">
                <div class="row">
                    <?php 
                    $i = 0;
                    foreach($quick_links as $bl) { 
                        $mode = $bl['mode'];
                        $title = $bl['title'];
                        $per_session = $bl['per_session'];
                        $text = $bl['text'];
                        $text_2 = $bl['text_2'];
                        $image = $bl['image'];
                        $book_link = $bl['book_link'];
                        $book_button_label = $bl['book_button_label'];
                        ?>
                        <div class="col-12 col-lg-3">
                            <div class="book-item-wrap <?php echo $mode ?>">
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
                                        if($mode == 'mode-1') { 
                                            ?>
                                            <div class="c-wrap">
                                            <?php 
                                            if($text) {
                                                ?>
                                                    <?php echo $text ?>
                                                <?php 
                                            }
                                            if($text_2) {
                                                ?>
                                                <div class="t-2-wrap">
                                                    <?php echo $text_2 ?>
                                                </div><?php // .t-2-wrap ?>
                                                <?php 
                                            }
                                            ?>
                                            </div><?php // .c-wrap ?>
                                            <?php 
                                        }//end if mode == mode-1
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
                                            <a class="btn-book" href="<?php echo $book_link ?>" title="<?php echo ($book_button_label ? $book_button_label : 'Book Now') ?>" >
                                                <?php echo ($book_button_label ? $book_button_label : 'BOOK NOW') ?>
                                            </a>
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