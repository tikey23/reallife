<?php

namespace Rl\Models;

use Rl\Models\Model;

class Gallery extends Model {
	protected $table = "gallery";
	protected $orderBy = "categoryName";
}