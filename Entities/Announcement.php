<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Announcement extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['user_id', 'post_id', 'status', 'email_status'];
    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['user_id', 'post_id'];

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
    protected $table = "hrm_announcement";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->bigIncrements('id'->html('text'));
        $this->fields->unsignedBigInteger('user_id')->index('user_id')->html('recordpicker')->table(['users']);
        $this->fields->bigInteger('post_id')->index('post_id')->html('text');
        $this->fields->string('status', 30)->index('status')->html('switch');
        $this->fields->string('email_status', 30)->html('switch');
    }
}
