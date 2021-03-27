<?php
use App\rol;
use App\User;
use App\ticket;
use App\category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();

      $user =new User;
      $user->name = 'John L.';
      $user->email = '1@1';
      $user->password = bcrypt('1');
      $user->email_verified_at = Now();
      $user->save();

      rol::truncate();

      $rol =new rol;
      $rol->name = 'Admin';
      $rol->save();

      $rol =new rol;
      $rol->name = 'User';
      $rol->save();

      ticket::truncate();

      $ticket =new ticket;
      $ticket->name = 'Soporte';
      $ticket->category = 'Urgente';
      $ticket->desc = 'Problema con...';
      $ticket->save();

      $ticket =new ticket;
      $ticket->name = 'Asesoria';
      $ticket->category = 'Requerido';
      $ticket->desc = 'Necesito ayuda en...';
      $ticket->save();
    }
}
