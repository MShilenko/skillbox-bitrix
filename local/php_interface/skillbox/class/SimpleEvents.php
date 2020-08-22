<?

namespace Skillbox;

use Bitrix\Main\EventManager;

class SimpleEvents 
{
    protected $eventManager;

    public function __construct()
    {
        $this->eventManager = EventManager::getInstance();
    }

    public function run(string $componentName, string $event, string $className, string $classEvent) 
    {   
        $this->eventManager->addEventHandler(
            $componentName,
            $event,
            [$className, $classEvent]
        );
    }
}