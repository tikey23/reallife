<?php

namespace Rl\Models;

use Rl\Models\Model;

class Event extends Model {
	protected $table = "event";
	protected $orderBy = "eventdate";
}