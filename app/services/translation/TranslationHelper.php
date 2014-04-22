<?php


class TranslationHelper {

    public function translateMessage($message)
    {
        return Lang::get($message);
    }

    public function translateModel($message)
    {
        $pos = strpos($message, '.');

        $model = substr($message, 0, $pos);
        $key = substr($message, $pos+1);

        return Lang::get('model.'.$key, array(
                'model'             => Lang::get('models.'. $model .'.singular'),
                'attribute'         => Lang::get('models.'. $model .'.attribute'),
            )
        );
    }

}