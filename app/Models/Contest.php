<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Contestant;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'description',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Contest $contest) {
            $contest->description_html = Str::markdown($contest->description);
        });
    }

    public function activate()
    {
        if (! $this->active)
        {
            $this->active = true;
            $this->save();

            self::whereNot('id', $this->id)
                ->where('active', true)
                ->update(['active' => false]);

            return true;
        }

        return false;
    }

    public function hasContestant(User|null $user)
    {   
        if ($user) {
            return Contestant::where('contest_id', $this->id)
            ->where('user_id', $user->id)
            ->count() > 0;
        }

        return false;
    }

    public function registerContestant(User $user, $data)
    {
        if ($this->active && $user->isContestant() && !$this->hasContestant($user)) {
            Contestant::create([
                'contest_id' => $this->id,
                'user_id' => $user->id,
                'school_level' => $data['schoolLevel'],
                'school_grade' => $data['schoolGrade'],
                'school_name' => $data['schoolName'],
                'tshirt_size' => $data['tshirtSize'],
                'tshirt_style' => $data['tshirtStyle'],
            ]);

            return true;
        }

        return false;
    }
}
