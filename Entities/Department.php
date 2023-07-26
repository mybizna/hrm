<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Department extends BaseModel
{

    protected $fillable = ['title', 'slug', 'description', 'lead', 'parent', 'status'];
    public $migrationDependancy = [];
    protected $table = "hrm_department";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('lead')->type('text')->ordering(true);
        $fields->name('parent')->type('text')->ordering(true);
        $fields->name('status')->type('switch')->ordering(true);

    

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('lead')->type('text')->group('w-1/2');
        $fields->name('parent')->type('text')->group('w-1/2');
        $fields->name('status')->type('switch')->group('w-1/2');
        $fields->name('description')->type('textarea')->group('w-full');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('slug')->type('text')->group('w-1/6');
        $fields->name('lead')->type('text')->group('w-1/6');
        $fields->name('parent')->type('text')->group('w-1/6');
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
        $table->increments('id');
        $table->string('title', 200)->default('');
        $table->string('slug')->nullable();
        $table->text('description')->nullable();
        $table->unsignedInteger('lead')->default(0);
        $table->unsignedInteger('parent')->default(0);
        $table->unsignedTinyInteger('status')->default(1);
    }
}
