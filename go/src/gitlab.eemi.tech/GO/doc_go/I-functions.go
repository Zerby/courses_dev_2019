// 9 - Functions

package main

import "fmt"

func main() {

	x, y := 5,6
	fmt.Print("somme: ", add(x,y))

	// factorial
	num := 5
	fmt.Println("factorial :", factorial(num))

}

func add (num1 int, num2 int) int {
	return num1 + num2
}

func factorial (num int) int {
	if num == 0 {
		return 1
	}
	return num * factorial(num-1)
}
