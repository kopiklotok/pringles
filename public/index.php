<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Content-Type: application/json');

/*
$myBlogName       = $_GET['title'];
$myBlogUrl        = $_GET['siteurl'];
$myBlogRSSFeedUrl = $_GET['feed'];
*/

$url = $_GET['url'];
$myBlogUpdateUrl  = $url;
$result = parse_url($url);
$myBlogUrl = $result['scheme']."://".$result['host'];
$myBlogName = ucwords(str_replace('-',' ',basename($url)));
$myBlogRSSFeedUrl = $url;


if(isset($_GET['url'])){


  $xmlRpcPingUrls[] = 'http://rpc.pingomatic.com';
  $xmlRpcPingUrls[] = 'http://ping.bloggers.jp/rpc/';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.ae/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.at/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.be/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.bg/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.ca/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.ch/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.cl/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.cr/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.hu/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.id/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.il/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.in/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.it/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.jp/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.ma/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.nz/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.th/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.uk/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.ve/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.co.za/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.ar/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.au/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.br/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.co/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.do/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.mx/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.my/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.pe/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.sa/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.sg/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.tr/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.tw/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.ua/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.uy/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com.vn/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.com/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.de/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.es/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.fi/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.fr/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.gr/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.hr/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.ie/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.in/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.it/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.jp/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.lt/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.nl/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.pl/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.pt/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.ro/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.ru/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.se/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.sk/ping/RPC2';
  $xmlRpcPingUrls[] = 'http://blogsearch.google.tw/ping/RPC2';

  require_once( 'lib.php' );

  function xmlRpcPing( $url ) {
    global $myBlogName, $myBlogUrl, $myBlogUpdateUrl, $myBlogRSSFeedUrl;
    $client = new IXR_Client( $url );
    $client->timeout = 3;
    $client->useragent .= ' -- PingTool/1.0.0';
    $client->debug = false;

    $res = [];
    if( $client->query( 'weblogUpdates.extendedPing', $myBlogName, $myBlogUrl, $myBlogUpdateUrl, $myBlogRSSFeedUrl ) ){
      $res[] = $client->getResponse();
    }

    if( $client->query( 'weblogUpdates.ping', $myBlogName, $myBlogUrl ) )
    {
      $res[] = $client->getResponse();
    }

    $res[] = $client->getErrorCode();
    $res[] = $client->getErrorMessage();
    return
      [
        'server' => $url,
        'url' => $myBlogUpdateUrl,
        'data' => $res
      ]
    ;
  }

  $dat = [];
  //foreach( $xmlRpcPingUrls as $url ){
    $urutan = $_GET['urutan'];
    $dat = (xmlRpcPing($xmlRpcPingUrls[($urutan-1)]));
    ob_flush();
    flush();
  //}
  echo json_encode($dat);

}else{
  echo json_encode([
    //'format' => 'title,url,siteurl,feed'
    'status' => 'good'
  ]);
}
