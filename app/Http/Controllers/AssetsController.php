<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 12/5/2015
 * Time: 8:37 μμ
 */

namespace OlabSim\Http\Controllers;


use Illuminate\Http\Request;
use OlabSim\Domain\Olab\Asset;


class AssetsController extends Controller {

    public function saveNew(Request $request)
    {
        $input = $request->json()->all();

        Asset::create($input);

        return $input;
    }

    public function getByGuid($guid){
        return Asset::where("guid", $guid)->get();
    }
}