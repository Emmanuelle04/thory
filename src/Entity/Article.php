<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="blog_article")
 */

class Article
{


    /**
     * @Assert\Length(
     * min = 10,
     * max = 70,
     * minMessage = "Ce titre est trop court",
     * maxMessage = "Ce titre est trop long"
     * )
     

     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    public $title;

    /**
     * @Assert\NotBlank(message = "This content is required.")
    
     * @ORM\Column(type="text")
     */
    public $content;

    /**
     * @Assert\NotBlank(message = "An author should be associated with an article.")

     * @ORM\Column(type="text")
     */
    public $author;

    /**
    * @ORM\Column(type="date", name="date")
    */
    public $publicationDate;


    public function getAuthor()
    {
        return $this->author;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public  function getPublicationDate()
    {
        return $this->publicationDate;
    }


    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }
}
