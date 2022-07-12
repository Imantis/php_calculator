<?php
namespace App\Controller;

use App\Entity\CalculatorRecord;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     * @Route("/calculator", name="calculator_view")
     */
    public function number(): Response
    {
        //get calculatorRecords
        $calculatorRecords = $this->doctrine->getRepository(CalculatorRecord::class)->findAll();

        return $this->render('calculator/main.html.twig', [
            'calculatorRecords' => $calculatorRecords,
        ]);
    }
}
