<?php

$title      = get_theme_mod( 'services_title', esc_html__( 'Our Services', 'screenr' ) );
$subtitle   = get_theme_mod( 'services_subtitle',esc_html__( 'Section subtitle', 'screenr' ) );
$desc       = get_theme_mod( 'services_desc' );
$layout     = absint( get_theme_mod( 'services_layout', 2 ) );
if ( $layout == 0 ){
    $layout = 2;
}

$layout = 3;
$item = ['readmore' => true];
$text = __( 'Read more', $domain = 'default' );

?>

<?php
switch ($item['thumb_type']) {
    case 'icon':
        ?>
        <div class="card card-block service__media-icon">
            <div class="service-card-content">
                <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <div class="card-text"><?php the_excerpt(); ?></div>
            </div>
            <?php if ($item['icon']) { ?>
                <div class="service-card-icon">
                    <i class="<?php echo esc_attr($item['icon']); ?> fa-3x" aria-hidden="true"></i>
                </div>
            <?php } ?>
            <?php if ($item['readmore']) {
                ?>
                <a href="<?php the_permalink(); ?>" class="service-button"><?php echo $text; ?></a>
            <?php } ?>
        </div>
        <?php
        break;
    case 'no_thumb':
        ?>
        <div class="card card-block">
            <div class="service-card-content">
                <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <p class="card-text"><?php the_excerpt(); ?></p>
                <?php if ($item['readmore']) {
                    ?>
                    <a href="<?php the_permalink(); ?>" class="service-button"><?php echo $text; ?></a>
                <?php } ?>
            </div>
        </div>
        <?php
        break;

    default: // image_top
        ?>
        <div class="card service__media top">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'screenr-service-small' );
            }
            ?>
            <div class="card-ig-overlay card-block">
                <div class="service-card-content">
                    <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <div class="card-text"><?php the_excerpt(); ?></div>
                </div>
                <?php if ($item['readmore']) { ?>
                    <a href="<?php the_permalink(); ?>" class="service-button"><?php echo $text; ?></a>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
} // end switch case.
?>