<?php
/*
 * @lc app=leetcode id=208 lang=php
 *
 * [208] Implement Trie (Prefix Tree)
 */

// @lc code=start
class Trie {
    public $node = null;

    /**
     */
    function __construct() {
        $this->node = new TrieNode();
    }
  
    /**
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $count = strlen($word);
        $node = $this->node;
        for ($i = 0; $i < $count; $i++) {
            $char = $word[$i];
            if (isset($node->children[$char])) {
                $node = $node->children[$char];
                continue;
            }

            $node->children[$char] = new TrieNode();
            $node = $node->children[$char];
        }

        $node->isEnd = true;
    }
  
    /**
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $count = strlen($word);
        $node = $this->node;
        for ($i = 0; $i < $count; $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) return false;

            $node = $node->children[$char];
        }

        return $node->isEnd;
    }
  
    /**
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $count = strlen($prefix);
        $node = $this->node;
        for ($i = 0; $i < $count; $i++) {
            $char = $prefix[$i];
            if (!isset($node->children[$char])) return false;

            $node = $node->children[$char];
        }

        return true;
    }
}

class TrieNode {
    public $isEnd = false;
    public $children = [];
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */
// @lc code=end

