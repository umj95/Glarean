<?php
    /* Parses page display options passed by GET values into an array, returns array */
    function parseGETintoChapterOptions(){
        $chapterOptions = array();
        foreach($_GET as $key => $value) {
        $chapterOptions[$key] = $value;
        }
        return $chapterOptions;
    }

    /* converts $chapterOptions into a String */
    function parseOptionstoString($chapterOptions) {
        $passOptions = "";
        foreach($chapterOptions as $key => $option) {
            $name = $key;
            if(is_array($option)) {
                $subOptionList = array();
                foreach($option as $subOption) {
                array_push($subOptionList, $subOption);
                }
                $value = json_encode($subOptionList);
                $passOptions .= $name . "=" . "$value" . "; ";
            } else {
                $value = "$option";
                $passOptions .= $name . "=" . "\"$value\"" . "; ";
            }
        }
        return $passOptions;
    }
?>