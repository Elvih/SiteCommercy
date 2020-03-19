<?php
namespace App\Listener;

use Doctrine\ORM\Events;
use App\Entity\Evenement;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriber {

    /**
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * @var UploaderHelper
     */
    private $uploaderHelper;



    public function __construct(CacheManager $cacheManager,UploaderHelper $uploaderHelper)
    {
        $this->cacheManager = $cacheManager;
        $this->uploaderHelper = $uploaderHelper;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::postRemove,
            Events::postUpdate,
        ];
    }

    public function postRemove(LifecycleEventArgs $args){

        $entity = $args->getEntity();
        if(!$entity instanceof Evenement){
            return;
        }
        $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
    }

    public function postUpdate(PreUpdateEventArgs $args){

        $entity = $args->getEntity();
        if(!$entity instanceof Evenement){
            return;
        }
        if ($entity->getImageFile() instanceof UploadedFile){
            $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
        }
    }

}