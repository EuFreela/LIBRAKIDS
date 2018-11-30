<?php

namespace App\AppClass;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

Class ClassDirectory {

    private $dir_images_category;
    private $dir_images_card;
    private $dir_video_card;

    private $dir_images_quiz;
    private $dir_video_quiz;

    function __construct() {

        $this->dir_images_category = "/var/www/html/estudelibras/images/category/";
        $this->dir_images_card = "/var/www/html/estudelibras/images/card/";
        $this->dir_video_card = "/var/www/html/estudelibras/videos/card/";

        $this->dir_video_quiz = "/var/www/html/estudelibras/videos/quiz/";
        $this->dir_images_quiz = "/var/www/html/estudelibras/images/quiz/";
    }

    /**
     * PUBLIC
     * 
     */
    public function setNameImageDirectory($value,$img)
    {
        $path = $this->getPath($value,1);
        $valueWidth = 300;/**Valor de largura*/
        $i = $this->createNameArchive($img->extension());
        //RESIZE E ARMAZENAMENTO
        $data = getimagesize($img);
        Image::make($img)->resize($valueWidth,$this->calcSizeImage($data[0],$data[1],$valueWidth))
        ->save($this->newDirectory($path).$i);
        $this->setPublicArchive($path.$i);   
        return "/".$value."/".$i;
    }

    public function setNameImageDirectory_2v($id,$value,$img)
    {
        $path = $this->getPath($value,1);
        $valueWidth = 300;/**Valor de largura*/
        $i = (string) $id."_".$this->createNameArchive($img->extension());
        //RESIZE E ARMAZENAMENTO
        $data = getimagesize($img);
        Image::make($img)->resize($valueWidth,$this->calcSizeImage($data[0],$data[1],$valueWidth))
        ->save($this->newDirectory($path).$i);
        $this->setPublicArchive($path.$i);   
        return "/".$value."/".$i;
    }

    public function setNameVideoDirectory($value,$archive)
    {   
        $path = $this->getPath($value,2);
        $i = $this->createNameArchive($archive->extension());                     
        $location = $this->newDirectory($path);
        $archive->move($location,$i);
        $this->setPublicArchive($path.$i);
        return "/".$value."/".$i;    
    }

    public function setNameVideoDirectory_2v($id,$value,$archive)
    {   
        $path = $this->getPath($value,2);
        $i = (string) $id."_".$this->createNameArchive($archive->extension());                     
        $location = $this->newDirectory($path);
        $archive->move($location,$i);
        $this->setPublicArchive($path.$i);
        return "/".$value."/".$i;    
    }

    /**
     * PRIVATE
     * 
     */
    private function createNameArchive($extension)
    {
        $newName = str_random(10);
        $name = "{$newName}.{$extension}";
        return $name;
    }

    private function setPublicArchive($archive)
    {
        chmod($archive,0777);
    }

    private function newDirectory($directory)
    {
        if( !is_dir($directory) )
            mkdir($directory, 0777, true);
        return $directory."/";
    }

    private function calcSizeImage($w,$h,$value)
    {
        $nW = $value;
        $nH = ($nW*$h)/($w);
        return $nH;
    }

    private function getPath($way,$path)
    {
        switch ($way) {
            case "category":
                return $this->dir_images_category;
                break;
            case "card":
                ($path == 1) ? $r = $this->dir_images_card : $r = $this->dir_video_card;
                return $r;                
                break;  
            case "quiz":
                ($path == 1) ? $r = $this->dir_images_quiz : $r = $this->dir_video_quiz;
                return $r;                
                break; 
        }
    }

}