<?php
/**
 * Created by JetBrains PhpStorm.
 * User: home
 * Date: 12/09/29
 * Time: 10:42
 * To change this template use File | Settings | File Templates.
 */
//SmartyのSetting
ini_set('display_errors',1);
require_once('/usr/local/include/php/libs/Smarty.class.php');
//SimpleDomParserの読み込み
include('./lib/simple_html_dom.php');
include('./CustomRssData.php');
//RSSの設定
$rss_data=new CustomRssData("title","link","description");
$rss_item=new Item();
$rss_item->setTitle("");
$rss_item->setLink("");
$rss_item->setDescription("");

$rss_data->setItem($rss_item);


$smarty=new Smarty();
$smarty->template_dir  = '/var/www/html/concentration/temp/templates_c/';
$smarty->compile_dir  = '/var/www/html/concentration/temp/templates_c/';
$smarty->cache_dir    = '/var/www/html/concentration/temp/cache/';
//Data assign
$smarty->assign();
$smarty->assign();



?>