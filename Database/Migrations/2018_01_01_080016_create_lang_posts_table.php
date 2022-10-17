<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7c8dc60 (.)
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
<<<<<<< HEAD
// --- models --
=======
//--- models --
>>>>>>> e07d6f0 (.)
=======
//--- models --
>>>>>>> 1242904 (.)
use Modules\Lang\Models\Post;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePostsTable.
 */
class CreateLangPostsTable extends XotBaseMigration
{
    protected ?string $model_class = Post::class;

    /**
     * db up.
     *
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function up() {
<<<<<<< HEAD
        // -- CREATE --
=======
=======
    public function up()
    {
>>>>>>> f7ae34c (.)
        //-- CREATE --
>>>>>>> e07d6f0 (.)
=======
    public function up()
    {
        //-- CREATE --
>>>>>>> 1242904 (.)
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->nullableMorphs('post');
                $table->string('lang', 2)->nullable();
                $table->string('title')->nullable()->index();
                $table->string('subtitle')->nullable();
                $table->string('guid')->index()->nullable();
                $table->text('txt')->nullable();
                $table->string('image_src')->nullable();
                $table->string('image_alt')->nullable();
                $table->string('image_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->integer('author_id')->nullable();
                $table->timestamps();
            }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        );

        // -- UPDATE --
=======
            );
=======
        );
>>>>>>> f7ae34c (.)

        //-- UPDATE --
>>>>>>> e07d6f0 (.)
=======
        );

        //-- UPDATE --
>>>>>>> 1242904 (.)
        $this->tableUpdate(
            function (Blueprint $table) {
                // if (!$this->hasColumn( 'post_type')) {
                //     $table->string('post_type', 40)->after('type')->index()->nullable();
                // }
<<<<<<< HEAD
<<<<<<< HEAD
                // Class 'Doctrine\DBAL\Driver\PDOMySql\Driver' not found
=======
                //Class 'Doctrine\DBAL\Driver\PDOMySql\Driver' not found
>>>>>>> e07d6f0 (.)
=======
                //Class 'Doctrine\DBAL\Driver\PDOMySql\Driver' not found
>>>>>>> 1242904 (.)
                /*
                $schema_builder = Schema::getConnection()
                    ->getDoctrineSchemaManager()
                    ->listTableDetails($table->getTable());

                if (! $schema_builder->hasIndex($this->getTable().'_'.'guid'.'_index')) {
                    $table->string('guid', 100)->index()->change();
                }
                */
                if (! $this->hasColumn('guid')) {
                    $table->string('guid')->nullable();
                }
                if (! $this->hasColumn('category_id')) {
                    $table->integer('category_id')->nullable();
                }
                if (! $this->hasColumn('author_id')) {
                    $table->integer('author_id')->nullable();
                }
                if (! $this->hasColumn('subtitle')) {
                    $table->string('subtitle')->nullable();
                }
                if (! $this->hasColumn('image')) {
                    $table->string('image')->nullable();
                }
                if (! $this->hasColumn('image_alt')) {
                    $table->string('image_alt')->nullable();
                }
                if (! $this->hasColumn('image_title')) {
                    $table->string('image_title')->nullable();
                }
                if (! $this->hasColumn('meta_description')) {
                    $table->text('meta_description')->nullable();
                }
                if (! $this->hasColumn('meta_keywords')) {
                    $table->text('meta_keywords')->nullable();
                }
                if (! $this->hasColumn('content')) {
                    $table->text('content')->nullable();
                }
                if (! $this->hasColumn('published')) {
                    $table->boolean('published')->nullable();
                }
                if (! $this->hasColumn('created_by')) {
                    $table->string('created_by')->nullable();
                }
                if (! $this->hasColumn('updated_by')) {
                    $table->string('updated_by')->nullable();
                }

                if (! $this->hasColumn('url')) {
                    $table->string('url')->nullable();
                }
                if (! $this->hasColumn('url_lang')) {
                    $table->text('url_lang')->nullable();
                }
                if (! $this->hasColumn('image_resize_src')) {
                    $table->text('image_resize_src')->nullable();
                }
                if (! $this->hasColumn('linked_count')) {
                    $table->text('linked_count')->nullable();
                }
                if (! $this->hasColumn('related_count')) {
                    $table->text('related_count')->nullable();
                }
                if (! $this->hasColumn('relatedrev_count')) {
                    $table->text('relatedrev_count')->nullable();
                }
                if (! $this->hasColumn('linkable_type')) {
                    $table->string('linkable_type', 20)->index()->nullable();
                }
                if (! $this->hasColumn('post_type')) {
                    $table->string('post_type', 40)->index()->nullable();
                }

                if (! $this->hasColumn('views_count')) {
<<<<<<< HEAD
<<<<<<< HEAD
                    $table->integer('views_count')->nullable(); // contatore di visualizzazioni
=======
                    $table->integer('views_count')->nullable(); //contatore di visualizzazioni
>>>>>>> e07d6f0 (.)
=======
                    $table->integer('views_count')->nullable(); //contatore di visualizzazioni
>>>>>>> 1242904 (.)
                }

                if (! $this->hasColumn('user_id')) {
                    $table->integer('user_id')->nullable()->after('id');
                }

<<<<<<< HEAD
<<<<<<< HEAD
                // ------- CHANGE INDEX-------

                // Doctrine\DBAL\Driver\PDOMySql\Driver
=======
                //------- CHANGE INDEX-------

                //Doctrine\DBAL\Driver\PDOMySql\Driver
>>>>>>> e07d6f0 (.)
=======
                //------- CHANGE INDEX-------

                //Doctrine\DBAL\Driver\PDOMySql\Driver
>>>>>>> 1242904 (.)
                /*
                $schema_builder = Schema::getConnection()
                    ->getDoctrineSchemaManager()
                    ->listTableDetails($table->getTable());

                if (! $schema_builder->hasIndex($this->getTable().'_'.'post_id'.'_index')) {
                    $table->integer('post_id')->nullable()->index()->change();
                }
                // if (!$schema_builder->hasIndex($this->getTable().'_'.'type'.'_index')) {
                //     $table->string('type', 30)->nullable()->index()->change();
                // }
                if (! $schema_builder->hasIndex($this->getTable().'_'.'lang'.'_index')) {
                    $table->string('lang', 3)->nullable()->index()->change();
                }
                */
<<<<<<< HEAD
<<<<<<< HEAD
                // -------- CHANGE FIELD -------------
=======
                //-------- CHANGE FIELD -------------
>>>>>>> e07d6f0 (.)
=======
                //-------- CHANGE FIELD -------------
>>>>>>> 1242904 (.)
                $table->text('subtitle')->nullable()->change();
            }
        );
    }

<<<<<<< HEAD
<<<<<<< HEAD
    // end up

    // end down
}// end class
=======
=======
>>>>>>> 1242904 (.)
    //end up

    //end down
}//end class
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e07d6f0 (.)
=======
>>>>>>> 1242904 (.)
=======
=======
>>>>>>> b2f15d7 (.)
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//--- models --
use Modules\Lang\Models\Post;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePostsTable.
 */
class CreateLangPostsTable extends XotBaseMigration
{
    protected ?string $model_class = Post::class;

    /**
     * db up.
     *
     * @return void
     */
    public function up()
    {
        //-- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->nullableMorphs('post');
                $table->string('lang', 2)->nullable();
                $table->string('title')->nullable()->index();
                $table->string('subtitle')->nullable();
                $table->string('guid')->index()->nullable();
                $table->text('txt')->nullable();
                $table->string('image_src')->nullable();
                $table->string('image_alt')->nullable();
                $table->string('image_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->integer('author_id')->nullable();
                $table->timestamps();
            }
        );

        //-- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                // if (!$this->hasColumn( 'post_type')) {
                //     $table->string('post_type', 40)->after('type')->index()->nullable();
                // }
                //Class 'Doctrine\DBAL\Driver\PDOMySql\Driver' not found
                /*
                $schema_builder = Schema::getConnection()
                    ->getDoctrineSchemaManager()
                    ->listTableDetails($table->getTable());

                if (! $schema_builder->hasIndex($this->getTable().'_'.'guid'.'_index')) {
                    $table->string('guid', 100)->index()->change();
                }
                */
                if (! $this->hasColumn('guid')) {
                    $table->string('guid')->nullable();
                }
                if (! $this->hasColumn('category_id')) {
                    $table->integer('category_id')->nullable();
                }
                if (! $this->hasColumn('author_id')) {
                    $table->integer('author_id')->nullable();
                }
                if (! $this->hasColumn('subtitle')) {
                    $table->string('subtitle')->nullable();
                }
                if (! $this->hasColumn('image')) {
                    $table->string('image')->nullable();
                }
                if (! $this->hasColumn('image_alt')) {
                    $table->string('image_alt')->nullable();
                }
                if (! $this->hasColumn('image_title')) {
                    $table->string('image_title')->nullable();
                }
                if (! $this->hasColumn('meta_description')) {
                    $table->text('meta_description')->nullable();
                }
                if (! $this->hasColumn('meta_keywords')) {
                    $table->text('meta_keywords')->nullable();
                }
                if (! $this->hasColumn('content')) {
                    $table->text('content')->nullable();
                }
                if (! $this->hasColumn('published')) {
                    $table->boolean('published')->nullable();
                }
                if (! $this->hasColumn('created_by')) {
                    $table->string('created_by')->nullable();
                }
                if (! $this->hasColumn('updated_by')) {
                    $table->string('updated_by')->nullable();
                }

                if (! $this->hasColumn('url')) {
                    $table->string('url')->nullable();
                }
                if (! $this->hasColumn('url_lang')) {
                    $table->text('url_lang')->nullable();
                }
                if (! $this->hasColumn('image_resize_src')) {
                    $table->text('image_resize_src')->nullable();
                }
                if (! $this->hasColumn('linked_count')) {
                    $table->text('linked_count')->nullable();
                }
                if (! $this->hasColumn('related_count')) {
                    $table->text('related_count')->nullable();
                }
                if (! $this->hasColumn('relatedrev_count')) {
                    $table->text('relatedrev_count')->nullable();
                }
                if (! $this->hasColumn('linkable_type')) {
                    $table->string('linkable_type', 20)->index()->nullable();
                }
                if (! $this->hasColumn('post_type')) {
                    $table->string('post_type', 40)->index()->nullable();
                }

                if (! $this->hasColumn('views_count')) {
                    $table->integer('views_count')->nullable(); //contatore di visualizzazioni
                }

                if (! $this->hasColumn('user_id')) {
                    $table->integer('user_id')->nullable()->after('id');
                }

                //------- CHANGE INDEX-------

                //Doctrine\DBAL\Driver\PDOMySql\Driver
                /*
                $schema_builder = Schema::getConnection()
                    ->getDoctrineSchemaManager()
                    ->listTableDetails($table->getTable());

                if (! $schema_builder->hasIndex($this->getTable().'_'.'post_id'.'_index')) {
                    $table->integer('post_id')->nullable()->index()->change();
                }
                // if (!$schema_builder->hasIndex($this->getTable().'_'.'type'.'_index')) {
                //     $table->string('type', 30)->nullable()->index()->change();
                // }
                if (! $schema_builder->hasIndex($this->getTable().'_'.'lang'.'_index')) {
                    $table->string('lang', 3)->nullable()->index()->change();
                }
                */
                //-------- CHANGE FIELD -------------
                $table->text('subtitle')->nullable()->change();
            }
        );
    }

    //end up

    //end down
}//end class
<<<<<<< HEAD
>>>>>>> cfb7936 (.)
=======
>>>>>>> b2f15d7 (.)
=======
>>>>>>> 7c8dc60 (.)
