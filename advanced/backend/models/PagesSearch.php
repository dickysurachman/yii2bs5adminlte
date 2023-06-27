<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pages;

/**
 * PagesSearch represents the model behind the search form about `app\models\Pages`.
 */
class PagesSearch extends Pages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id'], 'integer'],
            [['slug', 'title', 'titcontents1', 'titcontents2', 'titcontents3', 'contents1', 'contents2', 'contents3', 'image1', 'image2', 'image3', 'imgtmb', 'page_order', 'feature', 'approve'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pages::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'titcontents1', $this->titcontents1])
            ->andFilterWhere(['like', 'titcontents2', $this->titcontents2])
            ->andFilterWhere(['like', 'titcontents3', $this->titcontents3])
            ->andFilterWhere(['like', 'contents1', $this->contents1])
            ->andFilterWhere(['like', 'contents2', $this->contents2])
            ->andFilterWhere(['like', 'contents3', $this->contents3])
            ->andFilterWhere(['like', 'image1', $this->image1])
            ->andFilterWhere(['like', 'image2', $this->image2])
            ->andFilterWhere(['like', 'image3', $this->image3])
            ->andFilterWhere(['like', 'imgtmb', $this->imgtmb])
            ->andFilterWhere(['like', 'page_order', $this->page_order])
            ->andFilterWhere(['like', 'feature', $this->feature])
            ->andFilterWhere(['like', 'approve', $this->approve]);

        return $dataProvider;
    }
}
