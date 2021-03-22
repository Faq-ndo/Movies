<?php

use App\User;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        self::seedMovies();
        $this->command->info('The MOVIES table was initialized correctly');
        self::seedUsers();
        $this->command->info('The USERS table was initialized correctly');
    }

    private function seedUsers(){
        DB::Table('users')->delete();
        $u = new User;
        $u->name = 'admin';
        $u->password = bcrypt('admin1234');
        $u->email = 'admin@gmail.com';
        $u->save();
    }

    private function seedMovies(){
        DB::Table('movies')->delete();
        $client = new Client();
        try {
            $pages = [
                'page1' => $client->request('GET','https://api.themoviedb.org/3/movie/popular?api_key=efed2de890004fe9f130f519d64f7961&language=en-US&page=1'),
                'page2' => $client->request('GET','https://api.themoviedb.org/3/movie/popular?api_key=efed2de890004fe9f130f519d64f7961&language=en-US&page=2'),
                'page3' => $client->request('GET','https://api.themoviedb.org/3/movie/popular?api_key=efed2de890004fe9f130f519d64f7961&language=en-US&page=3'),
                'page4' => $client->request('GET','https://api.themoviedb.org/3/movie/popular?api_key=efed2de890004fe9f130f519d64f7961&language=en-US&page=4'),
                'page5' => $client->request('GET','https://api.themoviedb.org/3/movie/popular?api_key=efed2de890004fe9f130f519d64f7961&language=en-US&page=5'),
            ];
            foreach ($pages as $key => $page){
                $res = json_decode($page->getBody());
                foreach ($res->results as $_key => $movie){
                    $mov = new \App\Movie();
                    $mov->id = $movie->id;
                    $mov->title = $movie->original_title;
                    $mov->overview = $movie->overview;
                    $mov->year = $movie->release_date;
                    $mov->image = $movie->poster_path;
                    $mov->vote_average = $movie->vote_average;
                    $mov->save();
                }
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $this->command->info($e);
        }
    }
}
