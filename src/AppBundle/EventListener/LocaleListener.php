<?php
namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LocaleListener implements EventSubscriberInterface
{
    private $defaultLocale;

    public function __construct($defaultLocale = 'ru')
    {
        $this->defaultLocale = $defaultLocale;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $requestUriArray = array_filter(explode('/', $request->getRequestUri()), 'strlen');

        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
        } elseif ($requestUriArray[1]!= $request->getSession()->get('_locale', $this->defaultLocale) &&
            $requestUriArray[1]!='admin' &&
            preg_match('/^_fragment/', $requestUriArray[1])!=1 &&
            $requestUriArray[1]!='_profiler' &&
            $requestUriArray[1]!='_wdt') {
            // if no explicit locale has been set on this request, use one from the session
                $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
                $request->attributes->set('_locale', $request->getSession()->get('_locale', $this->defaultLocale));
                array_unshift($requestUriArray, '', $request->getLocale());
                $newUri = implode('/', $requestUriArray);
                $response = new RedirectResponse($newUri, 302);
                $event->setResponse($response);
        }
        if (strpos($request->getRequestUri(), '/admin/')!==false) {
            $request->setLocale($this->defaultLocale);
            $request->getSession()->set('_locale', $this->defaultLocale);
            $request->attributes->set('_locale', $this->defaultLocale);
        }


    }

    public static function getSubscribedEvents()
    {
        return array(
            // must be registered after the default Locale listener
            KernelEvents::REQUEST => array(array('onKernelRequest', 17)),
        );
    }
}