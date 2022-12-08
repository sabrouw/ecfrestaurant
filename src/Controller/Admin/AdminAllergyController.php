<?php

namespace App\Controller\Admin;

use App\Entity\Allergy;
use App\Form\AllergyType;
use App\Repository\AllergyRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


//#[IsGranted('ROLE_ADMIN')]
class AdminAllergyController extends AbstractController
{ //return allergy's list of my database
    #[Route('/admin/allergy', name: 'admin_allergy_list')]
    public function allergyList(AllergyRepository $allergyRepository): Response
    {   
        $allergy = $allergyRepository->findAll();

        return $this->render('admin_allergy/index.html.twig', [
            'allergy' => $allergy,
        ]);
    }
    //delete allergy of my database
    #[Route('/admin/allergy/{id}/delete', name: 'admin_allergy_delete')]
    public function allergyDelete($id, AllergyRepository $allergyRepository, EntityManagerInterface $entityManager): Response
    {   
        $allergy = $allergyRepository->find($id);
        \dd($id);
        $entityManager->remove($allergy);
        //on tire la chasse avec flush
        $entityManager->flush();

        return $this->redirectToRoute('admin_allergy_list');
    }
    //create allergy on database with form
    #[Route('/admin/allergy/create', name: 'admin_allergy_create')]
    public function allergyCreate(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $allergy = new Allergy();
        $allergyForm = $this->createForm(AllergyType::class, $allergy);
        $allergyForm->handleRequest($request);
        if($allergyForm->isSubmitted()&& $allergyForm->isValid()){
            $entityManager->persist($allergy);
            $entityManager->flush();
        }

        
       

        return $this->render('/admin_allergy/allergy_create.html.twig', [
            'allergyForm' => $allergyForm->createView(),
        ]);
    }



}
