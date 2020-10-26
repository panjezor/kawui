<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
	use HasFactory;

	const CATEGORY_TARGET_SPECIFICATION = 'target-specification';
	const CATEGORY_HOST_DISCOVERY = 'host-discovery';
	const CATEGORY_SCAN_TECHNIQUES = 'scan-techniques';
	const CATEGORY_PORT_SPECIFICATION_AND_SCAN_ORDER = 'port-specification-and-scan-order';
	const CATEGORY_SERVICE_AND_VERSION_DETECTION = 'service-and-version-detection';
	const CATEGORY_OS_DETECTION = 'os-detection';
	const CATEGORY_OUTPUT = 'output';
	const CATEGORY_miscellaneous = 'miscellaneous';

	public function parameters()
	{
		return $this->hasManyThrough(Parameter::class, ParamCategory::class);
	}

	public function paramCategories()
	{
		return $this->hasMany(ParamCategory::class);
	}
}
