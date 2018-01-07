<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrIuran;

/**
 * TrIuranSearch represents the model behind the search form about `app\models\TrIuran`.
 */
class TrIuranSearch extends TrIuran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_anggota', 'id_pemasukan', 'id_iuran', 'jumlah_bayar', 'approval_by', 'id_bank_pengirim', 'id_bank_penerima', 'status_pembayaran'], 'integer'],
            [['tanggal_bayar', 'tanggal_konfirmasi_pembayaran', 'tanggal_approval_pembayaran', 'url_bukti_pembayaran', 'history_pembayaran', 'created_at', 'updated_at'], 'safe'],
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
        $query = TrIuran::find();

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
            'id_anggota' => $this->id_anggota,
            'id_pemasukan' => $this->id_pemasukan,
            'id_iuran' => $this->id_iuran,
            'jumlah_bayar' => $this->jumlah_bayar,
            'tanggal_bayar' => $this->tanggal_bayar,
            'tanggal_konfirmasi_pembayaran' => $this->tanggal_konfirmasi_pembayaran,
            'tanggal_approval_pembayaran' => $this->tanggal_approval_pembayaran,
            'approval_by' => $this->approval_by,
            'id_bank_pengirim' => $this->id_bank_pengirim,
            'id_bank_penerima' => $this->id_bank_penerima,
            'status_pembayaran' => $this->status_pembayaran,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'url_bukti_pembayaran', $this->url_bukti_pembayaran])
            ->andFilterWhere(['like', 'history_pembayaran', $this->history_pembayaran]);

        return $dataProvider;
    }
}
