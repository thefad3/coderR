<?php
/* Pre-requisite: Download the required PHP OAuth class from http://oauth.googlecode.com/svn/code/php/OAuth.php. This is used below */
require("OAuth.php");

$cc_key  = "dj0yJmk9NzlTQlFtd0FyWFFyJmQ9WVdrOVEzUlRNR3ROTXpRbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD00Nw--";
$cc_secret = "f9d89269ee530cdf38c682e131c545c4bc8356ad";
$url = "https://yboss.yahooapis.com/ysearch/web";
$args = array();
$args["q"] = "yahoo";
$args["format"] = "json";

$consumer = new OAuthConsumer($cc_key, $cc_secret);
$request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
$url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
$ch = curl_init();
$headers = array($request->to_header());
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$rsp = curl_exec($ch);
$results = json_decode($rsp);
print_r($results);
var_dump($results);


?>