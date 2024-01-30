<?php

class Calories
{
    public static function calculateCalories($grams, $caloriesPer100g): float|int
    {
        return $grams * $caloriesPer100g;
    }

    public static function calculateTotalCaloriesPerAliment($data): float|int
    {
        $lipidCalories = Calories::calculateCalories($data["lipid"], 9);
        $carboCalories = Calories::calculateCalories($data["carbohydrate"], 4);
        $proteinCalories = Calories::calculateCalories($data["protein"], 4);
        return $lipidCalories + $carboCalories + $proteinCalories;
    }


}