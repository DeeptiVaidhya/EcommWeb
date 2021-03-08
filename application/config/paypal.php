<?php if(!defined('BASEPATH')) exit('No direct script acess allowed');



/* paypal librRY CONFIGURATION */

/* paypal environment, sadnbox or live*/
$config['sandbox'] = FALSE; //false for live enviroment

//paypal business email
$config['business'] = 'srq12@gmail.com';

//what is hte default currency?
$config['paypal_lib_currency_code'] = 'INR';

//Where is the button located at?
$config['paypal_lib_button_path'] = 'assets/images';

//if(and where) to log ipn response in a file
$config['paypal_lib_ipn_log'] =TRUE;
$config['paypal_lib_ipn_log_file']=BASEPATH. 'logs/paypal_ipn.log';
?>
