<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class EmployeeHistory extends BaseModel
{

    protected $fillable = ['user_id', 'module', 'category', 'type', 'comment', 'data', 'date'];
    public $migrationDependancy = [];
    protected $table = "hrm_employee_history";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('users')->ordering(true);
        $fields->name('module')->type('text')->ordering(true);
        $fields->name('category')->type('text')->ordering(true);
        $fields->name('type')->type('text')->ordering(true);
        $fields->name('comment')->type('text')->ordering(true);
        $fields->name('data')->type('text')->ordering(true);
        $fields->name('date')->type('date')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('module')->type('text')->group('w-1/2');
        $fields->name('category')->type('text')->group('w-1/2');
        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('comment')->type('text')->group('w-1/2');
        $fields->name('data')->type('text')->group('w-1/2');
        $fields->name('date')->type('date')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/6');
        $fields->name('module')->type('text')->group('w-1/6');
        $fields->name('category')->type('text')->group('w-1/6');
        $fields->name('type')->type('text')->group('w-1/6');
        $fields->name('date')->type('date')->group('w-1/6');

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
        $table->unsignedBigInteger('user_id')->default(0)->index('user_id');
        $table->string('module', 20)->nullable()->index('module');
        $table->string('category', 20)->nullable();
        $table->string('type', 20)->nullable();
        $table->text('comment')->nullable();
        $table->longText('data')->nullable();
        $table->dateTime('date');
    }
}
