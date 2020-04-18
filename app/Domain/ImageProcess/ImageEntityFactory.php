<?php
namespace App\Domain\ImageProcess;

use App\Domain\ImageProcess\ImageEntity;

class ImageEntityFactory{
    public function __construct(){

    }

    public function genImageEntity(){
        return new ImageEntity();
    }

}



