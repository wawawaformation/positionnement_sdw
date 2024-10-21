<?php

/**
 * REtourne la liste des personnes (tableau d'objet)
 * @param string $path
 * @return array
 */
function getData(string $path): array
{
    $list = scandir($path);
    $personnes = [];

    foreach ($list as $item) {
        if ($item != '..' && $item != '.' && is_dir($path . '/' . $item)) {
            $personnes[] = $path . '/' . $item;
        }
    }

    $spl_list = [];

    foreach ($personnes as $personne) {
        $obj = new stdClass();

        $props = require_once $personne . '/index.php';
        foreach ($props as $key => $value) {
            $obj->$key = $value;
        }

        $spl_list[] = $obj;
    }

    return $spl_list;
}

//$path = __DIR__ . '/personnes';



