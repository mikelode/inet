<?php

use App\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RolesAssignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name' => 'Foo Bar',
            'email' => 'foo@symva.net',
            'password' => bcrypt('secret')
        ]);

        $creatorOfEvents = factory(User::class)->create([
            'name' => 'Creador de eventos',
            'email' => 'creador_eventos@symva.net',
            'password' => bcrypt('secret')
        ]);

        // Creamos el rol de administrador
        Bouncer::allow('admin')->everything();

        // Asignamos el rol de administrador a $user
        $user->assign('admin');

        // Asignamos al autor la habilidad de crear posts
        $crear_evento = Bouncer::ability()->create([
            'name' => 'create-events',
            'title' => 'Crear eventos para el calendario'
        ]);

        $creatorOfEvents->allow($crear_evento, Evento::class);

        $custom_evento = Bouncer::ability()->create([
            'name' => 'custom-evento',
            'title' => 'Gestión de eventos'
        ]);

        $custom_persona = Bouncer::ability()->create([
            'name' => 'custom-persona',
            'title' => 'Gestión de Personas'
        ]);

        $custom_entidad = Bouncer::ability()->create([
            'name' => 'custom-entidad',
            'title' => 'Gestión de Entidades'
        ]);

        $custom_obra = Bouncer::ability()->create([
            'name' => 'custom-obra',
            'title' => 'Gestión de Obras'
        ]);

        $creatorOfEvents->allow($custom_evento, \App\Models\Evento::class);

        $custom_user = Bouncer::ability()->create([
            'name' => 'custom-users',
            'title' => 'Administrar usuarios'
        ]);

        $custom_roles_abilities = Bouncer::ability()->create([
            'name' => 'custom-roles-abilities',
            'title' => 'Administrar usuarios'
        ]);
    }
}
