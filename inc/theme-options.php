<?php

function _rrze_theme_options_init() {
    register_setting(
        'general_options', '_rrze_theme_options', '_rrze_theme_options_validate'
    );

    add_settings_section(
            'columnset_section', __('Columnset Options', '_rrze' ), '_rrze_section_columnset_callback', 'general_options'
    );

    add_settings_field(
            'columnset', __('Columnset', '_rrze' ), '_rrze_field_columnset_callback', 'general_options', 'columnset_section'
    );

    add_settings_section(
            'searchform_section', __('Search Form Options', '_rrze' ), '_rrze_section_searchform_callback', 'general_options'
    );

    add_settings_field(
            'searchform', __('Search Form', '_rrze' ), '_rrze_field_searchform_callback', 'general_options', 'searchform_section'
    );
}
add_action( 'admin_init', '_rrze_theme_options_init' );

function _rrze_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability__rrze_options', '_rrze_option_page_capability' );

function _rrze_theme_options_add_page() {
	add_theme_page(
		__( 'Theme Options', '_rrze' ),
		__( 'Theme Options', '_rrze' ),
		'edit_theme_options',
		'theme_options',
		'_rrze_theme_options_menu_page'
	);
    
    add_submenu_page(
        'theme_options', 
        __( 'General', '_rrze' ), 
        __( 'General', '_rrze' ), 
        'edit_theme_options', 
        'general_options', 
        '_rrze_theme_options_menu_page'
    );

    add_submenu_page(
        'theme_options', 
        __( 'Options 2', '_rrze' ), 
        __( 'Options 2', '_rrze' ), 
        'edit_theme_options', 
        'theme_options_2', 
        create_function(null, 'theme_menu_callback( "theme_options_2" );')
    );

    add_submenu_page(
        'theme_options', 
        __( 'Options 3', '_rrze' ), 
        __( 'Options 3', '_rrze' ), 
        'edit_theme_options', 
        'theme_options_3', 
        create_function(null, 'theme_menu_callback( "theme_options_3" );')
    );
    
}
add_action( 'admin_menu', '_rrze_theme_options_add_page' );

function _rrze_columnset_option() {
    $radio_buttons = array(
        '1-2-3' => array(
                   'value' => '1-2-3',
                   'label' => __('3 Columns (1-2-3)', '_rrze' )
        ),
        '1-2' => array(
                 'value' => '1-2',
                 'label' => __('2 Columns (1-2)', '_rrze' )
        ),
        '2-3' => array(
                 'value' => '2-3',
                 'label' => __('2 Columns (2-3)', '_rrze' )
        )
    );

    return apply_filters( '_rrze_columnset_option', $radio_buttons );
}

function _rrze_searchform_option() {
    $radio_buttons = array(
        'bottom' => array(
                    'value' => 'bottom',
                    'label' => __( 'Bottom', '_rrze' )
        ),            
        'top' => array(
                 'value' => 'top',
                 'label' => __( 'Top', '_rrze' )
        )
    );

    return apply_filters( '_rrze_searchform_option', $radio_buttons );
}

function _rrze_get_theme_options($key = '') {
	$saved = (array) get_option( '_rrze_theme_options' );
	$defaults = array(
		'columnset'  => '1-2-3',
		'searchform_position' => 'bottom',
	);

	$defaults = apply_filters( '_rrze_default_theme_options', $defaults );

	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );

    if( $key )
        return $options[$key];
    
    return $options;
}

function _rrze_field_columnset_callback() {
	$options = _rrze_get_theme_options();

	foreach ( _rrze_columnset_option() as $button ):
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="_rrze_theme_options[columnset]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['columnset'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	endforeach;
}

function _rrze_field_searchform_callback() {
	$options = _rrze_get_theme_options();

	foreach ( _rrze_searchform_option() as $button ):
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="_rrze_theme_options[searchform_position]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['searchform_position'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	endforeach;
}

function _rrze_section_columnset_callback() {
    printf( '<p>%s</p>', __( 'Choose what columnset do you want.', '_rrze' ) );
}

function _rrze_section_searchform_callback() {
    printf('<p>%s</p>', __('Choose the position for the search form.', '_rrze' ));
}

function _rrze_theme_options_menu_page($tab = '') {
    ?>
    <div class="wrap">

        <div id="icon-themes" class="icon32"></div>
        <h2><?php _e('Options', '_rrze' ); ?></h2>
        <?php settings_errors(); ?>

        <?php
        if (isset($_GET['tab'])) {
            $tab = $_GET['tab'];
        } else if ($tab == 'theme_options_2') {
            $tab = 'theme_options_2';
        } else if ($tab == 'theme_options_3') {
            $tab = 'theme_options_3';
        } else {
            $tab = 'general_options';
        }
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=theme_options&tab=general_options" class="nav-tab <?php echo $tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php _e('General', '_rrze' ); ?></a>
            <a href="?page=theme_options&tab=theme_options_2" class="nav-tab <?php echo $tab == 'theme_options_2' ? 'nav-tab-active' : ''; ?>"><?php _e('Options 2', '_rrze' ); ?></a>
            <a href="?page=theme_options&tab=theme_options_3" class="nav-tab <?php echo $tab == 'theme_options_3' ? 'nav-tab-active' : ''; ?>"><?php _e('Options 3', '_rrze' ); ?></a>
        </h2>

        <form method="post" action="options.php">
            <?php
            if ($tab == 'general_options') {

                settings_fields('general_options');
                do_settings_sections('general_options');
            } elseif ($tab == 'theme_options_2') {

                //settings_fields('theme_options_2');
                //do_settings_sections('theme_options_2');
            } else {

                //settings_fields('theme_options_3');
                //do_settings_sections('theme_options_3');
            }

            submit_button();
            ?>
        </form>

    </div>
    <?php
}

function _rrze_theme_options_validate( $input ) {
	$output = array();

	if ( isset( $input['columnset'] ) && array_key_exists( $input['columnset'], _rrze_columnset_option() ) )
		$output['columnset'] = $input['columnset'];

	if ( isset( $input['searchform_position'] ) && array_key_exists( $input['searchform_position'], _rrze_searchform_option() ) )
		$output['searchform_position'] = $input['searchform_position'];
    
	return apply_filters( '_rrze_theme_options_validate', $output, $input );
}
