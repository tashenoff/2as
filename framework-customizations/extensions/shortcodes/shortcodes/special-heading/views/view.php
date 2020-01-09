<?php if (!defined('FW')) die( 'Forbidden' );
/**
 * @var $atts
 */
?>
<div class="fw-heading pt-md-3 fw-heading-<?php echo esc_attr($atts['heading']); ?> <?php echo !empty($atts['centered']) ? 'fw-heading-center' : ''; ?>">
	<?php $heading = "<{$atts['heading']} class='bottom-border'>{$atts['title']}</{$atts['heading']}>"; ?>
	<?php echo $heading; ?>
	<?php if (!empty($atts['subtitle'])): ?>
		<div class="fw-special-subtitle pt-md-2"><?php echo $atts['subtitle']; ?></div>
	<?php endif; ?>
</div>
