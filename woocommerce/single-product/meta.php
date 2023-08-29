<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

	<div class="custom-shortdescription">
	<div class="feature-cls-title">Features</div>
	<?php if($product->post->post_excerpt){ ?>
<div class="woocommerce-product-details__short-description">
	<?php echo $product->post->post_excerpt; // WPCS: XSS ok. ?>
</div>
<?php } ?>
	<div class="inner-shortdesc">
		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<div class="sku">
				<span><?php esc_html_e( 'SKU / Item Number:', 'woocommerce' ); ?></span><span><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span>
			</div>
		<?php endif; ?>
			<?php 
			$factor = get_field('form_factor');
			if($factor):?>
			<div class="formfactor">
				<span>Form Factor</span><span><?php echo $factor; ?></span>
			</div>
			<?php endif; ?>
			<?php 
			$grade = get_field('grade');
			if($grade):?>
			<div class="grade">
				<span>Grade</span><span><?php echo $grade; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$interface = get_field('interface');
			if($interface):?>
			<div class="interface">
				<span>Interface</span><span><?php echo $interface; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$protocol = get_field('protocol');
			if($protocol):?>
			<div class="protocol">
				<span>Protocol</span><span><?php echo $protocol; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$nand_type = get_field('nand_type');
			if($nand_type):?>
			<div class="nand_type">
				<span>NAND Type</span><span><?php echo $nand_type; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$operating_temp = get_field('operating_temp');
			if($operating_temp):?>
			<div class="operating_temp">
				<span>Operating Temp </span><span><?php echo $operating_temp; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$endurancedwpd = get_field('endurance_tbw_or_dwpd');
			if($endurancedwpd):?>
			<div class="endurancedwpd">
				<span>Endurance (TBW or DWPD) </span><span><?php echo $endurancedwpd; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$speedsread = get_field('speed_sequential_read_mbs');
			if($speedsread):?>
			<div class="speedsequential">
				<span>Speed (Sequential Read, MB/s)</span><span><?php echo $speedsread; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$speedswrite = get_field('speed_sequential_write_mbs');
			if($speedswrite):?>
			<div class="speedswrite">
				<span>Speed (Sequential Write, MB/s)</span><span><?php echo $speedswrite; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$speed4k = get_field('speed_random_read_4k_iops');
			if($speed4k):?>
			<div class="speed4k">
				<span>Speed (Random Read, 4k IOPS)</span><span><?php echo $speed4k; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$speed4kwrite = get_field('speed_random_write_4k_iops');
			if($speed4kwrite):?>
			<div class="speed4kwrite">
				<span>Speed (Random Write, 4k IOPS)</span><span><?php echo $speed4kwrite; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$fipsencry = get_field('fips_197aes_256opal_encryption');
			if($fipsencry):?>
			<div class="fipsencry">
				<span>FIPS 197/AES 256/OPAL Encryption</span><span><?php echo $fipsencry; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$powerfailprote = get_field('power_fail_protection');
			if($powerfailprote):?>
			<div class="powerfailprote">
				<span>Power Fail Protection</span><span><?php echo $powerfailprote; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$hardwaresecurewrite = get_field('hardware_secure_erase_write_protect');
			if($hardwaresecurewrite):?>
			<div class="hardwaresecurewrite">
				<span>Hardware Secure Erase, Write Protect</span><span><?php echo $hardwaresecurewrite; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$militaryprotocol = get_field('military_protocol');
			if($militaryprotocol):?>
			<div class="military-protocol">
				<span>Military Protocol</span><span><?php echo $militaryprotocol; ?></span>
			</div>
			<?php endif; ?>

			
			<?php 
			$conformalcoated = get_field('conformal_coated');
			if($conformalcoated):?>
			<div class="conformalcoated">
				<span>Conformal Coated</span><span><?php echo $conformalcoated; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$fips140 = get_field('fips_140');
			if($fips140):?>
			<div class="fips140">
				<span>FIPS 140</span><span><?php echo $fips140; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$commoncritercsfc = get_field('common_criteriacsfc');
			if($commoncritercsfc):?>
			<div class="commoncritercsfc">
				<span>Common Criteria/CSfC</span><span><?php echo $commoncritercsfc; ?></span>
			</div>
			<?php endif; ?>
			
			<?php 
			$ddrfamily = get_field('ddr_family');
			if($ddrfamily):?>
			<div class="ddrfamily">
				<span>DDR Family</span><span><?php echo $ddrfamily; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$ecceccnon = get_field('ecc_eccnon-ecc');
			if($ecceccnon):?>
			<div class="ecceccnon">
				<span>ECC (ECC/non-ECC)</span><span><?php echo $ecceccnon; ?></span>
			</div>
			<?php endif; ?>
			
			<?php 
			$custwidth = get_field('width');
			if($custwidth):?>
			<div class="custwidth">
				<span>Width</span><span><?php echo $custwidth; ?></span>
			</div>
			<?php endif; ?>
			
			<?php 
			$module_height = get_field('module_height');
			if($module_height):?>
			<div class="moduleheight">
				<span>Module Height</span><span><?php echo $module_height; ?></span>
			</div>
			<?php endif; ?>

					
			<?php 
			$module_length = get_field('module_length');
			if($module_length):?>
			<div class="modulelength">
				<span>Module length</span><span><?php echo $module_length; ?></span>
			</div>
			<?php endif; ?>

					
			<?php 
			$rankxorg = get_field('rankxorg');
			if($rankxorg):?>
			<div class="rankxorg">
				<span>RankxOrg</span><span><?php echo $rankxorg; ?></span>
			</div>
			<?php endif; ?>

					
			<?php 
			$speed = get_field('speed');
			if($speed):?>
			<div class="speed">
				<span>Speed</span><span><?php echo $speed; ?></span>
			</div>
			<?php endif; ?>

		
			<?php 
			$comonent_composition = get_field('comonent_composition');
			if($comonent_composition):?>
			<div class="comonent-composition">
				<span>Comonent Composition</span><span><?php echo $comonent_composition; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$ddr_operating_temp = get_field('ddr_operating_temp');
			if($ddr_operating_temp):?>
			<div class="operating-temp">
				<span>Operating Temp</span><span><?php echo $ddr_operating_temp; ?></span>
			</div>
			<?php endif; ?>
			
			<?php 
			$pins = get_field('pins');
			if($pins):?>
			<div class="pins">
				<span>Pins</span><span><?php echo $pins; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$cl = get_field('cl');
			if($cl):?>
			<div class="cl">
				<span>CL</span><span><?php echo $cl; ?></span>
			</div>
			<?php endif; ?>
 
			<?php 
			$trcd = get_field('trcd');
			if($trcd):?>
			<div class="trcd">
				<span>tRCD</span><span><?php echo $trcd; ?></span>
			</div>
			<?php endif; ?>

			<?php 
			$trp = get_field('trp');
			if($trp):?>
			<div class="trp">
				<span>tRP</span><span><?php echo $trp; ?></span>
			</div>
			<?php endif; ?>



		</div>
	</div>

</div>
