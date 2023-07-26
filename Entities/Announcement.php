<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Announcement extends BaseModel
{

    protected $fillable = ['user_id', 'post_id', 'status', 'email_status'];
    public $migrationDependancy = [];
    protected $table = "hrm_announcement";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('users')->ordering(true);
        $fields->name('post_id')->type('text')->ordering(true);
        $fields->name('status')->type('switch')->ordering(true);
        $fields->name('email_status')->type('switch')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('post_id')->type('text')->group('w-1/2');
        $fields->name('status')->type('switch')->group('w-1/2');
        $fields->name('email_status')->type('switch')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/6');
        $fields->name('post_id')->type('text')->group('w-1/6');
        $fields->name('status')->type('switch')->group('w-1/6');
        $fields->name('email_status')->type('switch')->group('w-1/6');

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
        $table->unsignedBigInteger('user_id')->index('user_id');
        $table->bigInteger('post_id')->index('post_id');
        $table->string('status', 30)->index('status');
        $table->string('email_status', 30);
    }
}
