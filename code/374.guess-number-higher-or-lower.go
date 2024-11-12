package code

/*
 * @lc app=leetcode id=374 lang=golang
 *
 * [374] Guess Number Higher or Lower
 */

// @lc code=start
/**
 * Forward declaration of guess API.
 * @param  num   your guess
 * @return 	     -1 if num is higher than the picked number
 *			      1 if num is lower than the picked number
 *               otherwise return 0
 * func guess(num int) int;
 */

func guessNumber(n int) int {
	min := 1
	max := n

	for true {
		ans := (max + min) / 2

		switch guess(ans) {
		case -1:
			max = ans - 1
		case 1:
			min = ans + 1
		default:
			return ans
		}
	}
	return -1
}

// @lc code=end
