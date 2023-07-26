<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Education extends BaseModel
{

    protected $fillable = [
        'employee_id', 'school', 'degree', 'field', 'result', 'result_type',
        'finished', 'notes', 'interest'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_education";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->ordering(true);
        $fields->name('school')->type('text')->ordering(true);
        $fields->name('degree')->type('text')->ordering(true);
        $fields->name('field')->type('text')->ordering(true);
        $fields->name('result')->type('text')->ordering(true);
        $fields->name('result_type')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->group('w-1/2');
        $fields->name('school')->type('text')->group('w-1/2');
        $fields->name('degree')->type('text')->group('w-1/2');
        $fields->name('field')->type('text')->group('w-1/2');
        $fields->name('result')->type('text')->group('w-1/2');
        $fields->name('result_type')->type('text')->group('w-1/2');
        $fields->name('finished')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->group('w-1/6');
        $fields->name('school')->type('text')->group('w-1/6');
        $fields->name('degree')->type('text')->group('w-1/6');
        $fields->name('field')->type('text')->group('w-1/6');
        $fields->name('result')->type('text')->group('w-1/6');

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
        $table->unsignedInteger('employee_id')->nullable()->index('employee_id');
        $table->string('school', 100)->nullable();
        $table->string('degree', 100)->nullable();
        $table->string('field', 100)->nullable();
        $table->string('result', 50)->nullable();
        $table->enum('result_type', ['grade', 'percentage'])->nullable();
        $table->unsignedInteger('finished')->nullable();
        $table->text('notes')->nullable();
        $table->text('interest')->nullable();
    }
}
