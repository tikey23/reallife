<?php

namespace Rl\Models;

use Rl\Models\Model;

class Picture extends Model {
	protected $table = "pictures";
	protected $orderBy = "categoryName";


public function delete(){
	$categoryName = $this->categoryName;
    $picName = $this->picName;

    $link = "img/gallery/" . $categoryName . "/" . $picName;
    unlink($link);
	parent::delete();
}

}