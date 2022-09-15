<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // remove all data in table product
        Product::truncate();
        $faker = \Faker\Factory::create();
        for ($i= 1; $i<=10; $i++) {
            $data = $this->file_get_contents_curl('http://placekitten.com/400/300');
            $image = rand(0, 99999).'logo.png';
            $output = 'public/img/'.$image;
            file_put_contents( $output, $data );
            Product::create([
                //'phrase'=> $faker->sentence,
                'name' => $faker->word,
                'category_id' => Category::all()->random()->id,
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 0, 100),
                'image' => $image
                //'image' => $faker->imageUrl(800,600)
                //'image' => $faker->image('public/img', 360, 360, NULL, true, true, NULL, false)
            ]);
        }
    }

    function file_get_contents_curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
