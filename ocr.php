<?php namespace \TesseractOCR\Tests\EndToEnd;

use \TesseractOCR\TesseractOcrException;
use \TesseractOCR\Tests\Common\TestCase;
use \TesseractOCR\TesseractOCR;
use ReflectionObject;

class ocr extends TestCase
{
	private $executable = 'tesseract';
	private $imagesDir  = '\covers';

	public function getText($file)
	{
		echo (new TesseractOCR('$file'))
                                         ->run();
	}

}