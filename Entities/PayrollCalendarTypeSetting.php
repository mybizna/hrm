<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class PayrollCalendarTypeSetting extends BaseModel
{

    protected $fillable = [
        'pay_calendar_id', 'cal_type', 'pay_day', 'custom_month_day', 'pay_day_mode'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_calendar_type_setting";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_calendar')->ordering(true);
        $fields->name('cal_type')->type('number')->ordering(true);
        $fields->name('pay_day')->type('number')->ordering(true);
        $fields->name('custom_month_day')->type('number')->ordering(true);
        $fields->name('pay_day_mode')->type('number')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_calendar')->group('w-1/2');
        $fields->name('cal_type')->type('number')->group('w-1/2');
        $fields->name('pay_day')->type('number')->group('w-1/2');
        $fields->name('custom_month_day')->type('number')->group('w-1/2');
        $fields->name('pay_day_mode')->type('number')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_calendar')->group('w-1/6');
        $fields->name('cal_type')->type('number')->group('w-1/6');
        $fields->name('pay_day')->type('number')->group('w-1/6');
        $fields->name('custom_month_day')->type('number')->group('w-1/6');


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
        $table->integer('pay_calendar_id');
        $table->integer('cal_type')->default(0);
        $table->integer('pay_day')->default(0);
        $table->integer('custom_month_day')->default(0);
        $table->integer('pay_day_mode')->default(0);
    }
}
