<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Department extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'lead', 'parent', 'status'];

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
    protected $table = "hrm_department";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('title', 200)->default('')->html('text');
        $this->fields->string('slug')->nullable()->html('text');
        $this->fields->text('description')->nullable()->html('textarea');
        $this->fields->unsignedInteger('lead')->default(0)->html('switch');
        $this->fields->unsignedInteger('parent')->default(0)->html('switch');
        $this->fields->unsignedTinyInteger('status')->default(1)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['title', 'slug', 'lead', 'parent', 'status'];
        $structure['form'] = [
            ['label' => 'Department Title', 'class' => 'col-span-full', 'fields' => ['title']],
            ['label' => 'Department Description', 'class' => 'col-span-full md:col-span-6 md:pr-2', 'fields' => ['description']],
            ['label' => 'Department Lead', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['slug', 'lead']],
            ['label' => 'Department Status', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['parent', 'status']],
        ];
        $structure['filter'] = ['title', 'slug', 'lead', 'status'];

        return $structure;
    }


    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = [];
        $rights['guest'] = [];

        return $rights;
    }

}
