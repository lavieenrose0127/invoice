<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    //
    protected $table = 'clients';
    protected $guarded = [];

    public static function clients(){
        $model = new clients();
        return $model->get();
    }

    public static function clientsByCmpName( $company_name = '' ){
        $model = new clients();
        $model = self::quaryCmpName( $model, $company_name );
        return $model->get();
        /*
        $quary = DB::table('clients');
        $quary = self::quaryCmpName( $quary, $company_name );
        return $quary->get();
        */
    }
    
    public static function clientsByName(){
        $model = new clients();
        return $model
            ->select('company_name')
            ->get();
    }

    /**
     * 検索条件：会社名（一致）
     * @param quary
     * @param string companyName 空文字列であれば検索文字列に含めない
     * @return void
     */
    private static function quaryCmpName( $quary, $company_name ){
        if( empty($company_name) !== true ){ 
            return $quary->where( 'company_name', '=', $company_name );
        }else{
            return $quary;
        }
    }

    /**
     * 郵便番号を成形して返す
     * @return string
     */
    public function moldPostalcode(){
        return substr( $this->postal_code, 0, 3 ) . '-' . substr( $this->postal_code, 3 );
    }
}
