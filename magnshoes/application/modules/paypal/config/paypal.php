<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['Sandbox'] = TRUE;
$config['APIVersion'] = '85.0';
$config['APIUsername'] = $config['Sandbox'] ? 'magnsh_1338185979_biz_api1.gmail.com' : 'PRODUCTION_USERNAME_GOES_HERE';
$config['APIPassword'] = $config['Sandbox'] ? '1338186005' : 'PRODUCTION_PASSWORD_GOES_HERE';
$config['APISignature'] = $config['Sandbox'] ? 'AkoxvKxWbZRMfoOU7IOSzqqEU6mmAXYUUKrPBgoeH1aaf29xyeorpMSiv' : 'PRODUCTION_SIGNATURE_GOES_HERE';
$config['DeviceID'] = $config['Sandbox'] ? '' : 'PRODUCTION_DEVICE_ID_GOES_HERE';
$config['ApplicationID'] = $config['Sandbox'] ? 'APP-MAGNSHOES' : 'PRODUCTION_APP_ID_GOES_HERE';
$config['DeveloperEmailAccount'] = $config['Sandbox'] ? 'andrew@angelleye.com' : 'PRODUCTION_DEV_EMAIL_GOES_HERE';
$config['PayFlowUsername'] = $config['Sandbox'] ? 'tester' : 'PRODUCTION_USERNAME_GOGES_HERE';
$config['PayFlowPassword'] = $config['Sandbox'] ? 'Passw0rd~' : 'PRODUCTION_PASSWORD_GOES_HERE';
$config['PayFlowVendor'] = $config['Sandbox'] ? 'angelleye' : 'PRODUCTION_VENDOR_GOES_HERE';
$config['PayFlowPartner'] = $config['Sandbox'] ? 'PayPal' : 'PRODUCTION_PARTNER_GOES_HERE';

/* End of file paypal.php */
/* Location: ./system/application/config/paypal.php */