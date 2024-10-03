package code

/*
 * @lc app=leetcode id=649 lang=golang
 *
 * [649] Dota2 Senate
 */

// @lc code=start
func predictPartyVictory(senate string) string {
	radiant := []int{}
	dire := []int{}

	for i, s := range senate {
		if s == 'R' {
			radiant = append(radiant, i)
		} else {
			dire = append(dire, i)
		}
	}

	for len(radiant) > 0 && len(dire) > 0 {
		if radiant[0] < dire[0] {
			radiant = append(radiant, radiant[0]+len(senate))
		} else {
			dire = append(dire, dire[0]+len(senate))
		}

		radiant = radiant[1:]
		dire = dire[1:]
	}

	if len(radiant) > 0 {
		return "Radiant"
	} else {
		return "Dire"
	}
}

// @lc code=end
