<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class PayrollPayitem extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['type', 'payitem', 'slug', 'pay_item_add_or_deduct'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['slug'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "hrm_payroll_payitem";

    /**
     * Function for defining list of fields in table view.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('type')->type('text')->ordering(true);
        $fields->name('payitem')->type('text')->ordering(true);
        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('pay_item_add_or_deduct')->type('number')->ordering(true);

        return $fields;

    }

    /**
     * Function for defining form fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('payitem')->type('text')->group('w-1/2');
        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('pay_item_add_or_deduct')->type('number')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining filter fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('type')->type('text')->group('w-1/6');
        $fields->name('payitem')->type('text')->group('w-1/6');
        $fields->name('slug')->type('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $table->increments('id');
        $table->string('type');
        $table->string('payitem');
        $table->string('slug');
        $table->integer('pay_item_add_or_deduct');
    }
}
