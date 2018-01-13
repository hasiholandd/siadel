<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrPengumuman;

/**
 * TrPengumumanSearch represents the model behind the search form about `app\models\TrPengumuman`.
 */
class TrPengumumanSearch extends TrPengumuman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pengumuman', 'flag', 'id_created', 'id_approval'], 'integer'],
            [['tanggal_mulai', 'tanggal_selesai', 'judul_pengumuman', 'keterangan_pengumuman', 'url_dokumen_pengumuman', 'created_at', 'updated_at'], 'safe'],
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
        $query = TrPengumuman::find();

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
            'id_pengumuman' => $this->id_pengumuman,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'flag' => $this->flag,
            'id_created' => $this->id_created,
            'id_approval' => $this->id_approval,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'judul_pengumuman', $this->judul_pengumuman])
            ->andFilterWhere(['like', 'keterangan_pengumuman', $this->keterangan_pengumuman])
            ->andFilterWhere(['like', 'url_dokumen_pengumuman', $this->url_dokumen_pengumuman]);

        return $dataProvider;
    }
}
