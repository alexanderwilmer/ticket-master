<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Historico Entity
 *
 * @property int $id
 * @property string $estado_id
 * @property string $users_id
 * @property \Cake\I18n\FrozenTime $fecha
 * @property string $descripcion
 *
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\User $user
 */
class Historico extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
