<?php

namespace PageBundle\Entity;

use PageBundle\Model\AbstractContent;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class contact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PageBundle\Entity\Repository\ContactRepository")
 */

class Contact extends AbstractContent{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

}
