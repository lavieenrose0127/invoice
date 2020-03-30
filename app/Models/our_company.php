<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class our_company extends Model
{
    //
    protected $table = 'our_company';
    protected $guarded = [];

    public static function our_company(){
        $model = new our_company();
        return $model->get();
    }


    /**
     * 郵便番号を成形して返す
     * @return string
     */
    public function moldPostalcode(){
        return substr( $this->postal_code, 0, 3 ) . '-' . substr( $this->postal_code, 3 );
    }
}
