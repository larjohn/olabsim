<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 12/5/2015
 * Time: 8:37 μμ
 */

namespace OlabSim\Http\Controllers;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OlabSim\Domain\Olab\Asset;


class AssetsController extends Controller {

    public function saveNew(Request $request)
    {
        $input = $request->json()->all();
        try{
            Asset::create($input);

            return $input;
        }
        catch (QueryException $qex) {
            return (new Response(["error"=>$qex->getMessage()], 409))
                ->header('Content-Type', "application/json");

        }



    }

    public function getByGuid($guid){
        try{
            return Asset::where("guid", $guid)->firstOrFail();
        }
        catch(ModelNotFoundException $mdlnfex){
            return (new Response(["error"=>$mdlnfex->getMessage()], 404))
                ->header('Content-Type', "application/json");

        }
    }

    public function getAll(){

        $query = Asset::query();

        foreach(\Input::all() as $param=>$value){
            $query->where($param,$value);
        }

        return $query->get();
    }




    public function updateByGuid($guid, Request $request){
        try{
            $input = $request->json()->all();
            $asset = Asset::where("guid", $guid)->firstOrFail();
            $asset->update($input);
            return $input;
        }
        catch(ModelNotFoundException $mdlnfex){
            return (new Response(["error"=>$mdlnfex->getMessage()], 404))
                ->header('Content-Type', "application/json");

        }


    }
}