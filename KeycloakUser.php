<?php 

namespace App\Providers\Keycloak;

use App\Models\Pegawai;

class KeycloakUser
{
    private $decodedToken;
    public $user_id;
    public $pegawai_id;
    public $email;
    public $username;
    public $full_name;
    public $phone;

    public function __construct($decodedToken)
    {
        $this->decodedToken = $decodedToken;
        $this->user_id = $decodedToken->sub;
        $this->email = $decodedToken->email;
        $this->username = $decodedToken->preferred_username;
        $this->full_name = $decodedToken->name;
        $this->phone = $decodedToken->phone??null;

        $pegawai = pegawai::where('user_id', $this->user_id)->first();

        if($pegawai) {
            $this->pegawai_id = $pegawai->pegawai_id;
        }
    }

    public function __get($name)
    {
        return $this->decodedToken->$name ?? null;
    }

    public function hasRole($role)
    {
        $clientId = env('KEYCLOAK_CLIENT_ID');

        $roles = $this->decodedToken->resource_access->{$clientId}->roles;
        $explodedRole = explode("|", $role);

        return empty(array_intersect($explodedRole, $roles));
    }

    // You can add more custom methods as needed

    // Example method:
    // public function getCustomClaim($claimName)
    // {
    //     return $this->decodedToken->$claimName ?? null;
    // }
}