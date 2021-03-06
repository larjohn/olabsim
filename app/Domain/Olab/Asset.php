<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 12/5/2015
 * Time: 8:35 ��
 */

namespace OlabSim\Domain\Olab;


use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property  height
 * @property  width
 * @property  height
 * @property  z
 * @property  y
 * @property  x
 */
class Asset extends \Eloquent{
    protected $fillable = ["guid", "name", "is_environment", "parent_environment_guid", "width","height","length","x","y","z"];
    public static function create(array $attributes){
        $asset = parent::create($attributes);



        if(isset($attributes["size"])){
            $asset->height= $attributes["size"]["height"];
            $asset->width= $attributes["size"]["width"];
            $asset->length= $attributes["size"]["length"];
        }
        if(isset($attributes["position"])){
            $asset->x= $attributes["position"]["x"];
            $asset->y= $attributes["position"]["y"];
            $asset->z= $attributes["position"]["z"];
        }

        $asset->save();

    }

}