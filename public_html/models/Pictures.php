<?php

namespace Rl\Models;

use Rl\Models\Model;

class Pictures extends Model {
	protected $table = "gallery";
	protected $orderBy = "categoryName";
}