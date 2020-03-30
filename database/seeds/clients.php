<?php

use Illuminate\Database\Seeder;

class clients extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        for( $i = 1; $i <= 3; $i ++ ){
            $client = [
                'company_name' => '株式会社' . $i ,
                'postal_code' => '5600043' ,
                'address1' => '大阪府' ,
                'address2' => '豊中市' ,
                'address3' => '待兼山町1-6' ,
                'ceo_name' => '高田仁' ,
            ];
        
            DB::table('clients')->insert($client);
        }
    }
}
