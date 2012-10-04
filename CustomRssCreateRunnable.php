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
$writer=new CUstomCreateWriter($rss_data);
$writer->createRss();

function scrapeHtml($url){
    $items=array();
    $html=file_get_html($url);
    foreach($html->find('div[class=item_list list_ranking]') as $html_item){
        $title=$html_item->find('div[class=tit]');
        $link=$title->find('a href');
        $description=$html_item->find('div[class=detail]');


        $item=new Item();
        $item->setTitle($title->plaintext);
        $item->setLink($link->plaintext);
        $item->setDescription($description->plaintext);
        $items[]=$item;

    }

    return $items;
}
?>