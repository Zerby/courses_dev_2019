// 2 - Operators

package main

import (
	"fmt"
)

func main() {
	x,y := 5,6
	fmt.Println("x + y = ", x+y)
	fmt.Println("x - y = ", x-y)
	fmt.Println("x / y = ", x/y)
	fmt.Println("x * y = ", x*y)
	fmt.Println("x % y = ", x%y)

	isbool := true
	hate := false

	fmt.Println(isbool && hate)
	fmt.Println(isbool || hate)
	fmt.Println(!isbool)

}
