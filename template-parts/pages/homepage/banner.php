<section class="page-banner-section page-home-banner-section wide-mode">
    
        
        <?php 
        if(has_post_thumbnail()){
            ?>
                <div class="thumbnail-wrap">
                <?php 
                //the_post_thumbnail('full'); 
                $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                $attachment = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
                //$srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, array( 400, 200 ) );

                $srcset = wp_get_attachment_image_srcset($post_thumbnail_id, 'full');  // <-- not (400,200)
                $sizes  = '(max-width: 480px) 412px, (max-width: 768px) 520px, 1180px';
                ?>
                    <img alt="Main Home Image" 
                      class="main-home-image"
                      srcset="<?php echo esc_attr( $srcset ); ?>" 
                      src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" 
                      height="<?php echo $attachment[2] ?>" 
                      width="<?php echo $attachment[1] ?>" 
                      sizes="<?php echo esc_attr($sizes); ?>"
                      loading="eager" decoding="async" fetchpriority="high"
                      >
                </div><?php // .thumbnail-wrap ?>
            <?php 
        } // end if


        $banner_text_1 = get_field('banner_text_1');
        $banner_text_2 = get_field('banner_text_2');
        $quick_links = get_field('quick_links');
        ?>
        <div class="bottom-wrap <?php  echo 'have-'. count($quick_links) ?>-items">
            <div class="container">
            <?php 
            // Banner Text 
            if($banner_text_1 and $banner_text_2){
                ?>
                <h1><span><?php echo $banner_text_1 ?></span> <span><?php echo $banner_text_2 ?></span></h1>
                <?php 
            }
            ?>
            </div><?php // .container ?>
            <?php 

            // Book Links
            if(!empty($quick_links)) { 
            ?>
            <div class="quick-links-wrapper">
                <div class="container">
                    <div class="slick-wrap">
                        <?php 
                        $i = 0;
                        foreach($quick_links as $bl) { 
                            $mode = $bl['mode'];
                            $title = $bl['title'];
                            $per_session = $bl['per_session'];
                            $list_text = $bl['list_text'];
                            $image = $bl['image'];
                            $book_link = $bl['book_link'];
                            $book_button_label = $bl['book_button_label'];
                            ?>
                            <div class="item-wrap">
                                <div class="book-item-wrap <?php echo $mode ?>">
                                    <div class="book-in-wrap">
                                        <?php 
                                        if($mode == 'mode-3') {
                                            ?>
                                            <div class="text-only-wrap">
                                                <?php 
                                                if($title) {
                                                    ?>
                                                    <h3 class="t-wrap">
                                                        <?php echo $title ?> <span><?php echo ($per_session ? $per_session : 'PER SESSION') ?></span>
                                                    </h3><?php // t-wrap ?>
                                                    <?php 
                                                } 
                                                ?>
                                                <div class="c-wrap">
                                                <?php 
                                                if($list_text) {
                                                    $list_text = explode("\n", $list_text);
                                                    ?>
                                                    <ul>
                                                    <?php 
                                                    foreach($list_text as $text){
                                                        if($text != '') {
                                                        ?>
                                                        <li><?php echo $text ?></li>
                                                        <?php 
                                                        }//end if
                                                    } // end foreach
                                                    ?>
                                                    </ul> 
                                                    <?php 
                                                }
                                                ?>
                                                </div><?php // .c-wrap ?>
                                            </div><?php // .text-only-wrap ?>
                                            <?php 
                                        }
                                        else { ?>
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
                                                    if($list_text) {
                                                        $list_text = explode("\n", $list_text);
                                                        ?>
                                                        <ul>
                                                        <?php 
                                                        foreach($list_text as $text){
                                                            if($text != '') {
                                                            ?>
                                                            <li><?php echo $text ?></li>
                                                            <?php 
                                                            }//end if
                                                        } // end foreach
                                                        ?>
                                                        </ul> 
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
                                                ?>
                                            </div><?php // .i-b-wrap ?>
                                        <?php 
                                        } ?>
                                        <?php 
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
                                    </div><?php // .book-in-wrap ?>
                                </div><?php // .book-item-wrap ?>
                            </div><?php // .item-wrap ?>
                        <?php 
                        } // end foreach ?>
                    </div><?php // .slick-wrap ?>
                </div><?php // .container ?>
            </div><?php // .quick-links-wrapper ?>
            <div class="slick-button-wrap">
                <div class="container">
                    <div class="slick-in-list-wrap">
                        <a rel="nofollow" class="btn-slick-left" href="#" title="Slick Left">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                        <a rel="nofollow" class="btn-slick-right" href="#" title="Slick Right">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div><?php // .slick-in-list-wrap ?>
                </div><?php // .container ?>
            </div><?php // .slick-button-wrap ?>
            <?php 
            } // end if ?>
        </div><?php // .bottom-wrap ?>
        
    

    <script>
        jQuery(document).ready(function(){

            jQuery('.page-banner-section .slick-wrap').slick({
                auto: true,
                dots: false,
                arrows: false,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                variableWidth: false,
                swipeToSlide: true,
                centerMode: false,
                responsive: [
                    {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3
                    }
                    },
                    {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2
                    }
                    }
                ]
            });

            jQuery('.page-banner-section .t-c-wrap').matchHeight({
                byRow: false
            });
            
            setTimeout(() => {
                jQuery('.page-banner-section .book-item-wrap .book-in-wrap').matchHeight({
                    byRow: false,
                    property: 'min-height'
                }); 
            }, 500);

            //
            jQuery('.btn-slick-left').click(
                function(e){
                    e.preventDefault();
                    jQuery('.page-banner-section .slick-wrap').slick('slickPrev');
                }
            )//end click
            jQuery('.btn-slick-right').click(
                function(e){
                    e.preventDefault();
                    jQuery('.page-banner-section .slick-wrap').slick('slickNext');
                }
            )//end click

            jQuery(window).on("resize", function (e) {
				checkScreenSize2();
			});

			checkScreenSize2();
			
			function checkScreenSize2(){
				var newWindowWidth = jQuery(window).width();
				if (newWindowWidth < 600) {
					jQuery('.page-banner-section .slick-wrap').slick('unslick');
				}
				else {
					jQuery('.page-banner-section .slick-wrap').slick({
                        auto: true,
                        dots: false,
                        arrows: false,
                        // infinite: true,
                        speed: 300,
                        slidesToShow: 1,
                        variableWidth: true,
                        swipeToSlide: true,
                        centerMode: false,
                        responsive: [
                            {
                            breakpoint: 1350,
                            settings: {
                                slidesToShow: 3
                            }
                            },
                            {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 2
                            }
                            }
                        ]
                    });
				}
			}
            
        });
    </script>
</section><?php // .page-banner-section ?>