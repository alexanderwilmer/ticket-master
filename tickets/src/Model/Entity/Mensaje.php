<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mensaje Entity
 *
 * @property int $id
 * @property int $emisor_id
 * @property int $receptor_id
 * @property string $mensaje
 * @property string $asunto
 * @property int $estado
 *
 * @property \App\Model\Entity\Emisor $emisor
 * @property \App\Model\Entity\Receptor $receptor
 */
class Mensaje extends Entity
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
