<?php

use Faker\Provider\zh_CN\Payment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // galio/assets/img/slider/slider3_bg2.jpg
        // $this->call(UserSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(PaymentPlatformSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(PermissionsTableSeeder::class);
        
        $this->call(PrinterTableSeeder::class);
        $this->call(BusinessTableSeeder::class);

        
        factory(App\Slider::class, 3)->create()->each(function ($slider){
            $slider->image()->save(factory(App\Image::class)->make());
        });

        factory(App\SocialMedia::class, 5)->create();



        factory(App\Tag::class, 10)->create();
        factory(App\Category::class, 9)->create();
        factory(App\Category::class, 20)->states('withParent')->create();
        factory(App\Category::class, 40)->states('withParentSubcategory')->create();

        factory(App\Promotion::class, 20)->create();

        factory(App\Provider::class, 10)->create();
        factory(App\Guest::class, 10)->create();
        factory(App\Product::class, 24)->create()->each(function ($product){
            $product->tags()->attach($this->array(rand(1,10)));
            $product->promotions()->attach($this->array(rand(1,20)));
            $product->images()->saveMany(factory(App\Image::class, 4)->make());
        });

        factory(App\Brand::class, 8)->create()->each(function ($brand){

            $brand->image()->save(factory(App\Image::class)->make());
        });

    }

    public function array($max){
        $values = [];

        for ($i=1; $i < $max; $i++){
            $values[] = $i;
        }

        return $values;
    }
}
