<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::factory()->create(['title' => 'Account Head 1', 'group_id' => 2, 'debit' => 50, 'credit' => 30]);
        Account::factory()->create(['title' => 'Account Head 2', 'group_id' => 2, 'debit' => 50, 'credit' => 35]);
        Account::factory()->create(['title' => 'Account Head 3', 'group_id' => 3, 'debit' => 50, 'credit' => 10]);
        Account::factory()->create(['title' => 'Account Head 4', 'group_id' => 1, 'debit' => 60, 'credit' => 30]);
        Account::factory()->create(['title' => 'Account Head 5', 'group_id' => 1, 'debit' => 50, 'credit' => 30]);
        Account::factory()->create(['title' => 'Account Head 6', 'group_id' => 4, 'debit' => 10, 'credit' => 5]);
        Account::factory()->create(['title' => 'Account Head 7', 'group_id' => 4, 'debit' => 20, 'credit' => 10]);
        Account::factory()->create(['title' => 'Account Head 8', 'group_id' => 5, 'debit' => 30, 'credit' => 15]);
        Account::factory()->create(['title' => 'Account Head 9', 'group_id' => 1, 'debit' => 70, 'credit' => 10]);
        Account::factory()->create(['title' => 'Account Head 10', 'group_id' => 1, 'debit' => 90, 'credit' => 10]);
        Account::factory()->create(['title' => 'Account Head 11', 'group_id' => 5, 'debit' => 30, 'credit' => 15]);
    }
}
