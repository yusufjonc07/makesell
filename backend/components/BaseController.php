<?php

namespace backend\components;

use yii\web\Controller;
use Yii;
use yii\web\Cookie;

class BaseController extends Controller
{

    public function beforeAction($action)
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;

        // Check for language in the URL
        $language = $request->get('language');

        if ($language && in_array($language, ['en-US', 'ko-KR'])) {
            // Set the application's language

            Yii::$app->language = $language;

            // Save the preference in a cookie
            $response->cookies->add(new Cookie([
                'name' => 'language',
                'value' => $language,
                'expire' => time() + 365 * 24 * 60 * 60, // 1 year expiration
            ]));
        } else {
            // Check if a language cookie exists
            $languageCookie = $request->cookies->getValue('language', 'en-US'); // Default to 'en'
            Yii::$app->language = $languageCookie;
        }

        return parent::beforeAction($action);
    }

}