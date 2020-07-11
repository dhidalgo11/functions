/* this function return the jumps of directory with relation to an origin and file emisor request */
/*
*
* $url_to_search = obtengo el archivo que esta ralizando la peticion
* $origin = origen del projecto o raiz del projecto
* $position_origin = indice encontrado en la $url_to_search con relacion al $origin.
* $url_after_origin = selecciono la parte de la url despues del origen.
* $count_directorys = cantidad de subcarpertas del archivo que esta realizando la peticion para estos misma cantidad de subcarpetas retornarla en el $jumps.
* $jumps = string con los saltos necesarios para llegar a la carperta de origen del projecto
*
*/

function getGlobalPath($origin = "MMProject/") {
    $url_to_search = $_SERVER['SCRIPT_FILENAME'];  
    $position_origin = strrpos($url_to_search, $origin);
    $length_origin_name = strlen($origin) + 1;
    $url_after_origin = substr($url_to_search, ($position_origin + $length_origin_name) );    
    $count_directorys = substr_count($url_after_origin, '/');
    $jumps= '';
    if ($count_directorys > 0 && $count_directorys != '') {        
        $jumps = str_repeat('../',$count_directorys);
    }else{
        $jumps = './';
    }
    return $jumps;
}
