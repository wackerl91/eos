<?php

namespace EosBundle\Controller;

use EosBundle\Document\LunaLogEntry;
use EosBundle\Form\LunaLogEntryType;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\Controller\FOSRestController;

use EosBundle\Document\UserInfo;
use Symfony\Component\HttpFoundation\Response;

/**
 * @REST\NamePrefix("eos_api_")
 */
class LunaLogEntryController extends FOSRestController
{
    /**
     * @REST\Route("/user/{user}/log/create")
     *
     * @param Request  $request
     * @param UserInfo $user
     *
     * @return \FOS\RestBundle\View\View
     */
    public function postLogEntryAction(Request $request, UserInfo $user)
    {
        $lunaLogEntry = new LunaLogEntry();
        $lunaLogEntry->setUserInformation($user);

        $form = $this->createForm(LunaLogEntryType::class, $lunaLogEntry);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $dm = $this->get('eos.manager.luna_log_entry');
            $dm->persist($lunaLogEntry);

            return $this->view([], Response::HTTP_CREATED);
        }

        return $this->view([], Response::HTTP_BAD_REQUEST);
    }
}
