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
include('./FileControl.php');

//RSS全体情報
$rss_data=new CustomRssData("title","link","description");

//スクレイピング&格納
$rss_item=scrapeHtml();
$rss_data->setRssItems($rss_item);

//writerの生成　$item:格納したアイテム,$file_path:作成するrssのファイル名またはパス
$writer=new CustomCreateWriter($rss_data,"smartysmile.xml");
$writer->createRss();




//スクレイピングして,Itemクラスに格納
function scrapeHtml(){
    $url="http://smartysmile.jp/";
    $items=array();
    $html=file_get_html($url);
    foreach($html->find('div[class=item_list list_ranking]') as $html_item){

        //データの元
        $title=$html_item->find('div[class=tit]');
        $link=$title->find('a href');
        $description=$html_item->find('div[class=detail]');

        //アイテムを格納
        $item=new Item();
        $item->setTitle($title->plaintext);
        $item->setLink($link->plaintext);
        $item->setDescription($description->plaintext);
        $items[]=$item;

    }

    return $items;
}
?>