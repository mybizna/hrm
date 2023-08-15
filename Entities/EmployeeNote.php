<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class EmployeeNote extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['user_id', 'comment', 'comment_by'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['user_id', 'comment'];

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
    protected $table = "hrm_employee_note";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->bigIncrements('id')->html('text');
        $this->fields->unsignedBigInteger('user_id')->default(0)->html('recordpicker')->table(['users']);
        $this->fields->text('comment')->html('text');
        $this->fields->unsignedBigInteger('comment_by')->html('recordpicker')->table(['users']);
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure = [
            'table' => ['user_id', 'comment', 'comment_by'],
            'filter' => ['user_id', 'comment'],
        ];

        return $structure;
    }
}
