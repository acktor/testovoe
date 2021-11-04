<?php


namespace Helpers;


class Image
{

    protected $url;
    protected $name;
    protected $full_path;

    const IMAGES_DIR = 'images';

    public function __construct(){
        $this->getRandomImage();
    }

    public function getRandomImage(){

        $files = scandir(self::IMAGES_DIR);

        $count = count($files);

        $index = rand(2, ($count-1));

        $file_name = $files[$index];

        $this->setUrl(self::IMAGES_DIR . '/' . $file_name);
        $this->setName($file_name);
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}
