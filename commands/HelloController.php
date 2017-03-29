<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
    
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "createPost"
        $adminPermission = $auth->createPermission('adminPermission');
        $adminPermission->description = 'admin permissions';
        $auth->add($adminPermission);

        // добавляем разрешение "updatePost"
        $customerPermission = $auth->createPermission('customerPermission');
        $customerPermission->description = 'customer permissions';
        $auth->add($customerPermission);

        // добавляем роль "customer" и даём роли разрешение "createPost"
        $customer = $auth->createRole('customer');
        $auth->add($customer);
        $auth->addChild($customer, $customerPermission);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $adminPermission);
        //$auth->addChild($admin, $author);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($customer, 103);
        $auth->assign($admin, 100);
    }
}
