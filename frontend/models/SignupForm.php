<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
	public $password;
	public $nama;
    public $email;
    public $alamat;
    public $no_telp;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Username Sudah Ada'],
            ['username', 'string', 'min' => 2, 'max' => 255],

			['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			['nama', 'required'],
			
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email Sudah Ada'],

            ['alamat', 'required'],

            ['no_telp', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
		$user->setPassword($this->password);
		$user->generateAuthKey();
		$user->nama = $this->nama;
        $user->email = $this->email;
        $user->alamat = $this->alamat;
        $user->no_telp = $this->no_telp;
        
        return $user->save() ? $user : null;
    }
}
