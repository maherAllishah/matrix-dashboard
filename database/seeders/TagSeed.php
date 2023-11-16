<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::query()->create(['tag_name' => 'css']);
        Tag::query()->create(['tag_name' => 'html']);
        Tag::query()->create(['tag_name' => 'bootstrap']);
        Tag::query()->create(['tag_name' => 'vue']);
        Tag::query()->create(['tag_name' => 'js']);
    }
}
