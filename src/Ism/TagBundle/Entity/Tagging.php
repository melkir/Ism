<?php

namespace Ism\TagBundle\Entity;

use \FPN\TagBundle\Entity\Tagging as BaseTagging;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * Ism\TagBundle\Entity\Tagging
 *
 * @ORM\Table(name="ism_tagging", uniqueConstraints={@UniqueConstraint(name="tagging_idx", columns={"tag_id", "resource_type", "resource_id"})})
 * @ORM\Entity
 */
class Tagging extends BaseTagging
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Tag", inversedBy="tagging")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     **/
    protected $tag;
}
