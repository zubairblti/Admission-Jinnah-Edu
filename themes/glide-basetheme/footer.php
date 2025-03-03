<?php

/**
 * The template for displaying website footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */
// Global variables
global $option_fields;
global $pID;
global $fields;

$pID = get_the_ID();

if (is_home()) {
	$pID = get_option('page_for_posts');
}

if (is_404() || is_archive() || is_category() || is_search()) {
	$pID = get_option('page_on_front');
}

if (function_exists('get_fields') && function_exists('get_fields_escaped')) {
	$option_fields = get_fields_escaped('option');
	$fields        = get_fields_escaped($pID);
}
?> <?php

	// Default Footer Options

	$footer_scripts = (isset($option_fields['footer_scripts'])) ? $option_fields['footer_scripts'] : null;



	// Schema Markup - ACF variables.

    
	$footer_logo     = (isset($option_fields['footer_logo'])) ? $option_fields['footer_logo'] : null;
	$footer_address       = (isset($option_fields['footer_address'])) ? $option_fields['footer_address'] : null;
	$footer_email       = (isset($option_fields['footer_email'])) ? $option_fields['footer_email'] : null;
	$footer_contact_phone       = (isset($option_fields['footer_contact_phone'])) ? $option_fields['footer_contact_phone'] : null;
	$footer_contact_mobile       = (isset($option_fields['footer_contact_mobile'])) ? $option_fields['footer_contact_mobile'] : null;
	$footer_contact_whatsapp       = (isset($option_fields['footer_contact_whatsapp'])) ? $option_fields['footer_contact_whatsapp'] : null;
	$footer_web       = (isset($option_fields['footer_web'])) ? $option_fields['footer_web'] : null;
	?>
<?php get_template_part('partials/cta'); ?> </main>


<footer class="footer">
            <div class="container">
                <div class="footer-inner">
                    <div class="col-left">
                        <div class="footer-logo">
                            <img src="<?php echo $footer_logo ;?>" alt="">
                        </div>
                        <div class="btn-holder"><a href="https://www.jinnah.edu/contact/">contact us</a></div>
                    </div>
                    <div class="col-right">
                        <ul>
                            <li><i class="fas fa-map-marker-alt" aria-hidden="true"></i><?php echo $footer_address ;?></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i> <a
                                    href="tel:<?php echo $footer_contact_phone ;?>"><?php echo $footer_contact_phone ;?></a></li>
                            <li><i class="fas fa-mobile-alt" aria-hidden="true"></i> <a
                                    href="tel:<?php echo $footer_contact_mobile ;?>"><?php echo $footer_contact_mobile ;?></a></li>
                            <li><i class="fab fa-whatsapp" aria-hidden="true"></i><a
                                    href="https://wa.me/+923410003339"><?php echo $footer_contact_whatsapp ;?></a></li>
                            <li><i class="fas fa-envelope" aria-hidden="true"></i> <a
                                    href="<?php echo $footer_email ;?>"><?php echo $footer_email ;?></a></li>
                            <li><i class="fas fa-globe" aria-hidden="true"></i> <a
                                    href="https://www.jinnah.edu/"><?php echo $footer_web ;?></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </footer>

</div>

<?php wp_footer(); ?> <?php
						if ($footer_scripts != '') {
						?>
	<div style="display: none;">
		<?php echo html_entity_decode($footer_scripts, ENT_QUOTES); ?> </div> <?php } ?> </body>

</html>
