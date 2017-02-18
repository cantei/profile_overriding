<?php

namespace app\models;

//use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseRegistrationForm
{
    /**
     * Add a new field
     * @var string
     */
    public $name;
    /*   add  column  */
    public $hospcode; 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['username', 'required'];
        $rules[] = ['username', 'string', 'min' => 5,'max' => 25];
        $rules[] = ['name', 'required'];
        $rules[] = ['hospcode', 'required'];
        $rules[] = ['hospcode', 'string', 'min' => 5,'max' => 5];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['name'] = \Yii::t('user', 'ชื่อ-สกุล');
        $labels['hospcode'] = \Yii::t('user', 'หน่วยบริการ');
        return $labels;
    }

    /**
     * @inheritdoc
     */
    public function loadAttributes(User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'name' => $this->name,
            'hospcode'=>$this->hospcode,
        ]);
        $user->setProfile($profile);
    }
}