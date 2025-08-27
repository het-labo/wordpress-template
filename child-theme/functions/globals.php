<?php
add_action('admin_menu', function () {
    add_options_page(
        'Global Options',        // Page title
        'Global Options',        // Menu title
        'manage_options',        // Capability
        'theme-options',         // Menu slug
        'my_theme_options_page'  // Callback
    );
});

add_action('admin_init', function () {
    register_setting('my_theme_options_group', 'google_maps_api');
    register_setting('my_theme_options_group', 'activate_topbar');
    register_setting('my_theme_options_group', 'activate_trans_header');
    register_setting('my_theme_options_group', 'company_email');
    register_setting('my_theme_options_group', 'company_phone');
    register_setting('my_theme_options_group', 'company_address_street');
    register_setting('my_theme_options_group', 'company_address_street_nr');
    register_setting('my_theme_options_group', 'company_address_postal');
    register_setting('my_theme_options_group', 'company_address_place');
});

function my_theme_options_page() { ?>
    <div class="wrap">
        <h1>Global Options</h1>
        <form method="post" action="options.php">
            <?php
            // Output nonce, action, and option_page fields
            settings_fields('my_theme_options_group');
            // Removed do_settings_sections() — not needed unless you add sections
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="google_maps_api">Google Maps API Key</label></th>
                    <td>
                        <input type="text" id="google_maps_api" name="google_maps_api"
                               value="<?php echo esc_attr(get_option('google_maps_api', '')); ?>"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="company_email">Bedrijf email</label></th>
                    <td>
                        <input type="text" id="company_email" name="company_email"
                               value="<?php echo esc_attr(get_option('company_email', '')); ?>"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="company_phone">Bedrijf telefoon</label></th>
                    <td>
                        <input type="text" id="company_phone" name="company_phone"
                               value="<?php echo esc_attr(get_option('company_phone', '')); ?>"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="company_address_street">Bedrijf adres: straat</label></th>
                    <td>
                        <input type="text" id="company_address_street" name="company_address_street"
                               value="<?php echo esc_attr(get_option('company_address_street', '')); ?>"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="company_address_street_nr">Bedrijf adres: nummer</label></th>
                    <td>
                        <input type="text" id="company_address_street_nr" name="company_address_street_nr"
                               value="<?php echo esc_attr(get_option('company_address_street_nr', '')); ?>"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="company_address_postal">Bedrijf adres: postcode</label></th>
                    <td>
                        <input type="text" id="company_address_postal" name="company_address_postal"
                               value="<?php echo esc_attr(get_option('company_address_postal', '')); ?>"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="company_address_place">Bedrijf adres: plaats</label></th>
                    <td>
                        <input type="text" id="company_address_place" name="company_address_place"
                               value="<?php echo esc_attr(get_option('company_address_place', '')); ?>"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Activate Topbar</th>
                    <td>
                        <input type="checkbox" id="activate_topbar" name="activate_topbar" value="1"
                            <?php checked(get_option('activate_topbar', false)); ?>>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Activate Transparent Header</th>
                    <td>
                        <input type="checkbox" id="activate_trans_header" name="activate_trans_header" value="1"
                            <?php checked(get_option('activate_trans_header', false)); ?>>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php }

$GLOBALS['GOOGLE_MAPS_API']       	= get_option('google_maps_api', '');
$GLOBALS['COMPANY_EMAIL']       	= get_option('company_email', '');
$GLOBALS['COMPANY_PHONE']           = get_option('company_phone', '');
$GLOBALS['COMPANY_ADDRESS_STREET']  = get_option('company_address_street', '');
$GLOBALS['COMPANY_ADDRESS_STREET_NR'] = get_option('company_address_street_nr', '');
$GLOBALS['COMPANY_ADDRESS_POSTAL']  = get_option('company_address_postal', '');
$GLOBALS['COMPANY_ADDRESS_PLACE']  = get_option('company_address_place', '');
$GLOBALS['ACTIVATE_TOPBAR']       	= (bool) get_option('activate_topbar', false);
$GLOBALS['ACTIVATE_TRANS_HEADER'] 	= (bool) get_option('activate_trans_header', false);
