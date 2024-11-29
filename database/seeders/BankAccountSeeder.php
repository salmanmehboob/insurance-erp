<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bankAccounts = [
            [
                'account_holder_name' => 'John Doe',
                'account_number' => '1234567890',
                'bank_name' => 'Bank of America',
                'branch_name' => 'New York Branch',
                'ifsc_code' => 'BOFAUS3N',
                'account_type' => 'Savings',
                'is_active' => true,
            ],
            [
                'account_holder_name' => 'Jane Smith',
                'account_number' => '0987654321',
                'bank_name' => 'Wells Fargo',
                'branch_name' => 'San Francisco Branch',
                'ifsc_code' => 'WFBIUS6S',
                'account_type' => 'Current',
                'is_active' => true,
            ],
            [
                'account_holder_name' => 'Alice Johnson',
                'account_number' => '1122334455',
                'bank_name' => 'Chase Bank',
                'branch_name' => 'Los Angeles Branch',
                'ifsc_code' => 'CHASUS33',
                'account_type' => 'Savings',
                'is_active' => false,
            ],
        ];

        foreach ($bankAccounts as $account) {
            BankAccount::firstOrCreate([
                'account_number' => $account['account_number'],
            ], $account);
        }
    }
}
