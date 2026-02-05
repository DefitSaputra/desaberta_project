<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 1. TAMBAHAN: Import library Filament
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

// 2. TAMBAHAN: Tambahkan "implements FilamentUser" di sini
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 3. TAMBAHAN: Fungsi Wajib untuk izin akses Admin
    public function canAccessPanel(Panel $panel): bool
    {
        // Mengembalikan true artinya SEMUA user yang punya login bisa masuk admin.
        // Jika ingin membatasi hanya email tertentu, ganti jadi:
        // return $this->email === 'admin@desaberta.com';
        
        return true;
    }
}