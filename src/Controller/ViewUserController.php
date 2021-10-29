<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\DataTableFactory;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;

class ViewUserController extends AbstractController
{
    /**
     * @Route("/view/user", name="view_user")
     */

    public function displayAction(DataTableFactory $dataTableFactory): Response
    {
        $users = $this->getDoctrine()
            ->getRepository('App:User')
            ->findAll();
//        $table = $dataTableFactory->create()
//            ->add('fullName', TextColumn::class)
//            ->add('Email', TextColumn::class)
//            ->add('Username', TextColumn::class)
//            ->createAdapter(ORMAdapter::class, [
//                'entity' => User::class,
//            ]);
        return $this->render('view_user/index.html.twig', array('data' => $users));

//        $table = $this->createDataTable()
//            ->add('firstName', TextColumn::class)
//            ->add('lastName', TextColumn::class)
//            ->add('company', TextColumn::class, ['field' => 'company.name'])
//            ->createAdapter(ORMAdapter::class, [
//                'entity' => Employee::class,
//            ]);

    }

}
