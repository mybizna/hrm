<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class EmployeeHistory extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['user_id', 'module', 'category', 'type', 'comment', 'data', 'date'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['user_id', 'module'];

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
    protected $table = "hrm_employee_history";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields->increments('id')->html('text');
        $this->fields->unsignedBigInteger('user_id')->default(0)->index('user_id')->html('recordpicker')->table(['users']);
        $this->fields->string('module', 20)->nullable()->index('module')->html('text');
        $this->fields->string('category', 20)->nullable()->html('text');
        $this->fields->string('type', 20)->nullable()->html('text');
        $this->fields->text('comment')->nullable()->html('text');
        $this->fields->longText('data')->nullable()->html('text');
        $this->fields->dateTime('date')->html('date');
    }
}
