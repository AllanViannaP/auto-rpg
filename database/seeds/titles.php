<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class titles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents('app/DBSeeds/titles.txt');
        $save  =  explode(';',$sql);
        error_log($sql);
        foreach ($save as $holder) {
            $sv  =  explode(',',$holder);
            $sv[0] = preg_replace('/\n/', '', $sv[0]);
            DB::table('user_titles')
            ->insert([
                'title' => $sv[0],
                'order' => $sv[1],
            ]);
        }




    }
}
