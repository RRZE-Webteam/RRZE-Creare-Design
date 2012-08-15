<?php

add_action( 'admin_init', '_rrze_theme_options_init' );

function _rrze_theme_options_init() {
    
    /* General options */
    register_setting( 'general_options', '_rrze_theme_options', '_rrze_theme_options_validate' );

    add_settings_section( 'searchform_section', __('Allgemeine Einstellungen', '_rrze' ), '_rrze_section_searchform_callback', 'general_options' );

    add_settings_field( 'searchform', __('Suchformular', '_rrze' ), '_rrze_field_searchform_callback', 'general_options', 'searchform_section' );
    
    /* Header options */
    register_setting( 'layout_options', '_rrze_theme_options', '_rrze_theme_options_validate' );

    add_settings_section( 'layout_section', __('Layout-Einstellungen', '_rrze' ), '_rrze_section_layout_callback', 'layout_options' );

    add_settings_field( 'columnlayout', __('Spalten-Layout', '_rrze' ), '_rrze_field_columnlayout_callback', 'layout_options', 'layout_section' );
    
    /* Footer options */
    register_setting( 'footer_options', '_rrze_theme_options', '_rrze_theme_options_validate' );

    add_settings_section( 'footer_layout_section', __('Footer-Einstellungen', '_rrze' ), '_rrze_section_footer_layout_callback', 'footer_options' );

    add_settings_field( 'footer_layout', __('Spalten-Layout', '_rrze' ), '_rrze_field_footer_layout_callback', 'footer_options', 'footer_layout_section' );
    
    
}

add_filter( 'option_page_capability__rrze_options', '_rrze_option_page_capability' );

function _rrze_option_page_capability( $capability ) {
	return 'edit_theme_options';
}

add_action( 'admin_menu', '_rrze_theme_options_add_page' );

function _rrze_theme_options_add_page() {
	add_theme_page(
		__( 'Einstellungen', '_rrze' ),
		__( 'Einstellungen', '_rrze' ),
		'edit_theme_options',
		'theme_options',
		'_rrze_theme_options_menu_page'
	);
    
    add_submenu_page(
        'theme_options', 
        __( 'Allgemein', '_rrze' ), 
        __( 'Allgemein', '_rrze' ), 
        'edit_theme_options', 
        'general_options', 
        '_rrze_theme_options_menu_page'
    );

    add_submenu_page(
        'theme_options', 
        __( 'Layout', '_rrze' ), 
        __( 'Layout', '_rrze' ), 
        'edit_theme_options', 
        'layout_options', 
        '_rrze_theme_options_menu_page'
    );

    add_submenu_page(
        'theme_options', 
        __( 'Footer', '_rrze' ), 
        __( 'Footer', '_rrze' ), 
        'edit_theme_options', 
        'footer_options', 
        '_rrze_theme_options_menu_page'
    );
    
}

function _rrze_columnlayout_options() {
    $options = array(
        '1-2-3' => array(
                   'value' => '1-2-3',
                   'label' => __( '3 Spalten - linke und rechte Sidebar', '_rrze' )
        ),
        '1-3' => array(
                 'value' => '1-3',
                 'label' => __( '2 Spalten - linke Sidebar', '_rrze' )
        ),
        '2-3' => array(
                 'value' => '2-3',
                 'label' => __( '2 Spalten - rechte Sidebar', '_rrze' )
        )
    );

    return apply_filters( '_rrze_columnlayout_options', $options );
}

function _rrze_footer_layout_options() {
    $options = array(
        '100' => array( 'group' => 1, 'value' => '100', 'label' => '100%' ),
        '25-75' => array( 'group' => 2, 'value' => '25-75', 'label' => '25% | 75%' ),
        '33-66' => array( 'group' => 2, 'value' => '33-66', 'label' => '33% | 66%' ),
        '38-62' => array( 'group' => 2, 'value' => '38-62', 'label' => '38% | 62%' ),
        '40-60' => array( 'group' => 2, 'value' => '40-60', 'label' => '40% | 60%' ),
        '50-50' => array( 'group' => 2, 'value' => '50-50', 'label' => '50% | 50%' ),
        '60-40' => array( 'group' => 2, 'value' => '60-40', 'label' => '60% | 40%' ),
        '62-38' => array( 'group' => 2, 'value' => '62-38', 'label' => '62% | 38%' ),
        '66-33' => array( 'group' => 2, 'value' => '66-33', 'label' => '66% | 33%' ),
        '75-25' => array( 'group' => 2, 'value' => '75-25', 'label' => '75% | 25%' ),
        '25-25-50' => array( 'group' => 3, 'value' => '25-25-50', 'label' => '25% | 25% | 50%' ),
        '25-50-25' => array( 'group' => 3, 'value' => '25-50-25', 'label' => '25% | 50% | 25%' ),
        '50-25-25' => array( 'group' => 3, 'value' => '50-25-25', 'label' => '50% | 25% | 25%' ),
        '33-33-33' => array( 'group' => 3, 'value' => '33-33-33', 'label' => '33% | 33% | 33%' )
    );

    return apply_filters( '_rrze_footer_layout_options', $options );
}

function _rrze_searchform_options() {
    $options = array(
        'none' => array(
                    'value' => 'none',
                    'label' => __( 'keiner', '_rrze' )
        ),
        'top' => array(
                 'value' => 'top',
                 'label' => __( 'oben', '_rrze' )
        ),        
        'bereichsmenu' => array(
                    'value' => 'bereichsmenu',
                    'label' => __( 'Bereichsmenü', '_rrze' )
        )          
    );

    return apply_filters( '_rrze_searchform_options', $options );
}

function _rrze_theme_options( $key = '' ) {
	$defaults = array(
		'columnlayout'  => '1-2-3',
        'footer_layout'  => '33-33-33',
		'searchform_position' => 'bereichsmenu',
	);

	$defaults = apply_filters( '_rrze_default_theme_options', $defaults );

	$options = (array) get_option( _RRZE_OPTION_NAME );    
	$options = wp_parse_args( $options, $defaults );

    if( !empty( $key ) )
        return isset($options[$key]) ? $options[$key] : NULL;
    
    return $options;
}

function _rrze_field_columnlayout_callback() {
	$options = _rrze_theme_options();

	foreach ( _rrze_columnlayout_options() as $button ):
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="_rrze_theme_options[columnlayout]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['columnlayout'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	endforeach;
}

function _rrze_field_footer_layout_callback() {
	$options = _rrze_theme_options();
	?>
	<select name="_rrze_theme_options[footer_layout]" id="footer-layout">
		<?php
			$selected = $options['footer_layout'];
			$html = '';
            
            foreach( _rrze_footer_layout_options() as $option ) {
                $groups[] = $option['group'];
            }
            
            $groups = array_unique($groups);
            foreach($groups as $group) {
                $html .= '<optgroup label="'. esc_attr($group). ' ' .esc_attr( _n( 'Spalte', 'Spalten', $group, '_rrze' ) ) . '" rel="' . esc_attr($group) . '">';
                foreach ( _rrze_footer_layout_options() as $option ) {
                    if($option['group'] == $group) {
                        $html .= '<option value="'.esc_attr($option['value']).'"'.($selected == $option['value'] ? ' selected="selected"' : '').'>'.esc_attr($option['label']).'</option>';
                    }
                }
                $html .= '</optgroup>';
            }
            echo $html;
		?>
	</select>
	<?php

}

function _rrze_field_searchform_callback() {
	$options = _rrze_theme_options();
	?>
	<select name="_rrze_theme_options[searchform_position]" id="searchform-position">
		<?php
			$selected = $options['searchform_position'];
			$html = '';

			foreach ( _rrze_searchform_options() as $option ) {
				$html .= '<option value="'.esc_attr($option['value']).'"'.($selected == $option['value'] ? ' selected="selected"' : '').'>'.esc_attr($option['label']).'</option>';
			}
			echo $html;
		?>
	</select>
	<?php
}

function _rrze_section_layout_callback() {
    printf( '<p>%s</p>', __( 'Wählen Sie, welche Optionen aktivieren möchten.', '_rrze' ) );
}

function _rrze_section_footer_layout_callback() {
    printf( '<p>%s</p>', __( 'Wählen Sie, welche Optionen aktivieren möchten.', '_rrze' ) );
}

function _rrze_section_searchform_callback() {
    printf('<p>%s</p>', __( 'Wählen Sie, welche Optionen aktivieren möchten.', '_rrze' ));
}

function _rrze_theme_options_menu_page($tab = '') {
    ?>
    <div class="wrap">

        <?php screen_icon(); ?>
        <h2><?php _e( 'Einstellungen', '_rrze' );?></h2>
        <?php settings_errors(); ?>

        <?php
        if (isset($_GET['tab']))
            $tab = $_GET['tab'];
            
        if ($tab == 'layout_options') {
            $tab = 'layout_options';
            
        } else if ($tab == 'footer_options') {
            $tab = 'footer_options';
            
        } else {
            $tab = 'general_options';
        }
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=theme_options&tab=general_options" class="nav-tab <?php echo $tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Allgemein', '_rrze' ); ?></a>
            <a href="?page=theme_options&tab=layout_options" class="nav-tab <?php echo $tab == 'layout_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Layout', '_rrze' ); ?></a>
            <a href="?page=theme_options&tab=footer_options" class="nav-tab <?php echo $tab == 'footer_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Footer', '_rrze' ); ?></a>
        </h2>

        <form method="post" action="options.php">
            <?php
            if ($tab == 'general_options') {
                settings_fields('general_options');
                do_settings_sections('general_options');
                
            } elseif ($tab == 'layout_options') {
                settings_fields('layout_options');
                do_settings_sections('layout_options');
                
            } else {
                settings_fields('footer_options');
                do_settings_sections('footer_options');
            }

            submit_button();
            ?>
        </form>

    </div>
    <?php
}

function _rrze_theme_options_validate( $input ) {
    $options = _rrze_theme_options();

	if ( isset( $input['columnlayout'] ) && array_key_exists( $input['columnlayout'], _rrze_columnlayout_options() ) )
		$options['columnlayout'] = $input['columnlayout'];

	if ( isset( $input['footer_layout'] ) && array_key_exists( $input['footer_layout'], _rrze_footer_layout_options() ) )
		$options['footer_layout'] = $input['footer_layout'];
    
	if ( isset( $input['searchform_position'] ) && array_key_exists( $input['searchform_position'], _rrze_searchform_options() ) )
		$options['searchform_position'] = $input['searchform_position'];
    
	return apply_filters( '_rrze_theme_options_validate', $options, $input );
}

function _rrze_theme_customizer( $wp_customize ) {
    $options = _rrze_theme_options();
    
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    
	$wp_customize->add_section( '_rrze_theme_layout', array(
		'title'    => __( 'Layout', '_rrze' ),
		'priority' => 50,
	) );

	$wp_customize->add_setting( '_rrze_theme_options[columnlayout]', array(
		'type'              => 'option',
		'default'           => $options['columnlayout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$choices = array();
	foreach ( _rrze_columnlayout_options() as $option ) {
		$choices[$option['value']] = $option['label'];
	}

	$wp_customize->add_control( '_rrze_theme_options[columnlayout]', array(
        'label'      => __( 'Spalten-Layout', '_rrze' ),        
		'section'    => '_rrze_theme_layout',
		'type'       => 'radio',
		'choices'    => $choices,
	) );

}
add_action( 'customize_register', '_rrze_theme_customizer' );

function _rrze_theme_customizer_js() {
    wp_enqueue_script( 'theme-customizer', sprintf('%s/js/theme-customizer.js', get_template_directory_uri() ), array( 'customize-preview' ), false, true );
}
add_action( 'customize_preview_init', '_rrze_theme_customizer_js' );