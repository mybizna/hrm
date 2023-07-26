<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class HolidayIndv extends BaseModel
{

    protected $fillable = ['holiday_id', 'title', 'date'];
    public $migrationDependancy = [];
    protected $table = "hrm_holiday_indv";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('holiday_id')->type('recordpicker')->table('hrm_holiday')->ordering(true);
        $fields->name('title')->type('text')->ordering(true);
        $fields->name('date')->type('date')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('holiday_id')->type('recordpicker')->table('hrm_holiday')->group('w-1/2');
        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('date')->type('date')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('holiday_id')->type('recordpicker')->table('hrm_holiday')->group('w-1/6');
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
        $table->integer('holiday_id')->nullable();
        $table->string('title')->nullable();
        $table->date('date')->nullable();
    }
}
