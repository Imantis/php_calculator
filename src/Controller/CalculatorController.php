<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
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
    public function show(): Response
    {
        //get calculatorRecords
//        $calculatorRecords = $this->doctrine->getRepository(CalculatorRecord::class)->findAll();
        $calculatorRecords = $this->doctrine->getRepository(CalculatorRecord::class)->getRecords();

        return $this->render('calculator/main.html.twig', [
            'calculatorRecords' => $calculatorRecords,
        ]);
    }


    //Create new calculatorRecord from POST
    /**
     * @Route("/calculator/create_record", name="calculator_record_create")
     */
    public function create(Request $request): Response
    {
        //create new calculatorRecords
        $calculatorRecord = new CalculatorRecord();

        //set calculatorRecord from POST
        $calculatorRecord->setRecord($request->request->get('record'));

        //save calculatorRecord
        $this->doctrine->getManager()->persist($calculatorRecord);
        $this->doctrine->getManager()->flush();

        //return JSON success
        return $this->json(['success' => true]);
    }

}
