<?php
class Msg {

    private $message;

    static public function messageHalt($text, $class = "")
    {
        exit (Msg::message($text, $class));
    }

    static public function message($text, $class){
        return "<span class=\"$class\">$text</span>";
    }

    static public function messageRaw($text){
        return $text;
    }

}