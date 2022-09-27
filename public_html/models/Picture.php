<?php

namespace Rl\Models;

use Rl\Models\Model;

class Picture extends Model {
	protected $table = "gallery";
	protected $orderBy = "categoryName";
}