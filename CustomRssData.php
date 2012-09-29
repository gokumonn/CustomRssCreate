<?php
/**
 * Created by JetBrains PhpStorm.
 * User: home
 * Date: 12/09/27
 * Time: 18:24
 * To change this template use File | Settings | File Templates.
 */





interface ICustomRssItem{
    public  function setItemTitle($title);
    public  function setItemLink($link);
    public  function setItemDescription($description);


}

class CustomRssData implements  ICustomRssItem{
    //基本情報
    private $title,$link,$description;
    //各アイテム
    private $item_title,$item_link,$item_description;
    public function __construct($title,$link,$description){
        $this->title=$title;
        $this->link=$link;
        $this->description=$description;

    }

    public function setItemTitle($title){
        //Titleをスクレイピングする処理
        $this->item_title=$title;

    }

    public function setItemLink($link){
        //Linkをスクレイピングする処理
        $this->item_link=$link;
    }

    public function setItemDescription($description){
        //Descriptionをスクレイピングする処理
        $this->item_description=$description;
    }


}



?>