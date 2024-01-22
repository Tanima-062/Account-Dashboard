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
        $group1 = new Group();
        $group1->title = 'Group 1';
        $group1->save();

        $group2 = new Group();
        $group2->title = 'Group 2';
        $group2->parent()->associate($group1);
        $group2->save();

        $group3 = new Group();
        $group3->title = 'Group 3';
        $group3->save();

        $group5 = new Group();
        $group5->id = 5;
        $group5->title = 'Group 5';
        $group5->save();

        $group6 = new Group();
        $group6->id = 6;
        $group6->title = 'Group 6';
        $group6->parent()->associate($group5);
        $group6->save();

        $group4 = new Group();
        $group4->id = 4;
        $group4->title = 'Group 4';
        $group4->parent()->associate($group6);
        $group4->save();

        // Group::factory()->create(['title' => 'Group 1']);
        // Group::factory()->create(['title' => 'Group 2', 'parent_id' => 1]);
        // Group::factory()->create(['title' => 'Group 3']);
        // Group::factory()->create(['title' => 'Group 4', 'parent_id' => 6]);
        // Group::factory()->create(['title' => 'Group 5']);
        // Group::factory()->create(['title' => 'Group 6', 'parent_id' => 5]);
    }
}
