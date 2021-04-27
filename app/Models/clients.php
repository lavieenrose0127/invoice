<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * モデル名は Model(先頭大文字単数形)がLaravelのお作法
 * 基本的にモデル内で自分自身をnewすることはないかな・・・
 *  $A = Class::find(1);
 *  $B = Class::find(2);
 * みたいな感じで外で使うかself::find()みたいな
 * QueryScopeとかAccessorとかTraitを使うと捗る
 * https://readouble.com/laravel/5.5/ja/eloquent.html のローカルスコープ項目
 * https://readouble.com/laravel/5.5/ja/eloquent-mutators.html アクセサ
 * https://note.com/watarunakayama/n/n4fb2794c3514 トレイト
 */
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
    }

    public static function clientsByName(){
        $model = new clients();
        return $model
            ->select('company_name')
            ->get();
    }

    /**
     * 入力内容をjson形式にして保存する
     * @param array Request
     *
     */
    public static function addJsonformContent( $inputs ){
        var_dump( json_encode( $inputs ) );

        $company_name = $inputs['cmpName'];
        DB::table('clients')
            ->where( 'company_name', '=', $company_name ) // uodate対象はidとか確実にユニークなもので判定したい
            ->update( [
                'formContent' => json_encode( $inputs )
            ] );

        // ↓ こう書くとシンプルかつカプセル化がイメージしやすい
        // self::find($id)->fill($inputs)->update();
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
