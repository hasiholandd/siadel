<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrLaporanKegiatan;

/**
 * TrLaporanKegiatanSearch represents the model behind the search form about `app\models\TrLaporanKegiatan`.
 */
class TrLaporanKegiatanSearch extends TrLaporanKegiatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_proposal', 'approval_by'], 'integer'],
            [['keterangan_approval', 'keterangan_kegiatan', 'tanggal_pengajuan', 'tanggal_approval', 'url_dokumen_laporan_kegiatan', 'history_laporan', 'created_at', 'updated_at'], 'safe'],
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
        $query = TrLaporanKegiatan::find();

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
            'id_proposal' => $this->id_proposal,
            'approval_by' => $this->approval_by,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'tanggal_approval' => $this->tanggal_approval,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'keterangan_approval', $this->keterangan_approval])
            ->andFilterWhere(['like', 'keterangan_kegiatan', $this->keterangan_kegiatan])
            ->andFilterWhere(['like', 'url_dokumen_laporan_kegiatan', $this->url_dokumen_laporan_kegiatan])
            ->andFilterWhere(['like', 'history_laporan', $this->history_laporan]);

        return $dataProvider;
    }
}
