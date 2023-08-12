<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class LeaveEncashmentRequest extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id', 'leave_id', 'approved_by', 'approval_status_id', 'encash_days',
        'forward_days', 'amount', 'total', 'f_year',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['user_id', 'leave_id'];

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
    protected $table = "hrm_leave_encashment_request";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table(['users'])->ordering(true);
        $fields->name('leave_id')->type('recordpicker')->table(['hrm', 'leave'])->ordering(true);
        $fields->name('approved_by')->type('recordpicker')->table(['users'])->ordering(true);
        $fields->name('approval_status_id')->type('recordpicker')->table(['hrm', 'approval_status'])->ordering(true);
        $fields->name('encash_days')->type('number')->ordering(true);
        $fields->name('forward_days')->type('number')->ordering(true);
        $fields->name('amount')->type('number')->ordering(true);
        $fields->name('total')->type('number')->ordering(true);
        $fields->name('f_year')->type('number')->ordering(true);

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table(['users'])->group('w-1/2');
        $fields->name('leave_id')->type('recordpicker')->table(['hrm', 'leave'])->group('w-1/2');
        $fields->name('approved_by')->type('recordpicker')->table(['users'])->group('w-1/2');
        $fields->name('approval_status_id')->type('recordpicker')->table(['hrm', 'approval_status'])->group('w-1/2');
        $fields->name('encash_days')->type('number')->group('w-1/2');
        $fields->name('forward_days')->type('number')->group('w-1/2');
        $fields->name('amount')->type('number')->group('w-1/2');
        $fields->name('total')->type('number')->group('w-1/2');
        $fields->name('f_year')->type('number')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table(['users'])->group('w-1/6');
        $fields->name('leave_id')->type('recordpicker')->table(['hrm', 'leave'])->group('w-1/6');
        $fields->name('approved_by')->type('recordpicker')->table(['users'])->group('w-1/6');
        $fields->name('approval_status_id')->type('recordpicker')->table(['hrm', 'approval_status'])->group('w-1/6');
        $fields->name('encash_days')->type('number')->group('w-1/6');
        $fields->name('forward_days')->type('number')->group('w-1/6');

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

        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->index('user_id');
        $table->unsignedSmallInteger('leave_id')->index('leave_id');
        $table->unsignedBigInteger('approved_by')->nullable();
        $table->unsignedTinyInteger('approval_status_id')->default(1);
        $table->unsignedDecimal('encash_days', 4, 1)->default(0.0);
        $table->unsignedDecimal('forward_days', 4, 1)->default(0.0);
        $table->decimal('amount', 20, 2)->default(0.00);
        $table->decimal('total', 20, 2)->default(0.00);
        $table->unsignedSmallInteger('f_year')->index('f_year');
    }
}
