<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrProposal;

/**
 * TrProposalSearch represents the model behind the search form about `app\models\TrProposal`.
 */
class TrProposalSearch extends TrProposal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_proposal', 'id_anggota', 'approval_by', 'status_proposal'], 'integer'],
            [['tujuan_proposal', 'keterangan', 'tanggal_pengajuan', 'tanggal_approval', 'url_dokumen_pengeluaran', 'history_proposal', 'created_at', 'updated_at'], 'safe'],
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
        $query = TrProposal::find();

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
            'id_anggota' => $this->id_anggota,
            'approval_by' => $this->approval_by,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'tanggal_approval' => $this->tanggal_approval,
            'status_proposal' => $this->status_proposal,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tujuan_proposal', $this->tujuan_proposal])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'url_dokumen_pengeluaran', $this->url_dokumen_pengeluaran])
            ->andFilterWhere(['like', 'history_proposal', $this->history_proposal]);

        return $dataProvider;
    }
    public function search2($params)
    {
        $session = Yii::$app->session;

        $query = TrProposal::find();

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
            'id_anggota' => $session->get('id_anggota'),
            'approval_by' => $this->approval_by,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'tanggal_approval' => $this->tanggal_approval,
            'status_proposal' => $this->status_proposal,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tujuan_proposal', $this->tujuan_proposal])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'url_dokumen_pengeluaran', $this->url_dokumen_pengeluaran])
            ->andFilterWhere(['like', 'history_proposal', $this->history_proposal]);

        return $dataProvider;
    }
}
