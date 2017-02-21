<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeAssessment extends Model
{
    //
    public function client()
    {
        return $this::belongsTo('\App\Client','client_id');
    }
}
