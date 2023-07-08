<?php

 namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploaderFile;
 class PicturesService

 {
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params=$params;
    }

    public function add(UploadedFile $picture, ?string $folder = '', ?int $witdth =250, ?int $height = 250)
    {

        // On donne nouveau nom aux images

        $fichier = md5(uniqid(rand(), true)). '.webp';

        // On récupére les infos de l'image

        $picture_info = getimagesize($picture);

        if($picture_info  === false){

            throw new Exception('Format d\'image incorrect');
        }

        //On vérifie le format de l'image

        switch($picture_info['mine']){
            case 'image/png':
                $picture_source = imagecreatefrompng($picture);
                break;
            case 'image/jpeg':
                $picture_source = imagecreatefromjpeg($picture);
                break;
            case 'image/webp':
                $picture_source = imagecreatefromwebp($picture);
                break;
            default:
                throw new Exception('Format d\'image incorrect');
        }

        //Recadre l'image
        // + dimension

        $imageWitdh = $picture_info[0];
        $imageHeight = $picture_info[1];

        // Vérif de l'orention de l'image

        switch ($imageWitdh <=> $imageHeight){
            case -1: // portrait
                $squareSize = $imageWitdh;
                $src_x = 0;
                $src_y= ($imageHeight - $squareSize) / 2;
                break;
            case 0: // carré
                $squareSize = $imageWitdh;
                $src_x = 0;
                $src_y= 0 ;
                break;
            case 1: // paysage
                $squareSize = $imageWitdh;
                $src_x = ($imageWitdh - $squareSize) / 2;;
                $src_y= 0 ;
                break;


        }

        // On créer une nouvelle image vierge

        $resized_picture = imagecreatetruecolor($witdth,$height);

        imagecopyresampled($resized_picture, $picture_source, 0 ,0 , $src_x,$src_y,$witdth,$height, $squareSize, $squareSize);

        $path = $this->params->get('image_directory').$folder;


        //On créer le dossier de destination

        if(!file_exists($path . '/mini')){

            mkdir($path .'mini', 0755, true);

        }

        //Stockage de l'image

        imagewebp($resized_picture,$path .'/mini/' . $witdh . 'x' .$height .'-'.$ficher);

        $picture->move($path .'/', $fichier);

        return $fichier;

    }

    public function delete(string $fichier, ?string $folder = '', ?int $width = 250, ?int $height = 250)
    {
        if($fichier !== 'default.webp'){
            $success = false;
            $path = $this->params->get('image_directory').$folder;

            $mini = $path . '/mini/'. $witdh . 'x' .$height .'-'.$ficher;

            if(file_exists($mini)){
                unlink($mini);
                $suceess = true;            }


                $original = $path . '/' . $fichier;

                if(file_exists($original)){
                    unlink($original);
                    $suceess = true;            }

                    return false;

        }

    
    }
 }