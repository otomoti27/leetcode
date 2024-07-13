<?php
/*
 * @lc app=leetcode id=1268 lang=php
 *
 * [1268] Search Suggestions System
 */

// @lc code=start
class Solution {
    /**
     * @param String[] $products
     * @param String $searchWord
     * @return String[][]
     */
    function suggestedProducts($products, $searchWord) {

        $trie = new Trie();
        $result = [];
        sort($products);
        foreach ($products as $product) {
            $trie->insert($product);
        }

        $prefix = '';
        foreach (str_split($searchWord) as $c) {
            $prefix .= $c;
            $result[] = $trie->searchSuggestion($prefix);
        }
        return $result;
    }
}

class TrieNode {
    public $isEnd = false;
    public $children = [];
}

class Trie {
    private $root;

    function __construct() {
        $this->root = new TrieNode();
    }

    function insert($word) {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }

            $node = $node->children[$char];
        }

        $node->isEnd = true;
    }

    function searchSuggestion($prefix) {
        $node = $this->root;
        $suggestion = [];

        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];
            if (!isset($node->children[$char])) return [];

            $node = $node->children[$char];
        }

        $this->dfs($node, $prefix, $suggestion);
        return $suggestion;
    }

    function dfs($node, $prefix, &$suggestion) {
        if (count($suggestion) == 3) return;

        if ($node->isEnd) {
            $suggestion[] = $prefix;
        }

        foreach ($node->children as $char => $child) {
            if ($child != null) {
                $this->dfs($child, $prefix. $char, $suggestion);
            }
        }
    }
}
// @lc code=end

