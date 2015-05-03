<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 2/5/2015
 * Time: 9:57 μμ
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimController extends Controller {

    public function mirror(Request $request)
    {
        $input = $request->json()->all();

        return $input;
    }

}