<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 2/5/2015
 * Time: 9:57 μμ
 */

namespace OlabSim\Http\Controllers;

use OlabSim\Http\Requests;
use OlabSim\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimController extends Controller {

    public function mirror(Request $request)
    {
        $input = $request->json()->all();

        return $input;
    }

}