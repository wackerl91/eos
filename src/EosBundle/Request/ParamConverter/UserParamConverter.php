<?php
namespace EosBundle\Request\ParamConverter;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

use EosBundle\Document\UserInfo;
use EosBundle\Manager\ManagerInterface;

class UserParamConverter implements ParamConverterInterface
{
    /**
     * @var ManagerInterface
     */
    protected $manager;

    /**
     * UserParamConverter constructor.
     * @param ManagerInterface $manager
     */
    public function __construct(ManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param Request        $request
     * @param ParamConverter $configuration
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        if ($request->attributes->has('userId')) {
            $userId = $request->attributes->get('userId');

            if ($userId instanceof UserInfo) {

                return true;
            } else {
                $user = $this->manager->getRepository()->findOneBy(['userId' => $userId]);

                if ($user === null) {
                    $user = new UserInfo($userId);
                }

                $request->attributes->set('userId', $user);
            }
        }

        if ($request->attributes->has('user')) {
            $user = $request->attributes->get('user');

            if ($user instanceof UserInfo) {

                return true;
            }

            $user = $this->manager->getRepository()->findOneBy(['userId' => $user]);

            if ($user === null) {
                throw new \Exception("User not found.");
            }

            $request->attributes->set('user', $user);
        }

        return true;
    }

    public function supports(ParamConverter $configuration)
    {
        return $this->manager->supports($configuration->getClass());
    }
}
