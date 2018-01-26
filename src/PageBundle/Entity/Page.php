<?php

namespace PageBundle\Entity;

use PageBundle\Model\AbstractContent;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Page
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PageBundle\Entity\Repository\PageRepository")
 * @Vich\Uploadable
 */

class Page extends AbstractContent{

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
     * @ORM\Column(name="slug", type="string", length=255)
     * @Gedmo\Slug(fields={"title"}, updatable=false)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="slugNew", type="string", length=255)
     */
     private $linkNew;

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
     * Set link
     *
     * @param string $link
     * @return Page
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set link
     *
     * @param string $linkNew
     * @return Page
     */
     public function setLinkNew($linkNew)
     {
         $this->linkNew = $linkNew;
 
         return $this;
     }
 
     /**
      * Get linkNew
      *
      * @return string 
      */
     public function getLinkNew()
     {
         return $this->linkNew;
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

}
