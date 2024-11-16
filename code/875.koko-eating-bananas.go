package code

/*
 * @lc app=leetcode id=875 lang=golang
 *
 * [875] Koko Eating Bananas
 */

// @lc code=start
func minEatingSpeed(piles []int, h int) int {
	min := 1
	max := 0
	for _, pile := range piles {
		max = maxFunc(max, pile)
	}

	for min <= max {
		count := 0
		mid := (min + max) / 2

		for _, pile := range piles {
			count += ceilDiv(pile, mid)
		}

		if count > h {
			min = mid + 1
		} else {
			max = mid - 1
		}
	}

	return min
}

func ceilDiv(a, b int) int {
	if b == 0 {
		panic("分母は0以上")
	}
	return (a + b - 1) / b
}

func maxFunc(a, b int) int {
	if a >= b {
		return a
	}
	return b
}

// @lc code=end
