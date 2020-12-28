<?php
 namespace MailPoetVendor\Doctrine\ORM\Internal; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\ORM\EntityManagerInterface; use MailPoetVendor\Doctrine\ORM\Event\LifecycleEventArgs; use MailPoetVendor\Doctrine\ORM\Event\ListenersInvoker; use MailPoetVendor\Doctrine\ORM\Events; use MailPoetVendor\Doctrine\ORM\Mapping\ClassMetadata; final class HydrationCompleteHandler { private $listenersInvoker; private $em; private $deferredPostLoadInvocations = array(); public function __construct(\MailPoetVendor\Doctrine\ORM\Event\ListenersInvoker $listenersInvoker, \MailPoetVendor\Doctrine\ORM\EntityManagerInterface $em) { $this->listenersInvoker = $listenersInvoker; $this->em = $em; } public function deferPostLoadInvoking(\MailPoetVendor\Doctrine\ORM\Mapping\ClassMetadata $class, $entity) { $invoke = $this->listenersInvoker->getSubscribedSystems($class, \MailPoetVendor\Doctrine\ORM\Events::postLoad); if ($invoke === \MailPoetVendor\Doctrine\ORM\Event\ListenersInvoker::INVOKE_NONE) { return; } $this->deferredPostLoadInvocations[] = array($class, $invoke, $entity); } public function hydrationComplete() { $toInvoke = $this->deferredPostLoadInvocations; $this->deferredPostLoadInvocations = array(); foreach ($toInvoke as $classAndEntity) { list($class, $invoke, $entity) = $classAndEntity; $this->listenersInvoker->invoke($class, \MailPoetVendor\Doctrine\ORM\Events::postLoad, $entity, new \MailPoetVendor\Doctrine\ORM\Event\LifecycleEventArgs($entity, $this->em), $invoke); } } } 