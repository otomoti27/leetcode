package code

/*
 * @lc app=leetcode id=17 lang=golang
 *
 * [17] Letter Combinations of a Phone Number
 */

// @lc code=start
func letterCombinations(digits string) []string {
	if len(digits) == 0 {
		return []string{}
	}

	list := map[byte][]string{
		'2': []string{"a", "b", "c"},
		'3': []string{"d", "e", "f"},
		'4': []string{"g", "h", "i"},
		'5': []string{"j", "k", "l"},
		'6': []string{"m", "n", "o"},
		'7': []string{"p", "q", "r", "s"},
		'8': []string{"t", "u", "v"},
		'9': []string{"w", "x", "y", "z"},
	}

	// iteration
	// ans := []string{""}
	// for i := 0; i < len(digits); i++ {
	// 	cur := list[digits[i]]

	// 	new := []string{}
	// 	for _, v := range ans {
	// 		for j := 0; j < len(cur); j++ {
	// 			new = append(new, v+cur[j])
	// 		}
	// 	}

	// 	ans = new
	// }

	// return ans

	// backtracking
	ans := []string{}
	var backtracking func(combination string, next string)
	backtracking = func(combination string, next string) {
		if next == "" {
			ans = append(ans, combination)
			return
		}

		letters := list[next[0]]
		for _, letter := range letters {
			backtracking(combination+letter, next[1:])
		}
	}

	backtracking("", digits)
	return ans
}

// @lc code=end
