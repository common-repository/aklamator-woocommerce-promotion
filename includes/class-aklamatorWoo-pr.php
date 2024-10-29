<?php


function add_my_rss_node_productphoto() {
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $img_url = site_url() . '/wp-content/uploads/' . get_post_meta(get_post_meta($post->ID, '_thumbnail_id', true), '_wp_attached_file', true);

        echo("<productphoto>{$img_url}</productphoto>\");");
    }
}


function add_price_discount() {
    $symbolsWooPR =  array(
        'AED' => 'د.إ',
        'AFN' => '؋',
        'ALL' => 'L',
        'AMD' => 'AMD',
        'ANG' => 'ƒ',
        'AOA' => 'Kz',
        'ARS' => '$',
        'AUD' => '$',
        'AWG' => 'ƒ',
        'AZN' => 'AZN',
        'BAM' => 'KM',
        'BBD' => '$',
        'BDT' => '৳ ',
        'BGN' => 'лв.',
        'BHD' => '.د.ب',
        'BIF' => 'Fr',
        'BMD' => '$',
        'BND' => '$',
        'BOB' => 'Bs.',
        'BRL' => 'R$',
        'BSD' => '$',
        'BTC' => '฿',
        'BTN' => 'Nu.',
        'BWP' => 'P',
        'BYR' => 'Br',
        'BZD' => '$',
        'CAD' => '$',
        'CDF' => 'Fr',
        'CHF' => 'CHF',
        'CLP' => '$',
        'CNY' => '¥',
        'COP' => '$',
        'CRC' => '₡',
        'CUC' => '$',
        'CUP' => '$',
        'CVE' => '$',
        'CZK' => 'Kč',
        'DJF' => 'Fr',
        'DKK' => 'DKK',
        'DOP' => 'RD$',
        'DZD' => 'د.ج',
        'EGP' => 'EGP',
        'ERN' => 'Nfk',
        'ETB' => 'Br',
        'EUR' => '€',
        'FJD' => '$',
        'FKP' => '£',
        'GBP' => '£',
        'GEL' => 'ლ',
        'GGP' => '£',
        'GHS' => '₵',
        'GIP' => '£',
        'GMD' => 'D',
        'GNF' => 'Fr',
        'GTQ' => 'Q',
        'GYD' => '$',
        'HKD' => '$',
        'HNL' => 'L',
        'HRK' => 'Kn',
        'HTG' => 'G',
        'HUF' => 'Ft',
        'IDR' => 'Rp',
        'ILS' => '₪',
        'IMP' => '£',
        'INR' => '₹',
        'IQD' => 'ع.د',
        'IRR' => '﷼',
        'IRT' => 'تومان',
        'ISK' => 'kr.',
        'JEP' => '£',
        'JMD' => '$',
        'JOD' => 'د.ا',
        'JPY' => '¥',
        'KES' => 'KSh',
        'KGS' => 'сом',
        'KHR' => '៛',
        'KMF' => 'Fr',
        'KPW' => '₩',
        'KRW' => '₩',
        'KWD' => 'د.ك',
        'KYD' => '$',
        'KZT' => 'KZT',
        'LAK' => '₭',
        'LBP' => 'ل.ل',
        'LKR' => 'රු',
        'LRD' => '$',
        'LSL' => 'L',
        'LYD' => 'ل.د',
        'MAD' => 'د.م.',
        'MDL' => 'MDL',
        'MGA' => 'Ar',
        'MKD' => 'ден',
        'MMK' => 'Ks',
        'MNT' => '₮',
        'MOP' => 'P',
        'MRO' => 'UM',
        'MUR' => '₨',
        'MVR' => '.ރ',
        'MWK' => 'MK',
        'MXN' => '$',
        'MYR' => 'RM',
        'MZN' => 'MT',
        'NAD' => '$',
        'NGN' => '₦',
        'NIO' => 'C$',
        'NOK' => 'kr',
        'NPR' => '₨',
        'NZD' => '$',
        'OMR' => 'ر.ع.',
        'PAB' => 'B/.',
        'PEN' => 'S/.',
        'PGK' => 'K',
        'PHP' => '₱',
        'PKR' => '₨',
        'PLN' => 'zł',
        'PRB' => 'р.',
        'PYG' => '₲',
        'QAR' => 'ر.ق',
        'RMB' => '¥',
        'RON' => 'lei',
        'RSD' => 'дин.',
        'RUB' => '₽',
        'RWF' => 'Fr',
        'SAR' => 'ر.س',
        'SBD' => '$',
        'SCR' => '₨',
        'SDG' => 'ج.س.',
        'SEK' => 'kr',
        'SGD' => '$',
        'SHP' => '£',
        'SLL' => 'Le',
        'SOS' => 'Sh',
        'SRD' => '$',
        'SSP' => '£',
        'STD' => 'Db',
        'SYP' => 'ل.س',
        'SZL' => 'L',
        'THB' => '฿',
        'TJS' => 'ЅМ',
        'TMT' => 'm',
        'TND' => 'د.ت',
        'TOP' => 'T$',
        'TRY' => '₺',
        'TTD' => '$',
        'TWD' => 'NT$',
        'TZS' => 'Sh',
        'UAH' => '₴',
        'UGX' => 'UGX',
        'USD' => '$',
        'UYU' => '$',
        'UZS' => 'UZS',
        'VEF' => 'Bs F',
        'VND' => '₫',
        'VUV' => 'Vt',
        'WST' => 'T',
        'XAF' => 'Fr',
        'XCD' => '$',
        'XOF' => 'Fr',
        'XPF' => 'Fr',
        'YER' => '﷼',
        'ZAR' => 'R',
        'ZMW' => 'ZK',
    );
    global $post;
    $price = get_post_meta($post->ID, '_regular_price', true);
    $discount = get_post_meta($post->ID, '_sale_price', true);
    $currency =  $symbolsWooPR[get_woocommerce_currency()];

    if(!empty($price)) {
        echo("<price>" . $currency . $price . "</price>");
    }
    if (!empty($discount))
    {
        echo("<discount>". $currency . $discount . "</discount>");
    }


}

function add_review_score() {
    global $post;
    $score = get_post_meta($post->ID, '_wc_average_rating', true);
    if (!empty($score) && $score != 0) {
        echo("<score>{$score}</score>");
    }
}



class aklamatorWooPrWidget
{



    private static $instance = null;

    /**
     * Get singleton instance
     */
    public static function init()
    {

        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public $aklamator_url;
    public $api_data;
    protected $application_id;
    public $aklaWooCommerce_exist;

    public function __construct()
    {


        $this->aklamator_url = "https://aklamator.com/";
//        $this->aklamator_url = "http://192.168.5.60/aklamator/www/";
        $this->application_id = get_option('aklamatorWooApplicationID');

        $this->hooks();

    }

    private function hooks(){

        add_filter( 'plugin_row_meta', array($this, 'aklamatorWoo_plugin_meta_links'), 10, 2);
        add_filter( "plugin_action_links_".AKLAWOO_PR_PLUGIN_NAME, array($this, 'aklamatorWoo_plugin_settings_link') );

        $this->aklaWooCommerce_exist = false;

        /**
         * Check if WooCommerce is active
         **/
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            if ($this->application_id != "")
                add_filter('the_content', array($this, 'bottom_of_woo_every_post'));

            /*
            * Adds featured images from posts to your site's RSS feed output,
            */
            if (get_option('aklamatorWooReviewScore')) {
                add_action('atom_entry', 'add_review_score', 1000, 1);
            }
            add_action('atom_entry', 'add_my_rss_node_productphoto', 1000, 1);
            add_action('atom_entry', 'add_price_discount', 1000, 1);

            $this->aklaWooCommerce_exist = true;
        }

        add_action( 'admin_menu', array($this,"adminMenu") );
        add_action( 'admin_init', array($this,"setOptions") );
        add_action( 'admin_enqueue_scripts', array($this, 'load_custom_woo_admin_style_script') );
        add_action( 'after_setup_theme', array($this,'vw_setup_vw_widgets_init_aklamatorWoo') );
    }

    function setOptions()
    {

        register_setting('aklamatorWoo-options', 'aklamatorWooApplicationID');
        register_setting('aklamatorWoo-options', 'aklamatorWooPoweredBy');
        register_setting('aklamatorWoo-options', 'aklamatorWooSingleWidgetID');
        register_setting('aklamatorWoo-options', 'aklamatorWooPageWidgetID');
        register_setting('aklamatorWoo-options', 'aklamatorWooSingleWidgetTitle');
        register_setting('aklamatorWoo-options', 'aklamatorWooReviewScore');
        register_setting('aklamatorWoo-options', 'aklamatorWooCategory');

    }


    function aklamatorWoo_plugin_settings_link($links) {
        $settings_link = '<a href="admin.php?page=aklamator-woocommerce-promotion">Settings</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    /*
     * Activation Hook
     */
    function set_up_options() {
        add_option('aklamatorWooApplicationID', '');
        add_option('aklamatorWooPoweredBy', '');
        add_option('aklamatorWooSingleWidgetID', '');
        add_option('aklamatorWooPageWidgetID', '');
        add_option('aklamatorWooSingleWidgetTitle', '');
        add_option('aklamatorWooReviewScore', 'on');
        add_option('aklamatorWooWidgets', '');
        add_option('aklamatorWooCategory');
    }

    /*
     * Uninstall Hook
     */
    function aklamator_uninstall() {
        delete_option('aklamatorWooApplicationID');
        delete_option('aklamatorWooPoweredBy');
        delete_option('aklamatorWooSingleWidgetID');
        delete_option('aklamatorWooPageWidgetID');
        delete_option('aklamatorWooSingleWidgetTitle');
        delete_option('aklamatorWooReviewScore');
        delete_option('aklamatorWooWidgets');
        delete_option('aklamatorWooCategory');
    }

    /*
     * Add rate and review link in plugin section
     */
    function aklamatorWoo_plugin_meta_links($links, $file)
    {
        $plugin = AKLAWOO_PR_PLUGIN_NAME;
        // create link
        if ($file == $plugin) {
            return array_merge(
                $links,
                array('<a href="https://wordpress.org/support/plugin/aklamator-digital-pr/reviews" target=_blank>Please rate and review</a>')
            );
        }
        return $links;
    }

    public function adminMenu()
    {
        add_menu_page('Aklamator WooPR', 'Aklamator WooPR', 'manage_options', 'aklamator-woocommerce-promotion', array($this, 'createAdminPage'), AKLAWOO_PR_PLUGIN_URL . 'images/aklamator-icon.png');
    }


    public function getSignupUrl()
    {
        $user_info =  wp_get_current_user();

        return $this->aklamator_url . 'login/application_id?utm_source=wordpress&utm_medium=wpwoo&e=' . urlencode(get_option('admin_email')) .
        '&pub=' .  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']).
        '&un=' . urlencode($user_info->user_login). '&fn=' . urlencode($user_info->user_firstname) . '&ln=' . urlencode($user_info->user_lastname) .
        '&pl=woocommerce&return_uri=' . admin_url("admin.php?page=aklamator-woocommerce-promotion");

    }

    function load_custom_woo_admin_style_script($hook) {

        if ( 'toplevel_page_aklamator-woocommerce-promotion' != $hook ) {
            return;
        }

        /*
         * We are calling api only when we at this plugin page, not for all other pages
         */

        if ($this->aklaWooCommerce_exist) {
            if ($this->application_id !== '') {
                $this->api_data = $this->addNewWooWebsiteApi();

                $this->populate_with_default();

                if ($this->api_data->flag) {
                    update_option('aklamatorWooWidgets', $this->api_data);
                }
            }
        }

        // Load necessary css files
        wp_enqueue_style('custom-wp-admin', AKLAWOO_PR_PLUGIN_URL . 'assets/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style('dataTables-plugin', AKLAWOO_PR_PLUGIN_URL . 'assets/dataTables/jquery.dataTables.min.css', false, '1.10.5', false );

        // Load script files
        wp_enqueue_script('dataTables_plugin', AKLAWOO_PR_PLUGIN_URL . 'assets/dataTables/jquery.dataTables.min.js', array('jquery'), '1.10.5', true );
        wp_register_script('my_custom_akla_script', AKLAWOO_PR_PLUGIN_URL . 'assets/js/main.js', array('jquery'), '1.0', true);

        $data = array(
            'site_url' => $this->aklamator_url
        );
        wp_localize_script('my_custom_akla_script', 'akla_vars', $data);
        wp_enqueue_script('my_custom_akla_script');

    }

    private function populate_with_default(){

        if(isset($this->api_data->data) && $this->api_data->flag){

            if (get_option('aklamatorWooSingleWidgetID') !== 'none') {

                if (get_option('aklamatorWooSingleWidgetID') == '') {
                    if ($this->api_data->data[0]) {
                        update_option('aklamatorWooSingleWidgetID', $this->api_data->data[0]->uniq_name);
                    }
                }
            }

            if (get_option('aklamatorWooPageWidgetID') !== 'none') {

                if (get_option('aklamatorWooPageWidgetID') == '') {
                    if ($this->api_data->data[0]) {
                        update_option('aklamatorWooPageWidgetID', $this->api_data->data[0]->uniq_name);
                    }
                }
            }
        }
    }

    function bottom_of_woo_every_post($content){

        /*  we want to change `the_content` of posts, not pages
            and the text file must exist for this to work */

        if (is_single()){
            $widget_id = get_option('aklamatorWooSingleWidgetID');
        }elseif (is_page()) {
            $widget_id = get_option('aklamatorWooPageWidgetID');
        }else{

            /*  if `the_content` belongs to a page or our file is missing
                the result of this filter is no change to `the_content` */

            return $content;
        }

        $return_content = $content;

        if(strlen($widget_id) >=7){
            $title = "";
            if(get_option('aklamatorWooSingleWidgetTitle') !== ''){
                $title .= "<h2>". get_option('aklamatorWooSingleWidgetTitle'). "</h2>";
            }
            /*  append the text file contents to the end of `the_content` */

            $return_content.=  $title. $this->show_woo_widget($widget_id);
        }

        return $return_content;
    }

    public function show_woo_widget($widget_id){

        $code  = '<!-- Start aklamatorWoo Widget -->';
        $code .= '<div id="akla'.$widget_id.'"></div>';
        $code .= '<script>(function(d, s, id) ';
        $code .= '{ var js, fjs = d.getElementsByTagName(s)[0];';
        $code .= 'if (d.getElementById(id)) return;';
        $code .= 'js = d.createElement(s); js.id = id;';
        $code .= 'js.src = "'.$this->aklamator_url.'widget/'.$widget_id.'";';
        $code .= 'fjs.parentNode.insertBefore(js, fjs);';
        $code .= '}(document, \'script\', \'aklamatorWoo-'.$widget_id.'\'))</script>';
        $code .= '<!-- end -->';
        return $code;

    }

    public function show_woo_widgetw($widget_id){

        $code  = '<!-- Start aklamatorWoo Widget -->';
        $code .= '<div id="akla'.$widget_id.'"></div>';
        $code .= '<script>(function(d, s, id) ';
        $code .= '{ var js, fjs = d.getElementsByTagName(s)[0];';
        $code .= 'if (d.getElementById(id)) return;';
        $code .= 'js = d.createElement(s); js.id = id;';
        $code .= 'js.src = "'.$this->aklamator_url.'widget/'.$widget_id.'";';
        $code .= 'fjs.parentNode.insertBefore(js, fjs);';
        $code .= '}(document, \'script\', \'aklamatorWoos-'.$widget_id.'\'))</script>';
        $code .= '<!-- end -->';
        return $code;

    }

    private function addNewWooWebsiteApi()
    {

        if (!is_callable('curl_init')) {
            return;
        }

        $service =$this->aklamator_url . "wp-authenticate/user";
        $p['ip'] = $_SERVER['REMOTE_ADDR'];
        $p['domain'] = site_url();
        $p['source'] = "wordpress";
        $p['AklamatorApplicationID'] = get_option('aklamatorWooApplicationID');

        $aklamatorWPfeedAppend = "";
        if(get_option('aklamatorWooCategory')!= -1)
        {
            $aklamatorWPfeedAppend = '&product_cat=' . get_option('aklamatorWooCategory');
        }
        $p['aklamatorWoofeedURL'] = site_url() . '?post_type=product&feed=atom' . $aklamatorWPfeedAppend.'&rs='.get_option('aklamatorWooReviewScore');

        $data = wp_remote_post( $service, array(
                'method' => 'POST',
                'timeout' => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(),
                'body' => $p,
                'cookies' => array()
            )
        );

        $data['body'] = json_decode($data['body']);

        return $data['body'];

    }

    public function createAdminPage()
    {
       require_once AKLAWOO_PR_PLUGIN_DIR."views/admin-page.php";
    }

    function vw_setup_vw_widgets_init_aklamatorWoo() {
        add_action( 'widgets_init', array($this, 'vw_widgets_init_aklamatorWoo') );
    }
    
    function vw_widgets_init_aklamatorWoo() {
        register_widget( 'Wp_widget_aklamatorWoo' );
    }
}