<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property string $name
 * @property string $descripcion
 * @property \Cake\I18n\FrozenTime $fecha
 * @property int $estado_id
 * @property string $archivo
 * @property string $prioridad_id
 * @property int $departamento_id
 * @property int $user_id
 * @property int $progreso
 * @property int $secretaria_id
 * @property int $tiempo_limite
 * @property int $contratiempo_id
 * @property int $completado
 * @property string $comprobante
 *
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\Prioridad $prioridad
 * @property \App\Model\Entity\Departamento $departamento
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Secretaria $secretaria
 * @property \App\Model\Entity\Contratiempo $contratiempo
 * @property \App\Model\Entity\TicketAsignado[] $ticket_asignados
 */
class Ticket extends Entity
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
