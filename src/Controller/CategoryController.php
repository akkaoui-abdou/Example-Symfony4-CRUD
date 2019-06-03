<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Category;

/**
 * @Route("/category", name="category.")
 */


class CategoryController extends AbstractController
{




    /**
     * @Route("/list", name="list")
     */
    public function listCategory(Request $request,CategoryRepository $catRep)
    {
        
        $category = $catRep->findAll();
         return $this->render('category\list.html.twig',['category'=>$category]);

    }


    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {
        
        $category = new Category;
        $form     = $this->createForm(CategoryType::class,$category);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('category.list');
        }


         return $this->render('category\create.html.twig',['form'=>$form->createView()]);

    }



/**
     * @Route("/update/{id}", name="update")
     */
    public function update($id,Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::class)->findOneById($id);


        $form = $this->createForm(CategoryType::class,$category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($category);
            $em->flush();
            $this->addFlash('success','category was updated');
            return $this->redirectToRoute('category.list');
        }

        return $this->render('category\update.html.twig',['form'=>$form->createView()]);


    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {

        $em = $this->getDoctrine()->getManager();
        //$person = $personRep->find($id); PersonRepository $personRep
        $category = $em->getRepository(Category::class)->findOneById($id);

        $em->remove($category);
        $em->flush();

         $this->addFlash(
            'success',
            'category was deleted'
        );

        return $this->redirectToRoute('category.list');



    }



}
