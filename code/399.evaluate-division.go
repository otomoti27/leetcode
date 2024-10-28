package code

/*
 * @lc app=leetcode id=399 lang=golang
 *
 * [399] Evaluate Division
 */

// @lc code=start
func calcEquation(equations [][]string, values []float64, queries [][]string) []float64 {
	graph := make(map[string]map[string]float64)
	for i, equation := range equations {
		if graph[equation[0]] == nil {
			graph[equation[0]] = make(map[string]float64)
		}
		if graph[equation[1]] == nil {
			graph[equation[1]] = make(map[string]float64)
		}
		graph[equation[0]][equation[1]] = values[i]
		graph[equation[1]][equation[0]] = 1 / values[i]
	}

	results := make([]float64, 0, len(queries))
	for _, query := range queries {
		visited := make(map[string]bool)
		result := rec399(query[0], query[1], graph, visited)
		results = append(results, result)
	}

	return results
}

func rec399(a, b string, graph map[string]map[string]float64, visited map[string]bool) float64 {
	if graph[a] == nil {
		return -1.0
	}
	if graph[b] == nil {
		return -1.0
	}
	if result, ok := graph[a][b]; ok {
		return result
	}

	for a1, _ := range graph[a] {
		if !visited[a1] {
			visited[a1] = true
			tmp := rec399(a1, b, graph, visited)
			if tmp == -1.0 {
				continue
			} else {
				return tmp * graph[a][a1]
			}
		}
	}

	return -1.0
}

// @lc code=end
