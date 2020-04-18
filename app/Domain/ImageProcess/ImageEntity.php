<?php
namespace App\Domain\ImageProcess;

use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\File;

class ImageEntity{
    public $imagePath = 'ImageProcess/images';
    public $imageBackUpPath = 'ImageProcess/Backup';
    public $imageOutputPath = 'ImageProcess/output';
    
    public $percentage = 0.5;

    private $testPath = 'storage';
    
    private $images;

    public function __construct(){
        $this->genSystemPath();
        $this->images = \File::files( $this->systemPath . $this->imagePath );
    }

    private function genSystemPath(){
        $systemPath = explode( 'app', __FILE__ )[0] . 'storage/app/';
        $this->systemPath = $systemPath;
    }


    public function getImages(){
        return $this->images;
    }
    
    public function getImagePath(){
        return $this->getSystemPath() . $this->imagePath . '/';
    }

    public function getSystemPath(){
        return $this->systemPath . '/';
    }

    public function getImageOutputPath(){
        return $this->getSystemPath() . $this->imageOutputPath . '/';
    }

    public function getImageBackupPath(){
        return $this->imageBackUpPath;
    }

    public function getImagePercentage(){
        return $this->percentage;
    }

    public function _test(){
        //return '------------------test------------------';
        //return Storage::directories( $this->testPath );
        

    }
    

    

}



