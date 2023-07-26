<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Dependent extends BaseModel
{

    protected $fillable = ['employee_id', 'name', 'relation', 'dob'];
    public $migrationDependancy = [];
    protected $table = "hrm_dependent";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->ordering(true);
        $fields->name('name')->type('text')->ordering(true);
        $fields->name('relation')->type('text')->ordering(true);
        $fields->name('dob')->type('text')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->group('w-1/2');
        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('relation')->type('text')->group('w-1/2');
        $fields->name('dob')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->group('w-1/6');
        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('relation')->type('text')->group('w-1/6');
        $fields->name('dob')->type('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('employee_id')->nullable()->index('employee_id');
        $table->string('name', 100)->nullable();
        $table->string('relation', 100)->nullable();
        $table->date('dob')->nullable();
    }
}
