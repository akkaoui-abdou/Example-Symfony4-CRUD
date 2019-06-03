<?php


namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Psr\Container\ContainerInterface;

class FileUploader 
{

	private $container;
	
	function __construct(ContainerInterface $container)
	{
		
		$this->container = $container;

	}


	public function uploadFile(UploadedFile $file){

		$filename = md5(uniqid()).'.'.$file->guessClientExtension();
        		$file->move(
        			$this->container->getParameter('uploads_dir'),
        			$filename
        		);

        		return $filename;
	}
}