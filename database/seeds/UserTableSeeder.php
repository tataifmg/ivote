<?php

use Illuminate\Database\Seeder;
use App\User;

/**
 * Class EstadoTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run()
    {
        $u= new User();
        $u->id='1';
        $u->nome='Decisor';
        $u->email='decisor@gmail.com';
        $u->cpf='61020790601';
        $u->password='$2y$10$WhMgH2OuAWKkIvR2RZPV6ezN3ek9ulg4KI5dvf8qAZqwR/W0nvjG6';
        $u->cidade_id='1';
        $u->tipo_perfil='Decisor';
        $u->created_at='2020-08-07 19:32:59';
        $u->updated_at='2020-08-07 19:32:59';
        $u->save();

        $u= new User();
        $u->id='2';
        $u->nome='Comunidade';
        $u->email='comunidade@gmail.com';
        $u->cpf='41684724694';
        $u->password='$2y$10$FOyYyFCOupA9FWp9VvUcKe7zYlbexP6fKb/H4q0dxFBzktNR99r.e';
        $u->cidade_id='1';
        $u->tipo_perfil='Comunidade';
        $u->created_at='2020-08-07 19:34:05';
        $u->updated_at='2020-08-07 19:34:05';
        $u->save();

    }
}
