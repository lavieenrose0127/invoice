<?php
namespace App\Traits;

trait PostalCode
{
    /**
     * 郵便番号を成形して返す
     * @return string
     */
    public function moldPostalcode() :string {
        return substr( $this->postal_code, 0, 3 ) . '-' . substr( $this->postal_code, 3 );
    }
}
