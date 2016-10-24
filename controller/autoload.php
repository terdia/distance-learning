<?php 
function __autoload($classname){
        $folders = array(
            'model/',
			'connection/',
			'../connection/'
        );

            foreach($folders as $folder){
                if(file_exists($folder.$classname. '.php')){
                    require_once($folder.$classname. '.php');
                    return;
                }
        }
    }
