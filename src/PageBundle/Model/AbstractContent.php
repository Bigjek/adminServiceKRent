<?php

namespace PageBundle\Model;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;


/**
 *  @ORM\MappedSuperclass
 *
 */
class AbstractContent 
{

    /**
     * @var string
     * @ORM\Column(name="title", type="string")
     *
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(name="content", type="text")
     *
     */
    protected $content;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;


    /**
     * @var boolean
     * @ORM\Column(name="is_published", type="boolean")
     */
    protected $published;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->published = true;
    }
    /**
     * @param $title
     * @return AbstractContent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $content
     * @return AbstractContent
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $updatedAt
     * @return AbstractContent
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param $createdAt
     * @return AbstractContent
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param boolean $published
     * @return AbstractContent
     */
    public function setIsPublished($published)
    {
        $this->published = $published;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return ($this->title)?$this->title:'-';
    }


}