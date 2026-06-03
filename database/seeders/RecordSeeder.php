<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void{
       for($i=1;$i<=100;$i++){
            Record::create([
                'file_number'=>'FILE-'.$i,
                'manager_name'=>'Manager '.$i,
                'service_provider_name'=>'Provider '.$i,
                'claim_number'=>'CLM-'.$i,
                'assignment_id'=>'ASN-'.$i,
                'company_name'=>'Company '.$i,
                'invoice_date'=>now(),
                'expenses'=>rand(100,1000),
                'sale_tax'=>rand(50,500),
                'payment_amount'=>rand(1000,5000),
                'balance_amount'=>rand(100,1000),
                'payment_date'=>now(),
                'loss_amount'=>rand(1000,10000),
            ]);
    }
    }
}
