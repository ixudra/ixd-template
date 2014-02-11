<?php


interface InputHelperInterface {

    public function getDefaultInput();

    public function getInputForModel(BaseModel $model);

}
