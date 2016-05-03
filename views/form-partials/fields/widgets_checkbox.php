<?php defined('ABSPATH') or die;
/* @var PixFieldsFormField $field */
/* @var PixFieldsForm $form */
/* @var mixed $default */
/* @var string $name */
/* @var string $idname */
/* @var string $label */
/* @var string $desc */
/* @var string $rendering */

// [!!] the counter field needs to be able to work inside other fields; if
// the field is in another field it will have a null label

$checked = $form->autovalue($name, $default);

$sidebar_widgets = wp_get_sidebars_widgets();
$sidebar_widgets = Widget_Data::order_sidebar_widgets( $sidebar_widgets );

if ( ! empty( $sidebar_widgets ) ) { ?>
	<div class="post_types_checkbox">
		<?php if ( isset( $label ) && !empty( $label ) ) { ?>
			<h3 class="field_title"><?php echo $label; ?></h3>
		<?php } ?>
		<?php if ( isset( $description ) && !empty( $description ) ) { ?>
			<span class="field_description"><?php echo $description; ?></span>
		<?php } ?>

		<div class="sidebars">
			<?php
			foreach ( $sidebar_widgets as $sidebar_name => $widget_list ) :
				if ( empty( $widget_list ) )
					continue;

				$sidebar_info = Widget_Data::get_sidebar_info( $sidebar_name );
				if( !empty($sidebar_info) ): ?>
					<div class="sidebar">
						<h4><?php echo $sidebar_info['name']; ?></h4>

						<div class="widgets">
							<?php
							foreach ( $widget_list as $widget ) :

								$widget_type = trim( substr( $widget, 0, strrpos( $widget, '-' ) ) );
								$widget_type_index = trim( substr( $widget, strrpos( $widget, '-' ) + 1 ) );
								$widget_options = get_option( 'widget_' . $widget_type );
								$widget_title = isset( $widget_options[$widget_type_index]['title'] ) ? $widget_options[$widget_type_index]['title'] : $widget_type_index;

								$attrs = array(
									'name' => $name . '[' . $widget  . ']',
									'id'   => $idname . '[' . $widget . ']',
								);
								?>
								<div class="import-form-row">
									<input class="<?php echo ($sidebar_name == 'wp_inactive_widgets') ? 'inactive' : 'active'; ?> widget-checkbox" type="checkbox" <?php echo $field->htmlattributes( $attrs ); ?> <?php if ( isset( $checked[ $widget ] ) && $checked[ $widget ] == 'on' ) {
										echo 'checked="checked"';
									} ?> />
									<label for="<?php echo esc_attr( 'meta_' . $widget ); ?>">
										<?php
										echo ucfirst( $widget_type );
										if( !empty( $widget_title ) )
											echo ' - ' . $widget_title;
										?>
									</label>
								</div>
							<?php endforeach; ?>
						</div> <!-- end widgets -->
					</div> <!-- end sidebar -->
				<?php endif;
			endforeach; ?>
		</div> <!-- end sidebars -->

<?php
/**
		<ul>
			<?php
			foreach ( $sidebars_widgets as $sidebar_name => $widget_list ) {
				if ( empty( $widget_list ) ) {
					continue;
				}

				if ( ! empty( $widget_list ) ) { ?>
					<div class="sidebar">
						<h4><?php echo $sidebar_name; ?></h4>

						<div class="widgets">
							<?php
							foreach ( $widget_list as $count => $widget ) {

								$widget_type = trim( substr( $widget, 0, strrpos( $widget, '-' ) ) );
								$widget_type_index = trim( substr( $widget, strrpos( $widget, '-' ) + 1 ) );
								$widget_options = get_option( 'widget_' . $widget_type );
								$widget_title = isset( $widget_options[ $widget_type_index ]['title'] ) ? $widget_options[ $widget_type_index ]['title'] : $widget_type_index;


								$widget_type_index =  $widget_type . $widget_type_index;

								$attrs = array(
									'name' => $name . '[' . $widget . ']',
									'id'   => $idname . '[' . $widget . ']',
								); ?>
								<li>
									<input type="checkbox" <?php echo $field->htmlattributes( $attrs ); ?> <?php if ( isset( $checked[ $widget ] ) && $checked[ $widget ] == 'on' ) {
										echo 'checked="checked"';
									} ?>/>
									<?php echo $widget_title; ?>
								</li>



							<?php } ?>
						</div> <!-- end widgets -->
					</div> <!-- end sidebar -->
				<?php }
			} ?>
		</ul>
*/ ?>
	</div>
	<?php
}