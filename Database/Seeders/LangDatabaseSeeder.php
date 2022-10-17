<<<<<<< HEAD
<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Lang\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class LangDatabaseSeeder extends Seeder {
=======
=======
>>>>>>> 1242904 (.)
namespace Modules\Lang\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LangDatabaseSeeder extends Seeder
{
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
    /**
     * Run the database seeds.
     *
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function run() {
=======
    public function run()
    {
>>>>>>> 13065fd (.)
=======
    public function run()
    {
>>>>>>> 1242904 (.)
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
=======
<?php

namespace Modules\Lang\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LangDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
>>>>>>> cfb7936 (.)
