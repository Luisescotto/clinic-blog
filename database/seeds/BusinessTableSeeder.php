<?php

use Illuminate\Database\Seeder;
use App\Business;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name' => 'Empresa x',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis nobis nostrum maxime deserunt cumque? Odio, distinctio est perspiciatis iusto, omnis officia dolore odit excepturi voluptatum itaque, consequuntur labore quia dolorum.',
            'logo' => '/image/logo.png',
            'email' => 'empresax@gmail.com',
            'address' => 'p sherman calle wallaby 42 sidney',
            'phone' => '+1 809-465-6216', 
            'contact_text' => 'Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.',
            'hours_of_operation' => 'Lunes - Sabado: 8:30 AM - 5:30 PM',
            'latitude' => '18.471154781596333',
            'length' => '-69.91111643021488', 
            'google_map_link' => 'https://g.page/TeatroNacionalRD',
        ]);
    }
}
