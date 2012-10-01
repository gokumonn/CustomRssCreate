<?php
/**
 * Created by JetBrains PhpStorm.
 * User: home
 * Date: 12/09/27
 * Time: 18:24
 * To change this template use File | Settings | File Templates.
 */
abstract class CustomCreateWriter{
    public function HeaderWriter(){


    }
    

    public function createRss(){
        //ヘッダのタグ

        //基本情報
        //各アイテム
        //フッタ


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
    private $title,$link,$description;
    //各アイテム
    private $item;
    public function __construct($title,$link,$description){
        $this->title=$title;
        $this->link=$link;
        $this->description=$description;

    }

    public function setItem($item){
        //各アイテムをスクレイピングする処理
        $this->item=$item;

    }


}



?>