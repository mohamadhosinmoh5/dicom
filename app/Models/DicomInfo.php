<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
class DicomInfo extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "dicominfos";

    protected $fillable = [
        'dicom_id',
        'Encoding',
        'Strength',
        'Manufacture',
        'Modality',
        'Model',
        'slicesCount',
        'Sequence',
        'date',
        'Series',
        'UID',
        'bandwidth',
        'Station'
    ];

    public function dicom()
    {
        return $this->hasOne(Dicom::class, 'dicom_id');
    }
}
