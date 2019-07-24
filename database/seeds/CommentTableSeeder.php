<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'title' => 'درباره محصول',
                'body' => 'سلام خوبی؟',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'title' => 'تشکر',
                'body' => 'مرسی خوبم',
                'created_at' => \Carbon\Carbon::now()->addDay(1),
                'updated_at' => \Carbon\Carbon::now()->addDay(1),
            ],
        ];

        DB::table('comments')->insert($array);
    }
}
