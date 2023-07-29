<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Classes\Views\FormBuilder;

class HolidayIndv extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['holiday_id', 'title', 'date'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "hrm_holiday_indv";


    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('holiday_id')->type('recordpicker')->table('hrm_holiday')->ordering(true);
        $fields->name('title')->type('text')->ordering(true);
        $fields->name('date')->type('date')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(): FormBuilder
{
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('holiday_id')->type('recordpicker')->table('hrm_holiday')->group('w-1/2');
        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('date')->type('date')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('holiday_id')->type('recordpicker')->table('hrm_holiday')->group('w-1/6');
        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('date')->type('date')->group('w-1/6');

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
        $table->integer('holiday_id')->nullable();
        $table->string('title')->nullable();
        $table->date('date')->nullable();
    }
}
