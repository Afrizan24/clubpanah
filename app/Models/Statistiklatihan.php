<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistiklatihan extends Model
{
    //
    protected $fillable = [/* semua kolom */];
    public function pemanah()
    {
        return $this->belongsTo(StrukturOrganisasi::class);
    }

    public function toSkillStats(): array
    {
        $total = max($this->on_target + $this->off_target, 1); // avoid div/0
        return [
            'accuracy' => round($this->on_target / $total * 100),
            'power' => min($this->push_up, 100),
            'focus' => min($this->latihan_konsentrasi, 100),
            'technique' => min(round($this->on_target * 0.6 + $this->push_up * 0.4), 100),
            'strength' => min($this->push_up, 100),
            'endurance' => min($this->waktu_latihan, 100),
            'stamina' => min($this->tahan_nafas, 100),
        ];
    }
}
