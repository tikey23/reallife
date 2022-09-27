<?php

namespace Rl\Models;

use Rl\Models\Model;

class Picture extends Model {
	protected $table = "pictures";
	protected $orderBy = "categoryName";
}