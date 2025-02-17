<?php

namespace Niyam\Bpms\Model;

use Illuminate\Database\Eloquent\Model;

class BpmsWorkflow extends Model
{
    protected $guarded = ['id'];
    // protected $visible = ['id','name','wid','type','description','niyam'];
    protected $casts = [
        'options' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'wid';
    }

    public function transitions()
    {
        return $this->hasMany(BpmsTransition::class, 'ws_pro_id');
    }

    public function states()
    {
        return $this->hasMany(BpmsState::class, 'ws_pro_id');
    }

    public function parts()
    {
        return $this->hasMany(BpmsPart::class, 'ws_pro_id');
    }

    public function gates()
    {
        return $this->hasMany(BpmsGate::class, 'ws_pro_id');
    }

    public function cases()
    {
        return $this->hasMany(BpmsCase::class, 'ws_pro_id');
    }

    public function type()
    {
        return $this->belongsTo(Bpmstype::class, 'type');
    }

    public function forms()
    {
        return $this->hasMany(BpmsForm::class, 'ws_pro_id');
    }

    public function variables()
    {
        return $this->hasMany(BpmsVariable::class, 'ws_pro_id');
    }

    public function triggers()
    {
        return $this->hasMany(BpmsTrigger::class, 'ws_pro_id');
    }

    public function stateConfigs()
    {
        return $this->hasManyThrough(BpmsStateConfig::class, BpmsState::class, 'ws_pro_id', 'state_id');
    }
}
