<?php

/* Controller Listesini Alıyoruz */
    function getControllerList() {
        $t = get_instance();

        $controllers = array();
        $t->load->helper("file");

        $files = get_dir_file_info(APPPATH."controllers",FALSE);

        foreach (array_keys($files) as $file) {
            if($file !=="index.html") {
                $controllers[] = strtolower(str_replace(".php","",$file));
            }
        }

        return $controllers;
    }
/* Controller Listesini Alıyoruz */

?>