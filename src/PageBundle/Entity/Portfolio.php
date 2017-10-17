<?php

namespace PageBundle\Entity;

use PageBundle\Model\AbstractContent;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class portfolio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PageBundle\Entity\Repository\PortfolioRepository")
 */

class Portfolio extends AbstractContent{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="video_id", type="string", length=255)
     */
     private $videoid;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

        /**
     * Set title
     *
     * @param string $title
     *
     * @return Page
     */
     public function setTitle($title)
     {
         $this->title = $title;
 
         return $this;
     }
 
     /**
      * Get title
      *
      * @return string
      */
     public function getTitle()
     {
         return $this->title;
     }
 
     /**
      * Set published
      *
      * @param boolean $published
      * @return Page
      */
      public function setPublished($published)
      {
          $this->published = $published;
  
          return $this;
      }
  
      /**
       * Get published
       *
       * @return boolean 
       */
      public function getPublished()
      {
          return $this->published;
      }

    /**
     * Set videoid
     *
     * @param string $videoid
     * @return Page
     */
     public function setVideoid($videoid)
     {
         $this->videoid = $videoid;
 
         return $this;
     }
 
     /**
      * Get videoid
      *
      * @return string 
      */
     public function getVideoid()
     {
         return $this->videoid;
     }

}
