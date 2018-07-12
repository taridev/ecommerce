<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 10:50
 */

namespace App;

use Core\Config;
use Core\Database\MysqlDatabase;

class App
{
    public $title = 'eCommerçant';
    private static $instance_;
    private $db_instance;
    private $module_list;

    public function __construct()
    {
        if ($handle = opendir('../app/Views/')) {
            $this->module_list = [];
            while (false !== ($file = readdir($handle))) {
                if ($file != "." and $file != ".." and $file != "app" and $file != "templates" and !is_file($file)) {
                    $this->module_list [] = strtolower($file);
                }
            }
            closedir($handle);
        }
    }

    /**
     * Retourne l'instance de l'application si elle existe déjà
     * ou bien crée cette instance.
     *
     * @return App
     */
    public static function getInstance()
    {
        if (is_null(self::$instance_)) {
            self::$instance_ = new App();
        }
        return self::$instance_;
    }

    public function isModule($module)
    {
        return in_array($module, $this->module_list);
    }

    /**
     * Appel des différents autoloader (Core & App)
     *
     * @return void
     */
    public static function load()
    {
        session_start();
        require ROOT . '/app/Autoloader.php';
        Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        \Core\Autoloader::register();
    }

    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if ($this->db_instance === null) {
            $this->db_instance = new MysqlDatabase(
                $config->get('db_name'),
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_host')
            );
        }
        return $this->db_instance;
    }
}