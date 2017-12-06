<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \app\models\form\RegisterForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);

$this->registerCssFile('/static/css/register.css', ['depends' => AppAsset::className()]);
$this->registerJsFile('/static/js/register.js', ['depends' => AppAsset::className()]);

$this->title = '注册';

$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='pull-right'><a class=\"user-registration-protocol\" data-toggle=\"modal\" data-target=\"#registrationProtocol\">《用户注册协议》</a></span>"
];

?>

<div class="site-signup">
    <div class="header-register">
        <div class="w">
            <div class="logo">
                <a href="<?= Yii::$app->homeUrl ?>"><img src="/static/img/public/logo.png" alt=""></a>
                <span class="logo-salutatory">欢迎注册</span>
                <div class="logo-link">已有账号？ <a href="<?= Url::to(['/auth/login']) ?>">请登录</a></div>
            </div>
        </div>
    </div>

    <div class="content-register">
        <div class="w">
            <div class="content-register-from">
                <?php $form = ActiveForm::begin(['id' => 'form-register', 'options' => ['autocomplete' => 'off']]); ?>

                <?= $form->field($model, 'username', ['options' => ['class' => 'form-item']])->textInput(['placeholder' => '您的账户名和登录名']) ?>

                <?= $form->field($model, 'password', ['options' => ['class' => 'form-item']])->passwordInput(['placeholder' => '建议至少使用两种字符组合']) ?>

                <?= $form->field($model, 're_password', ['options' => ['class' => 'form-item']])->passwordInput(['placeholder' => '请再次输入密码']) ?>

                <?= $form->field($model, 'mobile_phone', ['options' => ['class' => 'form-item']])->textInput(['id'=>'register-mobile-phone','placeholder' => '建议使用常用手机号']) ?>

                <div class="register-options-email-switch" style="height: 25px;text-align: right;margin-top: -25px;">
                    <a class="register-options-email-switch-on" data-on="邮箱验证" data-off="手机验证" style="color: #38f;cursor: pointer">邮箱验证</a>
                </div>

                <?= $form->field($model, 'email', ['options' => ['class' => 'form-item register-options-email hidden']])->textInput(['placeholder' => '（选填）建议使用常用邮箱']) ?>

                <?= $form->field($model, 'verify_code', ['options' => ['class' => 'form-item verify-code-item']])->widget(\yii\captcha\Captcha::className(), [
                    'name' => 'verify_code',
                    'captchaAction' => 'auth/captcha',
                    'options' => ['placeholder' => '请输入验证码'],
                    'imageOptions' => ['id' => 'captchaimg', 'title' => '换一个', 'alt' => '换一个', 'style' => 'cursor:pointer;float: right;margin: 3px;height: 44px;width: 100px;'],
                    'template' => '<div class="col-lg-5 verify-code-item-div">{input}</div>{image}',
                ]) ?>

                <?= $form->field($model, 'smsCode', [
                    'options' => [
                        'class' => 'form-item register-send-sms-code',
                        'data-count-down' => '60',
                        'data-check-mobile-url' => Url::toRoute(['/auth/check-mobile-exists'], true),
                        'data-send-sms-code-url' => Url::toRoute(['/auth/send-sms-code'], true)
                    ],
                    'template' => '{label}<div class="col-lg-5 verify-code-item-div">{input}</div>{error}<button id="getSmsCode" class="phone-code-btn" data-text-error="短信发送错误提示" data-text-get="获取验证码" data-text-tips="秒后重发" type="button">获取验证码</button>',
                ])->textInput(['placeholder' => '请输入手机验证码',]) ?>

                <?= $form->field($model, 'rememberMe', $fieldOptions)->checkbox(['label' => Yii::t('app', 'read_and_agree')]) ?>

                <div class="form-btn">
                    <?= Html::submitButton('立即注册') ?>
                </div>

                <?php ActiveForm::end(); ?>

                <div class="content-register-from-link">
                    <div class="content-register-from-link-third-party-qq content-register-from-link-third-party">
                        <a href="javascript:;">
                            <i class="icon-qq"></i>
                            <span>QQ 用户注册</span>
                        </a>
                    </div>
                    <div class="content-register-from-link-third-party-wechat content-register-from-link-third-party">
                        <a href="javascript:;">
                            <i class="icon-wechat"></i>
                            <span>微信用户注册</span>
                        </a>
                    </div>
                    <div class="content-register-from-link-third-party-phone-fast-reg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- 用户注册协议 模态框（Modal） -->
    <div class="modal fade" id="registrationProtocol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="width: 900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">用户注册协议</h4>
                </div>
                <div class="modal-body" style="height:350px;overflow:auto;">
                    <!--用户注册协议内容-->
                    <div class="protocol-con">
                        <div class="WordSection1" style="layout-grid:15.6pt">

                            <!--<p class=MsoNormal style='line-height:150%'><a name="OLE_LINK6"></a><a-->
                            <!--name="OLE_LINK5"><span style='mso-bookmark:OLE_LINK6'><span style='font-size:-->
                            <!--16.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;-->
                            <!--mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:-->
                            <!--minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin'>eBestMall用户注册协议和</span></span></a><a-->
                            <!--name="OLE_LINK14"></a><a name="OLE_LINK13"><span style='mso-bookmark:OLE_LINK14'><span-->
                            <!--style='mso-bookmark:OLE_LINK6'><span style='mso-bookmark:OLE_LINK5'><span-->
                            <!--style='font-size:16.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:-->
                            <!--Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:-->
                            <!--minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin'>隐私政策</span></span></span></span></a><span-->
                            <!--style='mso-bookmark:OLE_LINK13'><span style='mso-bookmark:OLE_LINK14'><span-->
                            <!--style='mso-bookmark:OLE_LINK6'><span style='mso-bookmark:OLE_LINK5'><span-->
                            <!--lang=EN-US style='font-size:16.0pt;line-height:150%'><o:p></o:p></span></span></span></span></span></p>-->

                            <!--<span style='mso-bookmark:OLE_LINK14'></span><span style='mso-bookmark:OLE_LINK13'></span>-->

                            <!--<p class=MsoNormal style='line-height:150%'><span style='mso-bookmark:OLE_LINK6'><span-->
                            <!--style='mso-bookmark:OLE_LINK5'><b style='mso-bidi-font-weight:normal'><u><span-->
                            <!--lang=EN-US style='mso-bidi-font-size:10.5pt;line-height:150%;color:red'><o:p><span-->
                            <!--style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></span></span></p>-->

                            <p class="MsoNormal" style="line-height:150%"><span style="mso-bookmark:OLE_LINK6"><span
                                            style="mso-bookmark:OLE_LINK5"><b
                                                style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">在<span class="GramE">您注册</span>成为eBestMall用户的过程中，您需要完成我们的注册流程并通过点击同意的形式<span
                                                            class="GramE">在线签署</span>以下协议，请您务必仔细阅读、充分理解协议中的条款内容后再点击同意（尤其是以粗体并下划线标识的条款，因为这些条款可能会明确您应履行的义务或对您的权利有所限制）：</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                            <p class="MsoNormal" style="line-height:150%"><b style="mso-bidi-font-weight:
normal"><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;
color:red"><a href="https://in.m.ebestmall.com/help/app/register_info.html" target="_blank"><span lang="EN-US" style="font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;color:red"><span
                                                            lang="EN-US">《eBestMall用户注册协议》</span></span></a><o:p></o:p></span></u></b>
                            </p>


                            <div style=" width: 100%; height: 130px;">
                                <div style="float:left;width:50%">
                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">1</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本站服务条款的确认和接纳</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">2</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本站服务</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">3</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户信息</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">4</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户依法言行义务</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">5</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、商品信息</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">6</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、订单</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>


                                </div>

                                <div style="float:left;">


                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">7</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">配送</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">8</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">所有权及知识产权条款</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">9</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">责任限制及不承诺担保</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">10</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">协议更新及用户关注义务</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>

                                    <p class="MsoNormal" style="line-height:150%"><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">11</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> </span></u></b></span></span><span style="mso-bookmark:OLE_LINK6"><span
                                                    style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">法律管辖和适用《eBestMall隐私政策》</span></u></b></span></span><span
                                                style="mso-bookmark:OLE_LINK6"><span style="mso-bookmark:OLE_LINK5"><b
                                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></span></span></p>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                            <br>


                            <!--<span style='mso-bookmark:OLE_LINK5'></span><span style='mso-bookmark:OLE_LINK6'></span>-->

                            <!--<p class=MsoNormal style='line-height:150%'><b style='mso-bidi-font-weight:-->
                            <!--normal'><u><span lang=EN-US style='mso-bidi-font-size:10.5pt;line-height:150%'><o:p><span-->
                            <!--style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>-->

                            <p class="MsoNormal" style="line-height:150%"><b style="mso-bidi-font-weight:
normal"><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;
color:red"><a href="https://in.m.ebestmall.com/help/app/private_policy.html" target="_blank"><span lang="EN-US" style="font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;color:red"><span lang="EN-US">隐私政策</span></span></a><o:p></o:p></span></u></b>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><b style="mso-bidi-font-weight:
normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:
宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">在<span class="GramE">您注册</span>成为eBestMall用户的过程中，您需要完成我们的注册流程并通过点击同意的形式<span
                                                    class="GramE">在线签署</span>以下协议，请您务必仔细阅读、充分理解协议中的条款内容后再点击同意（尤其是以粗体并下划线标识的条款，因为这些条款可能会明确您应履行的义务或对您的权利有所限制）：</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%"><b style="mso-bidi-font-weight:
normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:
宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">本隐私政策明确了我们的产品与</span></u></b><b style="mso-bidi-font-weight:normal"><u><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">/</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">或服务所收集、使用及共享个人信息的类型方式和用途；以增强告知或即时提示的方式在收集、使用及共享个人信息时给予用户授权选择权，并在产品设置中允许用户即时撤销授权。明确了用户查询、更正和删除其个人信息的方式。增加了用户账户的锁定</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">/</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">解锁和注销功能，并提供给用户了</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">30</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">日后悔期</span></u></b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">。具体提纲如下：</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>


                            <div style="float:left;width:50%">

                                <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">1</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、我们如何收集和使用您的个人信息</span><span lang="EN-US"
                                                                                             style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                                </p>

                                <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">2</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、我们如何使用</span><span lang="EN-US"
                                                                                    style="mso-bidi-font-size:10.5pt;line-height:150%"> Cookie </span><span
                                            style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">和同类技术</span><span lang="EN-US"
                                                                                                style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                                </p>

                                <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">3</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、我们如何共享、转让、公开披露您的个人信息</span><span lang="EN-US"
                                                                                                  style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                                </p>

                                <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">4</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、我们如何保护和<span class="GramE">保存您</span>的个人信息</span><span
                                            lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></p>
                            </div>
                            <div style="float:left">

                                <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">5</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、您如何管理个人信息</span><span lang="EN-US"
                                                                                       style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                                </p>

                                <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">6</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、未成年人信息的保护</span><span lang="EN-US"
                                                                                       style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                                </p>

                                <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">7</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、通知和修订</span><span lang="EN-US"
                                                                                   style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                                </p>

                                <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">8</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、如何联系我们</span><span lang="EN-US"
                                                                                    style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                                </p>


                            </div>
                            <div style="clear:both"></div>


                            <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">【审慎阅读】您在申请注册流程中点击同意前，应当认真阅读以下协议。请您务必审慎阅读、充分理解协议中相关条款内容，其中包括：</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">1</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、与您约定免除或限制责任的条款；</span><span lang="EN-US"
                                                                                             style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">2</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、与您约定法律适用和管辖的条款；</span><span lang="EN-US"
                                                                                             style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">3</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、其他以粗体下划线标识的重要条款。</span><span lang="EN-US"
                                                                                              style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><b><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;color:black">【请您注意】<u>如果您不同意上述协议或其中任何条款约定，请<span
                                                    class="GramE">您停止</span>注册。<span class="GramE">您停止</span>注册后将仅可以浏览我们的商品信息但无法享受我们的产品或服务。如您按照注册流程提示填写信息、阅读并点击同意上述协议且完成全部注册流程后，即表示您已充分阅读、理解并接受协议的全部内容；并表明您也同意eBestMall可以依据以上的隐私政策内容来处理您的个人信息。</u></span></b><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
color:black">如您对以上协议内容有任何疑问，您可随时通过隐私政策下方的联系方式联系我们。</span><span lang="EN-US"
                                                               style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><b><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;color:black">点击同意即表示您已阅读并同意</span></b><b><u><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
color:red"><a href="https://in.m.ebestmall.com/help/app/register_info.html" target="_blank"><span lang="EN-US"
                                                                                                  style="color:red"><span
                                                            lang="EN-US">《eBestMall用户注册协议》</span></span></a></span></u></b><b><span
                                            style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
color:black">与</span></b><b><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;color:red"><a
                                                    href="https://in.m.ebestmall.com/help/app/private_policy.html"
                                                    target="_blank"><span lang="EN-US" style="color:red"><span
                                                            lang="EN-US">《eBestMall隐私政策》</span></span></a></span></u></b><b><span
                                            style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
color:black">，并同意我们将您的订单信息共享给为完成此订单所必须的第三方合作方（详情查看【</span></b><b><u><span lang="EN-US"
                                                                          style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
color:red"><a href="https://in.m.ebestmall.com/help/app/order_sharing_info.html" target="_blank"><span lang="EN-US"
                                                                                                       style="color:red"><span
                                                            lang="EN-US">订单共享与安全</span></span></a></span></u></b><b><u><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
color:black">】</span></u></b><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;color:black">。</span></b><span lang="EN-US"
                                                                                                    style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><b><span lang="EN-US"
                                                                                   style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
color:black">&nbsp;</span></b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">如您对协议有任何疑问，可向我们的客服咨询。</span><span lang="EN-US"
                                                                                                  style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">【特别提示】当您按照注册页面提示填写信息、阅读并同意协议且完成全部注册程序后，即表示您已充分阅读、理解并接受协议的全部内容。如您在使用平台服务过程中与其他用户发生争议的，依您与其他用户达成的协议处理。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">阅读协议的过程中，如果您不同意相关协议或其中任何条款约定，您应立即停止注册程序。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" align="center" style="text-align:center;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span>
                            </p>

                            <p class="MsoNormal" align="center" style="text-align:center;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><b style="mso-bidi-font-weight:
normal"><span style="font-size:16.0pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">eBestMall用户注册协议</span></b><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="font-size:16.0pt;line-height:150%"><o:p></o:p></span></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">本协议是您与eBestMall网站（简称</span><span lang="EN-US"
                                                                   style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本站</span><span lang="EN-US"
                                                                                             style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">，网址：</span><span lang="EN-US"
                                                                                               style="mso-bidi-font-size:10.5pt;line-height:150%">www.ebestmall.com</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）所有者（以下简称为</span><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall</span><span lang="EN-US"
                                                                                                    style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）之间就eBestMall网站服务等相关事宜所订立的契约，请您仔细阅读<span
                                            class="GramE">本注册</span>协议，您点击</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">;</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">同意并继续</span><span lang="EN-US"
                                                                                  style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">按钮后，本协议即构成对双方有约束力的法律文件。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">1</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本站服务条款的确认和接纳</span><span lang="EN-US"
                                                                                                       style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">1.1</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本站的各项电子服务的所有权和运作权归eBestMall所有。用户同意所有注册协议条款并完成注册程序，才能成为本站的正式用户。用户确认：本协议条款是处理双方权利义务的契约，始终有效，法律另有强制性规定或双方另有特别约定的，依其规定。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">1.2</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户点击同意本协议的，即视为用户确认自己具有享受本站服务、下单购物等相应的权利能力和行为能力，能够独立承担法律责任。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">1.3</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">如果您在</span><span lang="EN-US"
                                                                                               style="mso-bidi-font-size:10.5pt;line-height:150%">18</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">周岁以下，您只能在父母或监护人的监护参与下才能使用本站。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">1.4</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall保留在中华人民共和国大陆地区法施行之法律允许的范围内独自决定拒绝服务、关闭用户账户、清除或编辑内容或取消订单的权利。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">2</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本站服务</span><span lang="EN-US"
                                                                                               style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">2.1</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall通过互联网依法为用户提供互联网信息等服务，用户在完全同意本协议及本<span
                                            class="GramE">站规定</span>的情况下，方有权使用本站的相关服务。</span><span lang="EN-US"
                                                                                                   style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">2.2</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户必须自行准备如下设备和承担如下开支：（</span><span
                                        lang="EN-US"
                                        style="mso-bidi-font-size:10.5pt;line-height:150%">1</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）上网设备，包括并不限于电脑或者其他上网终端、调制解调器及其他必备的上网装置；（</span><span
                                        lang="EN-US"
                                        style="mso-bidi-font-size:10.5pt;line-height:150%">2</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）上网开支，包括并不限于网络接入费、上网设备租用费、手机流量费等。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">3</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户信息</span><span lang="EN-US"
                                                                                               style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">3.1</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户应自行诚信向本站提供注册资料，用户同意其提供的注册资料真实、准确、完整、合法有效，用户注册资料如有变动的，应及时更新其注册资料。如果用户提供的注册资料不合法、不真实、不准确、不详尽的，用户需承担因此引起的相应责任及后果，并且eBestMall保留终止用户使用eBestMall各项服务的权利。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">3.2</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户在本站进行浏览、下单购物等活动时，涉及用户真实姓名</span><span
                                        lang="EN-US"
                                        style="mso-bidi-font-size:10.5pt;line-height:150%">/</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">名称、通信地址、联系电话、电子邮箱等隐私信息的，本站将予以严格保密，除非得到用户的授权或法律另有规定，本<span
                                            class="GramE">站不会</span>向外界披露用户隐私信息。</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">3.3</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户注册成功后，将产生用户名和密码等账户信息，您可以根据本<span
                                            class="GramE">站规定</span>改变您的密码。用户应谨慎合理的保存、使用其用户名和密码。用户若发现任何非法使用用户账号或存在安全漏洞的情况，请立即通知本站并向公安机关报案。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">3.4</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户同意，eBestMall拥有通过邮件、短信电话等形式，向在本站注册、购物用户、收货人发送订单信息、促销活动等告知信息的权利。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">3.5</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户不得将在本<span class="GramE">站注册</span>获得的账户借给他人使用，否则用户应承担由此产生的全部责任，并与实际使用人承担连带责任。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">3.6</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户同意，eBestMall有权使用用户的注册信息、用户名、密码等信息，登录进入用户的注册账户，进行证据保全，包括但不限于公证、见证等。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">4</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户依法言行义务</span><span lang="EN-US"
                                                                                                   style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">本协议依据国家相关法律法规规章制定，用户同意严格遵守以下义务：</span><span lang="EN-US"
                                                                              style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">1</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不得传输或发表：煽动抗拒、破坏宪法和法律、行政法规实施的言论，煽动颠覆国家政权，推翻社会主义制度的言论，煽动分裂国家、破坏国家统一的<span
                                            class="GramE">的</span>言论，煽动民族仇恨、民族歧视、破坏民族团结的言论；</span><span style="mso-bidi-font-size:
10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">2</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）从中国大陆向境外传输资料信息时必须符合中国有关法规；</span><span lang="EN-US"
                                                                                                        style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">3</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不得利用本站从事洗钱、窃取商业秘密、窃取个人信息等违法犯罪活动；</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">4</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不得干扰本站的正常运转，不得侵入本站及国家计算机信息系统；</span><span lang="EN-US"
                                                                                                           style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">5</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不得传输或发表任何违法犯罪的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的，淫秽的、不文明的等信息资料；</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">6</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不得传输或发表损害国家社会公共利益和涉及国家安全的信息资料或言论；</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">7</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不得教唆他人从事本条所禁止的行为；</span><span lang="EN-US"
                                                                                               style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">8</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不得利用在本<span
                                            class="GramE">站注册</span>的账户进行牟利性经营活动；</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">9</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不得发布任何侵犯他人著作权、商标权等知识产权或合法权利的内容；</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">用户应不时关注并遵守本站不时公布或修改的各类合法规则规定。</span><span lang="EN-US"
                                                                            style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">本站保有删除站内各类不符合法律政策或不真实的信息内容而无须通知用户的权利。</span><span lang="EN-US"
                                                                                    style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">若用户未遵守以上规定的，本站有权<span class="GramE">作出</span>独立判断并采取暂停或关闭用户<span
                                            class="GramE">帐号</span>等措施。用户须对自己在网上的言论和行为承担法律责任。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">5</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">商品信息</span><span lang="EN-US"
                                                                                               style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">本站上的商品价格、数量、是否有货等商品信息随时都有可能发生变动，本站不作特别通知。由于网站上商品信息的数量极其庞大，虽然本站会尽最大努力保证您所浏览商品信息的准确性，但由于众所周知的互联网技术因素等客观原因存在，本站网页显示的信息可能会有一定的滞后性或差错，对此情形您知悉并理解；eBestMall欢迎纠错，并会视情况给予纠错者一定的奖励。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">为表述便利，商品和服务简称为</span><span lang="EN-US"
                                                             style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">商品</span><span lang="EN-US"
                                                                                             style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">或</span><span lang="EN-US"
                                                                                            style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">货物</span><span lang="EN-US"
                                                                                             style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">。</span><span lang="EN-US"
                                                                                            style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">6</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">订单</span><span lang="EN-US"
                                                                                             style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">6.1</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">在您下订单时，请您仔细确认所购商品的名称、价格、数量、型号、规格、尺寸、联系地址、电话、收货人等信息。收货人与用户本人不一致的，收货人的行为和意思表示视为用户的行为和意思表示，用户应对收货人的行为及意思表示的法律后果承担连带责任。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">6.2</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">除法律另有强制性规定外，双方约定如下：本站上销售<span
                                            class="GramE">方展示</span>的商品和价格等信息仅仅是交易信息的发布，您下单时须填写您希望购买的商品数量、价款及支付方式、收货人、联系方式、收货地址等内容；系统生成的订单信息是计算机信息系统根据您填写的内容自动生成的数据，仅是您向销售方发出的交易诉求；销售<span
                                            class="GramE">方收到</span>您的订单信息后，只有在销售方将您在订单中订购的商品从仓库实际直接向<span
                                            class="GramE">您发出</span>时（以商品出库为标志），方视为您与销售方之间就实际直接向<span
                                            class="GramE">您发出</span>的商品建立了交易关系；如果您在一份订单里订购了多种商品并且销售方只给您发出了部分商品时，您与销售方之间仅就实际直接向<span
                                            class="GramE">您发出</span>的商品建立了交易关系；只有在销售方实际直接向<span
                                            class="GramE">您发出</span>了订单中订购的其他商品时，您和销售方之间就订单中<span
                                            class="GramE">该其他</span>已实际直接向<span class="GramE">您发出</span>的商品才成立交易关系。您可以随时登录您在本<span
                                            class="GramE">站注册</span>的账户，<span
                                            class="GramE">查询您</span>的订单状态。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">6.3</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">由于市场变化及各种以合理商业努力难以控制的因素的影响，本<span
                                            class="GramE">站无法</span>保证您提交的订单信息中希望购买的商品都会有货；<span
                                            class="GramE">如您拟购买</span>的商品，发生缺货，您有权取消订单。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">7</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">配送</span><span lang="EN-US"
                                                                                             style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">7.1</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">销售方将会把商品（货物）送到您所指定的收货地址，所有在本站上列出的送货时间为参考时间，参考时间的计算是根据库存状况、正常的处理过程和送货时间、送货地点的基础上估计得出的。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">7.2</span><span class="GramE"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:
宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">因如下</span></span><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">情况造成订单延迟或无法配送等，销售方不承担延迟配送的责任：</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">1</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）用户提供的信息错误、地址不详细等原因导致的；</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">2</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）货物送达后无人签收，导致无法配送或延迟配送的；</span><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">3</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）情势变更因素导致的；</span><span lang="EN-US"
                                                                                        style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">（</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">4</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）不可抗力因素导致的，例如：自然灾害、交通戒严、突发战争等。</span><span lang="EN-US"
                                                                                                           style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">8</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">所有权及知识产权条款</span><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">8.1</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户一旦接受本协议，即表明该用户主动将其在任何时间段在本<span
                                                    class="GramE">站发表</span>的任何形式的信息内容（包括但不限于客户评价、客户咨询、各类话题文章等信息内容）的财产性权利等任何可转让的权利，如著作权财产权（包括并不限于：复制权、发行权、出租权、展览权、表演权、放映权、广播权、信息网络传播权、摄制权、改编权、翻译权、汇编权以及应当由著作权人享有的其他可转让权利），全部独家且不可撤销地转让给eBestMall所有，用户同意eBestMall有权就任何主体侵权而单独提起诉讼。</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p><span
                                                        style="text-decoration:
 none">&nbsp;</span></o:p></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">8.2</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本协议已经构成《中华人民共和国著作权法》第二十五条（条文序号依照</span><span
                                        lang="EN-US"
                                        style="mso-bidi-font-size:10.5pt;line-height:150%">2011</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">年版著作权法确定）及相关法律规定的著作财产权等权利转让书面协议，其效力及于用户在eBestMall网站上发布的任何受著作权法保护的作品内容，无论该等内容形成于本协议订立前还是本协议订立后。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">8.3</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">用户同意并已充分了解本协议的条款，承诺不将已发表于本站的信息，以任何形式发布或授权其它主体以任何方式使用（包括但不限于在各类网站、媒体上使用）。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">8.4</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall是本站的制作者</span><span lang="EN-US"
                                                                                                           style="mso-bidi-font-size:10.5pt;line-height:150%">,</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">拥有此网站内容及资源的著作权等合法权利</span><span
                                        lang="EN-US"
                                        style="mso-bidi-font-size:10.5pt;line-height:150%">,</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">受国家法律保护</span><span lang="EN-US"
                                                                                                  style="mso-bidi-font-size:10.5pt;line-height:150%">,</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">有权不时地对本协议及本站的内容进行修改，并在本站张贴，无须另行通知用户。在法律允许的最大限度范围内，eBestMall对本协议及本<span
                                            class="GramE">站内容</span>拥有解释权。</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">8.5</span></b><b style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">除法律另有强制性规定外，未经eBestMall明确的<span
                                                class="GramE">特别</span>书面许可</span></b><b
                                        style="mso-bidi-font-weight:normal"><span lang="EN-US"
                                                                                  style="mso-bidi-font-size:10.5pt;line-height:150%">,</span></b><b
                                        style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">任何单位或个人不得以任何方式非法地全部或部分复制、转载、引用、链接、抓取或以其他方式使用本站的信息内容，否则，eBestMall有权追究其法律责任。</span></b><b
                                        style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">8.6</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本站所刊登的资料信息（诸如文字、图表、标识、按钮图标、图像、声音文件片段、数字下载、数据编辑和软件），均是eBestMall或其内容提供者的财产，受中国和国际版权法的保护。本站上所有内容的汇编是eBestMall的排他财产，受中国和国际版权法的保护。本站上所有软件都是eBestMall或其关联公司或其软件供应商的财产，受中国和国际版权法的保护。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">9</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">责任限制及不承诺担保</span><span lang="EN-US"
                                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">除非另有明确的书面说明</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">,</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本站及其所包含的或以其它方式通过本站提供给您的全部信息、内容、材料、产品（包括软件）和服务，均是在</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">;</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">按现状</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">;</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">和</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">;</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">按现有</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">;</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">的基础上提供的。</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p><span
                                                        style="text-decoration:
 none">&nbsp;</span></o:p></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">除非另有明确的书面说明</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">,</span></u></b><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall不对本站的运营及其包含在本网站上的信息、内容、材料、产品（包括软件）或服务作任何形式的、明示或默示的声明或担保（根据中华人民共和国法律另有规定的以外）。</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p><span
                                                        style="text-decoration:
 none">&nbsp;</span></o:p></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall<span class="GramE">不</span>担保本站所包含的或以其它方式通过本站提供给您的全部信息、内容、材料、产品（包括软件）和服务、其服务器或从本站发出的电子信件、信息没有病毒或其他有害成分。</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><b style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">如因不可抗力或其它本站无法控制的原因使本站销售系统崩溃或无法正常使用导致网上交易无法完成或丢失有关的信息、记录等，eBestMall会合理地尽力协助处理善后事宜。</span></u></b><b
                                        style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p></o:p></span></u></b></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">10</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">协议更新及用户关注义务</span><span lang="EN-US"
                                                                                                      style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">根据国家法律法规变化及网站运营需要，eBestMall有权对本协议条款不时地进行修改，修改后的协议一旦被张贴在本站上即生效，并代替原来的协议。用户可随时登录查阅最新协议；</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">用户有义务不时关注并阅读最新版的协议及网站公告。如用户不同意更新后的协议，可以且应立即停止接受eBestMall网站依据本协议提供的服务；如用户继续使用本网站提供的服务的，即视为同意更新后的协议。eBestMall建议您在使用本站之前阅读本协议及本站的公告。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">如果本协议中任何一条被视为废止、无效或因任何理由不可执行，该条应视为可分的且并不影响任何其余条款的有效性和<span class="GramE">可</span>执行性。</span><span
                                        style="mso-bidi-font-size:10.5pt;
line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">11</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">法律管辖和适用</span><span lang="EN-US"
                                                                                                  style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">本协议的订立、执行和解释及争议的解决均应适用在中华人民共和国大陆地区适用之有效法律（但不包括其冲突法规则）。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">如发生本协议与适用之法律相抵触时，则这些条款将完全按法律规定重新解释，而其它有效条款继续有效。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">如缔约方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向有管辖权的中华人民共和国大陆地区法院提起诉讼。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin">第</span><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">12</span><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">条</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> </span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">其他</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">12.1</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall网站所有者是指在政府部门依法许可或备案的eBestMall网站经营主体。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">12.2</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall尊重用户和消费者的合法权利，本协议及本网站上发布的各类规则、声明等其他内容，均是为了更好的、更加便利的为用户和消费者提供服务。本<span
                                            class="GramE">站欢迎</span>用户和社会各界提出意见和建议，eBestMall将虚心接受并适时修改本协议及本站上的各类规则。</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%"> <span lang="EN-US"><o:p></o:p></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">12.3</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">本协议内容中以黑体、加粗、下划线、斜体等方式显著标识的条款，请用户着重阅读。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">12.4</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">您点击本协议下方的</span><span lang="EN-US"
                                                                                                    style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">同意并继续</span><span lang="EN-US"
                                                                                                style="mso-bidi-font-size:10.5pt;line-height:150%">;</span><span
                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">按钮即视为您完全接受本协议，在点击之前请您再次确认已知悉并完全理解本协议的全部内容。</span><span
                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" align="center" style="text-align:center;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></b></p>

                            <p class="MsoNormal" align="center" style="text-align:center;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></b></p>

                            <p class="MsoNormal" align="center" style="text-align:center;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></b></p>


                            <p class="MsoNormal" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><a name="OLE_LINK18"></a><a name="OLE_LINK17"><span style="mso-bookmark:
OLE_LINK18"><b style="mso-bidi-font-weight:normal"><span style="font-size:14.0pt;
line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">《eBestMall隐私政策》正文<span lang="EN-US"><o:p></o:p></span></span></b></span></a>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">版本更新日期：<span lang="EN-US">2017</span>年<span lang="EN-US">8</span>月<span lang="EN-US">20</span>日<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">版本生效日期：<span lang="EN-US">2017</span>年<span lang="EN-US">8</span>月<span lang="EN-US">27</span>日<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">引言<span lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">eBestMall（“我们”）非常重视用户的隐私和个人信息保护。您在使用我们的产品与<span lang="EN-US">/</span>或服务时，我们可能会收集和使用您的相关信息。我们希望通过《eBestMall隐私政策》（“本隐私政策”）向您说明我们在您使用我们的产品与<span
                                                    lang="EN-US">/</span>或服务时如何收集、使用、保存、共享和转让这些信息，以及我们为您提供的访问、更新、删除和保护这些信息的方式。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">本政策将帮助您了解以下内容：<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们如何收集和使用您的个人信息<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们如何使用<span lang="EN-US"> Cookie </span>和同类技术<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们如何共享、转让、公开披露您的个人信息<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">4</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们如何保护和<span class="GramE">保存您</span>的个人信息<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">5</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、您如何管理个人信息<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">6</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、未成年人信息的保护<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">7</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、通知和修订<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">8</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、如何联系我们<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">本隐私政策与您所使用的eBestMall商城服务以及该服务所包括的各种业务功能（以下统称“我们的产品与<span
                                                            lang="EN-US">/</span>或服务<span lang="EN-US">”</span>）息息相关，希望您<span
                                                            style="mso-bidi-font-weight:
bold">在使用我们的产品与<span lang="EN-US">/</span>或服务前</span>仔细阅读<span style="mso-bidi-font-weight:
bold">并<span class="GramE">确认您</span>已经充分理解本政策所写明的内容</span>，并让您可以按照本隐私政策的指引做出您认为适当的选择。本隐私政策中涉及的相关术语，我们尽量以简明扼要的表述，并提供进一步说明的链接，以便您更好地理解。您使用或在我们更新本隐私政策后（我们会及时提示您更新的情况）继续使用我们的产品与<span
                                                            lang="EN-US">/</span>或服务，即意味着您同意本隐私政策<span
                                                            lang="EN-US">(</span>含更新版本<span
                                                            lang="EN-US">)</span>内容，并且同意我们按照本隐私政策收集、使用、保存和共享您的相关信息。<span
                                                            lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;mso-char-indent-count:0;
line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">如对本隐私政策或相关事宜有任何问题，您可随时通过访问<span lang="EN-US">https://help.ebestmall.com</span>在线客服系统、发送邮件至<span
                                                    lang="EN-US">privacy@ebestmall.com</span>或拨打我们的任何一部客<span
                                                    class="GramE">服电话</span>等多种方式与我们联系 。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">一、我们如何收集和使用您的个人信息<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" style="text-indent:21.1pt;mso-char-indent-count:2.0;
line-height:150%"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:
OLE_LINK18"><b style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">个人信息</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">是指以电子或者其他方式记录的能够单独或者与其他信息结合识别特定自然人身份或者反映特定自然人活动情况的各种信息。<b
                                                    style="mso-bidi-font-weight:normal">本隐私政策中涉及的个人信息包括：</b>基本信息（包括个人姓名、生日、性别、住址、个人电话号码、电子邮箱）；个人身份信息（包括身份证、军官证、护照、驾驶证等）；面部特征；网络身份标识信息（包括系统账号、</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">IP</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">地址、邮箱地址及与前述有关的密码、口令、口令保护答案）；个人财产信息（交易和消费记录、以及余额、京豆、优惠券、eBestMall</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">E</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">卡、游戏类兑换码等虚拟财产信息）；通讯录；个人上网记录（包括网站浏览记录、软件使用记录、点击记录）；个人常用设备信息（包括硬件型号、设备</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">MAC</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">地址、操作系统类型、软件列表唯一设备识别码（如</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%">IMEI/android
ID/IDFA/OPENUDID/GUID</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">SIM</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">卡</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">IMSI</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">信息等在内的描述个人常用设备基本情况的信息）；个人位置信息（包括行程信息、精准定位信息、住宿信息、经纬度等）；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="text-indent:21.1pt;mso-char-indent-count:2.0;
line-height:150%"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:
OLE_LINK18"><b style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">个人敏感信息</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">是指一旦泄露、非法提供或滥用可能危害人身和财产安全，极易导致个人名誉、身心健康受到损害或歧视性待遇等的个人信息，<b
                                                    style="mso-bidi-font-weight:normal">本隐私政策中涉及的个人敏感信息包括</b>：您的财产信息（包括交易记录及eBestMall余额、京豆、优惠券、</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">E</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">卡等虚拟财产信息）；面部识别特征；个人身份信息（包括身份证、军官证、护照、驾驶证、户口本）；网络身份识别信息（包括账户名、账户昵称、邮箱地址及与前述有关的密码与密码保护问题和答案）；其他信息（包括通讯录、个人电话号码、手机号码、行程信息、网页浏览记录、住宿信息、精准定位信息）。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">我们仅会出于以下目的，收集和使用您的个人信息：<b style="mso-bidi-font-weight:normal"><span lang="EN-US"><o:p></o:p></span></b></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（一）您须授权我们收集和使用您个人信息的情形<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">我们的产品与<span lang="EN-US">/</span>或服务包括核心业务功能和附加功能。我们的产品与<span
                                                        lang="EN-US">/</span>或服务包括一些核心功能，这些功能包含了实现网上购物所必须的功能、改进我们的产品与<span
                                                        lang="EN-US">/</span>或服务所必须的功能及保障交易安全所必须的功能。<u>我们可能会收集、保存和使用下列与<span
                                                            class="GramE">您有关</span>的信息才能实现上述这些功能。如果您不提供相关信息，您将无法享受我们提供的产品与<span
                                                            lang="EN-US">/</span>或服务。这些功能包括：</u><span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
mso-bidi-font-weight:bold">1</span></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-weight:
bold">、实现网上购物所必须的功能<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">1</span>）用户注册<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">您首先需要注册一个eBestMall账户成为eBestMall用户。<b
                                                    style="mso-bidi-font-weight:normal"><u>当<span
                                                            class="GramE">您注册</span>时，您需要至少向我们提供您准备使用的eBestMall账户名、密码、您本人的手机号码、电子邮箱地址（用于验证邮箱），我们将通过发送短信验证码或邮件的方式来<span
                                                            class="GramE">验证您</span>的身份是否有效。</u></b>您的账户名为您的默认昵称，</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-weight:bold">您可以修改补充您的昵称、性别、生日、兴趣爱好以及您的实名验证相关信息，这些信息均属于您的“账户信息”。您补充的账户信息将有助于我们为您提供个性化的商品推荐和更优的购物体验，但如果您不提供这些补充信息，不会影响您网上购物的基本功能。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><a name="OLE_LINK1"></a><a
                                                name="OLE_LINK2"><span style="mso-bookmark:OLE_LINK1"><b
                                                        style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">2</span>）</span></b></span></a></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">商品信息展示和搜索<span lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">为了让您快速地找到您所需要的商品，我们可能会收集您使用我们的产品与<span
                                                            lang="EN-US">/</span>或服务的设备信息（包括设备名称、设备型号、设备识别码、操作系统和应用程序版本、语言设置、分辨率、服务提供商网络<span
                                                            lang="EN-US">ID</span>（<span lang="EN-US">PLMN</span>））、浏览器类型来为您提供商品信息展示的最优方式。我们也会为了不断改进和优化上述的功能来使用您的上述个人信息。</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-weight:bold"><o:p></o:p></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">您也可以通过搜索来精准地找到您所需要的商品或服务。我们会保留您的搜索内容以方便您重复输入或为您展示与您搜索内容相关联的商品。<b><u>请您注意，您的搜索关键词信息无法单独<span
                                                            class="GramE">识别您</span>的身份，不属于您的个人信息，我们有权以任何的目的对其进行使用；只有当您的搜索关键词信息与您的其他信息相互结合使用并可以<span
                                                            class="GramE">识别您</span>的身份时，则在结合使用期间，我们会将您的搜索关键词信息作为您的个人信息，与您的搜索历史记录一同按照本隐私政策对其进行处理与保护。</u></b><span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">3</span>）下单<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">当您准备对您购物车内的商品进行结算时，eBestMall系统会生成您购买该商品的订单<b><u>。您需要在订单中至少填写您的收货人姓名、收货地址以及手机号码，同时该订单中会载明订单号、您所购买的商品或服务信息、您应支付的货款金额及支付方式；您可以另外填写收货人的固定电话、邮箱地址信息以增加更多的联系方式确保商品可以准确送达，但不填写这些信息不影响您订单的生成。</u></b><span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">您在eBestMall上预订机票、火车票、酒店、跟团旅行、购买手机号卡或合约机、办理宽带等业务时，您还可能需要根据国家法律法规或服务提供方（包括票务销售方、酒店、旅行社及其授权的代理方、基础电信运营商、移动转售运营商等）的要求提供您的实名信息，这些实名信息可能包括您的身份信息（比如您的身份证、军官证、护照、驾驶证等载明您身份的证件复印件或号码）、您本人的照片或视频、姓名、电话号码等。这些订单中将可能包含您的行程、酒店地址、您指定的服务或设备安装地址（可能是您的家庭地址）等信息。<span
                                                            lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">上述所有信息构成您的“订单信息”，我们将使用您的订单信息来进行您的身份核验、确定交易、支付结算、完成配送、为您查询订单以及提供客<span
                                                    class="GramE">服咨询</span>与售后服务；我们还会使用您的订单信息来<span
                                                    class="GramE">判断您</span>的交易是否存在<span
                                                    class="GramE">异常以</span>保护您的交易安全。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">4</span>）支付功能<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-weight:bold">在您下单后，您可以选择eBestMall的关联方或与eBestMall合作的第三方支付机构（包括eBestMall支付、<span class="GramE">微信支付</span>及银联、网联等支付通道，以下称“支付机构”）所提供的支付服务。支付功能本身并不收集您的个人信息，但我们需要将您的eBestMall订单号与交易金额信息与这些支付机构共享以实现其<span
                                                    class="GramE">确认您</span>的支付指令并完成支付。“</span></span></span><span
                                        style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">关联方</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">”</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">指一方现在或将来控制、受控制或与其处于共同控制下的任何公司、机构以及上述公司或机构的法定代表人。“控制”是指直接或间接地拥有影响所提及公司管理的能力，无论是通过所有权、有投票权的股份、合同或其他被人民法院认定的方式。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">5</span>）交付产品或服务功能<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">在当您下单并选择货到付款或在线完成支付后，eBestMall的关联方或与eBestMall合作的第三方配送公司（包括顺丰、圆通等，以下称“配送公司”）将为您完成订单的交付。您知晓并同意eBestMall的关联方或与eBestMall合作的第三方配送公司会在上述环节内使用您的订单信息以保证您的订购的商品能够安全送达。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">我们的配送员在为您提供配送服务的同时，基于某些业务法律上要求实用认证的需求，会协助您完成实名认证，如您购买eBestMall的手机号码时。我们在此环节会使用您的身份证通过国家有权认证机构的专有设备对您的身份进行核验，我们并没有收集您的身份证信息，且我们的配送员均须遵守公司保密制度的规定。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">6</span>）客服与售后功能<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">我们的电话客服和售后功能会使用您的账号信息和订单信息。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">为保证您的账号安全，我们的呼叫中心客服和在线客服会使用您的账号信息与您核验您的身份。当您需要我们提供与您订单信息相关的客服与售后服务时，我们将会<span
                                                    class="GramE">查询您</span>的订单信息。您有可能会在与我们的客服人员沟通时，提供给出上述信息外的其他信息，如当您要求我们变更配送地址、联系人或联系电话。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
mso-bidi-font-weight:bold">2</span></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-weight:
bold">、改进我们的产品与<span lang="EN-US">/</span>或服务所必须的功能<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">我们可能会收集您的订单信息、浏览信息、您的兴趣爱好（您可以在账户设置中选择）进行数据分析以形成用户画像，用来将您感兴趣的商品或服务信息展示给您；或在您搜索时向您展示您可能希望找到的商品。</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-weight:bold">我们还可能为了提供服务及改进服务质量的合理需要而获得的您的其他信息，包括您与客<span class="GramE">服联系</span>时您提供的相关信息，您参与问卷调查时向我们发送的问卷答复信息，以及您与我们的关联方、我们合作伙伴之间互动时我们获得的相关信息。对于从您的各种设备上收集到的信息，我们可能会将它们进行关联，以便我们能在这些设备上为您提供一致的服务。我们可能会将来自某项服务的信息与来自其他服务的信息结合起来，以便为您提供服务、个性化内容和建议。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><a name="OLE_LINK8"></a><a name="OLE_LINK7"><span
                                                    style="mso-bookmark:OLE_LINK8"><span lang="EN-US"
                                                                                         style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
mso-bidi-font-weight:bold">3</span></span></a></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bookmark:OLE_LINK7"><span
                                                    style="mso-bookmark:OLE_LINK8"><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
mso-bidi-font-weight:bold">、保障交易安全所必须的功能<span lang="EN-US"><o:p></o:p></span></span></span></span></span></span></p>

                            <span style="mso-bookmark:OLE_LINK8"></span><span style="mso-bookmark:OLE_LINK7"></span>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">为提高您使用我们的产品与<span lang="EN-US">/</span>或服务时系统的安全性，更准确地预防钓鱼网站欺诈和保护账户安全，我们可能会通过了解您的浏览信息、订单信息、您常用的软件信息、设备信息等手段来<span
                                                    class="GramE">判断您</span>的账号风险，并可能会记录一些我们认为有风险的链接（“<span
                                                    lang="EN-US">URL”</span>）；我们也会收集您的设备信息对于eBestMall系统问题进行分析、统计流量并排<span
                                                    class="GramE">查可能</span>存在的风险、在您选择向我们发送异常信息时予以排查。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-weight:
bold">（二）您可选择是否授权我们收集和使用您的个人信息的情形<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">1</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、为使您购物更便捷或更有乐趣，从而提升您在eBestMall的网上购物体验，我们的以下附加功能中可能会收集和使用您的个人信息。<b
                                                    style="mso-bidi-font-weight:normal"><u>如果您不提供这些</u></b></span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:Arial;color:black">个人信息，您依然可以进行网上购物，但您可能无法使用这些可以为您所带来购物乐趣</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">的附加功能或在购买某些商品时需要重复填写一些信息。</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">这些<b style="mso-bidi-font-weight:normal">附加功能包括</b>：<b
                                                    style="mso-bidi-font-weight:
normal"><span lang="EN-US"><o:p></o:p></span></b></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">1</span>）基于位置信息的个性化推荐功能：<u>我们会收集您的位置信息<span
                                                            style="mso-bidi-font-weight:bold">（我们仅收集您当时所处的地理位置，但不会<span
                                                                class="GramE">将您各时段</span>的位置信息进行结合以<span
                                                                class="GramE">判断您</span>的行踪轨迹）</span>来<span
                                                            class="GramE">判断您</span>所处的地点，自动为您推荐您所在区域可以购买的商品或服务</u></span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">。比如向您推荐离您最近的可选酒店。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">2</span>）基于摄像头（相机）的附加功能：</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">您可以使用这个附加功能完成视频拍摄、拍照、<span
                                                    class="GramE">扫码以及</span>人脸识别登录的功能。<b
                                                    style="mso-bidi-font-weight:normal"><u>当您使用人脸识别登录时我们会收集您的面部信息。</u></b>未来我们可能会将人脸识别技术应用于更多场景，但那时我们会再次与您<span
                                                    class="GramE">确认您</span>是否愿意我们使用您的面部信息来实现这些附加功能。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">3</span>）基于图片上传的附加功能：</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">您可以在eBestMall上传您的照片来实现拍照购物功能<span
                                                    class="GramE">和晒单及</span>评价功能，</span></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast">我们会使用您所上传的照片来<span class="GramE">识别您</span>需要购买的商品或使用包含您所上<span
                                                            class="GramE">传图片</span>的评价。</span></u></b></span></span><span
                                        style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast"><o:p></o:p></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">（<span
                                                        lang="EN-US">4</span>）基于语音技术的附加功能：</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">您可以直接使用麦克风来进行语音购物或与我们的客服机器人进行咨询和互动。<b
                                                    style="mso-bidi-font-weight:normal"><u>在这些功能中我们会收集您的录音内容以<span
                                                            class="GramE">识别您</span>购物需求和<span
                                                            class="GramE">客服</span>与售后需求。<span lang="EN-US"><o:p></o:p></span></u></b></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">5</span>）基于通讯录信息的附加功能<span lang="EN-US">:</span><b
                                                    style="mso-bidi-font-weight:normal"><u>我们将收集</u></b></span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast">您的通讯录信息以方便您在购物时不再手动输入您通讯录中联系人的信息（比如您可以直接为通讯录中的电话号码充值）</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast;mso-bidi-font-weight:bold">；为了增加您购物时的社交乐趣，在获得您的同意下我们也可以<span class="GramE">判断您</span>的好友是否也同为eBestMall用户，并在eBestMall为你们的交流建立联系。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast"><o:p></o:p></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">2</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、上述附加功能可能需要您在您的设备中向我们开启您<span
                                                    style="mso-bidi-font-weight:bold">的地理位置（位置信息）、相机（摄像头）、相册（图片库）、麦克风以及通讯录的访问权限，以实现这些功能所涉及的信息的收集和使用。您可以在eBestMall商城通过“账户设置—设置—隐私”中逐项<span
                                                        class="GramE">查看您上述</span>权限的开启状态，并可以决定将这些权限随时的开启或关闭（我们会<span
                                                        class="GramE">指引您</span>在您的设备系统中完成设置）。</span></span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast">请您注意，</span></u></b></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><u><span style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast">您开启这些权限即<span class="GramE">代表您</span>授权我们可以收集和使用这些个人信息来实现上述的功能，您关闭权限即<span
                                                            class="GramE">代表您</span>取消了这些授权，则我们将不再继续收集和使用您的这些个人信息，也无法为您提供上述与这些授权所对应的功能。您关闭权限的决定不会影响此前基于您的授权所进行的个人信息的处理。</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast"><o:p></o:p></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-weight:
bold">（三）您充分知晓，以下情形中，我们收集、使用个人信息无需征得您的授权同意：<b><u><span lang="EN-US"><o:p></o:p></span></u></b></span></span></span></p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">1</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、与国家安全、国防安全有关的；<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">2</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、与公共安全、公共卫生、重大公共利益有关的；<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">3</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、与犯罪侦查、起诉、审判和判决执行等有关的；<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">4</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、出于维护个人信息主体或其他个人的生命、财产等重大合法权益但又很难得到本人同意的；<span
                                                            lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">5</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、所收集的个人信息是个人信息主体自行向社会公众公开的；<span
                                                            lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">6</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、从合法公开披露的信息中收集的您的个人信息的，如合法的新闻报道、政府信息公开等渠道；<span
                                                            lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">7</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、根据您的要求签订合同所必需的；
<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span></p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">8</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、用于维护所提供的产品与<span lang="EN-US">/</span>或服务的安全稳定运行所必需的，例如发现、处置产品与<span
                                                            lang="EN-US">/</span>或服务的故障；<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">9</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、为合法的新闻报道所必需的；<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" style="text-indent:21.1pt;line-height:150%;tab-stops:21.0pt"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">10</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、学术研究机构基于公共利益开展统计或学术研究所必要，<span
                                                            class="GramE">且对外</span>提供学术研究或描述的结果时，对结果中所包含的个人信息进行去标识化处理的；<span
                                                            lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:21.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">11</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast">、法律法规规定的其他情形。<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-weight:
bold">（四）我们从第三方获得您个人信息的情形<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" style="line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast">我们可能从第三方获取您授权共享的账户信息（头像、昵称），并在您同意本隐私政策后将您的第三方账户与您的eBestMall账户绑定，使您可以通过第三方账户直接登录并使用我们的产品与<span
                                                    lang="EN-US">/</span>或服务。我们会将依据与第三方的约定、对个人信息来源的合法性进行确认后，在符合相关法律和法规规定的前提下，使用您的这些个人信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-weight:
bold">（五）您个人信息使用的规则<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">、我们会根据本隐私政策的约定并为实现我们的产品与<span lang="EN-US">/</span>或服务功能对所收集的个人信息进行使用。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">、在收集您的个人信息后，我们将通过技术手段对数据进行去标识化处理，去标识化处理的信息将无法识别主体。<b><u>请您了解并同意，在此情况下我们有权使用已经去标识化的信息；并在不透露您个人信息的前提下，我们有权对用户数据库进行分析并予以商业化的利用。</u></b><span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">、<b><u>请您注意，您在使用我们的产品与<span lang="EN-US">/</span>或服务时所提供的所有个人信息，除非您删除或通过系统设置拒绝我们收集，否则将在您使用我们的产品与<span
                                                            lang="EN-US">/</span>或服务期间持续授权我们使用。在您注销账号时，我们将停止使用并<span
                                                            class="GramE">删除您</span>的个人信息。</u></b><span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">4</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">、我们会对我们的产品与<span lang="EN-US">/</span>或服务使用情况进行统计，并可能会与公众或第三方共享这些统计信息，以展示我们的产品与<span lang="EN-US">/</span>或服务的整体使用趋势。但这些统计信息不包含您的任何身份识别信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">5</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">、当我们展示您的个人信息时，我们会采用包括内容替换、匿名处理方式对您的信息进行脱敏，以保护您的信息安全。<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;layout-grid-mode:
char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">6</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:
bold">、</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">当我们要将您的个人信息用于本政策未载明的其它用途时，或基于特定目的收集而来的信息用于其他目的时，会通过您主动<span
                                                    class="GramE">做出勾选的</span>形式事先征求您的同意。</span></span></span><span
                                        style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast;mso-bidi-font-weight:bold"><o:p></o:p></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;mso-ascii-font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">二、我们如何使用<span lang="EN-US"> Cookie </span>和同类技术<span
                                                        lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-weight:
bold">（一）<span lang="EN-US">Cookies</span>的使用<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、为实现您联机体验的个性化需求，使您获得更轻松的访问体验。我们会在您的计算机或移动设备上发送一个或多个名为<span
                                                    lang="EN-US">Cookies</span>的小数据文件，指定给您的<span
                                                    lang="EN-US">Cookies </span>是唯一的，它只能被将<span
                                                    lang="EN-US">Cookies</span>发布给您的域中的<span lang="EN-US">Web</span>服务器读取。我们向您发送<span
                                                    lang="EN-US">Cookies</span>是为了<span class="GramE">简化您</span>重复登录的步骤、<span
                                                    class="GramE">存储您</span>的购物偏好或您购物车中的商品等数据进而为您提供购物的偏好设置、帮助您优化对广告的选择与互动、帮助<span
                                                    class="GramE">判断您</span>的登录状态以及账户或数据安全。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们不会将<span lang="EN-US"> Cookies </span>用于本隐私政策所述目的之外的任何用途。您可根据自己的偏好管理或删除
<span lang="EN-US">Cookies</span>。您可以清除计算机上保存的所有 <span lang="EN-US">Cookies</span>，大部分网络浏览器会自动接受<span lang="EN-US">Cookies</span>，但您通常可根据自己的需要来修改浏览器的设置以拒绝 <span
                                                    lang="EN-US">Cookies</span>；另外，您也可以清除软件内保存的所有<span lang="EN-US">Cookies</span>。但如果您这么做，您可能需要在每一次访问eBestMall网站时亲自更改用户设置，而且您之前所记录的相应信息也均会被删除，并且可能会对您所使用服务的安全性有一定影响。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
mso-bidi-font-weight:bold"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;line-height:150%;tab-stops:21.0pt;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-weight:
bold">（二）网络<span lang="EN-US">Beacon</span>和同类技术的使用<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">除<span lang="EN-US"> Cookie </span>外，我们还会在网站上使用网络<span lang="EN-US">Beacon</span>等其他同类技术。我们的网页上常会包含一些电子图像（称为<span
                                                    lang="EN-US">"</span>单像素<span lang="EN-US">" GIF </span>文件或<span
                                                    lang="EN-US"> "</span>网络<span
                                                    lang="EN-US"> beacon"</span>）。我们使用网络<span
                                                    lang="EN-US">beacon</span>的方式有：<span lang="EN-US"><br>
<span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp; </span>1</span>、通过在eBestMall网站上使用网络<span lang="EN-US">beacon</span>，计算用户访问数量，并通过访问<span
                                                    lang="EN-US"> cookie </span>辨认注册的eBestMall用户。<span lang="EN-US">&nbsp;<o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、通过得到的<span lang="EN-US">cookies</span>信息，为您提供个性化服务。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">三、我们如何共享、转让、公开披露您的个人信息<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">（一）共享<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:0pt">1</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">、我们不会与eBestMall以外的任何公司、组织和个人共享您的个人信息，但以下情况除外：<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">1</span>）事先获得<span class="GramE">您明确</span>的同意或授权；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">2</span>）根据适用的法律法规、法律程序的要求、强制性的行政或司法要求所必须的情况下进行提供；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">3</span>）在法律法规允许的范围内，为维护eBestMall、eBestMall的关联方或合作伙伴、您或其他eBestMall用户或社会公众利益、财产或安全免遭损害而有必要提供；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">4</span>） 只有共享您的信息，才能实现我们的产品与<span lang="EN-US">/</span>或服务的核心功能或提供您需要的服务；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">5</span>）<span class="GramE">应您需求</span>为您处理您与他人的纠纷或争议；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">6</span>）符合与<span class="GramE">您签署</span>的相关协议（包括<span class="GramE">在线签署</span>的电子协议以及相应的平台规则）或其他的法律文件约定所提供；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">7</span>）基于学术研究而使用；<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">8</span>）基于符合法律法规的社会公共利益而使用。<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;
mso-font-kerning:0pt">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">、<b style="mso-bidi-font-weight:
normal"><u>我们可能会将您的个人信息与我们的关联方共享。但我们只会共享必要的个人信息，且受本隐私政策中所声明目的的约束。我们的关联方如要改变个人信息的处理目的，将再次征求您的授权同意。<span lang="EN-US"><o:p></o:p></span></u></b></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;
mso-font-kerning:0pt">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">、<b style="mso-bidi-font-weight:
normal"><u>我们可能会向合作伙伴等第三方共享您的订单信息、账户信息、设备信息以及位置信息，以保障为您提供的服务顺利完成。但我们仅会出于合法、正当、必要、特定、明确的目的共享您的个人信息，并且只会共享提供服务所必要的个人信息。我们的合作伙伴无权将共享的个人信息用于任何其他用途。</u></b>我们的合作伙伴包括以下类型：<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">1</span>）商品或技术服务的供应商。<b style="mso-bidi-font-weight:
normal"><u>我们可能会将您的个人信息共享给支持我们功能的第三方</u></b>。这些支持包括为我们的供货或提供基础设施技术服务、物流配送服务、支付服务、数据处理等。我们共享这些信息的目的是可以实现我们产品与<span
                                                    lang="EN-US">/</span>或服务的核心购物功能，<span
                                                    style="mso-bidi-font-weight:bold">比如我们必须与物流服务提供商共享您的订单信息才能安排送货；或者我们需要将您的订单号和订单金额与第三方支付机构共享以实现其<span
                                                        class="GramE">确认您</span>的支付指令并完成支付等。<span lang="EN-US"><o:p></o:p></span></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">2</span>）第三方商家。<b><u>我们必须将您的订单信息与交易有关的必要信息与第三方商家共享来实现您向其购买商品或服务的需求，并促使其可以完成后续的售后服务。</u></b><span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">（<span lang="EN-US">3</span>）委托我们进行推广的合作伙伴。有时我们会代表其他企业向使用我们产品与<span lang="EN-US">/</span>或服务的用户群提供促销推广的服务。<b
                                                    style="mso-bidi-font-weight:normal"><u>我们可能会使用您的个人信息以及您的非个人信息集合形成的间接用户画像与委托我们进行推广的合作伙伴（“委托方”）共享，但我们仅会向这些委托方提供推广的覆盖面和有效性的信息，而不会提供您的个人身份信息，或者我们将这些信息进行汇总，以便它不会<span
                                                            class="GramE">识别您</span>个人。</u></b>比如我们可以告知该委托方有多少人看了他们的推广信息或在看到这些信息后购买了委托方的商品，或者向他们提供不能识别个人身份的统计信息，帮助他们了解其受众或顾客。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;
mso-font-kerning:0pt">4</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">、对我们与之共享个人信息的公司、组织和个人，我们会与其签署严格的保密协定，要求他们按照我们的说明、本隐私政策以及其他任何相关的保密和安全措施来处理个人信息。为了保障数据在第三方安全可控，我们推出了云鼎服务，在云端提供安全可靠的数据使用和存储环境，确保用户数据的安全性。在个人敏感数据使用上，我们要求第三方采用数据脱敏和加密技术，从而更好地保护用户数据。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;mso-pagination:widow-orphan;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">5</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:minor-fareast;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">、为了遵守法律、执行或适用我们的使用条件和其他协议，或者为了保护eBestMall、您或其他eBestMall客户的权利及其财产或安全，比如为防止欺诈等违法活动和减少信用风险，而与其他公司和组织交换信息。不过<span
                                                    lang="EN-US">,</span>这并不包括违反本隐私政策中所作的承诺而为获利目的出售、出租、共享或以其它方式披露的个人信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">（二）转让<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">我们不会将您的个人信息转让给任何公司、组织和个人，但以下情况除外：<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、事先获得<span class="GramE">您明确</span>的同意或授权；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、根据适用的法律法规、法律程序的要求、强制性的行政或司法要求所必须的情况进行提供；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、符合与<span class="GramE">您签署</span>的相关协议（包括<span class="GramE">在线签署</span>的电子协议以及相应的平台规则）或其他的法律文件约定所提供；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><u><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">4</span></u></b></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、在涉及合并、收购、资产转让或类似的交易时，如涉及到个人信息转让，我们会要求新的持有您个人信息的公司、组织继续受本隐私政策的约束，否则<span
                                                            lang="EN-US">,</span>我们将要求该公司、组织重新向您征求授权同意。<span
                                                            lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">（三）公开披露<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">我们仅会在以下情况下，且采取符合业界标准的安全防护措施的前提下，才会公开披露您的个人信息：<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、根据您的需求，在<span class="GramE">您明确</span>同意的披露方式下披露您所指定的个人信息；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、根据法律、法规的要求、强制性的行政执法或司法要求所必须提供您个人信息的情况下，我们可能会依据所要求的个人信息类型和披露方式公开披露您的个人信息。在符合法律法规的前提下，当我们收到上述披露信息的请求时，我们会要求必须出具与之相应的法律文件，如传票或调查函。我们坚信，对于要求我们提供的信息，应该在法律允许的范围内尽可能保持透明。我们对所有的请求都进行了慎重的审查，以确保其具备合法依据，且仅限于执法部门因特定调查目的且有合法权利获取的数据。在法律法规许可的前提下，我们披露的文件均在加密密钥的保护之下。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="font-size:12.0pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">四、我们如何保护和<span
                                                        class="GramE">保存您</span>的个人信息</span></b></span></span><span
                                        style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;"><o:p></o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">（一）我们保护您个人信息的技术与措施<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">我们非常重视个人信息安全，并采取一切合理可行的措施，保护您的个人信息：<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">1</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、数据安全技术措施<span lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">我们会采用符合业界标准的安全防护措施，包括建立合理的制度规范、安全技术来防止您的个人信息遭到未经授权的访问使用、修改<span
                                                    lang="EN-US">,</span>避免数据的损坏或丢失。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">eBestMall的网络服务采取了传输<span class="GramE">层安全</span>协议等加密技术，通过<span
                                                    lang="EN-US">https</span>等方式提供浏览服务，确保用户数据在传输过程中的安全。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">eBestMall采取加密技术对用户个人信息进行加密保存，并通过隔离技术进行隔离。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">在个人信息使用时，例如个人信息展示、个人信息关联计算，我们会采用包括内容替换、<span lang="EN-US">SHA256</span>在内多种数据脱敏技术增强个人信息在使用中安全性。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">eBestMall采用严格的数据访问权限控制和多重身份认证技术保护个人信息，避免数据被违规使用。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">eBestMall采用代码安全自动检查、数据访问日志分析技术进行个人信息安全审计。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">2</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、eBestMall为保护个人信息采取的其他安全措施<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">eBestMall通过建立数据分类分级制度、数据安全管理规范、数据安全开发规范来管理规范个人信息的存储和使用。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">eBestMall通过信息接触者保密协议、监控和审计机制来对数据进行全面安全控制。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">eBestMall建立数据安全委员会并下设信息保护专职部门、数据安全应急响应组织来推进和保障个人信息安全。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">安全认证和服务。我们<span class="GramE">存储您</span>个人数据的底层云技术取得了数据中心联盟颁发的“可信云”认证三级认证、通过了公安部安全等级保护三级认证，同时还获得了<span
                                                    lang="EN-US">ISO27000</span>认证。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">加强安全意识。我们还会举办安全和隐私保护培训课程，加强员工对于保护个人信息重要性的认识。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">3</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们仅允许有必要知晓这些信息的eBestMall及eBestMall关联方的员工、合作伙伴访问个人信息，并为此设置了严格的访问权限控制和监控机制。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">我们同时要求可能接触到您个人信息的所有人员履行相应的保密义务。如果未能履行这些义务，可能会被追究法律责任或被中止与eBestMall的合作关系。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">4</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、<b style="mso-bidi-font-weight:normal">我们会采取一切合理可行的措施，确保未收集无关的个人信息</b>。我们只会在达成本政策所述目的所需的期限内保留您的个人信息，除非需要延长保留期或受到法律的允许。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">5</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们还在用户数据保护上做了一些创造性工作<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">在eBestMall配送体系，采用了独特的“微笑面单”，避免用户敏感数据在配送环节的暴露，同时<span lang="EN-US">,</span>大力强化对eBestMall<span
                                                    class="GramE">物流员工</span>的数据安全培训和要求，提高<span
                                                    class="GramE">物流员工</span>保护用户隐私数据的意识。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">6</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、互联网并非绝对安全的环境，而且电子邮件、即时通讯、社交软件等与其他用户的交流方式无法确定是否完全加密，我们建议您使用此类工具时请使用复杂密码，并注意保护您的个人信息安全。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">7</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、互联网环境并非百分之百安全，我们将尽力确保或担保您发送给我们的任何信息的安全性。如果我们的物理、技术、或管理防护设施遭到破坏，导致信息被非授权访问、公开披露、篡改、或毁坏，导致您的合法权益受损，我们将承担相应的法律责任。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">8</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、安全事件处置<span lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">在通过eBestMall网站与第三方进行网上商品或服务的交易时，您不可避免的要向交易对方或潜在的交易对方披露自己的个人信息，如联络方式或者邮政地址等。请您妥善保护自己的个人信息，仅在必要的情形下向他人提供。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">为应对个人信息泄露、损毁和丢失等可能出现的风险，eBestMall制定了多项制度，明确安全事件、安全漏洞的分类分级标准及相应的处理流程。eBestMall也为安全事件建立了专门的应急响应团队，按照安全事件处置规范要求，针对不同安全事件启动安全预案，进行止损、分析、定位、制定补救措施、联合相关部门进行溯源和打击。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">在不幸发生个人信息安全事件后，我们将按照法律法规的要求，及时向您告知：安全事件的基本情况和可能的影响、我们已采取或将要采取的处置措施、您可自主防范和降低风险的建议、对您的补救措施等。我们同时将及时将事件相关情况以邮件、信函、电话、推送通知等方式告知您，难以逐一告知个人信息主体时，我们会采取合理、有效的方式发布公告。同时，我们还将按照监管部门要求，主动上报个人信息安全事件的处置情况。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">9</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、如果您对我们的个人信息保护有任何疑问，可通过本政策最下方约定的联系方式联系我们。<b style="mso-bidi-font-weight:normal"><u>如您发现自己的个人信息泄密，尤其是您的账户及密码发生泄露，请您立即通过本政策最下方<span
                                                            style="color:red;cursor:pointer"
                                                            id="protocolContactTrigger">【如何联系我们】</span>约定的联系方式联络我们，以便我们采取相应措施。</u><span
                                                        lang="EN-US"><o:p></o:p></span></b></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast"><span style="mso-spacerun:yes">&nbsp;&nbsp; </span></span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">（二）您个人信息的保存</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast"><o:p></o:p></span></b></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">1</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">、您的个人信息将全被存储于中华人民共和国境内。如您使用跨境交易服务，且需要向境外传输您的个人信息完成交易的，<span
                                                    class="GramE">我们会单独征</span>得您的授权同意并要求接收方按照我们的说明、本隐私政策以及其他任何相关的保密和安全措施来处理这些个人信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">2</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、除非法律法规另有规定，您的个人信息我们将保存至您账号注销之日后的一个月。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">我们承诺这是为了保证您在eBestMall商城购物的消费者权益，您个人信息在eBestMall商城须保存的<span
                                                    class="GramE">最</span>短期间。当您的个人信息超出我们所保存的期限后，我们会对您的个人信息进行删除或匿名化处理。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">3</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、<u>请您注意，当您成功申请注销eBestMall账户后，我们<span class="GramE">给予您自注销</span>之日起一个月的“后悔期”，在这个期间内您可以随时申请恢复您已经注销的eBestMall账户。为了实现您恢复您eBestMall账户的功能，我们将不会在“后悔期”内对您的个人信息进行删除或匿名化处理。如您在“后悔期”内没有要求恢复您的eBestMall账户或<span
                                                            class="GramE">您明确</span>向我们表述不再恢复您的eBestMall账户，我们将对您的个人信息进行删除或匿名化处理。<span
                                                            lang="EN-US"><o:p></o:p></span></u></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><u><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">4</span></u></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><u><span
                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、如果我们终止服务或运营，我们会至少提前三十日向您通知，并在终止服务或运营后对您的个人信息进行删除或匿名化处理。<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;
font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">五、您如何<span class="GramE">管理您</span>的个人信息<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">京<span class="GramE">东非常</span>重视您对个人信息的关注，并尽全力保护您对于您个人信息访问、更正、删除以及撤回同意的权利，以使您拥有充分的能力保障您的隐私和安全。您的权利包括：<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">1</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">、访问和<span
                                                    class="GramE">更正您</span>的个人信息<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">除法律法规规定外，您有权随时访问和<span class="GramE">更正您</span>的个人信息，具体包括：<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" style="text-indent:15.75pt;mso-char-indent-count:1.5;
line-height:150%"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:
OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:
宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">1</span>）您的账户信息：<span
                                                    lang="EN-US">PC</span><span class="GramE">端您可以</span>在“我的eBestMall”页面的“账户设置”菜单中<span
                                                    class="GramE">查阅您</span>提交给eBestMall的所有个人信息，你也可通过上述途径更新除实名认证信息之外的其他个人信息（您的实名认证信息是您通过实名认证时使用的姓名和身份证信息），如您需要<span
                                                    class="GramE">变更您</span>的实名认证信息，您可拨打<span
                                                    lang="EN-US">95118</span>服务热线申请变更。移动<span
                                                    class="GramE">端具体</span>路径为：账户名称、个人资料信息：首页<span
                                                    lang="EN-US">--</span>“我的”进入我的eBestMall<span lang="EN-US">--</span>右上角“设置”或点击头像进入账号设置<span
                                                    lang="EN-US">--</span>个人信息；账户密码、电话号码、安全信息：首页<span
                                                    lang="EN-US">--</span>“我的”进入我的eBestMall<span
                                                    lang="EN-US">--</span>右上角“设置按钮”或点击头像进入账号设置<span
                                                    lang="EN-US">--</span>账户安全；兴趣爱好：首页<span lang="EN-US">--</span>“我的”进入我的eBestMall<span
                                                    lang="EN-US">--</span>商品关注、店铺关注、内容关注、我的活动。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">2</span>）您的收货信息：<span
                                                    lang="EN-US">PC</span><span class="GramE">端您可以</span>通过访问“我的eBestMall”页面的“收货地址”菜单中随时添加、更改、<span
                                                    class="GramE">删除您</span>的收货地址信息（包括收货人姓名、收货地址、收货人的电话号码或邮箱），移动<span
                                                    class="GramE">端具体</span>路径为：首页<span lang="EN-US">--</span>“我的”进入我的eBestMall<span
                                                    lang="EN-US">--</span>右上角“设置按钮”或点击头像进入账号设置<span
                                                    lang="EN-US">--</span>地址管理。您也可以将最常用的收货地址设置为默认地址，如此您下次购买商品时<span
                                                    class="GramE">在您未更改</span>收货地址时，您的商品会配送到您默认地址。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">3</span>）您的订单信息：<span
                                                    lang="EN-US">PC</span><span
                                                    class="GramE">端您可以</span>通过访问“我的订单”页面<span
                                                    class="GramE">查看您</span>的所有已经完成、待付款或待售后的订单。移动<span
                                                    class="GramE">端具体</span>路径为：移动端首页<span lang="EN-US">--</span>“我的”进入我的eBestMall<span
                                                    lang="EN-US">--</span>我的订单<span lang="EN-US">/</span>待收款<span
                                                    lang="EN-US">/</span>待收货<span lang="EN-US">/</span>退换售后。<b><u>您可以选择删除已经完成的订单来<span
                                                            class="GramE">删除您</span>的订单信息，但这样可能导致我们无法准确<span
                                                            class="GramE">判断您</span>的购买信息而难以提供相应的售后服务。</u></b><span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">4</span>）您的浏览信息：您可以访问或<span
                                                    class="GramE">清除您</span>的搜索历史记录、查看和修改兴趣以及管理其他数据。移动端路径为：搜索历史记录：首页<span
                                                    lang="EN-US">--</span>“我的”进入我的eBestMall<span lang="EN-US">--</span>浏览记录；兴趣及其他数据：首页<span
                                                    lang="EN-US">--</span>“我的”进入我的eBestMall<span lang="EN-US">--</span>商品关注、店铺关注、内容关注、我的活动。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">5</span>）您的评论信息：<span
                                                    lang="EN-US">PC</span><span class="GramE">端您可以</span>访问或更新或<span
                                                    class="GramE">清除您</span>的个人评论，移动端路径为：我的eBestMall<span
                                                    lang="EN-US">--</span><span class="GramE">待评价</span><span
                                                    lang="EN-US">--</span>评价中心。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">6</span>）您的发票信息：您可以访问或更新或<span
                                                    class="GramE">清除您</span>的发票信息，移动端路径为首页<span
                                                    lang="EN-US">--</span>“我的”进入我的eBestMall<span lang="EN-US">--</span>右上角“设置”或点击头像进入账号设置<span
                                                    lang="EN-US">--</span><span class="GramE">增票资质</span>。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">7</span>）对于您在使用我们的产品与<span
                                                    lang="EN-US">/</span>或服务过程中产生的其他个人信息需要访问或更正，请随时联系我们。我们会根据本隐私政策所列明的方式和期限<span
                                                    class="GramE"><u>响应您</u></span><u>的请求</u>。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">8</span>）您无法访问和更正的个人信息：除上述列明的信息外，您的部分个人信息我们还无法为您提供访问和更正的服务，这些信息主要是为了提升您的用户体验和保证交易安全所收集的您的设备信息、您使用附加功能时产生的个人信息。上述信息我们会在您的授权范围内进行使用，您无法访问和更正，但您可联系我们进行删除或做匿名化处理。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">2</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">、<span
                                                    class="GramE">删除您</span>的个人信息<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">您在我们的产品与<span lang="EN-US">/</span>或服务页面中可以直接清除或删除的信息，包括订单信息、浏览信息、收货地址信息；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">在以下情形中，您可以向我们提出删除个人信息的请求：<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">1</span>）如果我们处理个人信息的行为违反法律法规；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span
                                                    lang="EN-US">2</span>）如果我们收集、使用您的个人信息，却未征得您的同意；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">3</span>）如果我们处理个人信息的行为违反了与您的约定；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">4</span>）如果您注销了eBestMall账户；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">5</span>）如果我们终止服务及运营。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">若我们决定<span class="GramE">响应您</span>的删除请求，我们还将同时通知从我们获得您的个人信息的实体，要求其及时删除，除非法律法规另有规定，或这些实体获得您的独立授权。当您从我们的服务中删除信息后，我们可能不会立即备份系统中删除相应的信息，但会在备份更新时删除这些信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">3</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">、改变您授权同意的范围或撤回您的授权<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">您可以通过删除信息、关闭设备功能、在eBestMall网站或软件中进行隐私设置等方式改变您授权我们继续收集个人信息的范围或撤回您的授权。您也可以通过注销账户的方式，撤回我们继续收集您个人信息的全部授权。
<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">请您理解，每个业务功能需要一些基本的个人信息才能得以完成，当您撤回同意或授权后，我们无法继续为您提供撤回同意或授权所对应的服务，也<span
                                                            class="GramE">不</span>再处理<span class="GramE">您相应</span>的个人信息。但您撤回同意或授权的决定，不会影响此前基于您的授权而开展的个人信息处理。<span
                                                            lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">4</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">、注销账户<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>


                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><u><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">您可以在我们的产品中直接申请注销账户。请您注意，如果<span class="GramE">您存在</span>完成不满一年的订单，可能需要您履行完毕后方可注销账户。关于您注销账户的方式以及您应满足的条件，请详见
                    <a href="https://safe.ebestmall.com/validate/accountcancel/showCancelNotice.action" target="_blank"><span
                                lang="EN-US" style="color:red"><span lang="EN-US">《eBestMall账户注销须知》</span></span></a>
                    。您注销账户后，我们将停止为您提供产品与<span lang="EN-US">/</span>或服务，并依据您的要求，除法律法规另有规定外，我们将<span
                                                            class="GramE">删除您</span>的个人信息。<span lang="EN-US"><o:p></o:p></span></span></u></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">5</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">、如果您不想接受我们给您发送的促销信息，您随时可通过以下方式取消：<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">1</span>）您可通过<span
                                                    lang="EN-US">PC</span>端账户设置页面的邮件订阅菜单中取消邮件订阅的促销信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">2</span>）您可以随时回复“<span
                                                    lang="EN-US">TD</span>”来取消我们给您发送的手机促销短信。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">3</span>）您可以通过移动端<span lang="EN-US">APP</span>“账户设置<span
                                                    lang="EN-US">-</span>设置<span lang="EN-US">-</span>推送消息设置<span
                                                    lang="EN-US">-</span>通知”设置是否接受我们通过“通知”推动给您的商品和促销信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">4</span>）我们会与第三方的平台或媒体（“平台”）合作基于您的个人信息向您推荐个性化的商品。这些个人信息包括诸如在本网站的购物情况、访问本网站关联公司网站的情况及您在您的账户设置中填写的</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                class="label1"><span style="mso-bidi-font-size:10.5pt;line-height:150%;
font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
Calibri;mso-hansi-theme-font:minor-latin">兴趣爱好</span></span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">。平台仅向我们提供了展示商品的窗口，窗口内容的链接是eBestMall站内的个性化商品展示信息，由eBestMall进行管理，因此我们不会向广告商提供您的任何的个人信息。而且我们在推荐窗内设置了屏蔽功能，您可选择<span
                                                    class="GramE">屏蔽您</span>不喜欢的广告。如您不愿意接受eBestMall在单个平台上的推荐服务，请联系平台进行关闭。您知晓并理解平台是自主经营的实体，eBestMall无法对其进行管理。
<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">5</span>）为了保护您的隐私，我们不会以任何方式和途径向您推送涉及宗教信仰、性、疾病等相关敏感内容的促销或商品信息给您。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                                                        style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">6</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">、<span
                                                    class="GramE">响应您</span>的请求<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">如果您无法通过上述方式访问、更正或<span class="GramE">删除您</span>的个人信息，或您需要访问、更正或<span
                                                    class="GramE">删除您</span>在使用我们产品与<span lang="EN-US">/</span>或服务时所产生的其他个人信息，或您认为eBestMall存在任何违反法律法规或与您关于个人信息的收集或使用的约定，<span
                                                    class="GramE">您均可以</span>发送电子邮件至<span lang="EN-US">privacy@ebestmall.com</span>或通过本协议下方的其他方式与我们联系。为了保障安全，我们可能需要您提供书面请求，或以其他方式证明您的身份，我们将在收到您反馈并<span
                                                    class="GramE">验证您</span>的身份后的<span lang="EN-US">30</span>天内答复您的请求。对于<span
                                                    class="GramE">您合理</span>的请求，我们原则上不收取费用，但对多次重复、超出合理限度的请求，我们将视情收取一定成本费用。对于那些无端重复、需要过多技术手段（例如，需要开发新系统或从根本上改变现行惯例）、给他人合法权益带来风险或者非常不切实际（例如，涉及备份磁带上存放的信息）的请求，我们可能会予以拒绝。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">在以下情形中，按照法律法规要求，我们将无法<span
                                                    class="GramE">响应您</span>的请求：<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">1</span>）与国家安全、国防安全有关的；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">2</span>）与公共安全、公共卫生、重大公共利益有关的；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">3</span>）与犯罪侦查、起诉和审判等有关的；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">4</span>）有充分证据表明<span class="GramE">您存在</span>主观恶意或滥用权利的；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast;mso-bidi-font-weight:bold">（<span lang="EN-US">5</span>）<span
                                                    class="GramE">响应您</span>的请求将导致您或其他个人、组织的合法权益受到严重损害的<b>。<span
                                                        lang="EN-US"><o:p></o:p></span></b></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:24.0pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">六、未成年人的个人信息保护<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、京<span class="GramE">东非常</span>重视对未成年人个人信息的保护。若您是<span lang="EN-US">18</span>周岁以下的未成年人，在使用我们的产品与<span
                                                    lang="EN-US">/</span>或服务前，应事先取得<span class="GramE">您家长</span>或法定监护人的书面同意。eBestMall根据国家相关法律法规的规定保护未成年人的个人信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、对于经父母或法定监护人同意而收集未成年人个人信息的情况，我们只会在受到法律允许、父母或监护人明确同意或者保护未成年人所必要的情况下使用或公开披露此信息。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、如果我们发现自己在未事先获得可证实的父母或法定监护人同意的情况下收集了未成年人的个人信息，则会设法尽快删除相关数据。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:24.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="font-size:12.0pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:24.0pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">七、通知和修订<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、为给您提供更好的服务以及随着eBestMall业务的发展，本隐私政策也会随之更新。但未经<span
                                                    class="GramE">您明确</span>同意，我们不会<span
                                                    class="GramE">削减您依据</span>本隐私政策所应享有的权利。我们会通过在eBestMall网站、eBestMall移动端上发出更新版本并在生效前通过网站公告或以其他适当方式提醒<span
                                                    class="GramE">您相关</span>内容的更新，也请您访问eBestMall以便及时了解最新的隐私政策。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、对于重大变更，我们还会提供更为显著的通知（我们会通过包括但不限于邮件、短信或在浏览页面做特别提示等方式，说明隐私政策的具体变更内容）。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">本政策所指的重大变更包括但不限于：<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">1</span>）我们的服务模式发生重大变化。如处理个人信息的目的、处理的个人信息类型、个人信息的使用方式等；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">2</span>）我们在所有权结构、组织架构等方面发生重大变化。如业务调整、破产并购等引起的所有者变更等；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">3</span>）个人信息共享、转让或公开披露的主要对象发生变化；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">4</span>）您参与个人信息处理方面的权利及其行使方式发生重大变化；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">5</span>）我们负责处理个人信息安全的责任部门、联络方式及投诉渠道发生变化时；<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">（<span lang="EN-US">6</span>）个人信息安全影响评估报告表明存在高风险时。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们还会将本策略的旧版本存档，供您查阅。<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.1pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast"><o:p>&nbsp;</o:p></span></b></span></span></p>


                        </div>
                        <div id="protocolContactHash">
                            <p class="a" align="left" style="text-align:left;text-indent:24.0pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">八、如何联系我们<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;
font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;
mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:minor-fareast">1</span><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、如您对本隐私政策或您个人信息的相关事宜有任何问题、意见或建议，<a name="OLE_LINK3"></a><a name="OLE_LINK4"><span
                                                style="mso-bookmark:OLE_LINK3">请通过访问</span></a></span><span
                                        style="mso-bookmark:OLE_LINK4"><span
                                            style="mso-bookmark:OLE_LINK3"></span></span><a
                                        href="https://help.ebestmall.com" target="_blank"><span
                                            style="mso-bookmark:OLE_LINK4"><span
                                                style="mso-bookmark:OLE_LINK3"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:minor-fareast">https://help.ebestmall.com</span></span></span></a><span
                                        style="mso-bookmark:OLE_LINK4"><span style="mso-bookmark:OLE_LINK3"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">在线客服系统、发送邮件至<span lang="EN-US">privacy@ebestmall.com</span>或拨打我们的任何一部客<span
                                                    class="GramE">服电话</span>等多种方式与我们联系</span></span></span><span
                                        style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">。<span lang="EN-US"><o:p></o:p></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、我们设立了个人信息保护专职部门（或个人信息保护专员），您可以通过发送邮件至<span
                                                    lang="EN-US">privacy@ebestmall.com</span>的方式与其联系。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;text-indent:21.0pt;
mso-char-indent-count:2.0;line-height:150%;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;
mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-theme-font:minor-fareast">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast">、一般情况下，我们将在三十天内回复。如果您对我们的回复不满意，特别是我们的个人信息处理行为损害了您的合法权益，您还可以向网信、电信、公安及工商等监管部门进行投诉或举报。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:
minor-fareast;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></span></span></p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">注：本《eBestMall隐私政策》版本更新日期为<span lang="EN-US">2017</span>年<span lang="EN-US">8</span>月<span
                                                    lang="EN-US">20</span>日，将于<span
                                                    lang="EN-US">2017</span>年<span lang="EN-US">8</span>月<span
                                                    lang="EN-US">27</span>日正式生效，在<span
                                                    lang="EN-US">2017</span>年<span lang="EN-US">8</span>月<span
                                                    lang="EN-US">20</span>日至<span lang="EN-US">2017</span>年<span
                                                    lang="EN-US">8</span>月<span lang="EN-US">27</span>日期间，如您认为更新的《eBestMall隐私政策》对<span
                                                    class="GramE">您更为</span>有利，我们同意双方适用新的《eBestMall隐私政策》内容。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:24.1pt;line-height:
150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="font-size:12.0pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="font-size:12.0pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="font-size:12.0pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="font-size:12.0pt;
line-height:150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:
宋体;mso-hansi-theme-font:minor-fareast"><o:p>&nbsp;</o:p></span></b></span></span></p>
                        </div>
                        <div id="protocolCancelTips">
                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast">附件一：《eBestMall账户注销须知》<span lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">您在申请注销流程中点击下一步前，应当认真阅读《eBestMall账户注销须知》（以下称“《注销须知》”）。<b
                                                    style="mso-bidi-font-weight:normal">请您务必审慎阅读、充分理解协议中相关条款内容，其中包括：</b></span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">1</span></b></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">、与您约定免除或限制责任的条款；</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></b></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">2</span></b></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">、其他以粗体下划线标识的重要条款。</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></b></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">如您对本《注销须知》有任何疑问，可拨打我们的客<span
                                                    class="GramE">服电话</span>联系客服，您也可联系在线客服或通过</span></span></span><a
                                        href="https://help.ebestmall.com"><span style="mso-bookmark:OLE_LINK17"><span
                                                style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:宋体;mso-hansi-font-family:
Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt">https://help.ebestmall.com</span></span></span></a><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt">自助查询。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><span
                                                    style="mso-spacerun:yes">&nbsp;</span><o:p></o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:
0pt">【特别提示】</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">当您按照注销页面提示填写信息、阅读并同意本《注销须知》及相关条款与条件且完成全部注销程序后，即表示您已充分阅读、理解并接受本《注销须知》的全部内容。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:宋体;mso-font-kerning:0pt">阅读本《注销须知》的过程中，如果您不同意相关任何条款和条件约定，请您立即停止账户注销程序。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">亲爱的eBestMall个人消费者用户：<span lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">我们对您注销eBestMall账户的决定深表遗憾和歉意。<span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">我们在此善意地提醒您<b style="mso-bidi-font-weight:normal">，您注销账户的行为会给您的售后维权带来诸多不便，且注销eBestMall账户后，您的个人信息我们只会在eBestMall商城的前台系统中去除，使其保持不可被检索、访问的状态，或对其进行匿名化处理。您知晓并理解，根据法律法规规定，相关交易记录可能须在eBestMall后台保存<span
                                                        lang="EN-US">5</span>年甚至更长的时间。</b><span lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;font-family:宋体;
mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">如果您仍执意注销账户，您的账户需同时满足以下条件：</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）在最近一个月内，账户没有进行更改密码、更改绑定信息等敏感操作，账户没有被盗、被封等风险；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）账户在eBestMall商城系统中无资产和虚拟权益（包括但不限于账户余额、</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">E</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">卡余额、京豆、优惠券等）、无拍卖保证金、无欠款；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）账户内无未完成的订单、服务，且所有订单完成达一年以上；
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                                                                       style="mso-bidi-font-size:
10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:宋体;mso-hansi-font-family:
Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">4</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）在eBestMall商城没有过使用该账户激活店铺的记录；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">5</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）账户无任何纠纷，包括投诉举报或被投诉举报；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">6</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）账户为正常使用中的账户且无任何账户被限制的记录；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">7</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）账户对应的eBestMall支付账户已注销，且已妥善处理了eBestMall支付账户下的所有问题；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">8</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）账户已经解除与其他网站、其他</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">APP</span></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">的授权登录或绑定关系。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt">3.
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">如果您的eBestMall账户同时是eBestMall平台商家店铺的绑定账户名，您需先解除相关绑定；<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt">4
.</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">在eBestMall账户注销期间，如果您的eBestMall账户涉及争议纠纷，包括但不限于投诉、举报、诉讼、仲裁、国家有权机关调查等，eBestMall有权自行终止本eBestMall账户的注销而无需另行得到您的同意。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">5. </span></b></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">注销eBestMall账户，您将无法再使用本eBestMall账户，也将无法找回您eBestMall账户中及与账户相关的任何内容或信息，</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-bidi-font-family:宋体;
mso-font-kerning:0pt">包括但不限于：</span></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）您将无法登录、使用本eBestMall账户；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）本eBestMall账户的个人资料和历史信息（包括但不限于用户名、头像、购物记录、关注信息等）都将无法找回；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">）您通过eBestMall账户使用、授权登录或绑定eBestMall账户后使用的eBestMall相关或第三方的其他服务（包括但不限于eBestMall阅读、eBestMall云、eBestMall金融等）的所有记录将无法找回。您将无法再登录、使用前述服务，您曾获得的余额、优惠券、积分、资格、订单、</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">E</span></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:宋体;mso-bidi-font-family:宋体;mso-font-kerning:0pt">卡及其他卡券等视为您自行放弃，将无法继续使用。<b
                                                    style="mso-bidi-font-weight:normal">您理解并同意，eBestMall无法协助您重新恢复前述服务。请您在提交注销申请前，务必先了解您须解绑的其他相关账户信息，具体可与我们的客服联系。</b></span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;
mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">6. </span></b></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span style="mso-bidi-font-size:10.5pt;font-family:宋体;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">注销本eBestMall账户并不代表本eBestMall账户注销前的账户行为和相关责任得到豁免或减轻。<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                            </p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:
宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></b></span></span></p>

                            <p class="MsoNormal" style="mso-pagination:widow-orphan"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
宋体;mso-hansi-font-family:Calibri;mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p>&nbsp;</o:p></span></span></span>
                            </p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast">附件二：<span lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="a" align="left" style="text-align:left;text-indent:0cm;mso-char-indent-count:
0;line-height:150%;tab-stops:21.0pt;layout-grid-mode:char;mso-layout-grid-align:
none"><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b
                                                style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:
150%;mso-ascii-font-family:宋体;mso-ascii-theme-font:minor-fareast;mso-fareast-font-family:
宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-font-family:宋体;mso-hansi-theme-font:
minor-fareast">上一版《eBestMall隐私政策》<span lang="EN-US"><o:p></o:p></span></span></b></span></span></p>

                            <p class="MsoNormal" style="line-height:150%"><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall（以下或称“我们”）注重保护用户个人信息及个人隐私。本隐私政策解释了用户（“您”）个人信息收集（以下或称“信息”）和使用的有关情况，本隐私政策适用于eBestMall向您提供的所有相关服务（包括但不限于电子商务、网络资讯、网络社交、互联网金融服务等，以下称“eBestMall服务”或“服务”）。<b>如果您不同意本隐私政策的任何内容，您应立即停止使用eBestMall服务。当您使用eBestMall提供的任一服务时，即表示您已同意我们按照本隐私政策来合法使用和保护您的个人信息。</b></span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">一、您个人信息的收集</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">我们收集信息是为了向您提供更好以及更个性化的服务，并努力提高您的用户体验。我们收集信息的种类如下：</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<b>1</b></span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span
                                                    style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、您向我们提供的信息</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">当<span
                                                    class="GramE">您注册</span>eBestMall账户及您在使用相关eBestMall服务时填写、提交及</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">/</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">或其他任何方式提供的信息，包括您的姓名、性别、出生年月日、身份证号码、护照姓、护照名、护照号码、电话号码、电子邮箱、收货地址、eBestMall钱包<span
                                                    class="GramE">或网银在线</span>账号、银行卡信息及相关附加信息（如您地址中的所在的省份和城市、邮政编码等）。<b>您可以选择不提供某一或某些信息，但是这样可能使您无法使用eBestMall的许多特色服务。</b>请您理解，我们使用您提供的信息是为了<span
                                                    class="GramE">回应您</span>的要求，为您在eBestMall购物或享受服务提供便利，完善eBestMall网站以及与您进行信息沟通。另外，我们可能会将您所提供的信息与您的eBestMall账户关联，用以<span
                                                    class="GramE">识别您</span>的身份。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><br>
<b>2</b></span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span
                                                    style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、我们在您使用服务过程中获得的信息</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">为了提高服务质量和用户体验，我们会留存您使用服务以及使用方式的相关信息，这类信息包括：</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">1</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）您的浏览器和计算机上的信息。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">在您访问eBestMall网站或使用eBestMall服务时，eBestMall系统自动接收并记录的您的浏览器和计算机上的信息（包括但不限于您的</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">IP</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">地址、浏览器的类型、使用的语言、访问日期和时间、软硬件特征信息及您需求的网页记录等数据）。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">2</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）您的位置信息。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">当您下载或使用eBestMall、其关联方及合作伙伴开发的应用程序（例如eBestMall</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">APP</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">），或访问移动网页使用eBestMall服务时，eBestMall可能会读取您的位置（大多数移动设备将允许您关闭定位服务，具体建议您<span
                                                    class="GramE">联系您</span>的移动设备的服务商或生产商）。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">3</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）您的设备信息。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall可能会读取您访问eBestMall或使用eBestMall服务时所使用的终端设备的信息，包括但不限于设备型号、设备识别码、操作系统、分辨率、电信运营商等。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">4</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）您的行为或交易信息。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall可能会记录您访问eBestMall或使用eBestMall服务时所进行的操作以及您在eBestMall网站上进行交易的相关信息。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">除上述信息外，我们还可能为了提供服务及改进服务质量的合理需要而获得的您的其他信息，包括您与我们的客服团队联系时您提供的相关信息，您参与问卷调查时向我们发送的问卷答复信息，以及您与eBestMall的关联方、eBestMall合作伙伴之间互动时我们获得的相关信息。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">同时，为提高您使用eBestMall提供的服务的安全性，更准确地预防钓鱼网站欺诈和木马病毒，我们可能会通过了解一些您的网络使用习惯、您常用的软件信息等手段来<span
                                                    class="GramE">判断您</span>账户的风险，并可能会记录一些我们认为有风险的链接（“</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">URL</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">”）。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<b>3</b></span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span
                                                    style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、来自第三方的信息</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">指在<span class="GramE">您注册</span>eBestMall账户和使用服务过程中，您授权eBestMall可向eBestMall的关联方、合作伙伴获取其所收集的相关信息。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">这些信息包括但不限于您的身份信息、行为信息、交易信息、设备信息等，eBestMall会将此类信息汇总，用于帮助eBestMall向您提供更好以及更加个性化的服务或更好的预防互联网欺诈。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">您了解并同意，以下信息不适用本隐私政策：</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">1</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）您在使用eBestMall提供的搜索服务时输入的关键字信息；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">2</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）信用评价、违反法律法规规定或违反eBestMall平台规则行为及eBestMall已对<span
                                                    class="GramE">您采取</span>的措施；</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">3</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）应法律法规要求需公示的企业名称等相关工商注册信息以及自然人经营者的信息。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">4</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）其他您与eBestMall或eBestMall的关联方所签署的协议（包括<span
                                                    class="GramE">在线签署</span>的电子协议，例如《eBestMall用户注册协议》）以及eBestMall平台规则中明确约定或提示您不适用本隐私政策的与<span
                                                    class="GramE">您有关</span>的信息。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">二、我们对您个人信息的管理和使用</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">为向您提供服务、提升我们的服务质量以及<span class="GramE">优化您</span>的服务体验，我们会在符合法律规定下使用您的个人信息，并主要用于下列用途：</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、向您提供您使用的各项服务，并维护、改进这些服务。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、向您推荐您可能感兴趣的内容，包括但不限于向<span class="GramE">您发出</span>产品和服务信息，或通过系统向您展示个性化的第三<span
                                                    class="GramE">方推广</span>信息，或在征得您同意的情况下与eBestMall的合作伙伴共享信息以便他们向您发送有关其产品和服务的信息。如您不希望接收上述信息，可通过相应的退<span
                                                    class="GramE">订功能</span>进行退订。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><br>
3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、我们可能使用您的个人信息以验证身份、预防、发现、调查欺诈、危害安全、非法或违反与我们或其关联方协议、政策或规则的行为，以保护您、其他eBestMall用户，或我们或其关联方的合法权益。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
4</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、我们可能会将来自某项服务的个人信息与来自其他服务所获得的信息结合起来，用于为了给您提供更加个性化的服务使用，例如为让您通过购物拥有更广泛的社交圈而使用、共享或披露您的信息。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
5</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、我们会对我们的服务使用情况进行统计，并可能会与公众或第三方分享这些统计信息，以展示我们的产品或服务的整体使用趋势。但这些统计信息不包含您的任何身份识别信息。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
6</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、让您参与有关我们产品及服务的调查。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
7</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、<span class="GramE">经您同意</span>或授权的其他用途。</span></span></span><span
                                        style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">三、您个人信息的分享</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">您的个人信息是我们为您提供服务的重要部分，我们会遵循法律规定对您的信息承担保密义务。<b>除以下情形外，我们不会将您的个人信息披露给第三方：</b></span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、征得您的同意或授权。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、根据法律法规的规定或行政或司法机构的要求。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
3</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、出于实现“我们对您个人信息的管理和使用”部分所述目的，或为履行我们在《eBestMall用户注册协议》或本隐私政策中的义务和行使我们的权利，向eBestMall的关联方、合作伙伴或代表eBestMall履行某项职能的第三方（例如代表我们发出推送通知的通讯服务商、处理银行卡的支付机构等）分享您的个人信息。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
4</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、如您<span class="GramE">是适格的</span>知识产权投诉人并已提起投诉，应被投诉人要求，向被投诉人披露，以便双方处理可能产生的权利纠纷。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
5</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、只有共享您的信息，才能提供您需要的服务，或处理您与他人的纠纷或争议。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
6</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、<span class="GramE">您出现</span>违反中国有关法律、法规规定或者违反您与eBestMall签署的相关协议（包括<span
                                                    class="GramE">在线签署</span>的电子协议）或违反相关eBestMall平台规则时需要向第三方披露的情形。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
7</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、为维护eBestMall及其关联方或其他eBestMall用户的合法权益。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">随着我们业务的发展，我们及我们的关联方有可能进行合并、收购、资产转让或类似的交易，您的个人信息有可能作为此类交易的一部分而被转移。我们将在转移前通知您。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US"
                                                                                                           style="mso-bidi-font-size:
10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">四、您个人信息的安全</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall严格保护您的个人信息安全。我们使用各种制度、安全技术和程序等措施来保护您的个人信息不被未经授权的访问、篡改、披露或破坏。如果您对我们的个人信息保护有任何疑问，请联系我们的客服。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">在通过eBestMall网站与第三方进行网上商品或服务的交易时，您不可避免的要向交易对方或潜在的交易对方披露自己的个人信息，如联络方式或者邮政地址等。请您妥善保护自己的个人信息，仅在必要的情形下向他人提供。如您发现自己的个人信息泄密，尤其是你的账户及密码发生泄露，请您立即联络我们的客服，以便我们采取相应措施。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">五、访问和<span
                                                        class="GramE">更新您</span>的个人信息</span></b></span></span><span
                                        style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">您可以在“我的eBestMall”页面的“账户设置”菜单中<span
                                                        class="GramE">查阅您</span>提交给eBestMall的所有个人信息，你也可通过上述途径更新除实名认证信息之外的其他个人信息（您的实名认证信息是您通过实名认证时使用的姓名和身份证信息），如您需要<span
                                                        class="GramE">变更您</span>的实名认证信息，您可拨打</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">95118</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">服务热线申请变更。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" style="line-height:150%"><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">六、</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%">Cookie </span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">及网络</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span lang="EN-US"
                                                                                     style="mso-bidi-font-size:10.5pt;line-height:150%"> Beacon</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">的使用</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">Cookie</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">的使用</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
Cookie</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">是由网页服务器存放在您的访问设备上的文本文件。指定给您的</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">Cookie </span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">是唯一的，它只能被将</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">Cookie</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">发布给您的域中的</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">Web</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">服务器读取。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall使用</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%"> Cookie </span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">来帮助您实现您的联机体验的个性化，使您在eBestMall及其关联方获得更轻松的访问体验。例如，</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">Cookie </span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">会帮助您在后续访问eBestMall网站时调用您的信息，简化记录您填写个人信息（例如一键登录等）的流程；为您提供安全购物的偏好设置；帮助您优化对广告的选择与互动；保护您的数据安全等。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">您有权接受或拒绝</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%"> Cookie</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">。大多数浏览器会自动接受</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">Cookie</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">，但您通常可根据自己的需要来修改浏览器的设置以拒绝</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%"> Cookie</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">。如果选择拒绝</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%"> Cookie</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">，那么您可能无法完全体验所访问的eBestMall网站或某些服务的全部功能。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
2</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">、网络</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">Beacon</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">的使用</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">eBestMall网页上常会包含一些电子图像<span
                                                    class="GramE">象</span>（称为</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%">"</span></span></span><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">单像素</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">" GIF </span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">文件或</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%"> "</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">网络</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%"> beacon"</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">），它们可以帮助网站计算浏览网页的用户或访问某些</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">cookie</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">。eBestMall使用网络</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">beacon</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">的方式有：</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">1</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）eBestMall通过在eBestMall网站上使用网络</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">beacon</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">，计算用户访问数量，并通过访问</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%"> cookie </span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">辨认注册用户。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%"> <br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">（</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">2</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">）eBestMall通过得到的</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">cookie</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">信息，可以在eBestMall网站提供个性化服务。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">七、未成年人的个人信息保护</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">京<span class="GramE">东非常</span>重视对未成年人个人信息的保护。若您是</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;line-height:150%">18</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:
minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">周岁以下的未成年人，在使用eBestMall服务前，应事先取得<span
                                                    class="GramE">您家长</span>或法定监护人的书面同意。eBestMall根据国家相关法律法规的规定保护未成年人的个人信息。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">八、通知和修订</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><br>
<br>
</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">为给你提供更好的服务，eBestMall的业务将不时变化，本隐私政策也将随之调整。eBestMall会通过在eBestMall网站、移动端上发出更新版本并提醒<span
                                                    class="GramE">您相关</span>内容的更新，也请您访问eBestMall以便及时了解最新的隐私政策。如果您对于本隐私政策或在使用eBestMall服务时对于您的个人信息或隐私情况有任何问题，请联系eBestMall客服并作充分描述，eBestMall将尽力解决。</span></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p></o:p></span></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><b style="mso-bidi-font-weight:
normal"><span lang="EN-US" style="mso-bidi-font-size:10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></b></span></span>
                            </p>

                            <p class="MsoNormal" align="left" style="text-align:left;line-height:150%;
layout-grid-mode:char;mso-layout-grid-align:none"><span style="mso-bookmark:
OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:
10.5pt;line-height:150%;font-family:宋体;mso-ascii-theme-font:minor-fareast;
mso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:
minor-fareast">原《eBestMall隐私政策》<span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <div style="mso-element:para-border-div;border:none;border-bottom:solid #EBEBEB 1.0pt;
mso-border-bottom-alt:solid #EBEBEB .75pt;padding:0cm 0cm 11.0pt 0cm">

                                <p class="MsoNormal" align="center" style="mso-margin-top-alt:auto;margin-bottom:
7.5pt;text-align:center;line-height:18.0pt;mso-pagination:widow-orphan;
mso-outline-level:2;border:none;mso-border-bottom-alt:solid #EBEBEB .75pt;
padding:0cm;mso-padding-alt:0cm 0cm 11.0pt 0cm"><span style="mso-bookmark:OLE_LINK17"><span
                                                style="mso-bookmark:OLE_LINK18"><b><span style="font-size:15.0pt;font-family:
&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:宋体;mso-font-kerning:18.0pt">隐私政策<span lang="EN-US"><o:p></o:p></span></span></b></span></span>
                                </p>

                            </div>

                            <p class="MsoNormal" align="left" style="mso-margin-top-alt:auto;margin-bottom:
12.0pt;text-align:left;line-height:24.0pt;mso-pagination:widow-orphan"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span
                                                style="mso-bidi-font-size:10.5pt;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">eBestMall（以下或称“我们”）注重保护用户个人信息及个人隐私。本隐私政策解释了用户（“您”）个人信息收集（以下或称“信息”）和使用的有关情况，本隐私政策适用于eBestMall向您提供的所有相关服务（包括但不限于电子商务、网络资讯、网络社交、互联网金融服务等，以下称“eBestMall服务”或“服务”）。<b>如果您不同意本隐私政策的任何内容，您应立即停止使用eBestMall服务。当您使用eBestMall提供的任一服务时，即表示您已同意我们按照本隐私政策来合法使用和保护您的个人信息。<span
                                                        lang="EN-US"><br>
<br>
</span>一、您个人信息的收集</b><span lang="EN-US"><br>
<br>
</span>我们收集信息是为了向您提供更好以及更个性化的服务，并努力提高您的用户体验。我们收集信息的种类如下：<span lang="EN-US"><br>
<b>1</b></span><b>、您向我们提供的信息</b><span lang="EN-US"><br>
</span>当<span class="GramE">您注册</span>eBestMall账户及您在使用相关eBestMall服务时填写、提交及<span lang="EN-US">/</span>或其他任何方式提供的信息，包括您的姓名、性别、出生年月日、身份证号码、护照姓、护照名、护照号码、电话号码、电子邮箱、收货地址、eBestMall钱包<span
                                                    class="GramE">或网银在线</span>账号、银行卡信息及相关附加信息（如您地址中的所在的省份和城市、邮政编码等）。<b>您可以选择不提供某一或某些信息，但是这样可能使您无法使用eBestMall的许多特色服务。</b>请您理解，我们使用您提供的信息是为了<span
                                                    class="GramE">回应您</span>的要求，为您在eBestMall购物或享受服务提供便利，完善eBestMall网站以及与您进行信息沟通。另外，我们可能会将您所提供的信息与您的eBestMall账户关联，用以<span
                                                    class="GramE">识别您</span>的身份。<span lang="EN-US"><br>
<b>2</b></span><b>、我们在您使用服务过程中获得的信息</b><span lang="EN-US"><br>
</span>为了提高服务质量和用户体验，我们会留存您使用服务以及使用方式的相关信息，这类信息包括：<span lang="EN-US"><br>
</span><b>（<span lang="EN-US">1</span>）您的浏览器和计算机上的信息。</b>在您访问eBestMall网站或使用eBestMall服务时，eBestMall系统自动接收并记录的您的浏览器和计算机上的信息（包括但不限于您的<span
                                                    lang="EN-US">IP</span>地址、浏览器的类型、使用的语言、访问日期和时间、软硬件特征信息及您需求的网页记录等数据）。<span
                                                    lang="EN-US"><br>
</span><b>（<span lang="EN-US">2</span>）您的位置信息。</b>当您下载或使用eBestMall、其关联方及合作伙伴开发的应用程序（例如eBestMall<span
                                                    lang="EN-US">APP</span>），或访问移动网页使用eBestMall服务时，eBestMall可能会读取您的位置（大多数移动设备将允许您关闭定位服务，具体建议您<span
                                                    class="GramE">联系您</span>的移动设备的服务商或生产商）。<span lang="EN-US"><br>
</span><b>（<span lang="EN-US">3</span>）您的设备信息。</b>eBestMall可能会读取您访问eBestMall或使用eBestMall服务时所使用的终端设备的信息，包括但不限于设备型号、设备识别码、操作系统、分辨率、电信运营商等。<span
                                                    lang="EN-US"><br>
</span><b>（<span lang="EN-US">4</span>）您的行为或交易信息。</b>eBestMall可能会记录您访问eBestMall或使用eBestMall服务时所进行的操作以及您在eBestMall网站上进行交易的相关信息。<span
                                                    lang="EN-US"><br>
</span>除上述信息外，我们还可能为了提供服务及改进服务质量的合理需要而获得的您的其他信息，包括您与我们的客服团队联系时您提供的相关信息，您参与问卷调查时向我们发送的问卷答复信息，以及您与eBestMall的关联方、eBestMall合作伙伴之间互动时我们获得的相关信息。<span
                                                    lang="EN-US"><br>
</span>同时，为提高您使用eBestMall提供的服务的安全性，更准确地预防钓鱼网站欺诈和木马病毒，我们可能会通过了解一些您的网络使用习惯、您常用的软件信息等手段来<span class="GramE">判断您</span>账户的风险，并可能会记录一些我们认为有风险的链接（“<span
                                                    lang="EN-US">URL</span>”）。<span lang="EN-US"><br>
<b>3</b></span><b>、来自第三方的信息</b><span lang="EN-US"><br>
</span><b>指在<span class="GramE">您注册</span>eBestMall账户和使用服务过程中，您授权eBestMall可向eBestMall的关联方、合作伙伴获取其所收集的相关信息。</b>这些信息包括但不限于您的身份信息、行为信息、交易信息、设备信息等，eBestMall会将此类信息汇总，用于帮助eBestMall向您提供更好以及更加个性化的服务或更好的预防互联网欺诈。<span
                                                    lang="EN-US"><br>
</span><b>您了解并同意，以下信息不适用本隐私政策：</b><span lang="EN-US"><br>
</span>（<span lang="EN-US">1</span>）您在使用eBestMall提供的搜索服务时输入的关键字信息；<span lang="EN-US"><br>
</span>（<span lang="EN-US">2</span>）信用评价、违反法律法规规定或违反eBestMall平台规则行为及eBestMall已对<span class="GramE">您采取</span>的措施；<span
                                                    lang="EN-US"><br>
</span>（<span lang="EN-US">3</span>）应法律法规要求需公示的企业名称等相关工商注册信息以及自然人经营者的信息。<span lang="EN-US"><br>
</span>（<span lang="EN-US">4</span>）其他您与eBestMall或eBestMall的关联方所签署的协议（包括<span class="GramE">在线签署</span>的电子协议，例如《eBestMall用户注册协议》）以及eBestMall平台规则中明确约定或提示您不适用本隐私政策的与<span
                                                    class="GramE">您有关</span>的信息。<span lang="EN-US"><br>
<br>
</span><b>二、我们对您个人信息的管理和使用</b><span lang="EN-US"><br>
<br>
</span>为向您提供服务、提升我们的服务质量以及<span class="GramE">优化您</span>的服务体验，我们会在符合法律规定下使用您的个人信息，并主要用于下列用途：<span lang="EN-US"><br>
1</span>、向您提供您使用的各项服务，并维护、改进这些服务。<span lang="EN-US"><br>
2</span>、向您推荐您可能感兴趣的内容，包括但不限于向<span class="GramE">您发出</span>产品和服务信息，或通过系统向您展示个性化的第三<span class="GramE">方推广</span>信息，或在征得您同意的情况下与eBestMall的合作伙伴共享信息以便他们向您发送有关其产品和服务的信息。如您不希望接收上述信息，可通过相应的退<span
                                                    class="GramE">订功能</span>进行退订。<span lang="EN-US"><br>
3</span>、我们可能使用您的个人信息以验证身份、预防、发现、调查欺诈、危害安全、非法或违反与我们或其关联方协议、政策或规则的行为，以保护您、其他eBestMall用户，或我们或其关联方的合法权益。<span lang="EN-US"><br>
4</span>、我们可能会将来自某项服务的个人信息与来自其他服务所获得的信息结合起来，用于为了给您提供更加个性化的服务使用，例如为让您通过购物拥有更广泛的社交圈而使用、共享或披露您的信息。<span lang="EN-US"><br>
5</span>、我们会对我们的服务使用情况进行统计，并可能会与公众或第三方分享这些统计信息，以展示我们的产品或服务的整体使用趋势。但这些统计信息不包含您的任何身份识别信息。<span lang="EN-US"><br>
6</span>、让您参与有关我们产品及服务的调查。<span lang="EN-US"><br>
7</span>、<span class="GramE">经您同意</span>或授权的其他用途。<span lang="EN-US"><br>
<br>
</span><b>三、您个人信息的分享</b><span lang="EN-US"><br>
<br>
</span>您的个人信息是我们为您提供服务的重要部分，我们会遵循法律规定对您的信息承担保密义务。<b>除以下情形外，我们不会将您的个人信息披露给第三方：</b><span lang="EN-US"><br>
1</span>、征得您的同意或授权。<span lang="EN-US"><br>
2</span>、根据法律法规的规定或行政或司法机构的要求。<span lang="EN-US"><br>
3</span>、出于实现“我们对您个人信息的管理和使用”部分所述目的，或为履行我们在《eBestMall用户注册协议》或本隐私政策中的义务和行使我们的权利，向eBestMall的关联方、合作伙伴或代表eBestMall履行某项职能的第三方（例如代表我们发出推送通知的通讯服务商、处理银行卡的支付机构等）分享您的个人信息。<span
                                                    lang="EN-US"><br>
4</span>、如您<span class="GramE">是适格的</span>知识产权投诉人并已提起投诉，应被投诉人要求，向被投诉人披露，以便双方处理可能产生的权利纠纷。<span lang="EN-US"><br>
5</span>、只有共享您的信息，才能提供您需要的服务，或处理您与他人的纠纷或争议。<span lang="EN-US"><br>
6</span>、<span class="GramE">您出现</span>违反中国有关法律、法规规定或者违反您与eBestMall签署的相关协议（包括<span class="GramE">在线签署</span>的电子协议）或违反相关eBestMall平台规则时需要向第三方披露的情形。<span
                                                    lang="EN-US"><br>
7</span>、为维护eBestMall及其关联方或其他eBestMall用户的合法权益。<span lang="EN-US"><br>
</span><b>随着我们业务的发展，我们及我们的关联方有可能进行合并、收购、资产转让或类似的交易，您的个人信息有可能作为此类交易的一部分而被转移。我们将在转移前通知您。<span lang="EN-US"><br>
</span></b><span lang="EN-US"><br>
</span><b>四、您个人信息的安全</b><span lang="EN-US"><br>
<br>
</span>eBestMall严格保护您的个人信息安全。我们使用各种制度、安全技术和程序等措施来保护您的个人信息不被未经授权的访问、篡改、披露或破坏。如果您对我们的个人信息保护有任何疑问，请联系我们的客服。<span
                                                    lang="EN-US"><br>
</span>在通过eBestMall网站与第三方进行网上商品或服务的交易时，您不可避免的要向交易对方或潜在的交易对方披露自己的个人信息，如联络方式或者邮政地址等。请您妥善保护自己的个人信息，仅在必要的情形下向他人提供。如您发现自己的个人信息泄密，尤其是你的账户及密码发生泄露，请您立即联络我们的客服，以便我们采取相应措施。<span
                                                    lang="EN-US"><br>
<br>
</span><b>五、访问和<span class="GramE">更新您</span>的个人信息</b><span lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <p class="MsoNormal" align="left" style="mso-margin-top-alt:auto;mso-margin-bottom-alt:
auto;text-align:left;line-height:24.0pt;mso-pagination:widow-orphan"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span
                                                    style="mso-bidi-font-size:10.5pt;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">您可以在“我的eBestMall”页面的“账户设置”菜单中<span class="GramE">查阅您</span>提交给eBestMall的所有个人信息，你也可通过上述途径更新除实名认证信息之外的其他个人信息（您的实名认证信息是您通过实名认证时使用的姓名和身份证信息），如您需要<span
                                                        class="GramE">变更您</span>的实名认证信息，您可拨打<span
                                                        lang="EN-US">95118</span>服务热线申请变更。</span></b></span></span><span
                                        style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span
                                                lang="EN-US"
                                                style="mso-bidi-font-size:10.5pt;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;
mso-bidi-font-family:宋体;mso-font-kerning:0pt"><o:p></o:p></span></span></span></p>

                            <p class="MsoNormal" align="left" style="mso-margin-top-alt:auto;mso-margin-bottom-alt:
auto;text-align:left;line-height:24.0pt;mso-pagination:widow-orphan"><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><b><span
                                                    style="mso-bidi-font-size:10.5pt;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
宋体;mso-font-kerning:0pt">六、<span lang="EN-US">Cookie </span>及网络<span lang="EN-US">
Beacon</span>的使用</span></b></span></span><span style="mso-bookmark:OLE_LINK17"><span
                                            style="mso-bookmark:OLE_LINK18"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:宋体;mso-font-kerning:
0pt"><br>
<br>
1</span></span></span><span style="mso-bookmark:OLE_LINK17"><span style="mso-bookmark:OLE_LINK18"><span style="mso-bidi-font-size:10.5pt;
font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:宋体;mso-font-kerning:0pt">、<span lang="EN-US">Cookie</span>的使用<span
                                                    lang="EN-US"><br>
Cookie</span>是由网页服务器存放在您的访问设备上的文本文件。指定给您的<span lang="EN-US">Cookie </span>是唯一的，它只能被将<span lang="EN-US">Cookie</span>发布给您的域中的<span
                                                    lang="EN-US">Web</span>服务器读取。<span lang="EN-US"><br>
</span>eBestMall使用<span lang="EN-US"> Cookie </span>来帮助您实现您的联机体验的个性化，使您在eBestMall及其关联方获得更轻松的访问体验。例如，<span lang="EN-US">Cookie </span>会帮助您在后续访问eBestMall网站时调用您的信息，简化记录您填写个人信息（例如一键登录等）的流程；为您提供安全购物的偏好设置；帮助您优化对广告的选择与互动；保护您的数据安全等。<span
                                                    lang="EN-US"><br>
</span>您有权接受或拒绝<span lang="EN-US"> Cookie</span>。大多数浏览器会自动接受<span
                                                    lang="EN-US">Cookie</span>，但您通常可根据自己的需要来修改浏览器的设置以拒绝<span
                                                    lang="EN-US"> Cookie</span>。如果选择拒绝<span
                                                    lang="EN-US"> Cookie</span>，那么您可能无法完全体验所访问的eBestMall网站或某些服务的全部功能。<span
                                                    lang="EN-US"><br>
2</span>、网络<span lang="EN-US">Beacon</span>的使用<span lang="EN-US"><br>
</span>eBestMall网页上常会包含一些电子<span class="GramE">图象</span>（称为<span lang="EN-US">"</span>单像素<span
                                                    lang="EN-US">" GIF </span>文件或<span lang="EN-US"> "</span>网络<span
                                                    lang="EN-US"> beacon"</span>），它们可以帮助网站计算浏览网页的用户或访问某些<span
                                                    lang="EN-US">cookie</span>。eBestMall使用网络<span
                                                    lang="EN-US">beacon</span>的方式有：<span lang="EN-US"><br>
</span>（<span lang="EN-US">1</span>）eBestMall通过在eBestMall网站上使用网络<span lang="EN-US">beacon</span>，计算用户访问数量，并通过访问<span
                                                    lang="EN-US"> cookie </span>辨认注册用户。<span
                                                    lang="EN-US"> <br>
</span>（<span lang="EN-US">2</span>）eBestMall通过得到的<span lang="EN-US">cookie</span>信息，可以在eBestMall网站提供个性化服务。<span
                                                    lang="EN-US"><br>
<br>
</span><b>七、未成年人的个人信息保护</b><span lang="EN-US"><br>
<br>
</span>京<span class="GramE">东非常</span>重视对未成年人个人信息的保护。若您是<span lang="EN-US">18</span>周岁以下的未成年人，在使用eBestMall服务前，应事先取得<span
                                                    class="GramE">您家长</span>或法定监护人的书面同意。eBestMall根据国家相关法律法规的规定保护未成年人的个人信息。<span
                                                    lang="EN-US"><br>
<br>
</span><b>八、通知和修订</b><span lang="EN-US"><br>
<br>
</span>为给你提供更好的服务，eBestMall的业务将不时变化，本隐私政策也将随之调整。eBestMall会通过在eBestMall网站、移动端上发出更新版本并提醒<span class="GramE">您相关</span>内容的更新，也请您访问eBestMall以便及时了解最新的隐私政策。如果您对于本隐私政策或在使用eBestMall服务时对于您的个人信息或隐私情况有任何问题，请联系eBestMall客服并作充分描述，eBestMall将尽力解决。<span
                                                    lang="EN-US"><o:p></o:p></span></span></span></span></p>

                            <span style="mso-bookmark:OLE_LINK18"></span><span
                                    style="mso-bookmark:OLE_LINK17"></span>

                            <p class="MsoNormal" style="line-height:150%"><span lang="EN-US" style="mso-bidi-font-size:
10.5pt;line-height:150%"><o:p>&nbsp;</o:p></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">同意并继续</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 短信提示 模态框（Modal） -->
    <div class="modal fade" id="registerTipsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">注册提示</h4>
                </div>
                <div class="modal-body">
                    <div class="register-tips-content">
                        <p>手机号已存在，请更换手机号</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">知道了</button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-register">
        <div class="w">
            <ul>
                <li><span>|</span><a href="javascript:;">关于我们</a></li>
                <li><span>|</span><a href="javascript:;">联系我们</a></li>
                <li><span>|</span><a href="javascript:;">人才招聘</a></li>
                <li><span>|</span><a href="javascript:;">商家入驻</a></li>
                <li><span>|</span><a href="javascript:;">广告服务</a></li>
                <li><span>|</span><a href="javascript:;">友情链接</a></li>
                <li><span>|</span><a href="javascript:;">帮助中心</a></li>
            </ul>
            <p>Copyright © 2015 - 2017 eBestMall 鸿宇科技 版权所有</p>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        //
    });
</script>