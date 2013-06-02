<?php


class BaseModelResponse {

    protected $model;

    protected $notifications;


    public function __construct()
    {
        $this->model = null;
        $this->notifications = array();
    }


    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getNotifications($type)
    {
        if(!isset($this->notifications[$type]))
            return null;

        return $this->notifications[$type];
    }

    public function addNotifications($type, $notifications)
    {
        if(!isset($this->notifications[$type]))
            $this->notifications[$type] = array();

        $this->notifications[$type] = array_merge($this->notifications[$type], $notifications);
    }


    public function isSuccessful()
    {
        return !isset($this->notifications['error']) || empty($this->notifications['error']);
    }

    public function isUnsuccessful()
    {
        return !$this->isSuccessful();
    }
}
