<?php
namespace frontend\models;

use common\models\SmsLog;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $surname;
    public $email;
    public $phone;
    public $password;
    public $password_repeat;
    public $role;
    public $status;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'phone'], 'required'],
            [['name', 'surname', 'phone'], 'string', 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password','required', 'message' => Yii::t('app', 'Придумайте пароль')],
            ['password_repeat' ,'required', 'message' => '{attribute}'],
            ['password', 'string', 'min' => 6, 'message' => Yii::t('app', 'Пароль должен содержать минимум 6 символов')],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Пароли не совпадают')],
            ['password', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/', 'message' => Yii::t('app', 'Пароль должен содержать только латинские буквы, спецсимволы и/или цифры')],

            [['status'], 'integer'],
            ['role', 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email' => 'Почта',
            'phone' => 'Номер телефона',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     * @throws \yii\db\Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->verification_code = (string)($code = random_int(1000, 9999));
        $user->role = User::ROLE_USER;
        $user->status = User::STATUS_INACTIVE;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        SmsLog::sendSms($this->phone, $code . ' - Onlineenglish', $user->id);
        Yii::$app->session->set('phone', $this->phone);

        return $user->save();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
