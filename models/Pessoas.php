<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pessoas".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $cidade
 * @property string $estado
 */
class Pessoas extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'cidade', 'estado'], 'required'],
            [['nome', 'email', 'cidade'], 'string', 'max' => 255],
            [['estado'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
        ];
    }
}