<?php

namespace Modulos\Seguranca\Database\Seeds;

use Illuminate\Database\Seeder;
use Modulos\Seguranca\Models\Perfil;

class PerfilPermissaoTableSeeder extends Seeder
{
    public function run()
    {
        /** Perfil Administrador do Módulo Segurança */

        $perfil = Perfil::find(1); // Perfil administrador do modulo seguranca

        $perfil->permissoes()->attach([1]); // Permissão Index

        $perfil->permissoes()->attach([2, 3, 4, 5]); // Permissoes do recurso Módulo

        $perfil->permissoes()->attach([6, 7, 8, 9]); // Permissoes do recurso CategoriasRecursos

        $perfil->permissoes()->attach([10, 11, 12, 13]); // Permissoes do recurso Recursos

        $perfil->permissoes()->attach([14, 15, 16, 17]); // Permissoes do recurso Permissões

        $perfil->permissoes()->attach([18, 19, 20, 21, 22]); // Permissoes do recurso Perfis

        $perfil->permissoes()->attach([23, 24, 25, 26, 27, 28]); // Permissoes do recurso Usuários


        /** Perfil Administrador do Módulo Geral */
        $perfil = Perfil::find(2);

        $perfil->permissoes()->attach([29]); // Permissões Dashboard

        $perfil->permissoes()->attach([30, 31, 32, 33, 34]); //Permissões Pessoas

        /** Perfil Administrador do Módulo Acadêmico */

        $perfil = Perfil::find(3);

        $perfil->permissoes()->attach([35]); //Index Dashboard

        $perfil->permissoes()->attach([36, 37, 38, 39]); //Permissões do recurso polo

        $perfil->permissoes()->attach([40, 41, 42, 43]); // Permissoes do recurso departamentos

        $perfil->permissoes()->attach([44, 45, 46, 47]); // Permissoes do recurso periodos letivos

        $perfil->permissoes()->attach([48, 49, 50, 51]); // Permissoes do recurso cursos

        $perfil->permissoes()->attach([52, 53, 54, 55]); // Permissoes do recurso centros

        $perfil->permissoes()->attach([56, 57, 58, 59]); // Permissoes do recurso matrizes curriculares

        $perfil->permissoes()->attach([60, 61]); // Permissoes do recurso Oferta de Cursos

        $perfil->permissoes()->attach([62, 63, 64, 65]); // Permissoes do recurso Grupos

        $perfil->permissoes()->attach([66, 67, 68, 69]); // Permissoes do recurso Turmas

        $perfil->permissoes()->attach([70, 71, 72, 73, 74]); // Permissoes do recurso Módulos Matrizes

        $perfil->permissoes()->attach([75, 76, 77, 78]); // Permissoes do recurso Disciplinas

        $perfil->permissoes()->attach([79, 80, 81, 82]); // Permissoes do recurso Vinculos

        $perfil->permissoes()->attach([83, 84, 85]); // Permissoes do recurso Tutores Grupos

        $perfil->permissoes()->attach([86, 87, 88, 89]); // Permissoes do recurso Tutores

        /** Perfil Administrador do Módulo Integração */

        $perfil = Perfil::find(4);

        $perfil->permissoes()->attach([91]);
    }
}
