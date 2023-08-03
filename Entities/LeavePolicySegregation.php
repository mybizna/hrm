<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class LeavePolicySegregation extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'leave_policy_id', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul',
        'aug', 'sep', 'oct', 'nov', 'decem',
    ];

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
    protected $table = "hrm_leave_policy_segregation";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('leave_policy_id')->type('recordpicker')->table('hrm_leave_policy')->ordering(true);
        $fields->name('jan')->type('number')->ordering(true);
        $fields->name('feb')->type('number')->ordering(true);
        $fields->name('mar')->type('number')->ordering(true);
        $fields->name('apr')->type('number')->ordering(true);
        $fields->name('may')->type('number')->ordering(true);
        $fields->name('jun')->type('number')->ordering(true);
        $fields->name('jul')->type('number')->ordering(true);
        $fields->name('aug')->type('number')->ordering(true);
        $fields->name('sep')->type('number')->ordering(true);
        $fields->name('oct')->type('number')->ordering(true);
        $fields->name('nov')->type('number')->ordering(true);
        $fields->name('dec')->type('number')->ordering(true);

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

        $fields->name('leave_policy_id')->type('recordpicker')->table('hrm_leave_policy')->group('w-1/2');
        $fields->name('jan')->type('number')->group('w-1/2');
        $fields->name('feb')->type('number')->group('w-1/2');
        $fields->name('mar')->type('number')->group('w-1/2');
        $fields->name('apr')->type('number')->group('w-1/2');
        $fields->name('may')->type('number')->group('w-1/2');
        $fields->name('jun')->type('number')->group('w-1/2');
        $fields->name('jul')->type('number')->group('w-1/2');
        $fields->name('aug')->type('number')->group('w-1/2');
        $fields->name('sep')->type('number')->group('w-1/2');
        $fields->name('oct')->type('number')->group('w-1/2');
        $fields->name('nov')->type('number')->group('w-1/2');
        $fields->name('dec')->type('number')->group('w-1/2');

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

        $fields->name('leave_policy_id')->type('recordpicker')->table('hrm_leave_policy')->group('w-1/6');
        $fields->name('jan')->type('number')->group('w-1/6');
        $fields->name('feb')->type('number')->group('w-1/6');
        $fields->name('mar')->type('number')->group('w-1/6');
        $fields->name('apr')->type('number')->group('w-1/6');
        $fields->name('may')->type('number')->group('w-1/6');
        $fields->name('jun')->type('number')->group('w-1/6');
        $fields->name('jul')->type('number')->group('w-1/6');
        $fields->name('aug')->type('number')->group('w-1/6');
        $fields->name('sep')->type('number')->group('w-1/6');
        $fields->name('oct')->type('number')->group('w-1/6');
        $fields->name('nov')->type('number')->group('w-1/6');
        $fields->name('dec')->type('number')->group('w-1/6');

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
        $table->unsignedBigInteger('leave_policy_id')->index('leave_policy_id');
        $table->unsignedTinyInteger('jan')->default(0);
        $table->unsignedTinyInteger('feb')->default(0);
        $table->unsignedTinyInteger('mar')->default(0);
        $table->unsignedTinyInteger('apr')->default(0);
        $table->unsignedTinyInteger('may')->default(0);
        $table->unsignedTinyInteger('jun')->default(0);
        $table->unsignedTinyInteger('jul')->default(0);
        $table->unsignedTinyInteger('aug')->default(0);
        $table->unsignedTinyInteger('sep')->default(0);
        $table->unsignedTinyInteger('oct')->default(0);
        $table->unsignedTinyInteger('nov')->default(0);
        $table->unsignedTinyInteger('decem')->default(0);
    }
}
