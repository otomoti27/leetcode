package code

/*
 * @lc app=leetcode id=714 lang=golang
 *
 * [714] Best Time to Buy and Sell Stock with Transaction Fee
 */

// @lc code=start
func maxProfit(prices []int, fee int) int {
	n := len(prices)
	if n == 0 {
		return 0
	}

	notHold := make([]int, n) // 未保有時の最大利益
	hold := make([]int, n)    // 保有時の最大利益

	notHold[0] = 0
	hold[0] = -prices[0]
	for i := 1; i < n; i++ {
		notHold[i] = max(notHold[i-1], hold[i-1]+prices[i]-fee)
		hold[i] = max(hold[i-1], notHold[i-1]-prices[i])
	}

	return notHold[n-1]
}

func max(a, b int) int {
	if a < b {
		return b
	}
	return a
}

// @lc code=end
