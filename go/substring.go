package main

import (
    "fmt"
    "time"
)

func main() {
	string_a := "ABABABCCCCCCBBBB"
	string_b := "ABCB"

	var results int

	start_time := time.Now()

	for i:=0; i<10000; i++ {
    	results = search(string_a, string_b)
	}

	results = search(string_a, string_b)

	end_time := time.Now()

	fmt.Println(results)

	fmt.Println(end_time.Sub(start_time))


	start_time = time.Now()

	for i:=0; i<10000; i++ {
    	results = matcher(0, 0, 0, string_a, string_b)
	}

	results = matcher(0, 0, 0, string_a, string_b)

	end_time = time.Now()

	fmt.Println(results)

	fmt.Println(end_time.Sub(start_time))
}

func search(string_a string, string_b string) int {
	if len(string_a) == 0 {
		return 0;
	}

	if len(string_b) == 0 {
		return 1;
	}

	results := 0
	for i:=0; i<(len(string_a)-len(string_b)+1); i++ {
		if string_a[i] == string_b[0] {
			results += search(string_a[i:], string_b[1:])
		}
	}

	return results
}

func matcher(matches int, string_a_pos int, string_b_pos int, string_a string, string_b string) int {
	for i:=string_a_pos; i<len(string_a); i++ {
		if string_a[i] == string_b[string_b_pos] {
			matches = matcher(matches, (i+1), string_b_pos, string_a, string_b)

			string_b_pos++
			if string_b_pos == len(string_b) {
				matches++
				return matches
			}
		}
	}

	return matches
}
