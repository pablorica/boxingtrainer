<?php 
$text_section_2_content = get_field('text_section_2_content');
?>
<section class="text-section-1-section text-section-2-section">
    <div class="container">
        <div class="text-wrapper">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="text-in-wrap">
                        <?php 
                        if($text_section_2_content){
                            ?>
                            <div class="content-wrap">
                                <?php echo wpautop($text_section_2_content) ?>
                            </div><?php // .content-wrap ?>
                            <?php 
                        }// end if
                        ?>
                    </div><?php // .text-in-wrap ?>
                </div><?php // .col ?>
            </div><?php // .row ?>
        </div><?php // .text-wrapper ?>
    </div><?php // .container ?>
</section><?php // .text-section-2-section ?>