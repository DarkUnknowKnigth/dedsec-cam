<?php
use App\Type;
use App\Crime;
use App\Place;
use App\Criminal;
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
        $place = Place::create([
            'id'=>1,
            'address'=>'1ra. norte poniente colonia teran',
            'longitude'=>'-1.02',
            'latitude'=>'1.20'
        ]);
        $criminal = Criminal::create([
            'name'=>'El rocko',
            'sex'=>0,
            'characteristics'=>'Llevaba una gorra y unos lentes negros deportivos, saco una navaja y nos amagó',
            'imagePath'=>'/image/l.jpg'
        ])->places()->attach($place->id,['date'=>Carbon\Carbon::now()]);
        $crimina2 = Criminal::create([
            'name'=>'el julian',
            'sex'=>0,
            'characteristics'=>'Iba drogado con una playera rota',
            'imagePath'=>'/image/l2.jpg'
        ])->places()->attach($place->id,['date'=>Carbon\Carbon::now()]);
        Crime::create([
            'date'=>\Carbon\Carbon::now(),
            'establishment'=>'OXXO',
            'gun'=>'Navaja',
            'vehicle'=>0,
            'type_id'=>1,
            'scene_id'=>null,
        ]);
    }
}
