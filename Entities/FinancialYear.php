<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Classes\Views\FormBuilder;

class FinancialYear extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['fy_name', 'start_date', 'end_date', 'description'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "hrm_financial_year";


    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('fy_name')->type('text')->ordering(true);
        $fields->name('start_date')->type('date')->ordering(true);
        $fields->name('end_date')->type('date')->ordering(true);
        

        return $fields;

    }
    
    public function formBuilder(): FormBuilder
{
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('fy_name')->type('text')->group('w-1/2');
        $fields->name('start_date')->type('date')->group('w-1/2');
        $fields->name('end_date')->type('date')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('fy_name')->type('text')->group('w-1/6');
        $fields->name('start_date')->type('date')->group('w-1/6');
        $fields->name('end_date')->type('date')->group('w-1/6');

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
        $table->increments('id');
        $table->string('fy_name')->nullable();
        $table->integer('start_date')->nullable()->index('start_date');
        $table->integer('end_date')->nullable()->index('end_date');
        $table->string('description')->nullable();

        $table->index(['start_date', 'end_date'], 'year_search');
    }
}
