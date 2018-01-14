<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrAnggota;

/**
 * TrAnggotaSearch represents the model behind the search form about `app\models\TrAnggota`.
 */
class TrAnggotaSearch extends TrAnggota
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jurusan', 'pendidikan_terakhir', 'pekerjaan', 'angkatan', 'status_kawin', 'status_hidup'], 'integer'],
            [['nim', 'nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'no_hp', 'email', 'alamat', 'alamat_domisili', 'url_foto', 'created_at', 'updated_at'], 'safe'],
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
        $query = TrAnggota::find();

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
            'tanggal_lahir' => $this->tanggal_lahir,
            'jurusan' => $this->jurusan,
            'pendidikan_terakhir' => $this->pendidikan_terakhir,
            'pekerjaan' => $this->pekerjaan,
            'angkatan' => $this->angkatan,
            'status_kawin' => $this->status_kawin,
            'status_hidup' => $this->status_hidup,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'alamat_domisili', $this->alamat_domisili])
            ->andFilterWhere(['like', 'url_foto', $this->url_foto]);

        return $dataProvider;
    }
}
