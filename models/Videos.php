<?php 

class Videos extends  Model {

    protected $entityId;


    function __construct()
    {
        parent::__construct();
        
    }

    function setEntityId($entityId = null){
        $this->entityId = $entityId;
    }

    function getVideo(){
        return $this->from($this->table)->where($this->primaryKeyColumn, $this->primaryKey);
    }

    function getVideosSeasonByEntity(){
        $query = $this->from($this->table)->
        select($this->getDataColumns());
        if(isset($this->entityId)){
            $query->where('entityId', $this->entityId);
        }
        $query->where('isMovie', 0);
        $query->orderBy($this->orderBy);

        return $query->fetchAll();
    }

    function incrementVideoWatchCount(){
        if(isset($this->primaryKey)){
            $this->update($this->table, ['views'=>'views+1'], $this->primaryKey)->execut();
        }
        
    }
}