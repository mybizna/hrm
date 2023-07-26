<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class EmployeeNote extends BaseModel
{

    protected $fillable = ['user_id', 'comment', 'comment_by'];
    public $migrationDependancy = [];
    protected $table = "hrm_employee_note";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('users')->ordering(true);
        $fields->name('comment')->type('text')->ordering(true);
        $fields->name('comment_by')->type('recordpicker')->table('users')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('comment')->type('text')->group('w-1/2');
        $fields->name('comment_by')->type('recordpicker')->table('users')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/6');
        $fields->name('comment')->type('text')->group('w-1/6');
        $fields->name('comment_by')->type('recordpicker')->table('users')->group('w-1/6');

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
        $table->unsignedBigInteger('user_id')->default(0);
        $table->text('comment');
        $table->unsignedBigInteger('comment_by');
    }
}
