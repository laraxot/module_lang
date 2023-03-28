<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// --- models --
use Modules\Lang\Models\Post;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePostsTable.
 */
class CreateTranslationsTable extends XotBaseMigration {
    // protected ?string $model_class = Post::class;

    /**
     * db up.
     *
     * @return void
     */
    public function up() {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->collation = 'utf8mb4_bin';
                $table->increments('id');
                // $table->integer('status')->default(0);
                $table->string('lang');
                $table->string('namespace');
                $table->string('group');
                $table->string('item')->nullable();
                $table->text('value')->nullable();

                $table->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('namespace')) {
                    $table->string('namespace');
                }
                if (! $this->hasColumn('group')) {
                    $table->string('group');
                }
                if (! $this->hasColumn('item')) {
                    $table->string('item')->nullable();
                }
                if (! $this->hasColumn('value')) {
                    $table->text('value')->nullable();
                }
            }
        );
    }

    // end up
}// end class
