<?php

/**
 * @package  MdPluginBoilerPlate
 */

namespace App;

final class Init
{

   /**
    * Store all the classes 
    * @return array 
    */

   public static function get_services()
   {
      # We must need to add all the class here 
      # such as, If you want to develop a contact form
      # define your class on the base directory
      # and add that class to this aarray
      return [
         Base\Enqueue::class,
         Pages\Admin::class
      ];
   }



   /**
    * Loop through all the classes, initialize them,
    * and call the register() method
    */
   public static function register_services()
   {
      foreach (self::get_services() as $class) {
         $service = self::instantiate($class);
         # each class should have a register method
         # register method basically triger the hook such as add_action()
         if (method_exists($service, 'register')) {
            $service->register();
         }
      }
   }

   /**
    * Initialize the class
    * @return  instance of the class
    */

   private static function instantiate($class)
   {
      return new $class;
   }
}
