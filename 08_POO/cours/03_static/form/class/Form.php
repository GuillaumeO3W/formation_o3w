<?php 


class Form {

    public static $class = 'form-control';

    public static function label($for, $labelName){
        return '<p><label for="'. $for .'">' . $labelName . '</label></p>';
    } 


    public static function input($id, $name, $type){

        return '<input type="'. $type . '" class="'. self::$class . '" id="'. $id . '" name="' . $name . '"> ';

    }

    public static function select($id, $name, $options){

        $htmlOptions = [];
        # self:: appel de léélement static
        $attributes = ' class="' . self::$class .'" id="' . $id .'" name="' . $name . '" ' ;

        foreach( $options as $key => $option){

            $htmlOptions[] = '<option value="' . $key .'">'. $option .'</option>'; 
            // $htmlOptions[] = '<option> value="' . $option .'">'. $option .'</option>'; 

        }

        return '<select ' . $attributes . ' >'. implode($htmlOptions) . '</select>';

    }

}