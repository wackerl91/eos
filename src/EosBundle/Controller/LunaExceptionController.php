<?php

namespace EosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\Controller\FOSRestController;

use EosBundle\Document\LunaException;
use EosBundle\Document\UserInfo;
use EosBundle\Form\LunaExceptionType;

/**
 * @REST\NamePrefix("eos_api_")
 */
class LunaExceptionController extends FOSRestController
{
    /**
     * @REST\Route("/user/{user}/exception/create")
     *
     * @param Request  $request
     * @param UserInfo $user
     *
     * @return \FOS\RestBundle\View\View
     */
    public function postExceptionAction(Request $request, UserInfo $user)
    {
        $lunaException = new LunaException();
        $lunaException->setUserInformation($user);

        $form = $this->createForm(LunaExceptionType::class, $lunaException);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $dm = $this->get('eos.manager.luna_exception');
            $dm->persist($lunaException);

            return $this->view([], Response::HTTP_CREATED);
        }

        return $this->view([], Response::HTTP_BAD_REQUEST);
    }
}
