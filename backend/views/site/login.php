<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Login');
?>
<div class="site-login">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="/" class="d-block d-md-none auth-logo">
                                    <span class="logo-txt">
                                        <span><?= Html::img("@web/static/transparent.png", ['width' => 150]); ?></span>
                                    </span>
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <h1><?= Html::encode(Yii::t('app', $this->title)) ?></h1>

                                <p><?= Yii::t('app', 'Please fill out the following fields to login:') ?></p>

                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'password')->passwordInput() ?>

                                <div class="form-goup">
                                    <?= $form->field($model, 'captcha')->widget(
                                        yii\captcha\Captcha::className(),
                                        [
                                            'template' => '<div class="row"><div class="col-lg-3" style="margin-right:25px;">{image}</div><div class="col-lg-6">{input}</div></div>',
                                        ]
                                    ); ?>
                                </div>

                                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="d-none d-md-block col-xxl-9 col-lg-8 col-md-7" style="height: 100vh;">
                <div class="auth-bg pt-md-5 p-4 d-flex h-100"
                    style="background: #f4f4f4 url(<?= Url::to('@web/static/brand.png') ?>);background-size: contain;background-repeat: no-repeat; background-position: center">
                    <div class="bg-overlay bg-primary"></div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
</div>
