<?php

namespace Rl\Models;

use Rl\Models\Model;

class Month extends Model {
	protected $table = "monthList";
	protected $orderBy = "firstday";
}
