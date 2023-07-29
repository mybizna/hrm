<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Classes\Views\FormBuilder;

class Holiday extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['title', 'start', 'end', 'description', 'range_status'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "hrm_holiday";


    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('start')->type('date')->ordering(true);
        $fields->name('end')->type('date')->ordering(true);
        $fields->name('range_status')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(): FormBuilder
{
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('start')->type('date')->group('w-1/2');
        $fields->name('end')->type('date')->group('w-1/2');
        $fields->name('range_status')->type('text')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-full');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('start')->type('date')->group('w-1/6');
        $fields->name('end')->type('date')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->bigIncrements('id');
        $table->string('title', 200);
        $table->timestamp('start')->useCurrent();
        $table->timestamp('end')->nullable()->default(null);;
        $table->text('description');
        $table->string('range_status', 5);
    }
}
