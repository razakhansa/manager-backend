<?php
use App\Models\TodoProject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TodoProjectSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('path_to_your_json_file.json'));
        $data = json_decode($json, true);

        foreach ($data as $project) {
            TodoProject::create([
                'id' => $project['_id'],
                'title' => $project['title'],
            ]);
        }
    }
}
