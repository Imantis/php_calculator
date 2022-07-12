<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * php bin/console make:entity --regenerate App\Entity
 * php bin/console doctrine:schema:update --force
 *
 * @ORM\Table(name="calculator_record")
 * @ORM\Entity(repositoryClass="App\Repository\CalculatorRecordRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CalculatorRecord
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $record;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecord(): ?string
    {
        return $this->record;
    }

    public function setRecord(string $record): self
    {
        $this->record = $record;

        return $this;
    }

}
