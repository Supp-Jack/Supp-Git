<?php

    namespace App\Http\Controllers\Shell;

    class ShellInterface
    {
        private $conn;

        public function __construct( $siteData )
        {
            $this->conn = ( new ShellConnect() )->buildShellConn( $siteData );
        }

        public function exec( $command )
        {
            $this->logShell( $command , 'Input' );

            $stream = ssh2_exec( $this->sshConn , $command );

            stream_set_blocking( $stream , true );

            $output = stream_get_contents( ssh2_fetch_stream( $stream , SSH2_STREAM_STDIO ) );
            $error  = stream_get_contents( ssh2_fetch_stream( $stream , SSH2_STREAM_STDERR ) );

            $this->logShell( print_r( array( 'output' => $output , 'error' => $error ) , true ) , 'Output' );

            return ( strlen( $output ) > strlen( $error ) )? $output : $error;
        }

    }