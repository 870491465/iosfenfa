<?php


namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hashids\Hashids;

class App extends Model
{
    use SoftDeletes;
    protected  $appends = ['url'];

    public function getUrlAttribute()
    {
        $hashids = new Hashids('', 6);

        $id = $hashids->encode($this->id);
        return env("APP_URL")."/app/".str_replace(' ','',$this->in_name)."/".self::generateVersion($this->in_bvs)."/".$id;
    }




    public static  function generateVersion($version)
    {
        return str_replace(".", "", $version);
    }

   
}