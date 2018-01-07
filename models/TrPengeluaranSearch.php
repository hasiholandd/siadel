<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrPengeluaran;

/**
 * TrPengeluaranSearch represents the model behind the search form about `app\models\TrPengeluaran`.
 */
class TrPengeluaranSearch extends TrPengeluaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pengeluaran', 'jumlah_pengeluaran'], 'integer'],
            [['tanggal_pengeluaran', 'keterangan_pengeluaran', 'url_bukti_pengeluaran', 'created_at', 'updated_at'], 'safe'],
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
        $query = TrPengeluaran::find();

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
            'id_pengeluaran' => $this->id_pengeluaran,
            'jumlah_pengeluaran' => $this->jumlah_pengeluaran,
            'tanggal_pengeluaran' => $this->tanggal_pengeluaran,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'keterangan_pengeluaran', $this->keterangan_pengeluaran])
            ->andFilterWhere(['like', 'url_bukti_pengeluaran', $this->url_bukti_pengeluaran]);

        return $dataProvider;
    }
}
