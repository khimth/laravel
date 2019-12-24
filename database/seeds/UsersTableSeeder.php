<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Khim Thapa',
            'email' => 'khim.thapa@outlook.com',
            'password' => bcrypt('9801150198'),
            'admin' => 1
        ]);

        App\Profile::create(
            [
                'user_id' => $user->id,
                'avatar' => 'uploads/avatars/21372076.jpg',
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper lectus vitae mattis interdum. Maecenas dapibus in nisl mattis bibendum.
                Donec tincidunt diam id libero molestie bibendum. Praesent eget diam ante. Aenean sagittis metus at tempor aliquet.
                Suspendisse nisi turpis, volutpat vitae nunc tempus, convallis fermentum leo.
                Aliquam vehicula blandit magna id tincidunt. Nullam cursus tincidunt rhoncus.
                Nullam placerat tortor quis nisl egestas, id ultricies ex porttitor.
                Duis in commodo erat, sit amet efficitur augue. Vestibulum enim sem, dictum non mauris vel, ultricies tincidunt eros.
                Nam sit amet ultrices felis. Pellentesque rutrum pellentesque augue non fermentum. Nam euismod augue leo, sit amet lobortis sem molestie ut.',
                'facebook' => 'https://www.facebook/khimnth',
                'youtube' => 'https://www.youtube.com/sanokta'
            ]
        );
    }
}
