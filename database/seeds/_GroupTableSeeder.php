<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = __('defaultDBData.defaultGroups');

        foreach ($data as $group) {
            $newGroup = new Group($group);
            $newGroup->save();
        }
    }
}
