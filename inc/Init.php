<?php
/**
 * @package fancy_bookshelf
 */
namespace Inc;

//can not inherit for protection made it final
final class Init
{

    /**
     * Store all the class inside an array
     * @return array full of services
     *
     *
     */
    public static function get_services()
    {
        return [
           
            Base\Enqueue::class,
            Base\ShortcodeController::class,
            Base\CustomtexnomyController::class,
            Base\CustomtexnomyTagcontroller::class,
            Base\CustomposttypeController::class
        ];
    }
    /**
     * Loop through the classes ,initallize them and call register method if exist
     * @return array
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
    /**
     * initiallze the class
     * @param class $class  class from the service array
     * @return class instance  new instance of the  class
     */
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}
