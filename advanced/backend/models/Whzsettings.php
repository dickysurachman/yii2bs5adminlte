<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "whz_settings".
 *
 * @property int $id
 * @property string $site_name
 * @property string $site_address
 * @property string $css_style
 * @property string $header_text
 * @property string $site_language
 * @property string $datagrid_css_style
 * @property string $menu_style
 */
class Whzsettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'whz_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_style'], 'string'],
            [['site_name', 'site_address', 'header_text'], 'string', 'max' => 125],
            [['css_style', 'datagrid_css_style'], 'string', 'max' => 10],
            [['site_language'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site_name' => 'Site Name',
            'site_address' => 'Site Address',
            'css_style' => 'Css Style',
            'header_text' => 'Header Text',
            'site_language' => 'Site Language',
            'datagrid_css_style' => 'Datagrid Css Style',
            'menu_style' => 'Menu Style',
        ];
    }
}
