<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class EmployeeRemoteWorkRequest extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['user_id', 'reason', 'start_date', 'end_date', 'days', 'status'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['user_id', 'reason'];

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
    protected $table = "hrm_employee_remote_work_request";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->bigIncrements('id')->html('text');
        $this->fields->unsignedBigInteger('user_id')->default(0)->index('user_id')->html('recordpicker')->table(['users']);
        $this->fields->string('reason')->nullable()->html('textarea');
        $this->fields->date('start_date')->html('date');
        $this->fields->date('end_date')->html('date');
        $this->fields->unsignedSmallInteger('days')->default(0)->html('text');
        $this->fields->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->html('switch');
    }
}
