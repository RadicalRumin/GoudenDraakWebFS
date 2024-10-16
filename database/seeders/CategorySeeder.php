<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=>'Soep']);
        Category::create(['name'=>'Voorgerechten']);
        Category::create(['name'=>'Bami en Nasi Gerechten']);
        Category::create(['name'=>'Combinatie Gerechten (met witte rijst)']);
        Category::create(['name'=>'Mihoen gerechten']);
        Category::create(['name'=>'Chinese bami gerechten']);
        Category::create(['name'=>'Indische Gerechten']);
        Category::create(['name'=>'Eiergerechten (met witte rijst)']);
        Category::create(['name'=>'Groenten Gerechten (met witte rijst)']);
        Category::create(['name'=>'Vlees Gerechten (met witte rijst )']);
        Category::create(['name'=>'Kip Gerechten (met witte rijst)']);
        Category::create(['name'=>'Garnalen Gerechten (met witte rijst)']);
        Category::create(['name'=>'Ossenhaas Gerechten (met witte rijst)']);
        Category::create(['name'=>'Vissen Gerechten (met witte rijst)']);
        Category::create(['name'=>'Peking eend Gerechten (met witte rijst)']);
        Category::create(['name'=>'Tiepan Specialiteiten (met witte rijst)']);
        Category::create(['name'=>'Vegetarische Gerechten (met witte rijst)']);
        Category::create(['name'=>'Kindermenus']);
        Category::create(['name'=>'Rijsttafels']);
    }
}
