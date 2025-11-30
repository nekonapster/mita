<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * Orden jerárquico de roles (excepto rrhh que va aparte)
     *
     * jefes de abajo a arriba:
     * jefe_equipo < gerente < coordinador < director < admin
     */
    public const ROLE_HIERARCHY = [
        'jefe_equipo' => 1,
        'gerente'     => 2,
        'coordinador' => 3,
        'director'    => 4,
        'admin'       => 5,
        // 'rrhh' queda fuera de esta jerarquía
    ];

    /**
     * Campos asignables en masa
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // 👈 importante
    ];

    /**
     * Chequeo genérico de rol (igualdad exacta)
     */
    public function isRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Helpers semánticos por rol
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isDirector(): bool
    {
        return $this->role === 'director';
    }

    public function isCoordinador(): bool
    {
        return $this->role === 'coordinador';
    }

    public function isGerente(): bool
    {
        return $this->role === 'gerente';
    }

    public function isJefeEquipo(): bool
    {
        return $this->role === 'jefe_equipo';
    }

    public function isRRHH(): bool
    {
        return $this->role === 'rrhh';
    }

    /**
     * ¿Tiene al menos el rol dado según jerarquía?
     *
     * - rrhh va por libre: nunca entra en esta comparación
     * - para roles jerárquicos, compara su nivel con el objetivo
     */
    public function hasAtLeastRole(string $requiredRole): bool
    {
        // rrhh no entra en la jerarquía descendente
        if ($this->isRRHH() || $requiredRole === 'rrhh') {
            return $this->isRRHH() && $requiredRole === 'rrhh';
        }

        $hierarchy = self::ROLE_HIERARCHY;

        if (! isset($hierarchy[$this->role]) || ! isset($hierarchy[$requiredRole])) {
            return false;
        }

        return $hierarchy[$this->role] >= $hierarchy[$requiredRole];
    }

    /**
     * Campos ocultos
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Casts automáticos
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

    /**
     * Iniciales para usar en avatar
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Relación con asignaciones creadas
     */
    public function asignacionesCreadas()
    {
        return $this->hasMany(Asignacion::class, 'creado_por');
    }
}
