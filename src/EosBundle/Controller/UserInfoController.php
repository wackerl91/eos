<?php

namespace EosBundle\Controller;

use EosBundle\Document\InstallationInfo;
use EosBundle\Form\InstallationInfoCreateType;
use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\Controller\FOSRestController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InstallationInfoController
 * @REST\NamePrefix("eos_api_")
 */
class InstallationInfoController extends FOSRestController
{
    /**
     * @REST\Route("/installations/user/{userId}/upsert")
     *
     * @param Request $request
     * @param InstallationInfo  $userId
     *
     * @return \FOS\RestBundle\View\View
     */
    public function putInstallationAction(Request $request, InstallationInfo $userId)
    {
        $form = $this->createForm(InstallationInfoCreateType::class, $userId);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $dm = $this->get('eos.manager.installation_info');
            $dm->persist($userId);

            return $this->view($userId, Response::HTTP_CREATED);
        }

        return $this->view($form->getErrors(), Response::HTTP_BAD_REQUEST);
    }
}
