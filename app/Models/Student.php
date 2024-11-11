<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $dept
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'students';
	public $timestamps = false;

	protected $casts = [
		'age' => 'int'
	];

	protected $fillable = [
		'name',
		'age',
		'dept'
	];
}
