<?php
/**
 * Jumbotron Template Part
 *
 * @package physio-qt
 */

// Carousel touch support option
$carousel_touch = get_field( 'enable_touch_support' );
if ( $carousel_touch ) { 
    $carousel_touch = 'carousel-touch';
}

// Carousel pause on hover
$carousel_pause_hover = get_field( 'pause_hover' );
if ( $carousel_pause_hover ) { 
    $carousel_pause_hover = 'carousel-pause-hover';
}

// Carousel slider animation
$carousel_animation = get_field( 'slide_animation' );
?>

<div class="jumbotron carousel slide <?php echo esc_attr( $carousel_touch ); ?> <?php echo esc_attr( $carousel_animation ); ?> <?php echo esc_attr( $carousel_pause_hover ); ?>" id="jumbotron-fullwidth" data-ride="carousel" <?php printf( 'data-interval="%s"', get_field( 'slide_autocycle' ) ? get_field( 'slide_interval' ) : 'false' ); ?> <?php printf( '%s', get_field( 'pause_hover' ) ? '' : 'data-pause="false"' ); ?>>

    <div class="carousel-inner">

        <?php $physio_qt_count_slides = count( get_field( 'slides' ) ); ?>
        <?php if ( $physio_qt_count_slides > 1 ) : ?>
            <a class="carousel-control left" href="#jumbotron-fullwidth" role="button" data-slide="prev"><i class="fa fa-caret-left"></i></a>
            <a class="carousel-control right" href="#jumbotron-fullwidth" role="button" data-slide="next"><i class="fa fa-caret-right"></i></a>
        <?php endif; ?>

        <?php 
            $i = -1;
            while ( have_rows( 'slides' ) ) : 
                the_row();
                $i++;

                // Get the image
                $get_slide_image = get_sub_field( 'slide_image' );

                // Get the image meta
                $get_slide_image_alt = get_post_meta( $get_slide_image, '_wp_attachment_image_alt', true );

                // Check if image alt text is added, else display slide heading as alt
                if ( $get_slide_image_alt == '' ) {
                    $get_slide_image_alt = get_sub_field( 'slide_heading' );
                }

                // Get the url for the img src
                $slide_image = wp_get_attachment_image_src( $get_slide_image, 'physio-qt-slider-l' );

                // Get the srcset images
                $slide_image_srcset = physio_qt_srcset_sizes( $get_slide_image, array( 'physio-qt-slider-s', 'physio-qt-slider-m', 'physio-qt-slider-l' ) );

                // Get the caption option field
                $slide_caption = get_field( 'slide_captions' );

                // Get the caption alignment field
                $slide_caption_align = get_field( 'slide_caption_alignment' );
                
                // Get the link url field
                $slide_link = get_sub_field( 'slide_link' );

                // Get the link target field
                $slide_link_target = get_sub_field( 'slide_link_target' );
            ?>

            <div class="item <?php echo 0 === $i ? 'active' : ''; ?>">
                <?php if ( ! empty( $slide_link ) && 'no_captions' === $slide_caption ) : ?>
                    <a href="<?php echo esc_url( $slide_link ); ?>"<?php echo ( 'yes' === $slide_link_target ) ? ' target="_blank"' : ''; ?>>
                <?php endif; ?>
                <img src="<?php echo esc_url( $slide_image[0] ); ?>" srcset="<?php echo esc_html( $slide_image_srcset ); ?>" sizes="100vw" width="<?php echo esc_attr( $slide_image[1] ); ?>" height="<?php echo esc_attr( $slide_image[2] ); ?>" alt="<?php echo esc_attr( strip_tags( $get_slide_image_alt ) ); ?>">
                <?php if ( ! empty( $slide_link ) && 'no_captions' === $slide_caption ) : ?>
                    </a>
                <?php endif; ?>
               
                <?php if ( 'use_captions' === $slide_caption && ( get_sub_field( 'slide_small_heading' ) || get_sub_field( 'slide_heading' ) || get_sub_field( 'slide_content' ) ) ) : ?>
                    <div class="container">
                        <div class="jumbotron-caption <?php echo esc_attr( $slide_caption_align ); ?>">
                            <?php if( get_sub_field( 'slide_small_heading' ) ) : ?>
                                <div class="caption-small-heading"><?php the_sub_field( 'slide_small_heading' ); ?></div>
                            <?php endif; ?>
                            <?php if( get_sub_field( 'slide_heading' ) ) : ?>
                                <div class="caption-heading"><h1><?php the_sub_field( 'slide_heading' ); ?></h1></div>
                                <?php endif; ?>
                            <?php if( get_sub_field( 'slide_content' ) || have_rows( 'slide_buttons' ) ) : ?>
                                <div class="caption-content">
                                    <?php
                                        the_sub_field( 'slide_content' );
                                        while ( have_rows( 'slide_buttons' ) ) :
                                            the_row();
                                            // Get the slide button link
                                            $slide_button_link = get_sub_field( 'slide_button_link' );
                                            // Get the slide button text
                                            $slide_button_text = get_sub_field( 'slide_button_text' );
                                            // Get the slide button style
                                            $slide_button_style = get_sub_field( 'slide_button_style' );
                                            ?>
                                            <a href="<?php echo esc_url( $slide_button_link ); ?>" class="btn btn-<?php echo esc_attr( $slide_button_style ); ?>"><?php echo esc_html( $slide_button_text ); ?></a>
                                            <?php
                                        endwhile;
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        
        <?php endwhile; ?>

    </div>
</div>