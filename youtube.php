<?php
class YouTubeVideo
{

    public $id; //id �����

    private $apiKey ='AIzaSyBqQMQZvc0kLUzOZg8-1f3TVGb3Hs1_S4c';

    private $youtube;


    public function __construct()
    {
        $client = new Google_Client();
        $client->setDeveloperKey($this->apiKey);

        $this->youtube = new Google_Service_YouTube($client);

    }


    /*
    * ��������� ������ ����� �� �� id
    */
    public function videosByIds(   $ids)
    {
        return $this->youtube->videos->listVideos('snippet, statistics, contentDetails', [
            'id' => $ids,
        ]);
    }

    /**
     * ��������� ������ ���������� ����� (������ - snippet � statistics)
     */
    public function videos()
    {
        return $this->youtube->videos->listVideos('snippet, statistics, contentDetails', [
            'chart' => 'mostPopular',
            'maxResults' => 50
        ]);
    }

 


    /** �������� ������ ��������� ����� � YouTube
     * https://developers.google.com/youtube/v3/docs/videoCategories
     * ���������� ������ � id ���������
     */
    public function getCategory($regionCode = 'RU'){
        $result = $this->youtube->videoCategories->listVideoCategories('snippet',
            array('hl' => 'ru', 'regionCode' => $regionCode));

        $category = [];
        $array = $result->getItems(); //������ �������� Google_Service_YouTube_VideoCategory

        array_walk($array, function ($value) use (&$category){
            $category[$value['id']] =  $value['snippet']['title'];
        });

        return $category;
    }


     


}