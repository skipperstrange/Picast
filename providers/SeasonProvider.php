<?php
class SeasonProvider{

    private $VideoModel;

    public function __construct(){
        $this->VideoModel = auto_load_model('Videos');
        $this->VideoModel->setData(['id'=>'', 'title'=>'', 'description'=>'', 'filePath'=>'', 'duration'=>'', 'season'=>'', 'episode'=>'']);
    }

    function getVideosSeasonByEntity($entityId){
        $this->VideoModel->setEntityId($entityId);
        $this->VideoModel->setOrderBy('season, episode ASC');
        $videos = $this->VideoModel->getVideosSeasonByEntity($entityId);

        $seasons = [];
         foreach($videos as $video){
             $seasons[$video['season']][] = $video;
         }

         return $seasons;
    }

}