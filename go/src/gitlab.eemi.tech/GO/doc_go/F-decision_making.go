// 6 - Decision making

package main

import (
	"fmt"
)

func main() {

	age := 18

	if age <= 18 {
		fmt.Println("Yes, you can vote !")
	} else {
		fmt.Println("No, you can't vote !")
	}

	switch age {
	case 16: fmt.Println("Prepare for college")
	case 18: fmt.Println("You're in !")
	case 20: fmt.Println("Get a job...")
	default: fmt.Println("Are you even alive ?")
	}

}
