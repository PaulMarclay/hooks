<?php
    /*
    *   Hooks version 1.0
    *
    *   Imagina - Plugin.
    *
    *
    *   Copyright (c) 2012 Dolem Labs
    *
    *   Authors:    Paul Marclay (paul.eduardo.marclay@gmail.com)
    *
    */
    
    // http://www.php.net/manual/es/control-structures.declare.php#85290
    
    class Hook_Primitive extends Ancestor {
        protected static $_hooks = array();
        
        public static function add($hookKey, $callbackClass, $callbackMethod, $parameters = array()) {
            self::$_hooks[$hookKey][] = array(
                                        'callback_class' => $callbackClass,
                                        'callback_method' => $callbackMethod, 
                                        'parameters' => $parameters
                                            );
            
        }
        
        public function remove($hookKey, $callbackMethod) {
            
        }
        
        public static function run($hookKey) {
            if (!self::$_hooks) return;
            if (!isset(self::$_hooks[$hookKey])) return;
            
            foreach (self::$_hooks[$hookKey] as $hook) {
                if ($hook) {
                    Api::getLog()->put("HOOK FOR $hookKey: ");
                    Api::getLog()->put('Calling: '.$hook['callback_class'].'#'.$hook['callback_method']);
                    call_user_func_array(array($hook['callback_class'], $hook['callback_method']), $hook['parameters']);
                    Api::getLog()->put("END HOOKS");
                    
                }
            }
        }
        
        public static function hookManager(){
            $traces = debug_backtrace(false);
            // solo funciona para php version: > 5.3.6
//            $traces = debug_backtrace(false, 1);
            
            $trace  = $traces[1];
            unset($traces);
            
            if (!isset($trace['class']) || !isset($trace['type'])) {
                return;
            }

            $hookKey = $trace['class'].$trace['type'].$trace['function'];
            self::run($hookKey);
        }
        
        public static function getHooks() {
            return self::$_hooks;
        }
    }