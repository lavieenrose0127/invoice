<?php
namespace App\Domain\ImageProcess;

use App\Domain\ImageProcess\ImageEntityFactory;
use Illuminate\Support\Facades\Storage;

class ImageProcessService{
    private $ImageEntity;
    private $Images;
    
    public function __construct(
        ImageEntityFactory $ImageEntityFactory
    ){
        $this->ImageEntity = $ImageEntityFactory->genImageEntity();
        $this->Images = $this->ImageEntity->getImages();
    }

    public function _test(){
        //　初期処理
        $this->initialProcess();
        
        //　画像処理
        $this->imageMainProcess();

        //　画像保存

        //　imageフォルダから削除

        //　backupフォルダ処理（3日分保存）
    }


    private function initialProcess(){
        if( Storage::exists( $this->ImageEntity->getImagePath() ) !== true ){
            Storage::makeDirectory( $this->ImageEntity->getImagePath() );
        }
        
        if( Storage::exists( $this->ImageEntity->getImageOutputPath() ) !== true ){
            Storage::makeDirectory( $this->ImageEntity->getImageOutputPath() );
        }

        if( Storage::exists( $this->ImageEntity->getImageBackupPath() ) !== true ){
            Storage::makeDirectory( $this->ImageEntity->getImageBackupPath() );
        }
    }

    private function imageMainProcess(){
        foreach( $this->Images as $image ){
            list($width, $height) = getimagesize( $image->getPathname() );
            $new_width = $width * $this->ImageEntity->getImagePercentage();
            $new_height = $height * $this->ImageEntity->getImagePercentage();

            $image_p = imagecreatetruecolor( $new_width, $new_height );
            $image_original = imagecreatefromjpeg( $image );
            imagecopyresampled( $image_p, $image_original, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
        
            $outputPath = $this->ImageEntity->getImageOutputPath() . '/' . $image->getFilename();
            dump($outputPath);
            imagejpeg( $image_p, $outputPath , 100 );

            imagedestroy( $image_p );
        }
    }



}



