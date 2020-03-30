<?php

use Illuminate\Database\Seeder;

class ourcompany extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = \Carbon\Carbon::now();
        $ourCompany = [
                'company_name' => '株式会社本社' ,
                'postal_code' => '5608532' ,
                'address1' => '大阪府' ,
                'address2' => '豊中市' ,
                'address3' => '待兼山町1-5' ,
                'ceo_name' => '高橋史朗' ,
        ];

        DB::table('our_company')->insert($ourCompany);
    }
}
