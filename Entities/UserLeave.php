<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class UserLeave extends BaseModel
{

    protected $fillable = ['user_id', 'request_id', 'title', 'date'];
    public $migrationDependancy = [];
    protected $table = "hrm_user_leave";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('number')->ordering(true);
        $fields->name('request_id')->type('number')->ordering(true);
        $fields->name('title')->type('text')->ordering(true);
        $fields->name('date')->type('date')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('number')->group('w-1/2');
        $fields->name('request_id')->type('number')->group('w-1/2');
        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('date')->type('date')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('number')->group('w-1/6');
        $fields->name('request_id')->type('number')->group('w-1/6');
        $fields->name('title')->type('text')->group('w-1/6');
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

        $table->bigIncrements('id');
        $table->integer('user_id')->nullable();
        $table->integer('request_id')->nullable();
        $table->string('title')->nullable();
        $table->date('date')->nullable();
    }
}
