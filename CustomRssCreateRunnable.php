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
$rss_data=new CustomRssData("ニベントカレンダーのRSS","http://nivent.nicovideo.jp","ニベントカレンダーの開催日の近い順のRSS");

//スクレイピング&格納
$rss_item=scrapeHtml();
//var_dump($rss_item);
$rss_data->setRssItems($rss_item);

//writerの生成　$item:格納したアイテム,$file_path:作成するrssのファイル名またはパス
$writer=new CustomCreateWriter($rss_data,"test.xml");
$writer->createRss();




//スクレイピングして,Itemクラスに格納
function scrapeHtml(){
    $url="http://nivent.nicovideo.jp/";
    $items=array();
    $html=file_get_html($url);

    foreach($html->find('div[id=list] div[class=box clearfix]') as $key=>$html_item){
        //データの元
        //var_dump($html_item);
        $title=$html_item->find('div[class=infoUpper] strong a');
        $link=$html_item->find('div[class=infoUpper] strong a');
        $description=$html_item->find('div[class=infoLower] p[class=body]');
        $thumbnail=$html->find('div[class=thumb] img');
        //var_dump($link);
        //アイテムを格納
        $item=new Item();
        $item->setTitle($title[0]->innertext);
        $item->setLink("http://nivent.nicovideo.jp".$link[0]->href);
        $item->setDescription(createImgTag($thumbnail[$key]->src).$description[0]->innertext);
        $items[]=$item;

    }



    return $items;
}
function createImgTag($img_src){
    $src="<img src=\"";
    $src.="http://nivent.nicovideo.jp";
    $src.=$img_src;
    $src.="\" />";
    return $src;
}

?>