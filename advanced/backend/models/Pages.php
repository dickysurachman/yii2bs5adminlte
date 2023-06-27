<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "whz_pages".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $slug
 * @property string|null $title
 * @property string $titcontents1
 * @property string $titcontents2
 * @property string $titcontents3
 * @property string|null $contents1
 * @property string $contents2
 * @property string $contents3
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string|null $imgtmb
 * @property string|null $page_order
 * @property string|null $feature
 * @property string|null $approve
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'whz_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['slug', 'titcontents1', 'contents1'], 'required'],
            [['contents1', 'contents2', 'contents3'], 'string'],
            [['slug', 'titcontents1', 'titcontents2', 'titcontents3', 'image1', 'image2', 'image3', 'imgtmb'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 250],
            [['page_order'], 'string', 'max' => 5],
            [['feature'], 'string', 'max' => 2],
            [['approve'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'titcontents1' => 'Titcontents1',
            'titcontents2' => 'Titcontents2',
            'titcontents3' => 'Titcontents3',
            'contents1' => 'Contents1',
            'contents2' => 'Contents2',
            'contents3' => 'Contents3',
            'image1' => 'Image1',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'imgtmb' => 'Imgtmb',
            'page_order' => 'Page Order',
            'feature' => 'Feature',
            'approve' => 'Approve',
        ];
    }
}
