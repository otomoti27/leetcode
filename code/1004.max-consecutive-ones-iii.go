package code

/*
 * @lc app=leetcode id=1004 lang=golang
 *
 * [1004] Max Consecutive Ones III
 */

// @lc code=start
func longestOnes(nums []int, k int) int {
	// max := 0
	// cur := 0
	// count := 0

	// for i := 0; i < len(nums); i++ {
	// 	if nums[i] != 1 {
	// 		if count == k {
	// 			if cur > max {
	// 				max = cur
	// 			}

	// 			left := i - cur
	// 			for {
	// 				if nums[left] == 1 {
	// 					cur--
	// 					left++
	// 				} else {
	// 					cur--
	// 					break
	// 				}
	// 			}
	// 		} else {
	// 			count++
	// 		}
	// 	}

	// 	cur++
	// }

	// if max > cur {
	// 	return max
	// } else {
	// 	return cur
	// }

	maxWindow := 0
	curSum := 0
	start := 0
	for end := 0; end < len(nums); end++ {
		curSum += nums[end]

		if end-start+1-curSum <= k {
			maxWindow = max(maxWindow, end-start+1)
		} else {
			// 先頭の0を探さなくてもよい。追いついていないなら最大ではない
			curSum -= nums[start]
			start++
		}
	}
	return maxWindow
}

// @lc code=end
