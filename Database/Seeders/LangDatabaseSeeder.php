<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Lang\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class LangDatabaseSeeder extends Seeder {
=======
namespace Modules\Lang\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LangDatabaseSeeder extends Seeder
{
>>>>>>> 13065fd (.)
    /**
     * Run the database seeds.
     *
     * @return void
     */
<<<<<<< HEAD
    public function run() {
=======
    public function run()
    {
>>>>>>> 13065fd (.)
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
