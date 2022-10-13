<?php

namespace Rl\Models;

use Rl\Models\Model;

class Member extends Model {
	protected $table = "members";
	protected $orderBy = "membername";
}