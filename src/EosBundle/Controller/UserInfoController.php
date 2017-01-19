<?php

namespace EosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\Controller\FOSRestController;

use EosBundle\Document\UserInfo;
use EosBundle\Form\UserInfoType;

/**
 * @REST\NamePrefix("eos_api_")
 */
class UserInfoController extends FOSRestController
{
    /**
     * @REST\Route("/user/{userId}/upsert")
     *
     * @param Request  $request
     * @param UserInfo $userId
     *
     * @return \FOS\RestBundle\View\View
     */
    public function putUserAction(Request $request, UserInfo $userId)
    {
        $form = $this->createForm(UserInfoType::class, $userId);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $dm = $this->get('eos.manager.user_info');
            $dm->persist($userId);

            return $this->view($userId, Response::HTTP_CREATED);
        }

        return $this->view($form->getErrors(), Response::HTTP_BAD_REQUEST);
    }
}
