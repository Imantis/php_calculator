<?php

namespace App\Entity;

trait EntityDateTime {

    /**
     * @ORM\Column(type="datetime", columnDefinition="DATETIME DEFAULT CURRENT_TIMESTAMP")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", columnDefinition="DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP")
     */
    private $updated_at;

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     * @throws \Exception
     */
    public function updateDatetime()
    {
        $this->setUpdatedAt(new \DateTime());
        if (!$this->getCreatedAt()) {
            $this->setCreatedAt(new \DateTime());
        }
    }


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

}
