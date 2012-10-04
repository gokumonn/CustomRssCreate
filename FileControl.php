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

    public function echoFile($write_str){

        if(!touch($this->file_path)){
            $fp=fopen($this->file_path,"w");
            if($write_str==null ||$write_str==""){
                fwrite($fp,$this->write_str);
            }else{
                fwrite($fp,$write_str);
            }

            fclose($fp);

        }else{
            exit("ファイルが作成できません。");

        }


    }

}




?>