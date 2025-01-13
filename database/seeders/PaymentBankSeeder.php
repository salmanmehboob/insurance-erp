<?php

namespace Database\Seeders;

use App\Models\PaymentBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bankAccounts = [
            [
                'bank_name' => 'Bank 01',
                'account_type' =>  'Checking Account',
                'current_balance' => '321',
                'current_check' => '23',
                'location' => 1,
            ],

        ];

        foreach ($bankAccounts as $account) {
            PaymentBank::firstOrCreate([
                'bank_name' => $account['bank_name'],
            ], $account);
        }
    }
}
