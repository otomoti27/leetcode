<?php
/*
 * @lc app=leetcode id=443 lang=php
 *
 * [443] String Compression
 */

// @lc code=start
class Solution {

    /**
     * @param String[] $chars
     * @return Integer
     */
    function compress(&$chars) {
        $result = [];
        $result[] = $chars[0];
        $count = 1;
        for ($i = 1; $i < count($chars); $i++) {
            if ($chars[$i - 1] === $chars[$i]) {
                $count++;
                continue;
            }

            if ($count > 1) {
                $result = array_merge($result, str_split((string) $count));
            }
            // 新しい文字列
            $count = 1;
            $result[] = $chars[$i];
        }

        // 最後の文字列のカウントを処理
        if ($count > 1) {
            $result = array_merge($result, str_split((string) $count));
        }

        $chars = $result;
        return count($chars);
    }
}
// @lc code=end

