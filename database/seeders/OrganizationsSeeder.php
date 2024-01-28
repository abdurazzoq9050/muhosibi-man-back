<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            [
                'title'=>'OOO AiWebCraft',
                'email'=>'aiwebcraft@gmail.com',
                'phone'=>'992928369050',
                'inn'=>'1234567890123',
                'kpp'=>'XZ',
                'tax_system'=>1,
                'legal_address'=>'Asd st.',
                'physic_address'=>'XZ st.',
                'owner_id'=> 1,
                'type'=>'WTF',
                'contacts'=>json_encode([ 'telegram'=>'aiweb' ]),
                'status'=>1,
            ]
        ];

        foreach($organizations as $organization){
            Organization::create($organization);
        }
    }
}
