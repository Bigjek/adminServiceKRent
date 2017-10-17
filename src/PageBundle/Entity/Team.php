<?php

namespace PageBundle\Entity;

use PageBundle\Model\AbstractContent;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Team
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PageBundle\Entity\Repository\TeamRepository")
 * @Vich\Uploadable
 */

class Team extends AbstractContent{

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
     * @ORM\Column(name="team_image", type="string")
     */
     private $mainImage;

     /**
      * @var File
      * @Vich\UploadableField(mapping="team_images", fileNameProperty="mainImage")
      */
     private $mainImageFile;


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
     * @param $mainImage
     */
    public function setMainImage($mainImage)
    {
        $this->mainImage = $mainImage;
        return $this;
    }

    /**
     * @return string
     */
    public function getMainImage()
    {
        return $this->mainImage;
    }

    /**
     * @param File $mainImageFile
     */
    public function setMainImageFile(File $mainImageFile)
    {
        $this->mainImageFile = $mainImageFile;

        if ($mainImageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getMainImageFile()
    {
        return $this->mainImageFile;
    }
}
