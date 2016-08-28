<?php

use L52\Entities\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        	[
                'name' => 'users',
                'display_name' => 'Usuários',
                'description' => 'Listagem dos Usuários'
            ],
            [
                'name' => 'users.create',
                'display_name' => 'Usuários: Inclusão',
                'description' => 'Adicionar novos Usuários'
            ],
            [
                'name' => 'users.show',
                'display_name' => 'Usuários: Consulta',
                'description' => 'Consultar Usuários'
            ],
            [
                'name' => 'users.edit',
                'display_name' => 'Usuários: Alteração',
                'description' => 'Alterar Usuários'
            ],
            [
                'name' => 'users.destroy',
                'display_name' => 'Usuários: Exclusão',
                'description' => 'Excluir Usuários'
            ],

            [
        		'name' => 'roles',
        		'display_name' => 'Grupos de Usuários',
        		'description' => 'Listagem dos Grupos de Usuários'
        	],
        	[
        		'name' => 'roles.create',
        		'display_name' => 'Grupos de Usuários: Inclusão',
        		'description' => 'Adicionar novo Grupo de Usuários'
        	],
            [
                'name' => 'roles.show',
                'display_name' => 'Grupos de Usuários: Consulta',
                'description' => 'Consultar o Grupo de Usuários'
            ],
        	[
        		'name' => 'roles.edit',
        		'display_name' => 'Grupos de Usuários: Alteração',
        		'description' => 'Alterar o Grupo de Usuários'
        	],
        	[
        		'name' => 'roles.destroy',
        		'display_name' => 'Grupos de Usuários: Exclusão',
        		'description' => 'Excluir o Grupo de Usuários'
        	],

        	[
        		'name' => 'client_types',
        		'display_name' => 'Clientes - Tipo',
        		'description' => 'Listagem do tipo de Clientes'
        	],
        	[
        		'name' => 'client_types.create',
        		'display_name' => 'Clientes - Tipo: Inclusão',
        		'description' => 'Adicionar novo tipo de Cliente'
        	],
        	[
        		'name' => 'client_types.show',
        		'display_name' => 'Clientes - Tipo: Consulta',
        		'description' => 'Consultar o tipo de Cliente'
        	],
        	[
        		'name' => 'client_types.edit',
        		'display_name' => 'Clientes - Tipo: Alteração',
        		'description' => 'Alterar o tipo de Cliente'
        	],
            [
                'name' => 'client_types.destroy',
                'display_name' => 'Clientes - Tipo: Exclusão',
                'description' => 'Excluir o tipo de Cliente'
            ],
            [
                'name' => 'client_types.logs',
                'display_name' => 'Clientes - Tipo: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'clients',
                'display_name' => 'Clientes',
                'description' => 'Listagem dos Clientes'
            ],
            [
                'name' => 'clients.create',
                'display_name' => 'Clientes: Inclusão',
                'description' => 'Adicionar novo Cliente'
            ],
            [
                'name' => 'clients.show',
                'display_name' => 'Clientes: Consulta',
                'description' => 'Consultar o Cliente'
            ],
            [
                'name' => 'clients.edit',
                'display_name' => 'Clientes: Alteração',
                'description' => 'Alterar o Cliente'
            ],
            [
                'name' => 'clients.destroy',
                'display_name' => 'Clientes: Exclusão',
                'description' => 'Excluir o Cliente'
            ],
            [
                'name' => 'clients.logs',
                'display_name' => 'Clientes: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'states',
                'display_name' => 'Estado',
                'description' => 'Listagem das Unidades Federativas.'
            ],
            [
                'name' => 'states.create',
                'display_name' => 'Estados: Inclusão',
                'description' => 'Adicionar uma Unidade Federativa.'
            ],
            [
                'name' => 'states.show',
                'display_name' => 'Estados: Consulta',
                'description' => 'Consultar a Unidade Federativa.'
            ],
            [
                'name' => 'states.edit',
                'display_name' => 'Estados: Alteração',
                'description' => 'Alterar a Unidade Federativa.'
            ],
            [
                'name' => 'states.destroy',
                'display_name' => 'Estados: Exclusão',
                'description' => 'Excluir a Unidade Federativa.'
            ],
            [
                'name' => 'states.logs',
                'display_name' => 'Estados: Logs',
                'description' => 'Registro das transações.'
            ],
            
            [
                'name' => 'cities',
                'display_name' => 'Cidades',
                'description' => 'Listagem das Unidades Federativas.'
            ],
            [
                'name' => 'cities.create',
                'display_name' => 'Cidades: Inclusão',
                'description' => 'Adicionar uma Cidade.'
            ],
            [
                'name' => 'cities.show',
                'display_name' => 'Cidades: Consulta',
                'description' => 'Consultar a Cidade.'
            ],
            [
                'name' => 'cities.edit',
                'display_name' => 'Cidades: Alteração',
                'description' => 'Alterar a Cidade.'
            ],
            [
                'name' => 'cities.destroy',
                'display_name' => 'Cidades: Exclusão',
                'description' => 'Excluir a Cidade.'
            ],
            [
                'name' => 'cities.logs',
                'display_name' => 'Cidades: Logs',
                'description' => 'Registro das transações.'
            ],
            
            [
                'name' => 'material_units',
                'display_name' => 'Materiais - Unidades',
                'description' => 'Listagem das Unidades de Materiais'
            ],
            [
                'name' => 'material_units.create',
                'display_name' => 'Materiais - Unidades: Inclusão',
                'description' => 'Adicionar nova Unidade de Material'
            ],
            [
                'name' => 'material_units.show',
                'display_name' => 'Materiais - Unidades: Consulta',
                'description' => 'Consultar a Unidade de Material'
            ],
            [
                'name' => 'material_units.edit',
                'display_name' => 'Materiais - Unidades: Alteração',
                'description' => 'Alterar a Unidade de Material'
            ],
            [
                'name' => 'material_units.destroy',
                'display_name' => 'Materiais - Unidades: Exclusão',
                'description' => 'Excluir a Unidade de Material'
            ],
            [
                'name' => 'material_units.logs',
                'display_name' => 'Materiais - Unidades: Logs',
                'description' => 'Registro das transações.'
            ],
            
            [
                'name' => 'materials',
                'display_name' => 'Materiais',
                'description' => 'Listagem de Materiais'
            ],
            [
                'name' => 'materials.create',
                'display_name' => 'Materiais: Inclusão',
                'description' => 'Adicionar novo Material'
            ],
            [
                'name' => 'materials.show',
                'display_name' => 'Materiais: Consulta',
                'description' => 'Consultar dados do Material'
            ],
            [
                'name' => 'materials.edit',
                'display_name' => 'Materiais: Alteração',
                'description' => 'Alterar dados do Material'
            ],
            [
                'name' => 'materials.destroy',
                'display_name' => 'Materiais: Exclusão',
                'description' => 'Excluir Material'
            ],
            [
                'name' => 'materials.logs',
                'display_name' => 'Materiais: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'services',
                'display_name' => 'Serviços',
                'description' => 'Listagem de Serviços'
            ],
            [
                'name' => 'services.create',
                'display_name' => 'Serviços: Inclusão',
                'description' => 'Adicionar novo Material'
            ],
            [
                'name' => 'services.show',
                'display_name' => 'Serviços: Consulta',
                'description' => 'Consultar dados do Material'
            ],
            [
                'name' => 'services.edit',
                'display_name' => 'Serviços: Alteração',
                'description' => 'Alterar dados do Material'
            ],
            [
                'name' => 'services.destroy',
                'display_name' => 'Serviços: Exclusão',
                'description' => 'Excluir Material'
            ],
            [
                'name' => 'services.logs',
                'display_name' => 'Serviços: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'patrimonial_brands',
                'display_name' => 'Equipamentos - Marcas',
                'description' => 'Listagem de Marcas de Equipamentos'
            ],
            [
                'name' => 'patrimonial_brands.create',
                'display_name' => 'Equipamentos - Marcas: Inclusão',
                'description' => 'Adicionar nova Marca de Equipamento'
            ],
            [
                'name' => 'patrimonial_brands.show',
                'display_name' => 'Equipamentos - Marcas: Consulta',
                'description' => 'Consultar dados da Marca de Equipamento'
            ],
            [
                'name' => 'patrimonial_brands.edit',
                'display_name' => 'Equipamentos - Marcas: Alteração',
                'description' => 'Alterar dados da Marca de Equipamento'
            ],
            [
                'name' => 'patrimonial_brands.destroy',
                'display_name' => 'Equipamentos - Marcas: Exclusão',
                'description' => 'Excluir Marca de Equipamento'
            ],
            [
                'name' => 'patrimonial_brands.logs',
                'display_name' => 'Equipamentos - Marcas: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'patrimonial_models',
                'display_name' => 'Equipamentos - Modelos',
                'description' => 'Listagem de Modelos de Equipamentos'
            ],
            [
                'name' => 'patrimonial_models.create',
                'display_name' => 'Equipamentos - Modelos: Inclusão',
                'description' => 'Adicionar novo Modelo de Equipamento'
            ],
            [
                'name' => 'patrimonial_models.show',
                'display_name' => 'Equipamentos - Modelos: Consulta',
                'description' => 'Consultar dados do Modelo de Equipamento'
            ],
            [
                'name' => 'patrimonial_models.edit',
                'display_name' => 'Equipamentos - Modelos: Alteração',
                'description' => 'Alterar dados do Modelo de Equipamento'
            ],
            [
                'name' => 'patrimonial_models.destroy',
                'display_name' => 'Equipamentos - Modelos: Exclusão',
                'description' => 'Excluir Modelo de Equipamento'
            ],
            [
                'name' => 'patrimonial_models.logs',
                'display_name' => 'Equipamentos - Modelos: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'patrimonial_types',
                'display_name' => 'Equipamentos - Tipos',
                'description' => 'Listagem de Tipos de Equipamentos'
            ],
            [
                'name' => 'patrimonial_types.create',
                'display_name' => 'Equipamentos - Tipos: Inclusão',
                'description' => 'Adicionar novo Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonial_types.show',
                'display_name' => 'Equipamentos - Tipos: Consulta',
                'description' => 'Consultar dados do Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonial_types.edit',
                'display_name' => 'Equipamentos - Tipos: Alteração',
                'description' => 'Alterar dados do Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonial_types.destroy',
                'display_name' => 'Equipamentos - Tipos: Exclusão',
                'description' => 'Excluir Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonial_types.logs',
                'display_name' => 'Equipamentos - Tipos: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'patrimonial_sub_types',
                'display_name' => 'Equipamentos - Sub-Tipos',
                'description' => 'Listagem de Sub-Tipos de Equipamentos'
            ],
            [
                'name' => 'patrimonial_sub_types.create',
                'display_name' => 'Equipamentos - Sub-Tipos: Inclusão',
                'description' => 'Adicionar novo Sub-Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonial_sub_types.show',
                'display_name' => 'Equipamentos - Sub-Tipos: Consulta',
                'description' => 'Consultar dados do Sub-Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonial_sub_types.edit',
                'display_name' => 'Equipamentos - Sub-Tipos: Alteração',
                'description' => 'Alterar dados do Sub-Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonial_sub_types.destroy',
                'display_name' => 'Equipamentos - Sub-Tipos: Exclusão',
                'description' => 'Excluir Sub-Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonial_sub_types.logs',
                'display_name' => 'Equipamentos - Sub-Tipos: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'patrimonials',
                'display_name' => 'Equipamentos',
                'description' => 'Listagem de Equipamentos'
            ],
            [
                'name' => 'patrimonials.create',
                'display_name' => 'Equipamentos: Inclusão',
                'description' => 'Adicionar novo Equipamento'
            ],
            [
                'name' => 'patrimonials.show',
                'display_name' => 'Equipamentos: Consulta',
                'description' => 'Consultar dados do Equipamento'
            ],
            [
                'name' => 'patrimonials.edit',
                'display_name' => 'Equipamentos: Alteração',
                'description' => 'Alterar dados do Equipamento'
            ],
            [
                'name' => 'patrimonials.destroy',
                'display_name' => 'Equipamentos: Exclusão',
                'description' => 'Excluir Sub-Tipo de Equipamento'
            ],
            [
                'name' => 'patrimonials.logs',
                'display_name' => 'Equipamentos: Logs',
                'description' => 'Registro das transações.'
            ],
            
            [
                'name' => 'contracts',
                'display_name' => 'Contratos',
                'description' => 'Listagem de Modelos de Equipamentos'
            ],
            [
                'name' => 'contracts.create',
                'display_name' => 'Contratos: Inclusão',
                'description' => 'Adicionar novo Contrato'
            ],
            [
                'name' => 'contracts.show',
                'display_name' => 'Contratos: Consulta',
                'description' => 'Consultar dados do Contrato'
            ],
            [
                'name' => 'contracts.edit',
                'display_name' => 'Contratos: Alteração',
                'description' => 'Alterar dados do Contrato'
            ],
            [
                'name' => 'contracts.destroy',
                'display_name' => 'Contratos: Exclusão',
                'description' => 'Excluir Contrato'
            ],
            [
                'name' => 'contracts.logs',
                'display_name' => 'Contratos: Logs',
                'description' => 'Registro das transações.'
            ],

            [
                'name' => 'orders',
                'display_name' => 'Ordens de Serviços',
                'description' => 'Listagem das Ordens de Serviços'
            ],
            [
                'name' => 'orders.create',
                'display_name' => 'Ordens de Serviços: Inclusão',
                'description' => 'Adicionar nova Ordem de Serviço'
            ],
            [
                'name' => 'orders.show',
                'display_name' => 'Ordens de Serviços: Consulta',
                'description' => 'Consultar Ordem de Serviço'
            ],
            [
                'name' => 'orders.edit',
                'display_name' => 'Ordens de Serviços: Alteração',
                'description' => 'Alterar Ordem de Serviço'
            ],
            [
                'name' => 'orders.destroy',
                'display_name' => 'Ordens de Serviços: Exclusão',
                'description' => 'Excluir Ordem de Serviço'
            ],

            [
                'name' => 'orders_services.search',
                'display_name' => 'Ordens de Serviços: Serviços - Inclusão',
                'description' => 'Inclusão de serviços na Ordem de Serviço'
            ],
            [
                'name' => 'orders_services.destroy',
                'display_name' => 'Ordens de Serviços: Serviços - Exclusão',
                'description' => 'Exclusão de serviços na Ordem de Serviço'
            ],

            [
                'name' => 'orders_materials.search',
                'display_name' => 'Ordens de Serviços: Materiais - Inclusão',
                'description' => 'Inclusão de materiais na Ordem de Serviço'
            ],
            [
                'name' => 'orders_materials.destroy',
                'display_name' => 'Ordens de Serviços: Materiais - Exclusão',
                'description' => 'Exclusão de materiais na Ordem de Serviço'
            ]
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
