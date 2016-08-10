<?php

    namespace App\Http\Controllers\Shell;

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    class ShellLogger
    {
        public static function error( $message )
        {
            Logger::pushHandler(new StreamHandler( storage_path() . '/logs/shell.log' ) );
            return Logger::error( $message );
        }

        public static function warning( $message )
        {
            Logger::pushHandler(new StreamHandler( storage_path() . '/logs/shell.log' ) );
            return Logger::warning( $message );
        }

        public static function info( $message )
        {
            Logger::pushHandler(new StreamHandler( storage_path() . '/logs/shell.log' ) );
            return Logger::addInfo( $message );
        }

    }