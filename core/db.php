<?php
class Db
{
    private static $DB_INSTANCE = null;

    public static function getDbInstance()
    {
        if (is_null(self::$DB_INSTANCE)) {
            self::$DB_INSTANCE = new PDO(
                "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME,
                Config::DB_USER,
                Config::DB_PASSWORD
            );
            self::$DB_INSTANCE->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$DB_INSTANCE;
    }
}
