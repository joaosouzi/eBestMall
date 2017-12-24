<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components\authclient\clients;

use yii\authclient\OAuth2;
use yii\helpers\ArrayHelper;

/**
 * GitHub allows authentication via GitHub OAuth.
 *
 * In order to use GitHub OAuth you must register your application at <https://github.com/settings/applications/new>.
 *
 * Example application configuration:
 *
 * ```php
 * 'components' => [
 *     'authClientCollection' => [
 *         'class' => 'yii\authclient\Collection',
 *         'clients' => [
 *             'github' => [
 *                 'class' => 'yii\authclient\clients\GitHub',
 *                 'clientId' => 'github_client_id',
 *                 'clientSecret' => 'github_client_secret',
 *             ],
 *         ],
 *     ]
 *     // ...
 * ]
 * ```
 *
 * @see http://developer.github.com/v3/oauth/
 * @see https://github.com/settings/applications/new
 *
 * @author Paul Klimov <klimov.paul@gmail.com>
 * @since 2.0
 */
class GitHub extends OAuth2
{
    /**
     * {@inheritdoc}
     */
    public $authUrl = 'https://github.com/login/oauth/authorize';
    /**
     * {@inheritdoc}
     */
    public $tokenUrl = 'https://github.com/login/oauth/access_token';
    /**
     * {@inheritdoc}
     */
    public $apiBaseUrl = 'https://api.github.com';


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if ($this->scope === null) {
            $this->scope = 'user';
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function initUserAttributes()
    {
        $attributes = $this->api('user', 'GET');

        $userinfo['openid'] = $attributes['id'];
        $userinfo['username'] = $attributes['login'];
        $userinfo['avatar_url'] = $attributes['avatar_url'];

        $result = ArrayHelper::merge($attributes, $userinfo);

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    protected function defaultName()
    {
        return 'github';
    }

    /**
     * {@inheritdoc}
     */
    protected function defaultTitle()
    {
        return 'GitHub';
    }
}