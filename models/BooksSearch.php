<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Books;

/**
 * BooksSearch represents the model behind the search form about `app\models\Books`.
 */
class BooksSearch extends Books
{
    public $date_from;
    public $date_to;
    public $_date_from;
    public $_date_to;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date_create', 'date_update', 'author_id'], 'integer'],
            [['name', 'preview', 'date'], 'safe'],
            [['date_from','date_to'],'string'],
            [['date_from','date_to'],'date','format'=>'php:d/m/Y']
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
        $query = Books::find();

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
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'date' => $this->date,
            'author_id' => $this->author_id,
        ]);

        $this->formatDate();

        $query->andFilterWhere(['between','date',$this->_date_from,$this->_date_to]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'preview', $this->preview]);

        return $dataProvider;
    }

    /**
     * Format date for search
     */
    private function formatDate(){
        $date_from = \DateTime::createFromFormat('d/m/Y',$this->date_from);
        $date_to = \DateTime::createFromFormat('d/m/Y',$this->date_to);
        if($date_from){
            $this->_date_from = $date_from->format('Y-m-d');
        }
        if($date_to){
            $this->_date_to = $date_to->format('Y-m-d');
        }


    }
}
