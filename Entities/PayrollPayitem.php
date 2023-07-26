<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class PayrollPayitem extends BaseModel
{

    protected $fillable = ['type', 'payitem', 'slug', 'pay_item_add_or_deduct'];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_payitem";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('type')->type('text')->ordering(true);
        $fields->name('payitem')->type('text')->ordering(true);
        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('pay_item_add_or_deduct')->type('number')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('payitem')->type('text')->group('w-1/2');
        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('pay_item_add_or_deduct')->type('number')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('type')->type('text')->group('w-1/6');
        $fields->name('payitem')->type('text')->group('w-1/6');
        $fields->name('slug')->type('text')->group('w-1/6');

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
        $table->string('type');
        $table->string('payitem');
        $table->string('slug');
        $table->integer('pay_item_add_or_deduct');
    }
}
