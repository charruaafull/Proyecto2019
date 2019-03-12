<?php

class sistema
{

    public static function getFilas($sql)
    {
        $command = Yii::app()->db->createCommand($sql);
        $results = $command->queryAll();
        return $results;
    }

    public static function getFila($sql)
    {
        $command = Yii::app()->db->createCommand($sql);
        $results = $command->queryRow();
        return $results;
    }

    public static function getCampo($sql)
    {
        $command = Yii::app()->db->createCommand($sql);
        $results = $command->queryAll();
        return $results[0];
    }

    public static function execute($sql)
    {
        $command = Yii::app()->db->createCommand($sql);
        $results = $command->execute();
        return $results[0];
    }

}
