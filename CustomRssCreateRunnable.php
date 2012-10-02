<?php
/**
 * Created by JetBrains PhpStorm.
 * User: home
 * Date: 12/09/29
 * Time: 10:42
 * To change this template use File | Settings | File Templates.
 */

include('./lib/simple_html_dom.php');
include('./CustomRssData.php');

//RSS全体情報
$rss_data=new CustomRssData("title","link","description");

//URL指定
$url="http://ritzlabo.com/";

$rss_item=scrapeHtml($url);
$rss_data->setRssItems($rss_item);

//writerの生成
$writer=new CustomCreateWriter($rss_data);
$writer->createRss();



//simple_html_dom_parserを使ったスクレイピング
function scrapeHtml($html){
    $items=array();
    $item=new Item();
    $item->setTitle("aa");
    $item->setLink("bb");
    $item->setDescription("cc");
    $items[]=$item;
    return $items;
}
?>