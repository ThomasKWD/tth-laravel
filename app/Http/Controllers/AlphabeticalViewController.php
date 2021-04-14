<?php
namespace App\Http\Controllers;

class AlphabeticalViewController extends Controller
{

    /**
     * all letters except x,y
     * 
     * just a helper, could also be loop
     * , better move to app\Helpers\AlphabeticalHelper
     * 
     */
    public static function generateListOfLetters() : array {
        return ['A', 'B', 'C','D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'Z'];
    }
}
?>