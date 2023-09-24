<?php

includeAllPHPFiles(dirname( __FILE__ ) ."/inc/setup");

function includeAllPHPFiles($dir){
    foreach( glob( "$dir/*" ) as $path ){
        if ( preg_match( '/\.php$/', $path ) ) {
            if ( !preg_match( '/render/', $path ) ) {
                include $path;  // it's a PHP file so just require it
            }
        } elseif ( is_dir( $path ) ) {
            includeAllPHPFiles( $path );  // it's a subdir, so call the same function for this subdir
        }
    }
}
?>
