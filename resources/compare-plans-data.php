<?php
/**
 * Array for plans comparison block
 *
 * @var string $active_app
 * @var LimitLoginAttempts $this
 *
 */

use LLAR\Core\Config;

$setup_code = Config::get( 'app_setup_code' );
$min_plan = empty($setup_code) ? 'Free' : 'Micro Cloud';

$plans = $this->array_name_plans();
$actual_plan = $active_app === 'custom' ? $this->info_sub_group() : $min_plan;
$upgrade_link = $active_app === 'custom' ? $this->info_upgrade_link() : 'https://www.limitloginattempts.com/info.php?from=plugin-premium-tab-upgrade';

$attribute = [];
foreach ( $plans as $plan => $value ) {

    if ( $value < $plans[$actual_plan] ) {
        $attribute[$plan]['class'] = '';
        $attribute[$plan]['title'] = '';
    }
    elseif ( $value === $plans[$actual_plan] ) {
	    $attribute[$plan]['class'] =  'class="button menu__item button__transparent_orange llar-disabled"';
	    $attribute[$plan]['title'] =  'Installed';
    }
    elseif ( $plan === 'Micro Cloud' ) {
        $attribute[$plan]['class'] =  'class="button menu__item button__orange button_micro_cloud"';
        $attribute[$plan]['title'] =  'Get Started (Free)';
    }
    else {
        $attribute[$plan]['class'] =  'class="button menu__item button__orange" href="' . $upgrade_link . '" target="_blank"';
        $attribute[$plan]['title'] =  'Upgrade now';
    }
}

$lock = '<img src="' . LLA_PLUGIN_URL . 'assets/css/images/icon-lock-bw.png" class="icon-lock">';
$yes = '<span class="llar_orange">&#x2713;</span>';

$compare_list = array(
    'buttons_header'                                => array(
        'Free'          => '<a ' . $attribute['Free']['class'] . '>' . __($attribute['Free']['title'], 'limit-login-attempts-reloaded') . '</a>',
        'Micro Cloud'   => '<a ' . $attribute['Micro Cloud']['class'] . '>' . __($attribute['Micro Cloud']['title'], 'limit-login-attempts-reloaded') . '</a>',
        'Premium'       => '<a ' . $attribute['Premium']['class'] . '>' . __($attribute['Premium']['title'], 'limit-login-attempts-reloaded') . '</a>',
        'Premium +'     => '<a ' . $attribute['Premium +']['class'] . '>' . __($attribute['Premium +']['title'], 'limit-login-attempts-reloaded') . '</a>',
        'Professional'  => '<a ' . $attribute['Professional']['class'] . '>' . __($attribute['Professional']['title'], 'limit-login-attempts-reloaded') . '</a>',
    ),
    'Limit Number of Retry Attempts'                => array(
        'Free'          => $yes,
        'Micro Cloud'   => $yes,
        'Premium'       => $yes,
        'Premium +'     => $yes,
        'Professional'  => $yes,
    ),
    'Configurable Lockout Timing'                   => array(
        'Free'          => $yes,
        'Micro Cloud'   => $yes,
        'Premium'       => $yes,
        'Premium +'     => $yes,
        'Professional'  => $yes,
    ),
    'Login Firewall'                                => array(
        'description'   =>  __( "Secure your login page with our cutting-edge login firewall, defending against unauthorized access attempts and protecting your users' accounts and sensitive information.", 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $yes,
        'Premium'       => $yes,
        'Premium +'     => $yes,
        'Professional'  => $yes,
    ),
    'Performance Optimizer'                         => array(
        'description'   =>  __( 'Absorb failed login attempts from brute force bots in the cloud to keep your website at its optimal performance.', 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $yes . '<span class="description">1k requests per month</span>',
        'Premium'       => $yes . '<span class="description">100k requests per month</span>',
        'Premium +'     => $yes . '<span class="description">200k requests per month</span>',
        'Professional'  => $yes . '<span class="description">300k requests per month</span>',
    ),
    'Block By Country'                              => array(
        'description'   =>  __( 'Disable IPs from any region to disable logins.', 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $lock,
        'Premium'       => $lock,
        'Premium +'     => $yes,
        'Professional'  => $yes,
    ),
    'Access Blocklist of Malicious IPs'             => array(
        'description'   =>  __( 'Add another layer of protection from brute force bots by accessing a global database of known IPs with malicious activity.', 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $lock,
        'Premium'       => $lock,
        'Premium +'     => $yes,
        'Professional'  => $yes,
    ),
    'Auto IP Blocklist'                             => array(
        'description'   =>  __( 'Automatically add malicious IPs to your blocklist when triggered by the system.', 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $lock,
        'Premium'       => $lock,
        'Premium +'     => $lock,
        'Professional'  => $yes,
    ),
    'Access Active Cloud Blocklist'                 => array(
        'description'   =>  __( 'Use system wide data from over 10,000 WordPress websites to identify and block malicious IPs. This is an active list in real-time.', 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $lock,
        'Premium'       => $lock,
        'Premium +'     => $lock,
        'Professional'  => $yes,
    ),
    'Intelligent IP Blocking'                       => array(
        'description'   =>  __( 'Use active IP database via the cloud to automatically block users before they are able to make a failed login.', 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $yes,
        'Premium'       => $yes,
        'Premium +'     => $yes,
        'Professional'  => $yes,
    ),
    'Synchronize Lockouts & Safelists/Blocklists'   => array(
        'description'   =>  __( 'Lockouts & safelists/blocklists can be shared between multiple domains to enhance protection.', 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $yes,
        'Premium'       => $yes,
        'Premium +'     => $yes,
        'Professional'  => $yes,
    ),
    'Premium Support'                               => array(
        'description'   =>  __( 'Receive 1 on 1 technical support via email for any issues. Free support availabe in the <a href="https://wordpress.org/support/plugin/limit-login-attempts-reloaded/" target="_blank">WordPress support forum</a>.', 'limit-login-attempts-reloaded' ),
        'Free'          => $lock,
        'Micro Cloud'   => $yes,
        'Premium'       => $yes,
        'Premium +'     => $yes,
        'Professional'  => $yes,
    ),
    'buttons_footer'                                => array(
        'Free'          => '<a ' . $attribute['Free']['class'] . '>' . __($attribute['Free']['title'], 'limit-login-attempts-reloaded') . '</a>',
        'Micro Cloud'   => '<a ' . $attribute['Micro Cloud']['class'] . '>' . __($attribute['Micro Cloud']['title'], 'limit-login-attempts-reloaded') . '</a>',
        'Premium'       => '<a ' . $attribute['Premium']['class'] . '>' . __($attribute['Premium']['title'], 'limit-login-attempts-reloaded') . '</a>',
        'Premium +'     => '<a ' . $attribute['Premium +']['class'] . '>' . __($attribute['Premium +']['title'], 'limit-login-attempts-reloaded') . '</a>',
        'Professional'  => '<a ' . $attribute['Professional']['class'] . '>' . __($attribute['Professional']['title'], 'limit-login-attempts-reloaded') . '</a>',
    ),
);

return $compare_list;
