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
    public function fields(Blueprint $table): void
    {
        $this->fields->increments('id')->html('text');
        $this->fields->string('title', 200)->default('')->html('text');
        $this->fields->string('slug')->nullable()->html('text');
        $this->fields->text('description')->nullable()->html('textarea');
        $this->fields->unsignedInteger('lead')->default(0)->html('switch');
        $this->fields->unsignedInteger('parent')->default(0)->html('switch');
        $this->fields->unsignedTinyInteger('status')->default(1)->html('switch');
    }

}
