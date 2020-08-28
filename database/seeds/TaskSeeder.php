<?php
use App\Model;
use Illuminate\Database\Seeder;
use App\Models;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 10)->create();
    }
}
