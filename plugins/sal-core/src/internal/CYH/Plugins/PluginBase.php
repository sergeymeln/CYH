<?php


namespace CYH\Plugins;


use CYH\Context\Base\ControllerContext;
use CYH\Models\Core\ViewDirRegistryEntry;

class PluginBase
{
    protected static $viewDirMap = [];

    public static function RegisterViewDirectories(ViewDirRegistryEntry $entry)
    {
        self::$viewDirMap[] = $entry;
    }

    public static function GetViewDirectories()
    {
        return self::$viewDirMap;
    }

    public static function RegisterControllerActions(array $classNames, ControllerContext $context)
    {
        self::AddControllerActions($classNames, $context);
        self::InitializeActions();
    }

    /**
     * Registers controller methods as ajax callbacks. All methods are accessible via 'wp_ajax_' prefix
     * @param array $classNames
     * @param ControllerContext $context
     * @throws \ReflectionException
     */
    public static function RegisterAjaxControllerActions(array $classNames, ControllerContext $context)
    {
        self::AddControllerActions($classNames, $context, 'wp_ajax_');
        self::AddControllerActions($classNames, $context, 'wp_ajax_nopriv_');
    }

    /**
     * Adds actions based on controller methods found through the reflection
     * @param array $classNames
     * @param ControllerContext $context
     * @param string $actionPrefix
     * @throws \ReflectionException
     */
    private static function AddControllerActions(array $classNames, ControllerContext $context, $actionPrefix = '')
    {
        foreach ($classNames as $class) {
            $varName = str_replace('\\', '', $class);
            $$varName = new $class($context);
            $classReflector = new \ReflectionClass($$varName);
            $methodsList = $classReflector->getMethods(\ReflectionMethod::IS_PUBLIC);
            foreach ($methodsList as $method) {

                if (substr($method->name, 0, 2) == '__') {//skipping magic methods
                    continue;
                }
                $methodReflector = new \ReflectionMethod($$varName, $method->name);
                $paramCount = $methodReflector->getNumberOfParameters();
                $newActionName = $actionPrefix . $class . '::' . $method->name;
                if (!has_action($newActionName))
                {
                    add_action($newActionName, array($$varName, $method->name), 10, $paramCount);
                }

            }
        }
    }

    protected static function InitializeActions()
    {
        add_action('init', function (){
            ob_start();
        });

        add_action('shutdown', function() {
            $final = '';

            // We'll need to get the number of ob levels we're in, so that we can iterate over each, collecting
            // that buffer's output into the final output.
            $levels = ob_get_level();

            for ($i = 0; $i < $levels; $i++) {
                $final .= ob_get_clean();
            }

            // Apply any filters to the final output
            echo apply_filters('cyh-shutdown-filter', $final);
        }, 0);
    }
}