<?php

namespace App\Models;

use App\Traits\PostalCode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Traitを使う
    use PostalCode;

    protected $table = 'clients';
    protected $guarded = [];

    /**
     * 会社名で絞り込むクエリスコープ
     *
     * @param Builder $query
     * @param string|null $company_name
     * @return Builder
     */
    public function scopeNameIs(Builder $query, ?string $company_name) :Builder { // きちんと型宣言する
        // ガード節を使うとネストが少なくて見やすい。
        // 空文字を扱うとややこしいのでnullを使う。
        if (is_null($company_name)) {
            return $query;
        }

        return $query->where('company_name', $company_name);
    }
}
