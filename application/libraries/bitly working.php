<?php //defined('BASEPATH') OR exit('No direct script access allowed');


class bitly {
private $_username = null;
private $_apikey = null;
private $_format = null;
// format can be json,xml,txt
// read more here http://dev.bitly.com/formats.html
private $_apiurl = null;
public function main($username,$apikey,$secure = false,$format = 'txt'){
//public function __construct('zohaiwbasim','R_da6cdc24e3ac095ec6a72fd7b1e0d756',$secure = false,$format = 'txt'){
$this->_username = $username;	
$this->_apikey = $apikey;	
$this->_format = $format;
if($secure) {
$this->_apiurl = 'https://api-ssl.bitly.com';
}
else {
$this->_apiurl = 'http://api.bitly.com';
}
}
 
/*
Read more: http://dev.bitly.com/links.html#v3_shorten
*/
public function shortenURL($urltoshorten) {
// check here if the URL is valid or not
$bitlyconnector = 'http://api.bitly.com/v3/shorten?login=zohaibwasim&apiKey=R_da6cdc24e3ac095ec6a72fd7b1e0d756&uri='.urlencode($urltoshorten).'&format=txt';
return $this->http($bitlyconnector);
}
 
/*
Read more: http://dev.bitly.com/links.html#v3_expand
*/
function longURL($urltolongify) {
$bitlyconnector = $this->_apiurl.'/v3/expand?login='.$this->_username.'&apiKey='.$this->_apikey.'&shortUrl='.urlencode($urltolongify).'&format='.$this->_format;
return $this->http($bitlyconnector);
}
 
/*CURL is a library you should prefer in all cases when considering
  cross domain calls
*/
function http($bitlyconnector) {
$ch = curl_init();
$timeout = 10;
curl_setopt($ch,CURLOPT_URL,$bitlyconnector);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$response = curl_exec($ch);
curl_close($ch);
return $response;
}
}

