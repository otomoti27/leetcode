package code

/*
 * @lc app=leetcode id=605 lang=golang
 *
 * [605] Can Place Flowers
 */

// @lc code=start
func canPlaceFlowers(flowerbed []int, n int) bool {
	// 先頭と末尾に0を追加
	flowerbed = append([]int{0}, flowerbed...)
	flowerbed = append(flowerbed, 0)

	for i, v := range flowerbed {
		if i == 0 || i == len(flowerbed)-1 {
			continue
		}

		if flowerbed[i-1] == 0 && v == 0 && flowerbed[i+1] == 0 {
			flowerbed[i] = 1
			n--
			// 次の要素は確定で0なので飛ばす
			i++
		}

		if n <= 0 {
			return true
		}
	}

	return false
}

// @lc code=end
