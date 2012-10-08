<?php
/**
 * Created by JetBrains PhpStorm.
 * User: home
 * Date: 12/10/04
 * Time: 10:15
 * To change this template use File | Settings | File Templates.
 */

class FileWriter{
    private $write_str;
    private $file_path;
    public function __construct($write_str,$file_path){
        $this->write_str=$write_str;
        $this->file_path=$file_path;
    }

    public function echoFile(){

        if(touch($this->file_path)){
            $fp=fopen($this->file_path,"w");
            fwrite($fp,$this->write_str);
            fclose($fp);
            echo("ファイルを作成しました。");
            echo($this->write_str);
        }else{
            //echo $this->write_str;
            exit("ファイルが作成できません。");

        }


    }

}




?>