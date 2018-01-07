<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrPemasukan;

/**
 * TrPemasukanSearch represents the model behind the search form about `app\models\TrPemasukan`.
 */
class TrPemasukanSearch extends TrPemasukan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pemasukan', 'id_user', 'sumber_pemasukan'], 'integer'],
            [['tanggal_pemasukan', 'url_bukti_pemasukan', 'created_at', 'updated_at'], 'safe'],
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
        $query = TrPemasukan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pemasukan' => $this->id_pemasukan,
            'id_user' => $this->id_user,
            'sumber_pemasukan' => $this->sumber_pemasukan,
            'tanggal_pemasukan' => $this->tanggal_pemasukan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'url_bukti_pemasukan', $this->url_bukti_pemasukan]);

        return $dataProvider;
    }
}
