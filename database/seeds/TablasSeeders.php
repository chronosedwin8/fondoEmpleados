<?php

use Illuminate\Database\Seeder;
require_once '/path/to/Faker/src/autoload.php';

class TablasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker=Faker::create();

        /*for ($i=0; $i < 30; $i++) { 
        	  \DB::table('usuarios')->insert(array(

        	'cedula'=> $faker->unique()->nationalIdNumber,
			'nombre1'=> $faker->firstName($gender = null|'male'|'female'),
			'nombre2'=> $faker->firstName($gender = null|'male'|'female'),
			'apellido1'=> $faker->lastName,
			'apellido2'=> $faker->lastName,
			'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idestados'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idprofesiones'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idgeneros'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 2),
			'idtipocuentauser'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idjornadalabora'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idestadocivil'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idtipocontrato'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idtiposalario'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idorigenfondos'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'idbancouser'=> $faker->'idtipos_user'=> $faker->numberBetween($min = 1, $max = 3),
			'nocuentauser'=> $faker->bankAccountNumber,
			'direccion'=> $faker->address,
			'cod_postal'=> $faker->postcode,
			'telefono'=> $faker->phoneNumber,
			'celular'=> $faker->mobileNumber,
			'barrio'=> $faker->streetName,
			'email'=> $faker->unique()->email,
			'fechaingreso'=> $faker->date($format = 'Y-m-d', $max = 'now'),
			'fechanaci'=> $faker->date($format = 'Y-m-d', $max = 'now'),
			'salario'=> $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
			'porcentaje_ahorro'=> $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 50.25)





        ));
        }*/

      
        
 			

    }
}
