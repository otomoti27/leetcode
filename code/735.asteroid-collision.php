<?php
/*
 * @lc app=leetcode id=735 lang=php
 *
 * [735] Asteroid Collision
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    function asteroidCollision($asteroids) {
        $result = [];
        foreach ($asteroids as $asteroid) {
            if ($asteroid > 0) {
                $result[] = $asteroid;
            } else {
                $this->collide($result, $asteroid);
            }
        }

        return $result;
    }

    function collide(&$leftAsteroids, $current) {
        $lastKey = array_key_last($leftAsteroids);
        if (!isset($lastKey)) {
            $leftAsteroids[] = $current;
            return;
        }

        $left = $leftAsteroids[$lastKey];
        if ($left < 0) {
            $leftAsteroids[] = $current;
            return;
        }

        if (abs($left) == abs($current)) {
            unset($leftAsteroids[$lastKey]);
        } elseif (abs($left) < abs($current)) {
            unset($leftAsteroids[$lastKey]);
            $this->collide($leftAsteroids, $current);
        } else {
            return;
        }
    }
}
// @lc code=end

