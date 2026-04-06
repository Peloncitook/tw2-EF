<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class InitialStructure extends BaseMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     *
     * @return void
     */
    public function up(): void
    {
        $this->table('documents')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('titulo', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('tipo', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('fecha_emision', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('entidad_emisora', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('archivo_url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('estado', 'string', [
                'default' => 'Revision',
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                $this->index('user_id')
                    ->setName('fk_documents_users')
            )
            ->create();

        $this->table('roles')
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('descripcion', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('apellido', 'string', [
                'default' => null,
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('correo', 'string', [
                'default' => null,
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('language', 'string', [
                'default' => 'es',
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('direccion', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addIndex(
                $this->index('correo')
                    ->setName('uq_users_correo')
                    ->setType('unique')
            )
            ->create();

        $this->table('documents')
            ->addForeignKey(
                $this->foreignKey('user_id')
                    ->setReferencedTable('users')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_documents_users')
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     *
     * @return void
     */
    public function down(): void
    {
        $this->table('documents')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('documents')->drop()->save();
        $this->table('roles')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
