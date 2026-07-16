<?php 
$package_section_main_title = get_field('package_section_main_title');
$packages = get_field('packages');
?>
<section class="section-packages-wrapper">
    <div class="container">
        <?php 
        if($package_section_main_title ) {
            ?>
            <h2 class="section-title-elm"><?php echo $package_section_main_title ?></h2>
            <?php 
        }
        if(!empty($packages)){
            ?>
            <div class="packages-list-wrap">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <?php 
                        foreach($packages as $package){
                            $content_top = $package['content_top'];
                            $content_bottom = $package['content_bottom'];
                            $cost_text = $package['cost_text'];
                            ?>
                            <div class="item-wrap">
                                <?php 
                                if($content_top) {
                                    ?>
                                    <div class="top-content-wrap">
                                        <?php echo wpautop($content_top) ?>
                                    </div><?php // .top-content-wrap ?>
                                    <?php 
                                }
                                if($content_bottom) {
                                    ?>
                                    <div class="bottom-content-wrap">
                                        <?php echo wpautop($content_bottom) ?>
                                    </div><?php // .bottom-content-wrap ?>
                                    <?php 
                                }
                                if($cost_text) {
                                    ?>
                                    <div class="cost-wrap">
                                        <?php echo $cost_text ?>
                                    </div><?php // .bottom-content-wrap ?>
                                    <?php 
                                }
                                ?>
                            </div><?php // .item-wrap ?>
                            <?php 
                        }//end foreach
                    ?>
                    </div><?php // .col ?>
                    <div class="col-12 col-xl-4">
                        <?php 
                        $more_services_title = get_field('more_services_title');
                        $more_services_items = get_field('more_services_items');
                        if(!empty($more_services_items)){
                            ?>
                            <span class="limit-sticky-wrap"></span>
                            <div class="more-service-wrapper">
                                
                                <div class="service-floating-wrap">
                                    <?php 
                                    if($more_services_title){
                                        ?>
                                        <h2 class="section-title-elm"><?php echo $more_services_title ?></h2>
                                        <?php
                                    }//end if
                                    ?>
                                    <div id="more-services-accordion" class="accordion">
                                    <?php 
                                    $i = 0;
                                    foreach($more_services_items as $item){
                                        $name = $item['name'];
                                        $content = $item['content'];
                                        if($name and $content) {
                                            $i++;
                                        ?>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $i ?>" aria-expanded="true" aria-controls="collapse<?php echo $i ?>">
                                                        <?php echo $name ?>
                                                    </button>
                                                </h3><?php // .accordion-header ?>
                                                <div id="collapse-<?php echo $i ?>" class="accordion-collapse collapse" data-bs-parent="#more-services-accordion">
                                                    <div class="accordion-body">
                                                        <?php echo wpautop($content) ?>
                                                    </div><?php // .accordion-body ?>
                                                </div><?php // .accordion-collapse ?>

                                            </div><?php // accordion-item ?>
                                        <?php 
                                        }//end if
                                    } // foreach
                                    ?>
                                    </div><?php // .accordion ?>
                                </div><?php // .service-floating-wrap" ?>
                                
                            </div><?php // .more-service-wrapper ?>
                            <span class="limit-end-sticky-wrap"></span>
                            <?php 
                        }//end if
                        ?>
                    </div><?php // .col ?>
                </div><?php // .row ?>
                    <?php 
                ?>
            </div><?php // .packages-list-wrap ?>
            <?php 
        }//end if
        ?>
    </div><?php // container ?>

    <script>
        // Select all accordion items
        const accordionItems = document.querySelectorAll('.accordion-item');

        accordionItems.forEach(item => {
            // Get the collapse element within the accordion item
            const collapse = item.querySelector('.accordion-collapse');

            // Add class when the collapse is shown
            collapse.addEventListener('show.bs.collapse', () => {
                item.classList.add('active');
            });

            // Remove class when the collapse is hidden
            collapse.addEventListener('hide.bs.collapse', () => {
                item.classList.remove('active');
            });
        });

        // STICKy

        jQuery(window).scroll(
            function(){
                var sideWidth = jQuery('.more-service-wrapper').outerWidth();
                var hT = jQuery('.limit-sticky-wrap').offset().top,
                    hH = jQuery('.limit-sticky-wrap').outerHeight(),
                    wH = jQuery(window).height(),
                    wS = jQuery(this).scrollTop();
                if (wS > (hT+hH-10)){
                    jQuery('.more-service-wrapper').addClass('sticky').css('width',sideWidth + 'px');
                }
                else {
                    jQuery('.more-service-wrapper').removeClass('sticky').css('width', 'auto');
                }
            }
        )//end scroll

        var lastScrollTop = 0;
        jQuery(window).scroll(
            function(){
                var hT = jQuery('.limit-end-sticky-wrap').offset().top,
                    hH = jQuery('.limit-end-sticky-wrap').outerHeight(),
                    wH = jQuery(window).height(),
                    wS = jQuery(this).scrollTop();

                    var s = jQuery(".more-service-wrapper").offset().top;
                    var sH = jQuery(".more-service-wrapper").outerHeight();
                    console.log((wS+sH+s) + '  ' + hT)
                if((wS + 10) < s && wS < lastScrollTop) {
                    jQuery('.more-service-wrapper.floating').removeClass('floating');
                }
                else if ((sH+s) > (hT) && wS > lastScrollTop){
                    jQuery('.more-service-wrapper').addClass('floating');
                }

                lastScrollTop = wS;
            }
        )//end scroll
    </script>
</section>