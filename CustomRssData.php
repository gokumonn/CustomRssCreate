<?php
/**
 * Created by JetBrains PhpStorm.
 * User: home
 * Date: 12/09/27
 * Time: 18:24
 * To change this template use File | Settings | File Templates.
 */
class CustomCreateWriter extends FileWriter{
    private $whole_item;
    private $echo_str;
    public function __construct($item,$write_str,$file_path){
        parent::__construct($write_str,$file_path);
        $this->whole_item=$item;



    }
    public function headerWriter(){
        $header="<?xml version='1.0'?>";
        $header.="<rss version='2.0'>";
        $header.="<channel>";
        return $header;
    }
    public function informationWriter(){
        $info="<title>".$this->whole_item->getInfoTitle()."</title>";
        $info.="<link>".$this->whole_item->getInfoLink()."</link>";
        $info.="<description>".$this->whole_item->getInfoDescription()."</description>";
        return $info;
    }

    public function itemWriter(){
        $connect_item="";
        foreach($this->whole_item->getRssItems() as $rss_item){
            $connect_item.="<title>".$rss_item->getTitle()."</title>";
            $connect_item.="<link>".$rss_item->getLink()."</link>";
            $connect_item.="<description>".$rss_item->getDescription()."</description>";

        }
        return $connect_item;
    }

    public function footerWriter(){
        $footer="</channel>";
        $footer.="</rss>";
        return $footer;
    }


    public function createRss(){
        //連結
        $rss=$this->headerWriter();
        $rss.=$this->informationWriter();
        $rss.=$this->itemWriter();
        $rss.=$this->footerWriter();
        $this->echo_str=$rss;


        //ファイルに出力
        parent::echoFile($this->echo_str);

        //test
        echo $rss;


    }

}


class Item{
    private $title,$link,$description;

    public function setTitle($title){
        $this->title=$title;
    }

    public function setLink($link){
        $this->link=$link;
    }

    public function setDescription($description){
        $this->description=$description;

    }

    public function getTitle(){
        return $this->title;
    }

    public function getLink(){
        return $this->link;
    }

    public function getDescription(){
        return $this->description;
    }

}

class CustomRssData{
    //基本情報
    private $info_title,$info_link,$info_description;
    //各アイテム
    private $rss_items;
    public function __construct($title,$link,$description){
        $this->info_title=$title;
        $this->info_link=$link;
        $this->info_description=$description;

    }

    public function getInfoTitle(){
        return $this->info_title;
    }

    public function getInfoLink(){
        return $this->info_link;
    }

    public function getInfoDescription(){
        return $this->info_description;
    }

    public function getRssItems(){
        return $this->rss_items;
    }


    public function setRssItems($item){
        //各アイテムをスクレイピングする処理
        $this->rss_items=$item;

    }


}



?>