<?php
/**
 * Created by PhpStorm
 * User: Rushan Zaripov
 * Date: 24.03.2021
 * Time: 16:33
 */

namespace Rushanufa\Phantomjs;

use Bitrix\Main\Web\HttpClient;

class Generator
{
	/**
	 * @var string - Путь относительно папки upload
	 */
	protected $path;

	/**
	 * @var string - Путь к временной папке генерации файла
	 */
	protected $tmp_path;

	/**
	 * @var string - Url адрес сайта, который будет рендерится
	 */
	protected $url;

	/**
	 * @var int - Ширина окна браузера
	 */
	protected $width;

	/**
	 * @var int - Высота окна браузера
	 */
	protected $height;

	/**
	 * @var string - Название модуля, (папка в upload, куда будет сохраняться файл)
	 */
	protected $module;

	/**
	 * @var string - Имя файла для генерации
	 */
	protected $file;


	/**
	 * @var string - Уникальное хэш имя генерируемого файла
	 */
	protected $file_hash;

	/**
	 * @var string - Выводимый тип файла
	 */
	protected $type;

	/**
	 * @var array - Массив выводимых типов
	 */
	protected $file_types = array("png","jpg","gif","pdf");

	/**
	 * Generator constructor
	 * @param array - Массив параметров конструктора
	 */
	public function __construct( array $options ) {

		$this->url = htmlspecialcharsbx($options["url"]);
		$this->width = (int) $options["width"];
		$this->height = (int) $options["height"];
		$this->module = htmlspecialcharsbx($options["module"]);
		$this->file = htmlspecialcharsbx($options["file"]);
		$this->type = htmlspecialcharsbx($options["type"]);

		$this->path = $_SERVER["DOCUMENT_ROOT"].'/upload/'.$this->module.'/';

		$this->tmp_path = __DIR__;
		if(substr($this->tmp_path,-3) == "src")
			$this->tmp_path = substr($this->tmp_path,0,-3)."tmp";

		$this->file_hash = randString(10, array("0123456789"));

	}

	/**
	 * Рендерим изображение
	 * @return json
	 */
	public function render() {

		/*
		$httpClient = new HttpClient();
		$httpClient->setHeader('Content-Type', 'application/json', true);*/

		//echo $this->tmp_path;
		//$output = shell_exec("pwd");
		//echo $output;

	}


}