<?php

namespace app\models;

use PhpParser\Lexer\TokenEmulator\ReadonlyTokenEmulator;
use Yii;
use yii\web\ConflictHttpException;
use yii\web\NotFoundHttpException;

interface IFileManger
{
    public function upload($file, $link = null, $config = []);

    public function execute();

    public function rm($id);

    public static function run(): FileManager;

    public function errors(): array;

    public function uploadFile($file , $path): bool;


}
class FileManager extends ManagerFile implements IFileManger {

    private static FileManager $model;
    private array $_errors = [];


    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    public function upload($file , $link = null , $config = [])
    {
        $type = strtolower(pathinfo(basename($file['name']) , PATHINFO_EXTENSION));
        $name = time() . '.' . $type;
        $path = '../files/' . $name;

        if (!empty($link)) {
           $model = self::findRowMangerFile(['link' => $link]);
           if (empty($model)) {
               return false;
           }
           $model->path = $path;
           if (!$model->save()) {
               $this->_errors = $model->errors;
               return false;
           }
        }
        else
        {
            if (!$this->insertRowMangerFile($path, $type)) {
                return false;
            }
        }



       return $this->uploadFile($file , $path);



        // TODO: Implement uploadFile() method.
    }

    public function uploadFile($file , $path): bool
    {
        if(!move_uploaded_file($file['tmp_name'], $path)) {
            return true;
        }
        return  false;
    }


    private static function findRowMangerFile($condition): ?FileManager
    {
        return self::findOne($condition);
    }



    private function insertRowMangerFile($path ,$extension): bool
    {
        $model = new ManagerFile();
        $model->line = Yii::$app->security->generateRandomString(13) . (string) time();
        $model->path = $path;
        $model->status = 1;
        $model->extension = $extension;
        $model->name = $this->name;
        $model->description = $this->description;
        $model->insurance_line = $this->insurance_line;
        if ( $model->save()) {
            return true;
        }
        $this->_errors = $model->errors;
        return false;
    }

    public function execute()
    {
        // TODO: Implement one() method.
    }

    public function rm($id)
    {

    }

    public static function run(): FileManager
    {
        if (!isset(self::$model)) {
            self::$model = new FileManager();
        }
        return self::$model;
    }

    public function errors(): array
    {
        return $this->_errors;
    }

}

/**
 * This is the model class for table "manager_file".
 *
 * @property int $id
 * @property string|null $path
 * @property string $line
 * @property int|null $insurance_line
 * @property string|null $name
 * @property string|null $description
 * @property string|null $status
 * @property string|null $extension
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class ManagerFile extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manager_file';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'description'], 'string'],
            [['line'], 'required'],
            [['insurance_line', 'created_at', 'updated_at'], 'integer'],
            [['line', 'name', 'status', 'extension'], 'string', 'max' => 255],
            [['line'], 'unique'],
        ];
    }

    public function attachFile() {
        if ($this->validate()) {


        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'line' => 'Line',
            'insurance_line' => 'Insurance Line',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'extension' => 'Extension',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
