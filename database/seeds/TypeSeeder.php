<?php
use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name'=>"Asalto con navaja",
            'id'=>1,
        ]);
        Type::create([
            'name'=>"Asalto con arma de fuego",
            'id'=>2,
        ]);
        Type::create([
            'name'=>"Asalto con violencia fisica",
            'id'=>3,
        ]);
        Type::create([
            'name'=>"Robo a casa habitacion",
            'id'=>4,
        ]);
    }
}
