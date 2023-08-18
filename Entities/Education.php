<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Education extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'employee_id', 'school', 'degree', 'field', 'result', 'result_type',
        'finished', 'notes', 'interest',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['school', 'degree'];

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
    protected $table = "hrm_education";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $result_types = ['grade' => 'Grade', 'percentage' => 'Percentage'];

        $this->fields->increments('id');
        $this->fields->unsignedInteger('employee_id')->nullable()->index('employee_id')->html('recordpicker')->relation(['hrm', 'employee']);
        $this->fields->string('school', 100)->nullable()->html('text');
        $this->fields->string('degree', 100)->nullable->html('text');
        $this->fields->string('field', 100)->nullable()->html('text');
        $this->fields->string('result', 50)->nullable()->html('text');
        $this->fields->enum('result_type', array_keys($result_types))->options($result_types)->nullable()->html('switch');
        $this->fields->unsignedInteger('finished')->nullable()->html('switch');
        $this->fields->text('notes')->nullable()->html('textarea');
        $this->fields->text('interest')->nullable()->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['employee_id', 'school', 'degree', 'field', 'finished'];
        $structure['form'] = [
            ['label' => 'School', 'class' => 'col-span-full', 'fields' => ['school']],
            ['label' => 'Employee', 'class' => 'col-span-6', 'fields' => ['employee_id', 'field', 'result']],
            ['label' => 'Result', 'class' => 'col-span-6', 'fields' => ['result_type', 'finished']],
            ['label' => 'Notes', 'class' => 'col-span-full', 'fields' => ['notes', 'interest']],
        ];
        $structure['filter'] = ['employee_id', 'school', 'degree', 'field', 'finished'];

        return $structure;
    }

}
