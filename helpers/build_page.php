<?php
class BuildPage
{
    static $variables = [];

    public static function layoutSetData($data)
    {
        return self::$variables = array_merge(self::$variables, $data);
    }

    public static function requireMainContent($filename)
    {
        extract(self::$variables);
        require("./views/" . $filename . ".php");
    }

    public static function requireLayout($filename)
    {
        extract(self::$variables);
        require("./views/layouts/" . $filename . ".php");
    }
}
