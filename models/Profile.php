<?php
namespace app\models;

/**
 * Description Profile
 *
 * This form @overrides dektrium\user\models\Profile
 */
use dektrium\user\models\Profile as BaseProfile;
//use yii\web\UploadedFile;
//use Yii;
//use dektrium\user\models\User;

use app\models\Chospital;
class Profile extends BaseProfile {

    
    public function rules() {
        $rules = parent::rules();
        $rules[] = ['hospcode', 'required'];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        $labels = parent::attributeLabels();      
        $labels['hospcode'] = \Yii::t('profile', 'PCU');
        return $labels;
    }
    
     public  function getChospital(){
        return @$this->hasOne(Chospital::className(), ['hoscode' => 'hospcode']);
    }

}