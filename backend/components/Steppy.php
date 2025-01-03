<?php

namespace backend\components;

use yii\base\Component;
use yii\db\ActiveQuery;


class Steppy extends Component
{

    // Model class that processes goes through
    public ActiveQuery $query;

    // Column name used for storing quantity or value which is type of number
    public string $column;

    // Quantity which should be processed
    public float $quantity = 0;

    // condition 
    public $condition = [];

    // scaling decimals
    public $precision = 2;


    /**
     * This function processes a quantity from a set of records in a database table.//+
     * It decreases the quantity of each record in the table until the desired quantity is processed.//+
     *
     * @param callable|null $callback A callback function that can be used to modify the quantity before processing.//+
     *
     * @return bool|mixed Returns false if the stock is not sufficient, otherwise returns the result of the callback function.//+
     *///


    public function minus($callback = null, $save=true)
    {

        if (!$this->checkStock()) {
            return false;
        }

        $unproceed_qty = $this->quantity;

        $increment_qty = 0;

        foreach ($this->query->all() as $record) {
            
            // Callback processing
            if ($callback && is_callable($callback)) {
                $increment_qty += $callback($record, $unproceed_qty);
            }

            // If there is still unprocessed quantity//+
            if ($unproceed_qty > 0) {
                if ($record[$this->column] < $unproceed_qty) {
                    $unproceed_qty -= $record[$this->column];
                    $record->delete();
                    continue;
                } else {
                    $record[$this->column] -= $unproceed_qty;
                    $unproceed_qty = 0;
                }
            }

            // Precision
            $record[$this->column] = round($record[$this->column], $this->precision);

            if($save){

                $record->save();
            }

            if($unproceed_qty == 0){
                break;
            }
            
        }

        return $callback ? $increment_qty : true;
    }

    public function checkStock(): bool
    {
        $check_query = $this->query;

        return $check_query->sum($this->column) >= $this->quantity;
    }


    public function plus($callback = null)
    {
        $record = $this->query->one();

        if ($record) {
            $record[$this->column] += $this->quantity;
        } else {
            $record = new $this->query->modelClass;

            foreach ($this->query->where as $key => $item) {
                $record[$key] = $item;
            }
            $record[$this->column] = $this->quantity;
        }

        if(is_callable($callback)){
            $callback($record);
        }

        if ($record->save()) {
            return true;
        } else {
            return \false;
        }
    }
}
