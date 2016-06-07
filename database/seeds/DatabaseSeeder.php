<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios_cms')->insert([
            'login' => 'yara',
            'nombre' => 'yara',
            'email' => 'y.lara@oceandevgroup.com',
            'password' => bcrypt('yara'),
            're_password' => 'yara',
            'permisos' => 'Administrador',
        ]);

        DB::table('variables')->insert([
            'nombre' => 'web_titulo',
            'valor'  => 'Runners Shop. Tienda de ropa deportiva en Santo Domingo',
        ]);

        DB::table('variables')->insert([
            'nombre' => 'web_descripcion',
            'valor'  => 'Tienda de corredores en Santo Domingo',
        ]);

        DB::table('variables')->insert([
            'nombre' => 'web_keywords',
            'valor'  => 'tennis, tienda de tennis en santo domingo, running store, tienda de corredores, mizuno, zoot, mizuno republica dominicana, cinturones de hidratacion, tennis pronador, tennis pies plano, tennis supinador, tennis neutral',
        ]);



        // $this->call(UsersTableSeeder::class);
    }
}
