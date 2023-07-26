<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class EmployeeRemoteWorkRequest extends BaseModel
{

    protected $fillable = ['user_id', 'reason', 'start_date', 'end_date', 'days', 'status'];
    public $migrationDependancy = [];
    protected $table = "hrm_employee_remote_work_request";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('users')->ordering(true);
        $fields->name('reason')->type('text')->ordering(true);
        $fields->name('start_date')->type('date')->ordering(true);
        $fields->name('end_date')->type('date')->ordering(true);
        $fields->name('days')->type('text')->ordering(true);
        $fields->name('status')->type('switch')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('start_date')->type('date')->group('w-1/2');
        $fields->name('end_date')->type('date')->group('w-1/2');
        $fields->name('days')->type('text')->group('w-1/2');
        $fields->name('status')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/6');
        $fields->name('start_date')->type('date')->group('w-1/6');
        $fields->name('end_date')->type('date')->group('w-1/6');
        $fields->name('days')->type('text')->group('w-1/6');
        $fields->name('status')->type('switch')->group('w-1/6');

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
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->default(0)->index('user_id');
        $table->string('reason')->nullable();
        $table->date('start_date');
        $table->date('end_date');
        $table->unsignedSmallInteger('days')->default(0);
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    }
}
