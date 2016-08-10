<?php

    namespace App\Http\Controllers\Shell;

    class ShellConnect
    {
        public function buildShellConn( $siteData )
        {
            try{

                if( !$conn = ssh2_connect( $siteData['ip'] , 22 ) ){
                    throw new \Exception( 'Cannot get connection to server at ' . $siteData['ip'] );
                }

                if( !ssh2_auth_password( $conn , $siteData['user'] , $siteData['password'] ) ){
                    throw new \Exception( 'Authentication failed for ' . $siteData['ip'] );
                }

            }catch( \Exception $e ){

                ShellLogger::error( print_r( $e , true ) );
                return false;
            }

            return $conn;
        }

    }