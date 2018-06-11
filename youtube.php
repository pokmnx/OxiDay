<?php
class YouTubeVideo
{

    public $id; //id видео

    private $apiKey ='AIzaSyBqQMQZvc0kLUzOZg8-1f3TVGb3Hs1_S4c';

    private $youtube;


    public function __construct()
    {
        $client = new Google_Client();
        $client->setDeveloperKey($this->apiKey);

        $this->youtube = new Google_Service_YouTube($client);

    }


    /*
    * Получение данных видео по их id
    */
    public function videosByIds(   $ids)
    {
        return $this->youtube->videos->listVideos('snippet, statistics, contentDetails', [
            'id' => $ids,
        ]);
    }

    /**
     * Получение списка популярных видео (данные - snippet и statistics)
     */
    public function videos()
    {
        return $this->youtube->videos->listVideos('snippet, statistics, contentDetails', [
            'chart' => 'mostPopular',
            'maxResults' => 50
        ]);
    }

 


    /** Получить список категорий видео с YouTube
     * https://developers.google.com/youtube/v3/docs/videoCategories
     * Возвращает массив с id категорий
     */
    public function getCategory($regionCode = 'RU'){
        $result = $this->youtube->videoCategories->listVideoCategories('snippet',
            array('hl' => 'ru', 'regionCode' => $regionCode));

        $category = [];
        $array = $result->getItems(); //масиив объектов Google_Service_YouTube_VideoCategory

        array_walk($array, function ($value) use (&$category){
            $category[$value['id']] =  $value['snippet']['title'];
        });

        return $category;
    }


     


}