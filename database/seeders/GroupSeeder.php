<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::factory()->create(['title' => 'Group 1']);
        Group::factory()->create(['title' => 'Group 2', 'parent_id' => 1]);
        Group::factory()->create(['title' => 'Group 3']);
        Group::factory()->create(['title' => 'Group 4', 'parent_id' => 6]);
        Group::factory()->create(['title' => 'Group 5']);
        Group::factory()->create(['title' => 'Group 6', 'parent_id' => 5]);
    }
}
