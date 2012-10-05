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

//スクレイピング&格納
$rss_item=scrapeHtml();
//var_dump($rss_item);
$rss_data->setRssItems($rss_item);

//writerの生成　$item:格納したアイテム,$file_path:作成するrssのファイル名またはパス
$writer=new CustomCreateWriter($rss_data,"smartysmile.xml");
$writer->createRss();




//スクレイピングして,Itemクラスに格納
function scrapeHtml(){
    $url="http://nivent.nicovideo.jp/";
    $items=array();
    $html=file_get_html($url);

    foreach($html->find('div[id=list] div[class=box clearfix]') as $html_item){
        //データの元
        //var_dump($html_item);
        $title=$html_item->find('div[class=infoUpper] strong');
        $link=$html_item->find('div[class=infoUpper] strong a href');
        $description=$html_item->innertext;

        //アイテムを格納
        $item=new Item();
        $item->setTitle($title);
        $item->setLink($link);
        $item->setDescription($description);
        $items[]=$item;

    }



    return $items;
}
?>