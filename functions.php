<?php
require('config.php');

includeAllPHPFiles(dirname( __FILE__ ) ."/inc/setup");
includeAllPHPFiles(dirname( __FILE__ ) ."/inc/CPT");
includeAllPHPFiles(dirname( __FILE__ ) ."/inc/customize");
includeAllPHPFiles(dirname( __FILE__ ) ."/inc/ajax");

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
