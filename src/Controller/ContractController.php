<?php

namespace App\Controller;

use App\Entity\Contract;
use App\Form\ContractType;
use App\Repository\ContractRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backend/contract")
 */
class ContractController extends AbstractController
{
    /**
     * @Route("/", name="contract_index", methods={"GET"})
     */
    public function index(ContractRepository $contractRepository): Response
    {
        return $this->render('contract/index.html.twig', [
            'contracts' => $contractRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="contract_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contract = new Contract();
        $form = $this->createForm(ContractType::class, $contract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contract);
            $entityManager->flush();

            return $this->redirectToRoute('contract_index');
        }

        return $this->render('contract/new.html.twig', [
            'contract' => $contract,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contract_show", methods={"GET"})
     */
    public function show(Contract $contract): Response
    {
    	$clausulas = [
    		1=>'I',
    		2=>'II',
    		3=>'III',
    		4=>'IV',
    		5=>'V',
    		6=>'VI',
    		7=>'VII',
    		8=>'VIII',
    		9=>'IX',
    		10=>'X',
    		11=>'XI',
    		12=>'XII',
    		13=>'XIII',
    		14=>'XIV',
    		15=>'XV',
    		16=>'XVI',
    		17=>'XVII',
    		18=>'XVIII',
    		19=>'XIX',
    		20=>'XX',
    		21=>'XXI',
    		22=>'XXII',
    ];
    
        return $this->render('contract/show.html.twig', [
            'contract' => $contract,
            'clausulas' => $clausulas
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contract_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contract $contract): Response
    {
        $form = $this->createForm(ContractType::class, $contract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contract_index', [
                'id' => $contract->getId(),
            ]);
        }

        return $this->render('contract/edit.html.twig', [
            'contract' => $contract,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contract_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contract $contract): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contract->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contract);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contract_index');
    }
}
