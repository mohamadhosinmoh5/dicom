<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DicomInfo extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'dicom_id',
        'Encoding',
        'Strength',
        'Manufacture',
        'Modality',
        'Model',
        'slicesCount',
        'Sequence',
        'Series',
        'UID',
        'bandwidth',
    ];

    public function dicom()
    {
        return $this->hasOne(Dicom::class, 'dicom_id');
    }
}
