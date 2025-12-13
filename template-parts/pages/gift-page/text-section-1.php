<?php 
$text_section_1_content = get_field('text_section_1_content');
$text_section_1_main_text = get_field('text_section_1_main_text');
$text_section_1_before_content_1 = get_field('text_section_1_before_content_1');
$text_section_1_title_1 = get_field('text_section_1_title_1');
$text_section_1_content_1 = get_field('text_section_1_content_1');
$text_section_1_before_content_2 = get_field('text_section_1_before_content_2');
$text_section_1_title_2 = get_field('text_section_1_title_2');
$text_section_1_content_2 = get_field('text_section_1_content_2');
$text_section_1_bottom_text = get_field('text_section_1_bottom_text');
?>
<section class="text-section-1-section">
    <div class="container">
        <?php 
        if($text_section_1_content) {
            ?>
            <div class="main-content-wrap">
                <?php echo wpautop($text_section_1_content) ?>
            </div><?php // .main-text-wrap ?>
            <?php 
        }//end if
        
        if($text_section_1_main_text) {
            ?>
            <div class="main-text-wrap">
                <?php echo wpautop($text_section_1_main_text) ?>
            </div><?php // .main-text-wrap ?>
            <?php 
        }//end if
        ?>
        <div class="text-wrapper">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="text-in-wrap">
                        <?php 
                        if($text_section_1_before_content_1) {
                            ?>
                            <div class="before-content-wrap">
                                <?php echo wpautop($text_section_1_before_content_1) ?>
                            </div><?php // .before-content-wrap ?>
                            <?php 
                        }
                        if($text_section_1_title_1){
                            ?>
                            <h3><?php echo $text_section_1_title_1 ?></h3>
                            <?php 
                        }// end if
                        if($text_section_1_content_1){
                            ?>
                            <div class="content-wrap">
                                <?php echo wpautop($text_section_1_content_1) ?>
                            </div><?php // .content-wrap ?>
                            <?php 
                        }// end if
                        ?>
                    </div><?php // .text-in-wrap ?>
                </div><?php // .col ?>
                <div class="col-12 col-md-6">
                    <div class="text-in-wrap">
                        <?php 
                        if($text_section_1_before_content_2) {
                            ?>
                            <div class="before-content-wrap">
                                <?php echo wpautop($text_section_1_before_content_2) ?>
                            </div><?php // .before-content-wrap ?>
                            <?php 
                        }
                        if($text_section_1_title_2){
                            ?>
                            <h3><?php echo $text_section_1_title_2 ?></h3>
                            <?php 
                        }// end if
                        if($text_section_1_content_2){
                            ?>
                            <div class="content-wrap">
                                <?php echo wpautop($text_section_1_content_2) ?>
                            </div><?php // .content-wrap ?>
                            <?php 
                        }// end if
                        ?>
                    </div><?php // .text-in-wrap ?>
                </div><?php // .col ?>
            </div><?php // .row ?>
        </div><?php // .text-wrapper ?>
        <?php 
        if($text_section_1_bottom_text) {
            ?>
            <div class="text-bottom-wrapper">
                <?php 
                echo wpautop($text_section_1_bottom_text);
                ?>  
            </div><?php // .text-bottom-wrapper ?>
            <?php 
        }
        ?>
    </div><?php // .container ?>
</section><?php // .text-section-1-section ?>