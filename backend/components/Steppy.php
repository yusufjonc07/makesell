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


    public function run($callback = null, $minus=true)
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
                    $record[$this->column] = 0;
                } else {
                    $record[$this->column] -= $unproceed_qty;
                    break;
                }
            }

            

            // Precision
            $record[$this->column] = round($record[$this->column], $this->precision);

            if($minus){
                $record->save();
            }
            
        }

        return $callback ? $increment_qty : true;
    }

    public function checkStock(): bool
    {
        $check_query = $this->query;

        return $check_query->sum($this->column) >= $this->quantity;
    }
}
