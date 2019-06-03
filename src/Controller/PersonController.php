<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PersonRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Services\FileUploader;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/person", name="person.")
 */

class PersonController extends AbstractController
{




    /**
     * @Route("/", name="list")
     */
    public function index(PersonRepository $personRep, Request $request, PaginatorInterface $paginator)
    {


       // $person = $personRep->findAll();

        $queryBuilder = $personRep->getAllPerson();

        $person = $paginator->paginate(
            $queryBuilder, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render('person\list-person.html.twig',['person' => $person]);


    }




    /**
     * @Route("/create", name="create")
     */
    public function create(PersonRepository $personRep,Request $request,FileUploader $FileUploader)
    {
        
        $person = new Person;

        $form = $this->createForm(PersonType::class,$person);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();


            $file = $request->files->get('person')['attachment'];

            if($file){
                $filename = $FileUploader->uploadFile($file);
                $person->setPicture($filename);
            }


            $em->persist($person);
            $em->flush();
            $this->addFlash('success','Person was added');
            return $this->redirectToRoute('person.list');

        }

        return $this->render('person\create.html.twig',['form'=>$form->createView()]);

    }


    /**
     * @Route("/show", name="show")
     */
    public function show(PersonRepository $personRep,Request $request,FileUploader $FileUploader)
    {
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update($id,PersonRepository $personRep,Request $request,FileUploader $FileUploader)
    {

        $em = $this->getDoctrine()->getManager();
        $person = $em->getRepository(Person::class)->findOneById($id);


        $form = $this->createForm(PersonType::class,$person);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           

            $file = $request->files->get('person')['attachment'];

            if($file){
                $filename = $FileUploader->uploadFile($file);
                $person->setPicture($filename);
            }


            $em->persist($person);
            $em->flush();
            $this->addFlash('success','Person was updated');
            return $this->redirectToRoute('person.list');

        }

        return $this->render('person\update.html.twig',['form'=>$form->createView()]);


    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {

        $em = $this->getDoctrine()->getManager();
        //$person = $personRep->find($id); PersonRepository $personRep
        $person = $em->getRepository(Person::class)->findOneById($id);

        $em->remove($person);
        $em->flush();

        
         $this->addFlash(
            'success',
            'person was deleted'
        );

        return $this->redirectToRoute('person.list');



    }



    /**
     *@Route("/search",name="search")
     */

    public function search(PersonRepository $personRep,Request $request, PaginatorInterface $paginator){

        //$search = $request->query()->get('search');
        $search = $request->get('search');
        $queryBuilder = $personRep->searchPerson($search);

      
        $person = $paginator->paginate(
            $queryBuilder, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render('person\list-person.html.twig',['person' => $person]);


    }




}
