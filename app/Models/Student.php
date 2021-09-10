<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{

    protected $fillable = [
        "full_name",
        "family_income",
        "birth_date",
        "avatar",
        "zipcode",
        "street",
        "number",
        "complement",
        "neighborhood",
        "state",
        "city"
    ];

    public function setFamilyIncomeAttribute(?string $value): void
    {
        if (!empty($value) && isset($value)) {
            $value = str_replace(".", "", $value);
            $value = str_replace(",", ".", $value);
            $this->attributes['family_income'] = floatval($value);
        } else {
            $this->attributes['family_income'] = 0.00;
        }
    }

    public function getFamilyIncomeAttribute($value): string
    {
        $value = number_format($value, 2, ',', '.');
        return $value;
    }

    public function setBirthDateAttribute(?string $value): void
    {
        if (!empty($value) && isset($value)) {
            $data = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            $this->attributes['birth_date'] = $data;
        }
    }

    public function getBirthDateAttribute($value): string
    {
        $date = Carbon::parse($value);
        return $date->format("d/m/Y");
    }

    public function getUrlAvatarAttribute()
    {
        return Storage::url($this->avatar);
    }

    public static function getStudentsByAge(?string $value): Collection
    {

        $today = Carbon::now()->format('Y');
        $year_birth = $today - $value;

        $students_by_age = DB::table('students')
            ->whereYear('birth_date', '=', $year_birth)
            ->get();


        return $students_by_age;
    }


}
