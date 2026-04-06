<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Document Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $titulo
 * @property string $tipo
 * @property \Cake\I18n\Date $fecha_emision
 * @property string|null $entidad_emisora
 * @property string|null $archivo_url
 * @property string|null $estado
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Document extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'titulo' => true,
        'tipo' => true,
        'fecha_emision' => true,
        'entidad_emisora' => true,
        'archivo_url' => true,
        'estado' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
