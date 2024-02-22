<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Holiday extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'start', 'end', 'description', 'range_status'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title'];

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
    protected $table = "hrm_holiday";

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
        $this->fields->string('title', 200)->html('text');
        $this->fields->timestamp('start')->useCurrent()->html('date');
        $this->fields->timestamp('end')->nullable()->default(null)->html('date');
        $this->fields->text('description')->html('textarea');
        $this->fields->string('range_status', 5)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['title', 'start', 'end', 'range_status'];
        $structure['form'] = [
            ['label' => 'Title', 'class' => 'col-span-full', 'fields' => ['title']],
            ['label' => 'Description', 'class' => 'col-span-full', 'fields' => ['description']],
            ['label' => 'Date', 'class' => 'col-span-full md:col-span-6', 'fields' => ['start', 'end']],
            ['label' => 'Setting', 'class' => 'col-span-full md:col-span-6', 'fields' => ['range_status']],
        ];
        $structure['filter'] = ['title', 'start', 'end', 'range_status'];

        return $structure;
    }
}
