<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class EmployeeResignRequest extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['user_id', 'reason', 'date', 'status'];

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
    protected $table = "hrm_employee_resign_request";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $statuses = ['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'];
        $statuses_color = ['pending' => 'gray', 'approved' => 'green', 'rejected' => 'red'];

        $this->fields->bigIncrements('id')->html('text');
        $this->fields->unsignedBigInteger('user_id')->default(0)->index('user_id')->html('recordpicker')->relation(['users']);
        $this->fields->string('reason')->nullable()->html('textarea');
        $this->fields->date('date')->html('date');
        $this->fields->enum('status', array_keys($statuses))->options($statuses)->color($statuses_color)->default('pending')->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['user_id', 'date', 'status'];
        $structure['filter'] = ['user_id', 'date', 'status'];

        return $structure;
    }
}
