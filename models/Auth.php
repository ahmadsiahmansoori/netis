<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\web\UnauthorizedHttpException;

/**
 * This is the model class for table "auth".
 *
 * @property int $id_auth_user
 * @property int|null $user_id
 * @property string|null $auth_kay
 * @property string|null $ip
 * @property string|null $agent
 * @property int|null $expire_date
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $delete_mode
 * @property User $user;
 */
class Auth extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'expire_date', 'created_at', 'updated_at', 'updated_by', 'created_by', 'delete_mode'], 'integer'],
            [['auth_kay', 'agent'], 'string'],
            [['ip'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id_user']],
        ];
    }

    public function fields()
    {
        $parent = parent::fields(); // TODO: Change the autogenerated stub

        unset($parent['ip']);
        unset($parent['agent']);
        unset($parent['expire_date']);
        unset($parent['created_at']);
        unset($parent['updated_at']);
        unset($parent['updated_by']);
        unset($parent['created_by']);
        unset($parent['delete_mode']);
        $parent['call_number'] = function () {
            return $this->user->call_number;
        };
        return $parent;
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::class, ['id_user' => 'user_id']);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id_auth_user' => 'Id Auth User',
            'user_id' => 'User ID',
            'auth_kay' => 'Auth Kay',
            'ip' => 'Ip',
            'agent' => 'Agent',
            'expire_date' => 'Expire Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'delete_mode' => 'Delete Mode',
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $data = self::findOne(['auth_kay' => $token]);

        if (empty($data))
        {
            return null;
        }

        if($data->expire_date < time())
        {
            $data->delete();
            throw new UnauthorizedHttpException('Authentication user');
        }

        $data->expire_date = time() + (60 * 60) * 24;
        $data->save();

        return  $data;
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getAuthKey(): ?string
    {
        return $this->auth_kay;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->auth_kay == $authKey;
    }
}