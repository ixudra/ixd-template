<?php


class TranslationHelper {

    public function translateMessage($message)
    {
        $pos = strpos($message, '.');
        $model = substr($message, 0, $pos);

        if( Lang::has( 'models.'. $model .'.singular' ) ) {
            return $this->translateModel($message);
        }

        return Lang::get($message);
    }

    public function translateModel($message)
    {
        $pos = strpos($message, '.');
        $model = substr($message, 0, $pos);
        $key = substr($message, $pos+1);

        return Lang::get('model.'.$key, array(
                'model'         => Lang::get('models.'. $model .'.singular'),
                'article'       => ucfirst( Lang::get('models.'. $model .'.article') ),
            )
        );
    }

    public function translateRecursive($message, $attributes = array(), $ucFirst = true)
    {
        $translation = Lang::get($message);
        if( !Lang::has( $message ) ) {
            return $message;
        }

        foreach( $attributes as $key => $value ) {
            $translation = str_replace( ':'. $key, $value, $translation );
        }

        $matches = array();
        preg_match_all('/##([a-zA-Z\.]*)##/', $translation, $matches);

        $results = array();
        foreach( $matches[1] as $match ) {
            $results[ $match ] = lang::get( $match );
        }

        foreach( $results as $key => $value ) {
            $translation = str_replace( '##'. $key .'##', $value, $translation );
        }

        if( $ucFirst ) {
            $translation = ucfirst( $translation );
        }

        return $translation;
    }

}