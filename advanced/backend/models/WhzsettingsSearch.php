<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Whzsettings;

/**
 * WhzsettingsSearch represents the model behind the search form about `app\models\Whzsettings`.
 */
class WhzsettingsSearch extends Whzsettings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'site_name', 'site_address', 'css_style', 'header_text', 'site_language', 'datagrid_css_style', 'menu_style'], 'safe'],
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
        $query = Whzsettings::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'site_name', $this->site_name])
            ->andFilterWhere(['like', 'site_address', $this->site_address])
            ->andFilterWhere(['like', 'css_style', $this->css_style])
            ->andFilterWhere(['like', 'header_text', $this->header_text])
            ->andFilterWhere(['like', 'site_language', $this->site_language])
            ->andFilterWhere(['like', 'datagrid_css_style', $this->datagrid_css_style])
            ->andFilterWhere(['like', 'menu_style', $this->menu_style]);

        return $dataProvider;
    }
}
