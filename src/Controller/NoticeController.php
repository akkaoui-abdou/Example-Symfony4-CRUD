<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\NoticeType;
use App\Repository\NoticeRepository;
use App\Entity\Notice;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



 /**
  * @Route("/notice", name="notice.")
  */

class NoticeController extends AbstractController
{


    /**
     * @Route("/list", name="list")
     */
    public function list(NoticeRepository $noticeRep,Request $request, PaginatorInterface $paginator)
    {

        $queryBuilder = $noticeRep->getAllNotice();

        $notice = $paginator->paginate(
            $queryBuilder, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

         return $this->render('notice\list.html.twig',['notice'=>$notice]);

    }



    /**
     * @Route("/create", name="create")
     */
    public function create(NoticeRepository $noticeRep,Request $request)
    {
        
        $notice = new Notice;
        $form = $this->createForm(NoticeType::class,$notice);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($notice);
            $em->flush();
            $this->addFlash('success','Notice was added');
            return $this->redirectToRoute('notice.list');
        }
        return $this->render('notice\create.html.twig',['form'=>$form->createView()]);

    }



    /**
     * @Route("/update/{id}", name="update")
     */
    public function update($id,noticeRepository $noticeRep,Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $notice = $em->getRepository(notice::class)->findOneById($id);


        $form = $this->createForm(noticeType::class,$notice);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($notice);
            $em->flush();
            $this->addFlash('success','notice was updated');
            return $this->redirectToRoute('notice.list');
        }

        return $this->render('notice\update.html.twig',['form'=>$form->createView()]);


    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {

        $em = $this->getDoctrine()->getManager();
        //$person = $personRep->find($id); PersonRepository $personRep
        $person = $em->getRepository(notice::class)->findOneById($id);

        $em->remove($person);
        $em->flush();
         $this->addFlash(
            'success',
            'notice was deleted'
        );
        return $this->redirectToRoute('notice.list');

    }




}
